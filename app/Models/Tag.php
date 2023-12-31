<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table="tags";
    protected $fillable=[
        'name'
    ];
    public function Post(){
        return $this->hasMany(Post::class,"post_tag");
    }
}
