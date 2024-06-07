<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - string - contains the user primary key (id)
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['created_at'] - string - contains the date of user creation
     * $this->attributes['updated_at'] - string - contains when the user was updated
     */

    protected $fillable = ['email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public static function validate (Request $request): void
    {
        $request->validate([
            'password' => 'required|string|min:8|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }
}
