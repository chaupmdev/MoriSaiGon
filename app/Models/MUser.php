<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class MUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ['email', 'password', 'status'];

    public $rules = [
        'email' => 'required|email|unique',
        'password' => 'required|min:6|max:50'
    ];
}
