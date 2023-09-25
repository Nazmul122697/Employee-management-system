<?php

namespace App\Livewire;

use App\Models\ship_districts;
use App\Models\ship_divisions;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class DistrictIndex extends Component
{

    use WithPagination;

    public $search = '';
    public $editMode = false;
    public $id;
    public $district_hdn_id;
    public $divisions;

    #[Rule('required')]
    public $district_name = '';
    #[Rule('required')]
    public $district_name_bn = '';
    #[Rule('required')]
    public $divsion_name = '';
    #[Rule('required')]
    public $url = '';


    public function mount(){
        $this->divisions = ship_divisions::all();
    }

    public function render()
    {
        return view('livewire.district-index',[
            'districts' => ship_districts::all(),
            'menu_name' => 'Ship Area',
            'feature_name' => 'Ship District',
            'divisions' =>ship_divisions::all()
        ])->layout('layouts.app');
    }

    public function save()
    {
        // dd($this->divsion_name);
        ship_districts::create([
            'district_name' => $this->district_name,
            'bn_name' => $this->district_name_bn,
            'division_id' => $this->divsion_name,
            'url' => $this->url
        ]);
        $this->reset();
        session()->flash('district-message', 'District Save Successfully');
    }

    public function EditDistrict($id)
    {
        $this->id = $id;
        $this->loadDistrictData();
        $this->editMode = true;
    }


    public function loadDistrictData()
    {
        $district = ship_districts::find($this->id);
        $this->district_name = $district->district_name;
        $this->district_name_bn = $district->bn_name;
        $this->divsion_name = $district->division_id;
        $this->url = $district->url;
    }

    public function updateDistrict()
    {
        ship_districts::where('id',$this->id)->update([
            'district_name' => $this->district_name,
            'bn_name' => $this->district_name_bn,
            'division_id' => $this->divsion_name,
            'url' => $this->url
        ]);
        $this->reset();
        session()->flash('district-message', 'District Updated Successfully');
    }


    public function deleteDistrict($id){
        ship_districts::where('id',$id)->delete();
        session()->flash('district-message', 'District Deleted Successfully');

    }
}
