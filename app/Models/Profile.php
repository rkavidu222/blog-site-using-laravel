<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    public function user(){
        return $this->belongsTo(User::class);
    }


    protected $fillable = ['user_id', 'avatar', 'youtube', 'facebook', 'about'];


    use HasFactory;
}
