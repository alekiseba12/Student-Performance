<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/velonic_3.0/admin_2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2018 10:13:33 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title>Admin Dashboard: PES</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/morris/morris.css">

        <!-- DataTables -->
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/helper.css" rel="stylesheet">
        


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62751496-1', 'auto');
  ga('send', 'pageview');

</script>

    </head>


    <body>

        <!-- Aside Start-->
        <aside class="left-panel">

            <!-- brand -->
            <div class="logo">
                <a href="{{url('/admin')}}" class="logo-expanded">
                    <i class="ion-social-buffer"></i>
                    <span class="nav-label">Admin: Dashboard</span>
                </a>
            </div>
            <!-- / brand -->
        
            <!-- Navbar Start -->
           @include('projects.teacher.navigation')
                
        </aside>
        <!-- Aside Ends-->


        <!--Main Content Start -->
        <section class="content">
            
            <!-- Header -->
        @include('projects.header')
            <!-- Header Ends -->


            <!-- Page Content Start -->
            <!-- ================== -->

             <div class="wraper container">
                 <div class="row pull-center">
                  <div class="col-md-6">
                        @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                     <div class="alert alert-danger">
                        {{$error}}
                     </div>
                     @endforeach
                     @endif
                     </div>
                        <div class="col-md-6">
                   @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                 </div>
           
             @endif
               </div>
                 </div>
                <div class="row">
                        <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Student Performance Details</h3></div>
                            <div class="panel-body">
                                <form role="form" action="{{route('insertstudentperformance')}}" method="post">
                                    @csrf
                                    <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="admin No" class="col-lg-4 control-label">Admin No</label>
                                        
                                        <input type="text" name="admin_no" class="form-control" id="admin no" placeholder="Enter Admission/Birth No">
                                    </div>
                                        <div class="form-group col-md-4">
                                        <label for="term" class="col-lg-2 control-label">Term</label>
                                           <select class="form-control" placeholder="Choose the subject" name="term">
                                                       
                                                        <option value="#">Select School Term</option>
                                                        <option value="Term One">Term One</option>
                                                        <option value="Term Two">Term Two</option>
                                                        <option value="Term Three">Term Three</option>
                                                        
                                                    </select>
                                    </div>
                                         <div class="form-group col-md-4">
                                        <label for="term" class="col-lg-2 control-label">Examination</label>
                                           <select class="form-control" placeholder="Choose the subject" name="exam_code">
                                                       @if(count($exams)>0)
                                                        @foreach($exams as $exam)
                                                         <option value="#">&nbsp;</option>
                                                        <option value="{{$exam->exam_code}}">{{$exam->exam}}</option>
                                                          @endforeach
                                                        @endif
                                                    </select>
                                    </div>
                                  
                                </div>
                                        <div class="row">
                                                <div class="form-group col-md-4">
                                        <label for="Subject" class="col-lg-2 control-label">Subject</label>
                                           <select class="form-control" placeholder="Choose the subject" name="subject_id">
                                                        @if(count($subjects)>0)
                                                        @foreach($subjects->all() as $subject)
                                                        <option value="#">&nbsp;</option>
                                                        <option value="{{$subject->subject_id}}">{{$subject->subject}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                    </div>
                                      <div class="form-group col-md-4">
                                        <label for="marks" class="col-lg-2 control-label">Marks</label>
                                        <input type="text" class="form-control" id="marks" placeholder="Enter Subject Marks" name="marks">
                                    </div>
                                         <div class="form-group col-md-4">
                                        <label for="Remraks" class="col-lg-2 control-label">Grade</label>
                                           <select class="form-control" placeholder="Choose the subject Grade" name="p_grade">
                                                       
                                                        <option value="#">Select Grade</option>
                                                        <option value="A">A</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B">B</option>
                                                        <option value="B-">B-</option>
                                                        <option value="C+">C+</option>
                                                        <option value="C">C</option>
                                                        <option value="C-">C-</option>
                                                        <option value="D+">D+</option>
                                                        <option value="D">D</option>
                                                        <option value="D-">D-</option>
                                                        <option value="E">E</option>
                                                        
                                                    </select>
                                    </div>
                                   
                                </div>
                                   <div class="row">
                                                <div class="form-group col-md-4">
                                        <label for="Subject" class="col-lg-2 control-label">Stream</label>
                                           <select class="form-control" placeholder="Choose the subject" name="stream_id">
                                                        @if(count($streams)>0)
                                                        @foreach($streams->all() as $stream)
                                                        <option value="#">&nbsp;</option>
                                                        <option value="{{$stream->stream_id}}">{{$stream->stream}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                    </div>
                                       <div class="form-group col-md-4">
                                        <label for="admin No" class="col-lg-4 control-label">TSC NO</label>
                                        
                                        <input type="text" name="tsc_no" class="form-control" id="admin no" placeholder="Enter TSC NO">
                                    </div>
                                </div>
                                  
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                    
                    
                </div> <!-- End Row -->

                

            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->

            <!-- Footer Start -->
           @include('projects.footer')
            <!-- Footer Ends -->



        </section>
        <!-- Main Content Ends -->
        


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/magnific-popup/magnific-popup.js"></script>
        <script src="assets/jquery-datatables-editable/jquery.dataTables.js"></script> 
        <script src="assets/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/jquery-datatables-editable/datatables.editable.init.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
    

    </body>

<!-- Mirrored from coderthemes.com/velonic_3.0/admin_2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2018 10:16:24 GMT -->
</html>
