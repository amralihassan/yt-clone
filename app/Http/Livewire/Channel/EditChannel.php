<?php

namespace App\Http\Livewire\Channel;

use Livewire\Component;

class EditChannel extends Component
{
    public $name = "amr";
    public function render()
    {
        return view('livewire.channel.edit-channel');
    }
}
