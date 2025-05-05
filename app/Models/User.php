<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function hasRole($roles)
    {
        if (is_array($roles)) {
            // Check if the user has any of the roles in the array
            return $this->roles()->whereIn('name', $roles)->exists();
        }

        // Check if the user has a single role
        return $this->roles()->where('name', $roles)->exists();
    }
    public function hasPermission($permission)
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->where('name', $permission)->exists()) {
                return true;
            }
        }
        return false;
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // for support message system
    public function supportMessages()
    {
        return $this->hasMany(SupportMessage::class);
    }

    public function supportReplies()
    {
        return $this->hasMany(SupportReply::class);
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

}
