<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\students;
use App\streams;
use App\student_subjects;
use App\teacher_subjects;
use App\subjects;
use App\ performances;
use App\exams;
use DB;
use Validator;
use Picqer;


class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

  public function index(){

  	$students=DB::table('students')->select(DB::raw('count(admin_no) as form_one', 'academic_year'))->where('stream_id', '=', 1)->groupBy('academic_year')->get();
    $students2=DB::table('students')->select(DB::raw('count(admin_no) as form_two', 'academic_year'))->where('stream_id', '=', 2)->groupBy('academic_year')->get();
    $students3=DB::table('students')->select(DB::raw('count(admin_no) as form_three', 'academic_year'))->where('stream_id', '=', 3)->groupBy('academic_year')->get();
    $students4=DB::table('students')->select(DB::raw('count(admin_no) as form_four', 'academic_year'))->where('stream_id', '=', 4)->groupBy('academic_year')->get();
  	return view('projects.teacher.teacherDashBoard', ['students'=>$students, 'students2'=>$students2, 'students3'=>$students3, 'students4'=>$students4]);
  }
  public function allstudents(){
    $students=DB::table('students')->join('streams', 'streams.stream_id', '=', 'students.stream_id')->select('students.admin_no', 'students.firstname', 'students.lastname', 'students.gender', 'students.location', 'students.parental', 'students.academic_year','students.kcpe_marks',DB::raw('AVG(students.kcpe_marks) as average_kcpe_marks'),'streams.stream') ->groupBy('students.admin_no', 'students.firstname', 'students.lastname', 'students.gender', 'students.location', 'students.parental', 'students.academic_year', 'students.kcpe_marks', 'streams.stream')->get();
    return view('projects.teacher.allstudents', ['students'=>$students]);
  }
  public function performance(){
  	$performances=DB::table('performances')->join('students', 'students.admin_no', '=', 'performances.admin_no')->join('subjects', 'subjects.subject_id', '=', 'performances.subject_id')->join('exams', 'exams.exam_code', '=', 'performances.exam_code')->distinct()->select('performances.id','performances.admin_no', 'performances.term', 'exams.exam', 'performances.marks', 'performances.p_grade','subjects.subject')->groupBy('id','admin_no', 'term', 'exam', 'marks', 'p_grade','subject')->get();

  
  	return view('projects.teacher.studentperformance', ['performances'=>$performances]);
  }
  public function getformone(){
   $formones=DB::table('students')->join('streams', 'streams.stream_id', '=', 'students.stream_id')->select('students.admin_no', 'students.firstname', 'students.lastname', 'students.gender', 'students.location', 'students.parental', 'students.academic_year')->where('streams.stream_id', '=', 1)->get();
   return view('projects.teacher.viewformones', ['formones'=>$formones]);
  }
   public function getformtwo(){
   $formtwo=DB::table('students')->join('streams', 'streams.stream_id', '=', 'students.stream_id')->select('students.admin_no', 'students.firstname', 'students.lastname', 'students.gender', 'students.location', 'students.parental', 'students.academic_year')->where('streams.stream_id', '=', 2)->get();
   return view('projects.teacher.viewformtwostudents', ['formtwo'=>$formtwo]);
  }
   public function getformthree(){
   $formthree=DB::table('students')->join('streams', 'streams.stream_id', '=', 'students.stream_id')->select('students.admin_no', 'students.firstname', 'students.lastname', 'students.gender', 'students.location', 'students.parental', 'students.academic_year')->where('streams.stream_id', '=', 3)->get();
   return view('projects.teacher.viewformthree', ['formthree'=>$formthree]);
  }
    public function getformfour(){
   $formfour=DB::table('students')->join('streams', 'streams.stream_id', '=', 'students.stream_id')->select('students.admin_no', 'students.firstname', 'students.lastname', 'students.gender', 'students.location', 'students.parental', 'students.academic_year')->where('streams.stream_id', '=', 4)->get();
   return view('projects.teacher.viewformfour', ['formfour'=>$formfour]);
  }
  public function student(){
  	$streams=streams::all();
  	
  	return view('projects.teacher.student', ['streams'=>$streams]);
  }
    public function getexamsForm(){
    return view('projects.teacher.examsForm');
  }
  public function performanceForm(){
  	$subjects=subjects::all();
    $streams=streams::all();
    $exams=exams::all();
  	return view('projects.teacher.performanceForm', compact('subjects', 'streams', 'exams'));
  }
  public function subjects(){
  	$subjects=subjects::all();
    $streams=streams::all();
  	return view('projects.teacher.studentsubjects', compact('subjects', 'streams'));
  }
  public function viewstudentsubjects(){
    $student_subjects=DB::table('teacher_subjects')->join('students', 'students.admin_no', '=', 'teacher_subjects.admin_no')->join('subjects', 'subjects.subject_id', '=', 'teacher_subjects.subject_id')->join('teachers', 'teachers.tsc_no', '=', 'teacher_subjects.tsc_no')->select('students.admin_no', 'students.academic_year', 'subjects.subject', 'teachers.fullnames', 'teacher_subjects.id')->get();
    return view('projects.teacher.viewstudentsubjects', ['student_subjects'=>$student_subjects]);
  }
  public function overal(){
    $performances=performances::select('performances.admin_no', 'exam', 'term', DB::raw('SUM(performances.marks) as total_marks'),DB::raw('AVG(performances.marks) as average_marks'), 'students.academic_year', 'students.stream_id', 'streams.stream')
    ->join('students', 'students.admin_no', '=', 'performances.admin_no')->join('streams', 'streams.stream_id', '=', 'students.stream_id')->join('exams', 'exams.exam_code', '=', 'performances.exam_code')
    ->groupBy('performances.admin_no','exams.exam', 'term', 'students.academic_year', 'students.stream_id', 'streams.stream')->orderBy('average_marks', 'desc')
    ->get();
  
    
return view('projects.teacher.overalperformance', ['performances'=>$performances]);
}
public function exams(){
  $exams=exams::all();
  return view('projects.teacher.viewexams',compact('exams'));
}
public function editexams($exam_code){
        $exam=exams::find($exam_code);
        return view('projects.teacher.editexams', compact('exam'));
}
public function updateexam(Request $request, $exam_code){

    $exam=new exams();

    $exam->exam_code=mt_rand();
    $exam->exam=$request->input('exam');
    $exam->start_date=$request->input('start_date');
    $exam->end_date=$request->input('end_date');
            $data=array(
                      'exam_code'=>$exam->exam_code,
                      'exam'=>$exam->exam,
                      'start_date'=>$exam->start_date,
                      'end_date'=>$exam->end_date,
                     
                     
                    );
          exams::where('exam_code', $exam_code)->update($data);
          $exam->update();
        return redirect('viewexaminations')->with('success', 'successfully updated examination details!');
}
public function deleteexam($exam_code){
  exams::where('exam_code', $exam_code)->delete();
   return redirect('viewexaminations')->with('success', 'successfully deleted examination details!');
}

public function streamsPerformance(){
   $streams=performances::select('exams.exam', 'term','students.academic_year', DB::raw('avg(performances.marks)/(count(performances.admin_no)) as stream_average_marks'),  'streams.stream')
    ->join('streams', 'streams.stream_id', '=', 'performances.stream_id')->join('exams', 'exams.exam_code', 'performances.exam_code')->join('students', 'students.admin_no', 'performances.admin_no')
    ->groupBy('exams.exam', 'term','students.academic_year','streams.stream')
    ->get();
    return view('projects.teacher.streamperformance', compact('streams'));
}

public function subjectperformance(){

     $values=DB::table('performances')->select('performances.admin_no', 'subjects.subject', 'performances.p_grade', 'performances.term', 'exams.exam','streams.stream')->join('subjects', 'subjects.subject_id', '=', 'performances.subject_id')->join('streams', 'streams.stream_id', '=', 'performances.stream_id')->join('exams', 'exams.exam_code', '=', 'performances.exam_code')->whereBetween('performances.p_grade', ['A', 'A-','B+' ])->get();
      return view('projects.teacher.subjectsperformances', ['values'=>$values]);
}
  
  public function storestudent(Request $request){
  	$validate=Validator::make($request->all(),[
  		  'admin_no'=>['required', 'string', 'max:8', 'unique:students'],
        'kcpe_marks'=>['required', 'integer', 'max:500', 'min:150'],

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
         $student->kcpe_marks=$request->input('kcpe_marks');
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
        'kcpe_marks'=>['required', 'integer', 'max:500', 'min:150'],

]);
    if($validate->fails()){
      return redirect('getstudentdetails/{admin_no}')->withErrors($validate)->withInput();
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
        $student->kcpe_marks=$request->input('kcpe_marks');
  	     $data=array(
  	     	               'admin_no'=>$student->admin_no,
  	     	               'firstname'=>$student->firstname,
  	     	               'lastname'=>$student->lastname,
  	     	               'gender'=>$student->gender,
  	     	               'location'=>$student->location,
  	     	               'parental'=>$student->parental,
  	     	               'stream_id'=>$student->stream_id,
  	     	               'academic_year'=>$student->academic_year,
                         'kcpe_marks'=>$student->kcpe_marks,

  	              );
  	     students::where('admin_no', $admin_no)->update($data);
  	      $student->update();
  	     return redirect('allstudents')->with('info','You updated details student successfully!');


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
     if (\DB::table('student_subjects')->where('admin_no', $request->input('admin_no'))->count() >= 8)
    {
      return redirect('studentsubjects')->with('error', 'Student already has 8 subjects');
    }
     if (\DB::table('student_subjects')->where('admin_no', $request->input('admin_no'))->where('subject_id',$request->input('subject_id'))->first())
      {

        return redirect('studentsubjects')->with('error', 'Oops! The student subject already exist. Try another one!');
      }
      //if(\DB::table('student_subjects')->where('stream_id', $request->input('stream_id'), '=', 1, 2)->where('subject_id',$request->input('subject_id'))->where('admin_no', $request->input('admin_no'))->count()>=11){
        //return redirect('studentsubjects')->with('error', 'Oops! This student has to do 11 subjects only!');
      //}
       //if(\DB::table('student_subjects')->where('stream_id', $request->input('stream_id'), '=', 3,4)->where('subject_id',$request->input('subject_id'))->where('admin_no', $request->input('admin_no'))->count()>=8){
        //return redirect('studentsubjects')->with('error', 'Oops! This student has to do 8 subjects only!');
      //}
      //if (\DB::table('student_subjects')->whereBetween('subject_id', $request->input('subject_id'), [5, 4, 6])->get()) {
        //return redirect('studentsubjects')->with('error', 'Oops! The student subject already exist. Try another one!');
      //}
     

  	        $student_subject=new student_subjects();
  	        $student_subject->admin_no=$request->input('admin_no');
  	        $student_subject->subject_id=$request->input('subject_id');
            $student_subject->stream_id=$request->input('stream_id');
  	        $student_subject->save();
         

  	        return redirect('studentsubjects')->with('success', 'successfully inserted student subject!');
  }
  public function getstudentsubjectsdetails($id){
    $student_subjects=teacher_subjects::find($id);
    $subjects=subjects::all();
    $streams=streams::all();
    $stream=streams::find($student_subjects->subject_id);
    $subject=subjects::find($student_subjects->subject_id);
   
     return view('projects.teacher.editstudentsubjects', ['subjects'=>$subjects, 'subject'=>$subject, 'student_subjects'=>$student_subjects, 'streams'=>$streams, 'stream'=>$stream]);

  }
  public function deletestudentsubject($id){
    teacher_subjects::where('teacher_id', $teacher_id)->delete();
    return redirect('viewstudentsubjectsdetails')->with('error','You deleted student details!');


  }
  public function updatestudentsubjects(Request $request,$id){
            $validate=Validator::make($request->all(),[
           'admin_no'=>['exists:students'],
         

    ]);
    if ($validate->fails()) {
      return redirect('studentsubjects')->withErrors($validate)->withInput();
    }
            $student_subject=new teacher_subjects();
            $student_subject->tsc_no=$request->input('tsc_no');
            $student_subject->admin_no=$request->input('admin_no');
            $student_subject->subject_id=$request->input('subject_id');
            $student_subject->stream_id=$request->input('stream_id');
            $data=array(
                       'tsc_no'=>$student_subject->tsc_no,
                      'admin_no'=>$student_subject->admin_no,
                      'subject_id'=>$student_subject->subject_id,
                     'stream_id'=>$student_subject->stream_id,
                    );
          teacher_subjects::where('id', $id)->update($data);
          $student_subject->update();
        return redirect('viewstudentsubjectsdetails')->with('success', 'successfully updated student subject!');

  }
  public function studentperformance(Request $request){
  	$validate=Validator::make($request->all(),[
  		     'admin_no'=>['required', 'exists:students'],
           'marks' => 'required|integer|min:2|max:100',
           'tsc_no'=>['required', 'exists:teachers'],
           
  	]);
  	if ($validate->fails()) {
  		return redirect('/studentperformanceForm')->withErrors($validate)->withInput();
  	}
    if (\DB::table('performances')->where('admin_no', $request->input('admin_no'))->where('exam_code', $request->input('exam_code'))->count() >=8) {
         return redirect('/studentperformanceForm')->with('error', 'Oop! This results exceeds maximum entry. Only 8 results allowed');
    }
     if (\DB::table('performances')->where('admin_no', $request->input('admin_no'))->where('subject_id', $request->input('subject_id'))->where('exam_code', $request->input('exam_code'))->where('term', $request->input('term'))->first()) {
         return redirect('/studentperformanceForm')->with('error', 'Oops! This student has duplicate results!');
    }
    if (\DB::table('performances')->where('tsc_no', $request->input('tsc_no'))->where('exam_code', $request->input('exam_code'))->where('stream_id', $request->input('stream_id'))->count() >=2) {
         return redirect('/studentperformanceForm')->with('error', 'Oop! You are only allowed to enter only 2 subjects in each exam!');
    }

    
  	    $performances=new  performances();
  	    $performances->admin_no=$request->input('admin_no');
  	    $performances->term=$request->input('term');
  	    $performances->subject_id=$request->input('subject_id');
        $performances->stream_id=$request->input('stream_id');
  	    $performances->marks=$request->input('marks');
        $performances->p_grade=$request->input('p_grade');
  	    $performances->exam_code=$request->input('exam_code');
        $performances->tsc_no=$request->input('tsc_no');
  	    $performances->save();

  	    return redirect('/studentperformanceForm');
  }
  public function getperformanceForm($id){
    $performances=performances::find($id);
    $subjects=subjects::all();
    $streams=streams::all();
    $exams=exams::all();
    $exam=exams::find($performances->exam_code);
    $stream=streams::find($performances->stream_id);
    $subject=subjects::find($performances->subject_id);
     return view('projects.teacher.editperformanceForm', ['subjects'=>$subjects, 'subject'=>$subject, 'performances'=>$performances, 'streams'=>$streams, 'stream'=>$stream, 'exams'=>$exams, 'exam'=>$exam]);

  }
  public function updateperformance(Request $request, $id){
    $validate=Validator::make($request->all(),[
           'admin_no'=>['exists:students'],
           'marks' => 'integer|min:0|max:100',
           'tsc_no'=>['exists:tscs'],

    ]);
    if ($validate->fails()) {
      return redirect('/studentperformanceForm')->withErrors($validate)->withInput();
    }
        $performances=new  performances();
        $performances->admin_no=$request->input('admin_no');
        $performances->tsc_no=$request->input('tsc_no');
        $performances->term=$request->input('term');
        $performances->subject_id=$request->input('subject_id');
        $performances->stream_id=$request->input('stream_id');
        $performances->marks=$request->input('marks');
        $performances->p_grade=$request->input('p_grade');
        $performances->exam_code=$request->input('exam_code');
        $performances->remarks=$request->input('remarks');
        $data=array(
                      'admin_no'=>$performances->admin_no,
                      'tsc_no'=>$performances->tsc_no,
                      'term'=>$performances->term,
                      'subject_id'=>$performances->subject_id,
                      'stream_id'=>$performances->stream_id,
                      'marks'=>$performances->marks,
                      'p_grade'=>$performances->p_grade,
                      'exam_code'=>$performances->exam_code,
                     
                    );
        performances::where('id', $id)->update($data);
          $performances->update();
         return redirect('studentperformance');
  }
   public function deleteperformance($id){
    performances::where('id', $id)->delete();
    return redirect('studentperformance')->with('error','You deleted student details!');
  }
  public function storeexams(Request $request){
        $validate=Validator::make($request->all(),[
           'exam'=>'required|unique:exams|max:50',


    ]);
    if ($validate->fails()) {
      return redirect('examForm')->withErrors($validate)->withInput();
    }
    $label='081231723897';
    $generator= new Picqer\Barcode\BarcodeGeneratorPNG();
    $barcode=$generator->getBarcode($label, $generator::TYPE_CODE_128);
    $exam=new exams();
    $exam->exam_code=mt_rand();
    $exam->exam=$request->input('exam');
    $exam->start_date=$request->input('start_date');
    $exam->end_date=$request->input('end_date');
    $exam->barcode=str_random(12);
    $exam->save();
    
    return redirect('examForm')->with('response', 'successfully inserted examination');
  }
}
