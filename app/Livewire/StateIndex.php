<?php

namespace App\Livewire;

use App\Models\ship_districts;
use App\Models\ship_divisions;
use App\Models\ship_states;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class StateIndex extends Component
{
    public $divisions;
    public $districts;
    public $states;
    public $menu_name = 'Ship Area';
    public $feature_name = 'Ship Division';
    public $editMode = false;
    // form part 
    public $division = '';
    public $district;
    public $state_name;
    public $bn_name;
    public $url;

    public function mount()
    {
        $this->divisions = ship_divisions::all();
        $this->districts = ship_districts::all();
        $this->states = ship_states::all();

    }
    public function render()
    {
        return view('livewire.state-index',[
            'divisions' => ship_divisions::all(),
            'districts' => ship_districts::all(),
            'states' => ship_states::all(),
        ])->layout('layouts.app');
    }
    public function saveState()
    {
      ship_states::create([
        'state_name' => $this->state_name,
        'bn_name' => $this->bn_name,
        'division_id' => $this->division,
        'district_id' => $this->district,
        'url' => $this->url,
      ]);  
      $this->reset();
      session()->flash('state-message', 'State Save Successfully');
    }
}
