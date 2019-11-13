<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use App\streams;
use App\User;
use Auth;
use DB;
use App\exams;
use App\profiles;
use Validator;
use App\performances;
use Picqer;
use App\student_subjects;


class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user_id=Auth::user()->id;
         

        //$profile=DB::table('users')->join('profiles', 'users.id', '=', 'profiles.user_id')->select('users.*', 'profiles.*')->where(['profiles.user_id'=>$user_id])->first();
        $students=DB::table('profiles')->join('students', 'students.admin_no', '=', 'profiles.admin_no')->join('users', 'users.id', '=', 'profiles.user_id')->join('streams', 'streams.stream_id', '=', 'students.stream_id')->select('students.*', 'streams.*')->where(['profiles.user_id'=>$user_id])->get();
       
    
    	return view('projects.parent.parentDashBoard', compact('students'));
    }
    public function studentresult(){
         $user_id=Auth::user()->id;
         $performances=performances::select('performances.admin_no', 'exams.exam', 'exams.exam_code','term', DB::raw('SUM(performances.marks) as total_marks'),DB::raw('AVG(performances.marks) as average_marks'), 'students.academic_year', 'students.stream_id', 'streams.stream')
         ->join('students', 'students.admin_no', '=', 'performances.admin_no')->join('streams', 'streams.stream_id', '=', 'students.stream_id')->join('profiles', 'profiles.admin_no', '=', 'students.admin_no')->join('users', 'users.id', '=', 'profiles.user_id')->join('exams', 'exams.exam_code', 'performances.exam_code')
         ->groupBy('performances.admin_no','exams.exam', 'exams.exam_code','term', 'students.academic_year', 'students.stream_id', 'streams.stream')->orderBy('average_marks', 'desc')->where(['profiles.user_id'=>$user_id])
        ->get();
        return view('projects.parent.student', compact('performances'));
    }
    public function studentsubjectperformance(Request $request, $exam_code){
       $label='081231723897';
       $generator= new Picqer\Barcode\BarcodeGeneratorPNG();
       $barcode=$generator->getBarcode($label, $generator::TYPE_CODE_128); 
         $performances=performances::select('performances.admin_no', 'exams.exam', 'exams.exam_code', 'exams.start_date','exams.end_date','term', DB::raw('SUM(performances.marks) as total_marks'),DB::raw('AVG(performances.marks) as average_marks'), 'students.academic_year', 'students.stream_id', 'streams.stream', DB::raw('avg(performances.marks)/(count(performances.subject_id)) as stream_average_marks'))
         ->join('students', 'students.admin_no', '=', 'performances.admin_no')->join('streams', 'streams.stream_id', '=', 'students.stream_id')->join('profiles', 'profiles.admin_no', '=', 'students.admin_no')->join('users', 'users.id', '=', 'profiles.user_id')->join('exams', 'exams.exam_code', 'performances.exam_code')
         ->groupBy('performances.admin_no','exams.exam', 'exams.start_date','exams.end_date','exams.exam_code','term', 'students.academic_year', 'students.stream_id', 'streams.stream')->orderBy('average_marks', 'desc')->where('exams.exam_code', '=', $exam_code)
        ->get();

        $results=DB::table('performances')->join('exams', 'exams.exam_code', '=', 'performances.exam_code')->join('students', 'students.admin_no', '=', 'performances.admin_no')->join('subjects', 'subjects.subject_id', '=', 'performances.subject_id')->select('subjects.subject', 'performances.marks', 'performances.p_grade')->groupBy('subject', 'marks', 'p_grade')->where('exams.exam_code', '=', $exam_code)->get();
    	return view('projects.parent.subjectperformance', compact('results','performances', 'label', 'barcode'));
    }
    public function profile(){
        
        return view('projects.parent.profile');
    }
    public function getstudentsubjects(){
          $user_id=Auth::user()->id;
          $subjects=DB::table('teacher_subjects')->join('students', 'students.admin_no', '=', 'teacher_subjects.admin_no')->join('subjects', 'subjects.subject_id', '=', 'teacher_subjects.subject_id')->join('profiles', 'profiles.admin_no', '=', 'students.admin_no')->join('users', 'users.id', '=', 'profiles.user_id')->select('subjects.subject', 'students.admin_no')->groupBy('subject', 'admin_no')->orderBy('admin_no')->where(['profiles.user_id'=>$user_id])->get();
          return view('projects.parent.subjects', compact('subjects'));

    }
    public function addprofile(Request $request){
        $validate=Validator::make($request->all(),[
          'admin_no'=>['required', 'string', 'max:5', 'unique:profiles'],
          'national_id'=>['required', 'string', 'min:8','max:8', 'unique:profiles'],
          'phone'=>['required', 'string', 'max:10', 'min:10','unique:profiles'],
          

]);
    if($validate->fails()){
        return redirect('parentprofile')->withErrors($validate)->withInput();
    }
     if (\DB::table('profiles')->where('admin_no', $request->input('admin_no'))->count() >= 1)
    {
        return back('parentprofile')->with('error', 'You already updated your profile.');
    }
    

        $user=new profiles();
        $user->national_id=$request->input('national_id');
        $user->user_id=Auth::user()->id;
        $user->gender=$request->input('gender');
        $user->address=$request->input('address');
        $user->phone=$request->input('phone');
        $user->admin_no=$request->input('admin_no');
        if (Input::hasFile('profile')) {
            $file=Input::file('profile');
            $file->move(public_path(). '/uploads/', $file->getClientOriginalName());
            $url=URL::to("/").'/uploads/'. $file->getClientOriginalName();
        }
        $user->profile=$url;
        $user->save();
        return redirect('parentprofile')->with('response', 'Successfully updated your profile');
        
        
    } 
    public function getteachers(){
       $user_id=Auth::user()->id;
       $subjects=DB::table('teacher_subjects')->join('students', 'students.admin_no', '=', 'teacher_subjects.admin_no')->join('subjects', 'subjects.subject_id', '=', 'teacher_subjects.subject_id')->join('profiles', 'profiles.admin_no', '=', 'students.admin_no')->join('users', 'users.id', '=', 'profiles.user_id')->join('teachers', 'teachers.tsc_no', '=', 'teacher_subjects.tsc_no')->select('teachers.fullnames', 'teachers.phone', 'teachers.gender', 'teachers.category', 'teachers.profile', 'subjects.subject')->where(['profiles.user_id'=>$user_id])->get();
       return view('projects.parent.teachers', compact('subjects'));
       
    }
    public function streamPerformance(){
   $streams=performances::select('exams.exam', 'exams.start_date','exams.end_date','term','students.academic_year', DB::raw('avg(performances.marks)/(count(students.admin_no)) as average_marks'),  'streams.stream', DB::raw('count(students.admin_no) as total_students'),)
    ->join('streams', 'streams.stream_id', '=', 'performances.stream_id')->join('exams', 'exams.exam_code', 'performances.exam_code')->join('students', 'students.admin_no', 'performances.admin_no')->join('profiles', 'profiles.admin_no', '=', 'students.admin_no')->join('users', 'users.id', '=', 'profiles.user_id')
    ->groupBy('exams.exam', 'term','students.academic_year','streams.stream', 'exams.start_date', 'exams.end_date')->get();
    return view('projects.parent.streamPerformance', compact('streams'));
}
   


}
