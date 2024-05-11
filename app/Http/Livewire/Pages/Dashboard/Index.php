<?php

declare(strict_types=1);

namespace App\Http\Livewire\Pages\Dashboard;

use Livewire\Component;
use App\Models\InggridientHistory;
use App\Models\MasterInggridient;
use DB;
class Index extends Component
{
    public function mount(): void
    {
    }

    public function render()
    {
        $this->dispatchBrowserEvent('destroy');
        $this->dispatchBrowserEvent('initSomething');
        
       $harga =  DB::select('SELECT stock as y,date_format(`date`,"%Y %M") as label FROM inggridient_history order by date asc');
        return view('livewire.pages.dashboard.index',compact('harga'))->extends('layouts.app')->section('wrapper');
    }
    public function submit()
    {
    }
}
