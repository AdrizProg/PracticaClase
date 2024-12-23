<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CommunityLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'user_id',
        'channel_id',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function channel()
    {
        return $this->belongsTo(channel::class);
    }

    public function hasAlreadyBeenSubmitted()
    {
        $existing = static::where('link', $this->link)->first();
        if ($existing) {
            if (Auth::user()->isTrusted()) {
                $existing->touch();
                if ($existing->approved == 0)
                    $existing->approved = 1;
                $existing->save();
                session()->flash('status', 'The link already exists and its timestamp has been updated.');
                return true;
            } else {
                if ($existing->approved)
                    session()->flash('status', 'The link already exists and it is already approved but you are not a trusted user, so it will not be updated in the list.');
                else
                    session()->flash('status', 'The link already exists and it is pending for approval but you are not a trusted user, so it will not be updated in the list.');
            }
            return true;
        }
        return false;
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'community_link_users');
    }

    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'community_link_users');
    }
}
