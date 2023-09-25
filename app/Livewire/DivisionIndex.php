<?php

namespace App\Livewire;

use App\Models\ship_divisions;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class DivisionIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $editMode = false;
    public $id;
    public $division_hdn_id;

    #[Rule('required')]
    public $div_name = '';
    #[Rule('required')]
    public $div_name_bn = '';
    #[Rule('required')]
    public $url = '';

    public function render()
    {
        $menu_name = 'Shipping Area';
        $feature_name = 'Shipping Division';
        $divisions = ship_divisions::paginate(5);
        if (strlen($this->search) > 2) {
            $divisions = ship_divisions::where('division_name', 'like', "%$this->search%")
                ->orwhere('bn_name', 'like', "%$this->search%")
                ->orwhere('url', 'like', "%$this->search%")
                ->paginate(5);
        }
        return view('livewire.division-index', ['divisions' => $divisions, 'menu_name' => $menu_name, 'feature_name' => $feature_name])->layout('layouts.app');
    }

    public function save()
    {
        ship_divisions::create([
            'division_name' => $this->div_name,
            'bn_name' => $this->div_name_bn,
            'url' => $this->url
        ]);
        $this->reset();
        session()->flash('division-message', 'Division Save Successfully');
    }

    public function EditDivision($id)
    {
        $this->id = $id;
        $this->loadDevision();
        $this->editMode = true;
    }

    public function loadDevision()
    {
        $division = ship_divisions::find($this->id);

        $this->div_name = $division->division_name;
        $this->div_name_bn = $division->bn_name;
        $this->url = $division->url;
        $this->division_hdn_id = $division->id;
    }

    public function deleteDivision($id)
    {
        ship_divisions::find($id)->delete();
        session()->flash('division-message', 'Division Deleted Successfully');
    }
    public function update()
    {
        ship_divisions::where('id', $this->division_hdn_id)->update([
            'division_name' => $this->div_name,
            'bn_name' => $this->div_name_bn,
            'url' => $this->url
        ]);
        $this->reset();
        session()->flash('division-message', 'Division Updated Successfully');
    }
}
