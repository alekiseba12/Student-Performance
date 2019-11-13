<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use DB;
use App\teachers;
use Validator;
use Auth;
use App\User;
use App\subjects;
use App\streams;
use App\teacher_subjects;
use App\ performances;
use App\exams;

class AdministratorController extends Controller
{
    public function index(){
    	return view('projects.administrator.index');
    }
        public function addprofile(Request $request){
        $validate=Validator::make($request->all(),[
          'tsc_no'=>['required', 'string', 'max:10', 'unique:teachers','exists:tscs' ],
          'national_id'=>['required', 'string', 'min:8','max:8', 'unique:teachers'],
          'phone'=>['required', 'string', 'max:10', 'min:10','unique:teachers'],
          

]);
    if($validate->fails()){
        return redirect('/administrator')->withErrors($validate)->withInput();
    }
     if (\DB::table('teachers')->where('tsc_no', $request->input('tsc_no'))->count() >= 1)
    {
        return back('parentprofile')->with('error', 'You already updated your profile.');
    }
    

        $user=new teachers();
        $user->national_id=$request->input('national_id');
        $user->fullnames=$request->input('fullnames');
        $user->user_id=Auth::user()->id;
        $user->gender=$request->input('gender');
        $user->address=$request->input('address');
        $user->phone=$request->input('phone');
        $user->tsc_no=$request->input('tsc_no');
        $user->category=$request->input('category');
        if (Input::hasFile('profile')) {
            $file=Input::file('profile');
            $file->move(public_path(). '/uploads/', $file->getClientOriginalName());
            $url=URL::to("/").'/uploads/'. $file->getClientOriginalName();
        }
        $user->profile=$url;
        $user->save();
        return redirect('/administrator')->with('response', 'Successfully updated your profile');
        
        
    }
    public function performanceForm(){
  	$subjects=subjects::all();
    $streams=streams::all();
    $exams=exams::all();
  	return view('projects.administrator.performanceForm', compact('subjects', 'streams', 'exams'));
  }
    public function viewteacher(Request $request){
      $validate=Validator::make($request->all(),[
         
      'tsc_no'=>['required', 'exists:tscs'],
           
    ]);
        if ($validate->fails()) {
      return redirect('teacherProfile')->withErrors($validate)->withInput();
    }
      $user_id=Auth::User()->id;
      $perform = $request->get('tsc_no');
    	$teachers =teachers::where('teachers.tsc_no', 'LIKE', '%' .$perform. '%')->where(['teachers.user_id'=>$user_id])->get();;
    	return view('projects.administrator.profile', compact('teachers'));
    }
    public function getprofile(){
      return view('projects.administrator.searchprofile');
    }
    public function subjects(Request $request){
      $validate=Validator::make($request->all(),[
         
      'tsc_no'=>['required', 'exists:teacher_subjects'],
           
    ]);
        if ($validate->fails()) {
      return redirect('teacherSubjects')->withErrors($validate)->withInput();
    }
     $user_id=Auth::User()->id;
      $perform = $request->get('tsc_no');
    	$subjects=DB::table('teacher_subjects')->join('streams', 'streams.stream_id', '=', 'teacher_subjects.stream_id')->join('subjects', 'subjects.subject_id', '=', 'teacher_subjects.subject_id')->join('users', 'users.id', '=', 'teacher_subjects.user_id')->join('teachers', 'teachers.tsc_no', '=', 'teacher_subjects.tsc_no')->select('streams.stream', 'subjects.subject', 'teachers.tsc_no')->where('teacher_subjects.tsc_no', 'LIKE', '%' .$perform. '%')->where(['teachers.user_id'=>$user_id])->get();
    	return view('projects.administrator.viewsubjects', compact('subjects'));

    }
    public function getsubject(){
    	$streams=streams::all();
    	$subjects=subjects::all();
    	return view('projects.administrator.subjects', compact('streams', 'subjects'));
    }
    public function viewsubjects(){
      return view('projects.administrator.searchsubject');
    }
    public function storeteachersubjects(Request $request){ 	
    $validate=Validator::make($request->all(),[
  		   'tsc_no'=>['required', 'exists:teachers'],



  	]);
  	if ($validate->fails()) {
  		return redirect ('teachersubjects')->withErrors($validate)->withInput();
  	}
   
     if (\DB::table('teacher_subjects')->where('tsc_no', $request->input('tsc_no'))->where('subject_id',$request->input('subject_id'))->where('stream_id', $request->input('stream_id'))->first())
      {

        return redirect('teachersubjects')->with('error', 'Oops! You already taken this subject. Try another one!');
      }
      if (\DB::table('teacher_subjects')->where('tsc_no', $request->input('tsc_no'))->where('stream_id',$request->input('stream_id'))->count()>=2)
      {

        return redirect('teachersubjects')->with('error', 'Oops! You cant teach more than two subjects in this stream/form.');
      }
       if (\DB::table('teacher_subjects')->where('subject_id',$request->input('subject_id'))->where('stream_id', $request->input('stream_id'))->first())
      {

        return redirect('teachersubjects')->with('error', 'Oops! This subject has been taken by another teacher! Incase, contact administrator!');
      }
      
     if (\DB::table('teacher_subjects')->where('admin_no', $request->input('admin_no'))->where('subject_id',$request->input('subject_id'))->first())
      {

        return redirect('studentsubjects')->with('error', 'Oops! The student subject already exist. Try another one!');
      }
       if (\DB::table('teacher_subjects')->where('admin_no', $request->input('admin_no'))->whereBetween('stream_id', $request->input('stream_id'), [1,2])->count() >= 11)
    {
      return redirect('studentsubjects')->with('error', 'This student only allowed to take 11 subjects');
    }
       if (\DB::table('teacher_subjects')->where('admin_no', $request->input('admin_no'))->where('stream_id', $request->input('stream_id'), [3,4)->count() >=8)
    {
      return redirect('studentsubjects')->with('error', 'This student only allowed to take 8 subjects');
    }

    

  	        $teacher_subject=new teacher_subjects();
  	        $teacher_subject->tsc_no=$request->input('tsc_no');
  	        $teacher_subject->user_id=Auth::user()->id; 
  	        $teacher_subject->subject_id=$request->input('subject_id');
  	        $teacher_subject->stream_id=$request->input('stream_id');
  	        $teacher_subject->admin_no=$request->input('admin_no');
  	        $teacher_subject->save();
        
  	        return redirect('teachersubjects')->with('success', 'successfully inserted subject!');
  }
    public function studentperformance(Request $request){
  	$validate=Validator::make($request->all(),[
  		   'admin_no'=>['required', 'exists:students'],
           'marks' => 'required|integer|min:2|max:100',
           'tsc_no'=>['required', 'exists:teachers'],
           
  	]);
  	if ($validate->fails()) {
  		return redirect('studentExamsForm')->withErrors($validate)->withInput();
  	}
    if (\DB::table('performances')->where('admin_no', $request->input('admin_no'))->where('exam_code', $request->input('exam_code'))->count() >=8) {
         return redirect('studentExamsForm')->with('error', 'Oop! This results exceeds maximum entry. Only 8 results allowed');
    }
     if (\DB::table('performances')->where('tsc_no', $request->input('tsc_no'))->where('exam_code', $request->input('exam_code'))->where('stream_id', $request->input('stream_id'))->count() >=2) {
         return redirect('studentExamsForm')->with('error', 'Oop! You are only allowed to enter only 2 subjects in each exam!');
    }
    
     if (\DB::table('performances')->where('admin_no', $request->input('admin_no'))->where('subject_id', $request->input('subject_id'))->where('exam_code', $request->input('exam_code'))->where('term', $request->input('term'))->first()) {
         return redirect('studentExamsForm')->with('error', 'Oops! This student has duplicate results!');
    }

    
  	    $performances=new  performances();
  	    $performances->tsc_no=$request->input('tsc_no');
  	    $performances->user_id=Auth::user()->id; 
  	    $performances->admin_no=$request->input('admin_no');
  	    $performances->term=$request->input('term');
  	    $performances->subject_id=$request->input('subject_id');
        $performances->stream_id=$request->input('stream_id');
  	    $performances->marks=$request->input('marks');
        $performances->p_grade=$request->input('p_grade');
  	    $performances->exam_code=$request->input('exam_code');
  	    $performances->save();

  	    return redirect('studentExamsForm')->with('response', 'successfully inserted student exam!');
  }
  public function getresults(Request $request){
      $validate=Validator::make($request->all(),[
         
           'tsc_no'=>['required', 'exists:performances'],
           
    ]);
        if ($validate->fails()) {
      return redirect('teacherExam')->withErrors($validate)->withInput();
    }
    $user_id=Auth::User()->id;
    $perform = $request->get('tsc_no');
  	$results=performances::select('streams.stream', 'exams.start_date','exams.end_date','exams.exam_code', 'performances.term')->join('streams', 'streams.stream_id', '=', 'performances.stream_id')->join('exams', 'exams.exam_code', '=', 'performances.exam_code')->join('teachers', 'teachers.tsc_no', '=', 'performances.tsc_no')->where('performances.tsc_no', 'LIKE', '%' .$perform. '%')->where(['teachers.user_id'=>$user_id])->groupBy('streams.stream', 'performances.term', 'exams.exam_code', 'exams.start_date','exams.end_date')->orderBy('exam')->get();
  	return view('projects.administrator.results', compact('results', 'perform'));
  }
   public function viewresults(){
        return view('projects.administrator.searchtsc');
        
    }
  public function viewExam($exam_code){
   $student=performances::select('subjects.subject', 'performances.admin_no', 'performances.marks', 'performances.p_grade')->join('subjects', 'subjects.subject_id', '=', 'performances.subject_id')->join('students', 'students.admin_no', '=', 'performances.admin_no')->join('teachers', 'teachers.tsc_no', '=', 'performances.tsc_no')->join('streams', 'streams.stream_id', '=', 'performances.stream_id')->join('exams', 'exams.exam_code', '=', 'performances.exam_code')->where('performances.exam_code', '=', $exam_code)->groupBy('subject', 'marks', 'p_grade', 'admin_no')->orderBy('subject')->get();
   return view('projects.administrator.viewresults', compact('student'));
   exit();
  }
}
