<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $table="views";
    protected $fillable=[
        'ip',
        'user_id',
        'post_id'
    ];
    public function Post(){
        return $this->BelongsTo(Post::class);
    }
}
