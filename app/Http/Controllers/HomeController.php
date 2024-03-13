<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RestrictedDay;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function index(){
        $week_start_day = now()->subDays((now()->format('w') + 8));
        $rows = 8;
        $restricted_day = RestrictedDay::whereBetween('date',[$week_start_day, now()->addDay($rows * 7)])->pluck('reason','date');

        $index = 0;
        foreach($restricted_day as $day=>$reason){
            $restriction[$index]["day"] = $day.$week_start_day->format(' H:i:s');
            if(strlen($reason) > 22)    $reason = substr($reason,0,20)."...";
            $restriction[$index]["reason"] = $reason;
            $index++;
        }
        $restriction[$index]["day"] = null;

        return view('site/home', [
            'today'=> now()->format('Y-m-d'),
            'day_sequence'=> $week_start_day,
            'rows'=> $rows,
            'restricted_day'=>$restriction,
            'index'=> 0
        ]);
    }
}
?>