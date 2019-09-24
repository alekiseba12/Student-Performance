<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;
use App\streams;
use App\student_subjects;
use App\subjects;
use App\ performances;
use DB;
use Validator;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

  public function index(){
  	$students=DB::table('students')->join('streams', 'streams.stream_id', '=', 'students.stream_id')->select('students.admin_no', 'students.firstname', 'students.lastname', 'students.gender', 'students.location', 'students.parental', 'students.academic_year','streams.stream')->get();
  	return view('projects.teacher.teacherDashBoard', ['students'=>$students]);
  }
  public function performance(){
  	$performances=DB::table('performances')->join('students', 'students.admin_no', '=', 'performances.admin_no')->join('subjects', 'subjects.subject_id', '=', 'performances.subject_id')->distinct()->select('performances.id','performances.admin_no', 'students.academic_year', 'performances.term', 'performances.exam', 'performances.marks', 'performances.p_grade','subjects.subject')->groupBy('id','admin_no', 'academic_year', 'term', 'exam', 'marks', 'p_grade','subject')->get();

  
  	return view('projects.teacher.studentperformance', ['performances'=>$performances]);
  }
  public function student(){
  	$streams=streams::all();
  	
  	return view('projects.teacher.student', ['streams'=>$streams]);
  }
  public function performanceForm(){
  	$subjects=subjects::all();
  	return view('projects.teacher.performanceForm', ['subjects'=>$subjects]);
  }
  public function subjects(){
  	$subjects=subjects::all();
  	return view('projects.teacher.studentsubjects', ['subjects'=>$subjects]);
  }
  public function overal(){
    $performances=performances::select('performances.admin_no', 'exam', 'term', DB::raw('SUM(performances.marks) as total_marks'),DB::raw('AVG(performances.marks) as average_marks'), 'students.academic_year', 'students.stream_id', 'streams.stream')
    ->join('students', 'students.admin_no', '=', 'performances.admin_no')->join('streams', 'streams.stream_id', '=', 'students.stream_id')
    ->groupBy('performances.admin_no','exam', 'term', 'students.academic_year', 'students.stream_id', 'streams.stream')
    ->get();
  
    
return view('projects.teacher.overalperformance', ['performances'=>$performances]);
  }
  public function storestudent(Request $request){
  	$validate=Validator::make($request->all(),[
  		  'admin_no'=>['required', 'string', 'max:8', 'unique:students'],

]);
  	if($validate->fails()){
  		return redirect('/studentdashboard')->withErrors($validate)->withInput();
  	}
  	     $student=new students();
  	     $student->admin_no=$request->input('admin_no');
  	     $student->firstname=$request->input('firstname');
  	     $student->lastname=$request->input('lastname');
  	     $student->gender=$request->input('gender');
  	     $student->location=$request->input('location');
  	     $student->parental=$request->input('parental');
  	     $student->stream_id=$request->input('stream_id');
  	     $student->academic_year=$request->input('academic_year');
  	     $student->save();
  	     return redirect('/studentdashboard')->with('info','You added new student successfully, follow next step!');
  }
  public function editstudentdetail($admin_no){

  	$students=students::find($admin_no);
  	$streams=streams::all();
  	$stream=streams::find($students->stream_id);
  	return view('projects.teacher.editstudent', ['streams'=>$streams, 'students'=>$students, 'stream'=>$stream]);
  }
  public function updatestudent(Request $request, $admin_no){
    $validate=Validator::make($request->all(),[
        'admin_no'=>['string', 'max:8', 'exists:students'],

]);
    if($validate->fails()){
      return redirect('/studentdashboard')->withErrors($validate)->withInput();
    }
  	      $student=new students();
  	      $student->admin_no=$request->input('admin_no');
  	     $student->firstname=$request->input('firstname');
  	     $student->lastname=$request->input('lastname');
  	     $student->gender=$request->input('gender');
  	     $student->location=$request->input('location');
  	     $student->parental=$request->input('parental');
  	     $student->stream_id=$request->input('stream_id');
  	     $student->academic_year=$request->input('academic_year');
  	     $data=array(
  	     	               'admin_no'=>$student->admin_no,
  	     	               'firstname'=>$student->firstname,
  	     	               'lastname'=>$student->lastname,
  	     	               'gender'=>$student->gender,
  	     	               'location'=>$student->location,
  	     	               'parental'=>$student->parental,
  	     	               'stream_id'=>$student->stream_id,
  	     	               'academic_year'=>$student->academic_year,


  	              );
  	     students::where('admin_no', $admin_no)->update($data);
  	      $student->update();
  	     return redirect('admin')->with('info','You updated details student successfully!');


  }
  public function deletestudent($admin_no){
  	students::where('admin_no', $admin_no)->delete();
  	return redirect('admin');


  }
  public function storestudentsubjects(Request $request){
  	$validate=Validator::make($request->all(),[
  		   'admin_no'=>['required', 'exists:students'],

  	]);
  	if ($validate->fails()) {
  		return redirect ('/studentsubjects')->withErrors($validate)->withInput();
  	}

  	        $student_subject=new student_subjects();
  	        $student_subject->admin_no=$request->input('admin_no');
  	        $student_subject->subject_id=$request->input('subject_id');
  	        $student_subject->save();
         

  	        return redirect('studentsubjects');
  }
  public function studentperformance(Request $request){
  	$validate=Validator::make($request->all(),[
  		     'admin_no'=>['required', 'exists:students'],
           'marks' => 'required|integer|min:0|max:100',
           'subject_id'=>['required', 'exists:tudent_subjects'],

  	]);
  	if ($validate->fails()) {
  		return redirect('/studentperformanceForm')->withErrors($validate)->withInput();
  	}

  	    $performances=new  performances();
  	    $performances->admin_no=$request->input('admin_no');
  	    $performances->term=$request->input('term');
  	    $performances->subject_id=$request->input('subject_id');
  	    $performances->marks=$request->input('marks');
         $performances->p_grade=$request->input('p_grade');
  	    $performances->exam=$request->input('exam');
  	    $performances->save();

  	    return redirect('/studentperformanceForm');
  }
  public function getperformanceForm($id){
    $performances=performances::find($id);
    $subjects=subjects::all();
    $subject=subjects::find($performances->subject_id);
     return view('projects.teacher.editperformanceForm', ['subjects'=>$subjects, 'subject'=>$subject, 'performances'=>$performances]);

  }
  public function updateperformance(Request $request, $id){
    $validate=Validator::make($request->all(),[
           'admin_no'=>['exists:students'],
           'marks' => 'required|integer|min:0|max:100',

    ]);
    if ($validate->fails()) {
      return redirect('/studentperformanceForm')->withErrors($validate)->withInput();
    }
        $performances=new  performances();
        $performances->admin_no=$request->input('admin_no');
        $performances->term=$request->input('term');
        $performances->subject_id=$request->input('subject_id');
        $performances->marks=$request->input('marks');
        $performances->p_grade=$request->input('p_grade');
        $performances->exam=$request->input('exam');
        $performances->remarks=$request->input('remarks');
        $data=array(
                      'admin_no'=>$performances->admin_no,
                      'term'=>$performances->term,
                      'subject_id'=>$performances->subject_id,
                      'marks'=>$performances->marks,
                      'p_grade'=>$performances->p_grade,
                      'exam'=>$performances->exam,
                     
                    );
        performances::where('id', $id)->update($data);
          $performances->update();
         return redirect('studentperformance');
  }
   public function deleteperformance($id){
    performances::where('id', $id)->delete();
    return redirect('studentperformance')->with('error','You deleted student details!');


  }

}
