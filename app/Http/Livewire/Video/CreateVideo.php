<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use App\Models\Channel;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideo extends Component
{
    use WithFileUploads;

    public Channel $channel;

    public Video $video;

    public $video_file;

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.video.create-video')
            ->extends('layouts.app');
    }

    protected $rules = [
        'video_file' => 'required|mimes:mp4|max:1228800'
    ];


    public function file_completed()
    {
        // validation
        $this->validate();

        // create video record in sb
        $this->video = $this->channel->videos()->create([
            'title' => 'un title',
            'description' => 'none',
            'uid' => uniqid(true),
        ]);
        // redirect eo edit route
        return redirect()->route('video.edit', ['channel' => $this->channel, 'video' => $this->video]);
    }
}
