<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    public function post(){
        return $this->belongsTo(post::class);
   }
   public function user(){
    return $this->belongsTo(user::class);
}
}
