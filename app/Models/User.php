<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $fillable = ['nome','cognome','username','data_nascita','email','password'];
    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public function likes() {
        return $this->belongsToMany('App\Models\Post','likes','id_user','id_post');
    }

    public function favorites() {
        return $this->belongsToMany('App\Models\Post','favorites','id_user','id_post'); 
    }
}
?>