<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditChannel extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $channel;
    public $image;

    protected function rules()
    {
        return [
            'channel.name' => 'required|max:100|unique:channels,name,' . $this->channel->id,
            'channel.slug' => 'required|max:100',
            'channel.description' => 'nullable|max:255',
            'image' => 'nullable|image|max:1024',
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
        $this->authorize('edit', $this->channel);

        $this->validate();

        $this->channel->update([
            'name' => $this->channel->name,
            'slug' => $this->channel->slug,
            'description' => $this->channel->description,
        ]);

        // check is form submitted
        if ($this->image) {
            // upload image
            $image = $this->image->storeAs('images', $this->channel->uid . '.png');

            $image_name = explode('/',$image)['1'];
            // resize image to png
            Image::make(storage_path().'/app/'.$image)
            ->encode('png')
            ->fit(120,120,function($constraint){
                $constraint->upsize();
            })
            ->save();

            // update image in database
            $this->channel->update(['image'=>$image_name]);

        }

        session()->flash('message', 'Channel updated');
        // return back();
        return redirect()->route('channel.edit', ['channel' => $this->channel]);

    }
}
