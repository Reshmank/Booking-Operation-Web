<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BookingSchedule;
use yajra\Datatables\Datatables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function schedule()
    {
        $doctors=DB::table('users')->select('users.*')->join('model_has_roles','model_has_roles.model_id','users.id')->where('role_id',2)->pluck('name','id');

        $patients=DB::table('users')->select('users.*')->join('model_has_roles','model_has_roles.model_id','users.id')->where('role_id',3)->pluck('name','id');
        

        return view('schedule')->with(compact('doctors','patients'));

    }

    public function addSchedule(Request $request)
    { 
        date_default_timezone_set("Asia/Kolkata");   
        $todaydate= date('Y-m-d H:i:s');

        $count=BookingSchedule::where('doctor_id',$request->doctor)->where('schedule_time',$request->schedule_time)->count();

        if($count>0){
                return "This time schedulr already exist for this doctor !";
            }

             $insertion=BookingSchedule::insertGetId([
                    'room'=>ucwords($request->room_name),
                    'doctor_id'=>$request->doctor,
                    'patient_id'=>$request->patient,
                    'schedule_time'=>$request->schedule_time,
                    'created_at'=>$todaydate,
                    'updated_at'=>$todaydate,
                ]);

          return $insertion ? "success" : "failed";   


    }

    public function getSchedule()
    {

        $transactions=BookingSchedule::join('users','users.id','booking_schedule.doctor_id')->get(['booking_schedule.*','users.name as doctor']);

        //dd($transactions);
        return Datatables::of($transactions)
            ->addIndexColumn()
            ->editColumn('action', function ($transactions) {
              
                 $actionDelete = '<a  class="btn btn-icon btn-sm mx-1 text-danger" title="Delete" onclick="delete(' . $transactions->id . ')"><i class="fa fa-trash cursor-pointer f-size-14"></i></a>';
                
                return '<div class="d-flex">'.$actionDelete.'</div>';

            })
            ->editColumn('room', function($transactions){
               return $transactions->room;
             })
            ->rawColumns(['action'])
            ->make(true);


    


    }


}
