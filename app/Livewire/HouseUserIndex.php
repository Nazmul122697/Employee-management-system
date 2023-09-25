<?php

namespace App\Livewire;

use App\Models\HouseUserIndex as ModelsHouseUserIndex;
use Livewire\Component;

class HouseUserIndex extends Component
{
    public $houseUsers;
    public $menu_name = 'House Management';
    public $feature_name = 'Users';
    public $editMode = false;
    


    public function mount()
    {
        $this->houseUsers = ModelsHouseUserIndex::where('status',1)->get();
    }
    public function render()
    {
        return view('livewire.house-user-index',[
            'houseUsers' => ModelsHouseUserIndex::where('status',1)->get()
        ])->layout('layouts.app');
    }
}
