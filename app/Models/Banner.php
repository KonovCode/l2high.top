<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name_project',
        'project_url',
        'path_img',
        'file_name',
        'buy_term',
        'state',
        'reserved',
        'user_id'
    ];

    public static function check_term() {
       $reserved_banners = Banner::all()->where('reserved', 1);
        
       foreach($reserved_banners as $banner) {
            
        if(Carbon::create($banner->buy_term)->toDateTimeString() < Carbon::now()->toDateTimeString()) {
                
            Banner::where('id', $banner->id)->update([
                    'name_project' => null,
                    'project_url' => null,
                    'path_img' => null,
                    'file_name' => null,
                    'buy_term' => null,
                    'reserved' => 0,
                    'user_id' => 1,
                ]);
            }
        
        }
       
    }
}
