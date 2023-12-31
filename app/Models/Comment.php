<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comments";
    protected $fillable=[
        'full_name',
        'email',
        'comment',
        'comment_id',
        'status',
        'user_id',
        'post_id'
    ];
}
