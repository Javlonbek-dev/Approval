<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    public function roles():BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($roles): bool
    {
        return $this->roles()->where('name', $roles)->exists();
    }

    public function hasPermission($permissions): bool
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->where('name', $permissions)->exists()) {
                return true;
            }
        }
        return false;
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(UserStatus::class);
    }

    public function executions():BelongsToMany
    {
        return $this->belongsToMany(Execution::class, 'program_executor');
    }

    public function orders():BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_executor');
    }
}
