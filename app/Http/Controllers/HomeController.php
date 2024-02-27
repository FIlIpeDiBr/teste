<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RestrictedDay;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function index(){
        $week_start_day = now()->subDays((now()->format('w') + 1));
        $rows = 4;
        $restricted_day = RestrictedDay::whereBetween('date',[$week_start_day, now()->addDay($rows * 7)])->pluck('date');

        $index = 0;
        while(!empty($restricted_day[$index])){
            $restricted_day[$index] = $restricted_day[$index].$week_start_day->format(' H:i:s');
            $index++;
        }
        $restricted_day[$index] = null;


        //dd($restricted_day);

        return view('site/home', [
            'today'=> $week_start_day,
            'rows'=> $rows,
            'restricted_day'=>$restricted_day,
            'index'=> 0
        ]);
    }
}
?>