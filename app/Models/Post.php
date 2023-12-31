<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    protected $table="posts";
    protected $fillable=[
        'image',
        'subject',
        'summery',
        'user_id',
        'category_id',
        'time_reading',
        'status',
        'suggested',
        'description'
    ];
    public function User(){
        return $this->BelongsTo(User::class);
    }
    public function View(){
        return $this->hasMany(View::class);
    }
    public function Category(){
        return $this->BelongsTo(Category::class);
    }
    public function Tag(){
        return $this->belongsToMany(Tag::class,"post_tag");
    }
}
