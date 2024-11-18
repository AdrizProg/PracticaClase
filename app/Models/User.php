<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CommunityLinkUser;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $image
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 * @property $trusted
 *
 * @property CommunityLinkUser[] $communityLinkUsers
 * @property CommunityLink[] $communityLinks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communityLinkUsers()
    {
        return $this->hasMany(\App\Models\CommunityLinkUser::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communityLinks()
    {
        return $this->hasMany(\App\Models\CommunityLink::class, 'id', 'user_id');
    }
    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function links(): HasMany
    {
        return $this->hasMany(CommunityLink::class);
    }

    public function isTrusted()
    {
        return $this->trusted;
    }

    public function votes()
    {
        return $this->belongsToMany(CommunityLink::class, "community_link_users");
    }

    public function votedFor(CommunityLink $link)
    {
        return $this->votes->contains($link);
    }
    
}
