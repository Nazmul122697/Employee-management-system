<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class DashboardIndex extends Component
{
    public function render()
    {
        return view('livewire.backend.dashboard-index')->layout('layouts.app');
    }
}
