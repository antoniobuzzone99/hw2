<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $timestamps = false;

    public function user() {
        return $this->belongsTo("User");
    }

    public function post() {
        return $this->belongsTo('Post');
    }
}
?>