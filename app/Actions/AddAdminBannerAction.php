<?php


namespace App\Actions;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Banner;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AddAdminBannerAction
{

    public function handle($data)
    {

        $validator = Validator::make($data->all(), [
            'name_project' => ['required', 'string', 'min:3', 'max:20'],
            'src_project' => ['required', 'string', 'min:3', 'max:99'],
            'file' => ['required', 'image', 'mimes:jpg, png', 'max:500000'],
            'buy_term' => ['required', 'integer', Rule::exists('services', 'id')],
            'banner_id' => ['required', Rule::exists('banners', 'id')->where('reserved', 0)],
        ]);

        if ($validator->fails()) {
            Session::flash('message', 'error');
        }

        $validated = $validator->validated();

        $banner = Banner::findOrFail($validated['banner_id']);

        $service = Service::findOrFail($validated['buy_term']);

        $fileName = time() . $validated['file']->getClientOriginalName();

        Storage::putFileAs('public/banners', $data->file('file'), $fileName);

        $banner->update([
            'name_project' => $validated['name_project'],
            'project_url' => $validated['src_project'],
            'path_img' => asset(Storage::url('banners/' . $fileName)),
            'file_name' => $fileName,
            'buy_term' => Carbon::now()->addDays($service->term)->toDateTimeString(),
            'reserved' => 1,
            'user_id' => Auth::user()->id,
        ]);

        Session::flash('message', 'upload');
    }
}
