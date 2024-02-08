<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use App\Models\Day;
use App\Models\Laboratory;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class AppointmentController extends Controller
{
    public function index(){
        // $laboratories = Laboratory::all();

        // //$teste[lab][day][time]
        // foreach($laboratories as $laboratory){
        //     $days = Day::where('laboratory_id',$laboratory->id)->get();
        
        //     foreach($days as $day){
        //         $timeslots = Timeslot::where('day_id', $day->id)->get();
        
        //         foreach($timeslots as $timeslot){
        //             $vet[$laboratory->id][$day->date][$timeslot->hour] = $timeslot->responsible;
        //         }
        //     }
        // }

        $laboratories = Laboratory::with('day.timeslot')->get();

        $timetable = [];
        
        foreach ($laboratories as $laboratory) {
            foreach ($laboratory->day as $day) {
                foreach ($day->timeslot as $timeslot) {
                    $timetable[$laboratory->id][$day->date][$timeslot->hour] = User::where('siape',$timeslot->responsible)->get()->pluck('name')->first();
                }
            }
        }
  //      dd($timetable);

        return view('Appointment/listAllAppointments',[
            'timetable' => $timetable
        ]);
    }
    
    public function create(Laboratory $laboratory){
        return view('Appointment/addAppointment', [
            'laboratory' => $laboratory,]
        );
    }

    public function store(Request $request){
        $day = Day::where('date', $request->day)->where('laboratory_id', $request->laboratory)->first();
        
        if (empty($day)){
            try{
                $day = Day::create([
                    'laboratory_id'=>$request->laboratory,
                    'date'=>$request->day
                ]);
            }
            catch(Exception $e){
                dd($e);
            }
        }

        for($time = 8; $time < 22; $time++){
            if($request[$time]){
                try{
                    Timeslot::create([
                        'day_id'=>$day->id,
                        'responsible'=>$request->responsible,
                        'hour'=>$time
                    ]);
                }
                catch(Exception $e){
                    dd($e);
                }
            }
        }
        return redirect()->route("laboratory.index");
    }

    public function getDay(Request $request){
        $day =  Day::where('laboratory_id', $request->laboratory)->where('date', $request->day)->get()->first();

        if(!empty($day))    $timeslots = Timeslot::where('day_id', $day->id)->get()->pluck('hour');
        else                $timeslots = null;

        return response()->json(['timeslot'=>$timeslots]);
    }
}
