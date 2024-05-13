<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => Events\UserCreated::class,
    ];

    /**
     * Assign default role to the user after creation.
     *
     * @return void
     */
    public function assignDefaultRole()
    {
        // Get the default role (assuming you have a 'user' role in your roles table)
        $defaultRole = Role::where('name', 'user')->first();

        // Attach the default role to the user
        $this->roles()->attach($defaultRole);
    }

  /**
     * Check if the user has admin role.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->roles()->where('name', 'admin')->exists();
    }

    /**
     * Roles relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
}
