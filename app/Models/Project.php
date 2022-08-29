<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'chronicles',
        'rates',
        'date_open',
        'status',
        'status_term',
        'premium',
        'premium_term',
        'website',
        'user_id',
    ];

}
