<?php

namespace App\Livewire;

use App\Models\Room;
use App\Models\ship_districts;
use Livewire\Component;
use DB;

class RoomIndex extends Component
{
    public $rooms;
    public $menu_name = 'Housing Management';
    public $feature_name = 'Room Setup';
    public $editMode = false;
    public $autoRoomId = 0;
    public $id;
    // form part
    public $room_id;
    public $room_name;
    public $room_price;
    public $room_details_hdn;
    public $status;

    public function mount()
    {
        $this->rooms = Room::all();
        $this->autoRoomId = DB::select('SELECT MAX(id) as id FROM `rooms`')[0]->id + 1;
    }
    public function render()
    {
        return view('livewire.room-index', [
            'rooms' => Room::all(),
            'autoRoomId' => DB::select('SELECT MAX(id) as id FROM `rooms`')[0]->id + 1
        ])->layout('layouts.app');
    }

    public function saveRoom()
    {
        Room::create([
            'room_price' => $this->room_price,
            'room_id' => $this->autoRoomId,
            'room_name' => $this->room_name,
            'room_details' => $this->room_details_hdn,
            'status' => $this->status,
        ]);
        $this->reset();
        $this->redirect('/housing-management/rooms'); 
        session()->flash('room-message', 'New Room Inserted Succefully');
    }

    

    public function EditRoom($id)
    {
        $this->id = $id;
        dd($this->id);
        // $this->loadDistrictData();
        // $this->editMode = true;
    }

    public function delete($id)
    {
        
        dd($id);
    }
}
