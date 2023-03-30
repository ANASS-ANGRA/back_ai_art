<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function motCles()
    {
        return $this->belongsToMany(Mot_cle::class);
    }
    public function Users_likes(){
        return $this->belongsToMany(Users::class);
    }
}
