<?php

namespace App\Http\Livewire;

use App\Models\DemandeCreneau;
use Livewire\Component;

class Demande extends Component
{
  public $salle_id,$seance_id,$coach_id,$weekday,$start_time,$end_date;
  public function rules(){
    return [
      'salle_id' => 'required|numeric',
      'seance_id' => 'required|numeric',
      'coach_id' => 'required|numeric',
      'weekday' => 'required|numeric',
      'start_time' =>'required',
      'end_date' =>'required',
    ];
  }
  public function updated($fields)
  {
    $this->validateOnly($fields);
  }
  public function Demande()
  {
    $fields = $this->validate([
      'salle_id' => 'required|numeric',
      'seance_id' => 'required|numeric',
      'coach_id' => 'required|numeric',
      'weekday' => 'required|numeric',
      'start_time' =>'required',
      'end_date' =>'required',
    ]);
    DemandeCreneau::create($fields);
  }  
  public function render()
    {
        return view('livewire.demande');
    }
}
