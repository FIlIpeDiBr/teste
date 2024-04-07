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
        
        $laboratories = Laboratory::with(['day' => function ($query) {
            $query->whereDate('date', '>=', now());
        }, 'day.timeslot'])->get();
        

        $timetable = [];
        $num_of_days = 0;
        
        foreach ($laboratories as $laboratory) {
            foreach ($laboratory->day as $day) {
                foreach ($day->timeslot as $timeslot) {
                    $day_index = date("d/m/Y", strtotime($day->date));
                    
                    $timetable[$laboratory->id][$day_index][$timeslot->hour]['responsible']
                        = User::where('siape',$timeslot->responsible)->get()->pluck('name')->first();
                    
                    $timetable[$laboratory->id][$day_index][$timeslot->hour]['event'] = $timeslot->event;

                }
                $num_of_days++;
            }
            if($num_of_days > 1){
                ksort($timetable[$laboratory->id]);
            }

            $num_of_days = 0;
        }
        //dd($timetable);

        return view('Appointment/listAllAppointments',[
            'timetable' => $timetable
        ]);
    }
    
    public function create(Request $request){
        //$laboratory = Laboratory::find($laboratory_id);

        $day = date('Y-m-d', strtotime(str_replace('/', '-', $request->day)));

        //dd($request->laboratory, $day, $request->day, $request->checked);
                
        return view('Appointment/addAppointment', [
            'laboratory' => $request->laboratory,
            'day'=>$day,
            'checked'=>$request->checked
        ]);
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
                        'hour'=>$time,
                        'event'=>$request->event
                    ]);
                }
                catch(Exception $e){
                    dd($e);
                }
            }
        }
        return redirect()->route("appointment.index");
    }

    public function getDay(Request $request){
        $day =  Day::where('laboratory_id', $request->laboratory)->where('date', $request->day)->get()->first();

        if(!empty($day))    $timeslots = Timeslot::where('day_id', $day->id)->get()->pluck('hour');
        else                $timeslots = null;

        return response()->json(['timeslot'=>$timeslots]);
    }
}
