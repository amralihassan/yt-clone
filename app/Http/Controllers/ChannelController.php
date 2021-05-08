<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ChannelController extends Controller
{
    use AuthorizesRequests;

    public function edit(Channel $channel)
    {
        $this->authorize('edit', $channel);
        return view('channel.edit', compact('channel'));
    }
}
