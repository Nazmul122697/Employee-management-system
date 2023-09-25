<?php

namespace App\Livewire;

use App\Models\Room;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class UserCreateIndex extends Component
{
    public $rooms;
    public $menu_name = 'House Management';
    public $feature_name = 'Create User';
    public $editMode = false;

    public $room_price;
    public $room_id;


    public function mount()
    {
        $this->rooms = Room::where('status',1)->get();
    }
    public function render()
    {
        return view('livewire.user-create-index')->layout('layouts.app');
    }

    public function roomPrice($id)
    {
        
        $price = DB::table('rooms')->select('room_price')->where('id',$id)->first();
        $this->room_price = $price->room_price;
    }
}
