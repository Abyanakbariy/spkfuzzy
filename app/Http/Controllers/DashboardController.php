<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\Pages\Dashboard\Index;
use DB;
class DashboardController extends Controller
{
    public function index()
    {
        $harga =  DB::select('SELECT stock as y,date_format(`date`,"%Y %M") as label FROM inggridient_history order by date asc');
        $purchase =  DB::select('SELECT purchase as y,date_format(`date`,"%Y %M") as label FROM inggridient_history order by date asc');
        $stock_in =  DB::select('SELECT stock_in as y,date_format(`date`,"%Y %M") as label FROM inggridient_history order by date asc');
        $stock_out =  DB::select('SELECT stock_out as y,date_format(`date`,"%Y %M") as label FROM inggridient_history order by date asc');
        return view('livewire.pages.dashboard.index',compact('harga','purchase','stock_in','stock_out'))->extends('layouts.app')->section('wrapper');
        // return App::call(Index::class);

    }
}
