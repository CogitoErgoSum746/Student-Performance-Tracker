<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Image;
use App\models\Student;
use App\models\Teacher;
use App\models\Attendance;
use App\models\subjects;
use App\models\period;
use App\Models\subject;
use app\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;
use App\Exports\AttendanceDataExport;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = period::with(['student','teacher'])->where('teacher_id', '=',auth()->user()->teacher->id)->get();
        $subjects = Subject::get();
        



        // if( request()->has(['type', 'month']) ) {
        //     $type = request()->input('type');
        //     $month = request()->input('month');

        //     if($type == 'period') {
        //         $attendances = Attendance::whereMonth('attendence_date', $month)
        //                              ->select('attendence_date','student_id','attendence_status','period_id')
        //                              ->orderBy('period_id','asc')
        //                              ->get()
        //                              ->groupBy(['period_id','attendence_date']);

        //         return view('backend.attendance.index', compact('attendances','months'));

        //     }
            
        // }
        
        return view('backend.attendance.index', compact('periods','subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index202(Request $request)
    {
        // dd($request);
        $periodid = $request->period;
        $subject = $request->subject;
        $date1 = $request->date1;
        $date2 = $request->date2;

        $stud = Student::with('period')->get();

        $period = period::with(['student','teacher'])->findOrFail($periodid);
        
        $attens = Attendance::whereBetween('attendance_date',[$date1,$date2])
                            ->where('period_id',$periodid)
                            ->where('subject',$subject)->get();
        // dd($stud->find(1)->name);
        return view('backend.attendance.index2',compact('period','attens','stud'));
    }

    public function createByTeacher($periodid)
    {
        $period = period::with(['student','teacher'])->findOrFail($periodid);
        $students = Student::with('period')->get();
        $subjects = Subject::get();

        return view('backend.attendance.create', compact('period','students','subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->subject);
        $periodid    = $request->period_id;
        $attenddate = $request->atten_date;

        $subject = $request->subject;
        $teacher = Teacher::findOrFail(auth()->user()->teacher->id);
        $period   = period::find($periodid);

        if($teacher->id !== $period->teacher_id) {
            return redirect()->route('teacher.attendance.create',$periodid)
                             ->with('status', 'You are not assign for this period attendance!');
        }

        $dataexist = DB::table('attendances')->whereDate('attendance_date','=',$attenddate)
                                ->where('period_id','=',$periodid)
                                ->where('subject','=',$subject)
                                ->get();
                                 
        if (count($dataexist) !== 0 ) {
            return redirect()->route('teacher.attendance.create',$periodid)
                             ->with('status', 'Attendance already taken!');
        }

        $request->validate([
            'period_id'      => 'required|numeric',
            'teacher_id'    => 'required|numeric',
            'attendances'   => 'required',
            'subject' => 'required'
        ]);

        // dd($attenddate);
        foreach ($request->attendances as $studentid => $attendance) {

            if( $attendance == 'present' ) {
                $attendance_status = true;
            } else if( $attendance == 'absent' ){
                $attendance_status = false;
            }

            DB::table('attendances')->insert([
                'student_id' => $studentid,
                'subject' => $subject,
                'period_id' => $request->period_id,
                'attendance_status' => $attendance_status,
                'attendance_date' => $attenddate,
            ]);
        };

        return back()->with('status', 'Attendance Recorded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        $attendances = Attendance::where('student_id',$attendance->id)->get();
        $stud = Student::findOrFail($attendance->id);
        // dd();
        return view('backend.attendance.show', compact('attendances','stud'));
    }

    public function exportExcel(Request $request){
        $period = $request->input('p');
        $attens = $request->input('a');
        $stud = $request->input('s');
        $users = User::get();
        // dd($attens);
        // $view = View::make('backend.attendance.exportExcel',compact('period','attens','stud'));
        
        return Excel::download(new AttendanceDataExport($users), 'take1.xlsx');
    }

    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}

