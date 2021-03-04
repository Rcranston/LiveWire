<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CityComponent extends Component
{
    public $search='';
    public $sortBy='population_rank';
    public $direction='asc';

    protected $updatesQueryString=[
        'search'=>['except'=>''],
        'sortBy'=>['except'=>''],
        'direction'=>['except'=>''],
    ];
    
    public function mount(){
        $this->search=request()->query('search',$this->search);
        $this->sortBy=request()->query('sortBy',$this->sortBy);
        $this->direction=request()->query('direction',$this->direction);
    }

    public function doSort($feild, $direction){
        $this->sortBy= $feild;
        $this->direction=$direction;
    }

    public function render()
    {
        $citys=\App\City::where('name','Like','%'.$this->search.'%')
                            ->orwhere('state','Like','%'.$this->search.'%')
                            ->orderBy($this->sortBy, $this->direction);
        return view('livewire.city-component',['citys'=>$citys->get()]);
    }
}
