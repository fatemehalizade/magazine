<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $table="socialmedias";
    protected $fillable=[
        'name',
        'en_name',
        'url'
    ];
}
