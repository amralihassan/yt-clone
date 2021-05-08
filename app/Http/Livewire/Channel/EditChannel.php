<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;

class EditChannel extends Component
{
    public $channel;

    protected function rules()
    {
        return [
            'channel.name' => 'required|max:100|unique:channels,name,' . $this->channel->id,
            'channel.slug' => 'required|max:100',
            'channel.description' => 'nullable|max:255',
        ];
    }

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.channel.edit-channel');
    }

    public function update()
    {
        $this->validate();
        $this->channel->update([
            'name' => $this->channel->name,
            'slug' => $this->channel->slug,
            'description' => $this->channel->description,
        ]);

        session()->flash('message', 'Channel updated');
        // return back();
        return redirect()->route('channel.edit',['channel'=>$this->channel]);

    }
}
