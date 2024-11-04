<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommunityLinkForm;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Channel;
use App\Queries\CommunityLinkQuery;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel = null)
    {
        $channels = Channel::orderBy('title', 'asc')->get();
        $query = new CommunityLinkQuery();

        if (request()->exists('popular')) {
            if ($channel) {
                $links = $query->getByChannel($channel, true);
            } else {
                $links = $query->getAll(true);
            }
        } else {
            if ($channel) {
                $links = $query->getByChannel($channel);
            } else {
                $links = $query->getAll();
            }
        }

        return view('dashboard', compact('links', 'channels'));
    }



    public function mylinks()
    {
        $user = Auth::user();
        $links = $user->links()->paginate(10);
        return view('mylinks', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityLinkForm $request)
    {


        $data = $request->validated();
        $link = new CommunityLink($data);
        // Si uso CommunityLink::create($data) tengo que declarar user_id y channel_id como $fillable
        $existe = $link->hasAlreadyBeenSubmitted();
        if ($existe) {
            return back();
        } else {
            $link->user_id = Auth::id();
            $link->approved = Auth::user()->trusted ?? false;
            $link->save();
            if (Auth::user()->trusted) {
                return back()->with('status', 'Link aprobado');
            } else {
                return back()->with('status', 'Link a la espera de aprobacion');
            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}
