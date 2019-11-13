<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/velonic_3.0/admin_2/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2018 10:20:56 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title>Parent: PES Dashboard</title>

        


        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

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
                <a href="{{url('/user')}}" class="logo-expanded">
                    <i class="ion-social-buffer"></i>
                    <span class="nav-label">PES </span>
                </a>
            </div>
            <!-- / brand -->
        
            <!-- Navbar Start -->
           @include('projects.navigation')
                
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
                <br><br>
                 
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Your Student Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Admission Number</th>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                     <th>gender</th>
                                                    <th>Academic Year</th>
                                                    <th>KCPE Marks</th>
                                                    <th>Grade</th>
                                                    <th>KCSE Target Grade</th>
                                                    <th>Stream</th>
                                                   
                                                    
                                                </tr>
                                            </thead>

                                              @foreach($students as $student)
                                            <tbody>
                                                <tr>
                                                    <td>{{$student->admin_no}}</td>
                                                    <td>{{$student->firstname}}</td>
                                                    <td>{{$student->lastname}}</td>
                                                    <td>{{$student->gender}}</td>
                                                    <td>{{$student->academic_year}}</td>
                                                    <td>{{$student->kcpe_marks}}</td>
                                                    @if($student->kcpe_marks>=150 && $student->kcpe_marks<=179)
                                                    @php $grade="D+"
                                                    @endphp
                                                    @elseif($student->kcpe_marks>=180 && $student->kcpe_marks<=200)
                                                    @php $grade="C-"
                                                    @endphp
                                                    @elseif($student->kcpe_marks>=200 && $student->kcpe_marks<=250)
                                                    @php $grade="C"
                                                    @endphp
                                                    @elseif($student->kcpe_marks>=250 && $student->kcpe_marks<=299)
                                                    @php $grade="C+"
                                                    @endphp
                                                    @elseif($student->kcpe_marks>=300 && $student->kcpe_marks<=330)
                                                    @php $grade="B-"
                                                    @endphp
                                                    @elseif($student->kcpe_marks>=330 && $student->kcpe_marks<=350)
                                                    @php $grade="B"
                                                    @endphp
                                                    @elseif($student->kcpe_marks>=350 && $student->kcpe_marks<=400)
                                                    @php $grade="B+"
                                                    @endphp
                                                     @elseif($student->kcpe_marks>=350 && $student->kcpe_marks<=400)
                                                    @php $grade="B+"
                                                    @endphp
                                                     @elseif($student->kcpe_marks>=400 && $student->kcpe_marks<=420)
                                                    @php $grade="A-"
                                                    @endphp
                                                     @elseif($student->kcpe_marks>=420 && $student->kcpe_marks<=500)
                                                    @php $grade="A"
                                                    @endphp
                                                     
                                                    @endif
                                                    <td>{{$grade}}</td>
                                                    @if($grade=="A")

                                                     @php $result="A"
                                                     @endphp
                                                     @elseif($grade=="A-")
                                                     @php $result="A"
                                                     @endphp
                                                     @elseif($grade=="B+")
                                                     @php $result="A"
                                                     @endphp
                                                     @elseif($grade=="B")
                                                     @php $result="A-"
                                                     @endphp
                                                     @elseif($grade=="B-")
                                                     @php $result="A-"
                                                     @endphp
                                                     @elseif($grade=="C+")
                                                     @php $result="B+"
                                                     @endphp
                                                     @elseif($grade=="C")
                                                     @php $result="B"
                                                     @endphp
                                                     @elseif($grade=="C-")
                                                     @php $result="B-"
                                                     @endphp
                                                     @elseif($grade=="D+")
                                                     @php $result="B-"
                                                     @endphp
                                                     @elseif($grade=="D")
                                                     @php $result="C+"
                                                     @endphp
                                                     @elseif($grade=="D-")
                                                     @php $result="C+"
                                                     @endphp
                                                     @elseif($grade=="E")
                                                     @php $result="C"
                                                     @endphp
                                                     @endif
                                                     <td>{{$result}}</td>
                                                    <td>{{$student->stream}}</td>
                                                    
                                                </tr>
                                                @endforeach
                                             
                                                
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
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
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>


        <script src="js/jquery.app.js"></script>

        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>

    </body>

<!-- Mirrored from coderthemes.com/velonic_3.0/admin_2/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2018 10:21:06 GMT -->
</html>
