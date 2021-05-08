<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use App\Models\Channel;
use Livewire\Component;

class EditVideo extends Component
{
    public Channel $channel;
    public Video $video;

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    protected $rules = [
        'video.title' => 'required | max:100',
        'video.description' => 'required | max:255',
        'video.visibility' => 'required | in:private,public,unlisted',
    ];

    public function render()
    {
        return view('livewire.video.edit-video')
            ->extends('layouts.app');
    }

    public function update()
    {
        $this->validate();

        $this->video->update([
            'title' => $this->video->title,
            'description' => $this->video->description,
            'visibility' => $this->video->visibility,
        ]);

        session()->flash('message','Video was updated');
    }
}
