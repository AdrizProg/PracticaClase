<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityLinkUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'community_link_id',
    ];

    public function toggle()
    {
        if ($this->id)
            $this->delete();
        else
            $this->save();
    }
}
