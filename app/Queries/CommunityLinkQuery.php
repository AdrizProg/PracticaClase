<?php

namespace App\Queries;

use App\Models\CommunityLink;
use App\Models\Channel;

class CommunityLinkQuery
{
    /**
     * Obtiene los links por canal
     */
    public function getByChannel(Channel $channel, $popular = false)
    {
        $query = $channel->allLink()->where('approved', true);

        if ($popular) {
            $query->withCount('votes')
                  ->orderBy('votes_count', 'desc');
        } else {
            $query->latest('updated_at');
        }

        return $query->paginate(25);
    }

    /**
     * Obtiene todos los links
     */
    public function getAll($popular = false)
    {
        $query = CommunityLink::where('approved', true);

        if ($popular) {
            $query->withCount('votes')
                  ->orderBy('votes_count', 'desc');
        } else {
            $query->latest('updated_at');
        }

        return $query->paginate(10);
    }

    /**
     * Obtiene los links más populares
     */
    public function getMostPopular()
    {
        return CommunityLink::where('approved', true)
                            ->withCount('votes')
                            ->orderBy('votes_count', 'desc')
                            ->paginate(10);
    }
}
