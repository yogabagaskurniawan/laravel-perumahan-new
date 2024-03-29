<?php

namespace App\Livewire\Admin\Homelist;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Index extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.homelist.index');
    }
}
