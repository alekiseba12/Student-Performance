<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/velonic_3.0/admin_2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2018 10:13:33 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="/img/favicon_1.ico">

        <title>Parent Dashboard: PES</title>

        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/bootstrap-reset.css" rel="stylesheet">
       

        <!--Animation css-->
        <link href="/css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/morris/morris.css">

        <!-- DataTables -->
        <link href="/assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom styles for this template -->
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/helper.css" rel="stylesheet">
        <link href="/assets/modal-effect/css/component.css" rel="stylesheet">

        


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
                <a href="index.html" class="logo-expanded">
                    <i class="ion-social-buffer"></i>
                    <span class="nav-label">Parent: Dashboard</span>
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
                <div class="page-title"> 
                    <h3 class="title">Student Examination Results</h3> 
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                <h4>Invoice</h4>
                            </div> -->
                            <div class="panel-body">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h4 class="text-right"><img src="/img/logo_dark.png" alt="velonic"></h4>
                                        
                                    </div>
                                    <div class="pull-right">
                                       
                                            @foreach($performances as $value)
                                             <div class="pull-right">
                                            <img src="data:image/png;base64,{{base64_encode($barcode)}}">
                                             <h5>{{$value->exam_code}}</h5>
                                      
                                        
                                    </div>
                                            
                                            @endforeach
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="pull-left m-t-30">
                                            
                                            <address>
                                              <strong>School Name, Inc.</strong><br>
                                              795 Embakasi Girls, Suite 600<br>
                                              San Nairobi , CA 94107<br>
                                              <abbr title="Phone">P:</abbr> (+254) 722-000-000
                                              </address>

                                        </div>
                                        <div class="pull-right m-t-30">
                                            @foreach($performances as $value)
                                            <p><strong>Examination: </strong>{{$value->exam}}</p>
                                            <p><strong>Start Date Date: </strong>{{$value->start_date}}</p>
                                            <p class="m-t-10"><strong>End Date: </strong> <span class="label label-success">{{$value->end_date}}</span></p>
                                            <p class="m-t-10"><strong>Admission No: </strong>{{$value->admin_no}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="m-h-50"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead>
                                                    <tr><th>#</th>
                                                    <th>Subject</th>
                                                    <th>Marks</th>
                                                    <th>Grade</th>
                                                 
                                                </tr></thead>
                                                <tbody>
                                                    @foreach($results as $key)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$key->subject}}</td>
                                                        <td>{{$key->marks}}</td>
                                                        <td>{{$key->p_grade}}</td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-radius: 0px;">
                                    <div class="col-md-3 col-md-offset-9">
                                         @foreach($performances as $value)
                                        <p class="text-right"><b>Total Marks: </b>{{$value->total_marks}}</p>
                                        <p class="text-right">AVG Points: {{$value->average_marks}}</p>
                                        
                                        <hr>
                                       @if($value->average_marks>=84 && $value->average_marks<=100 )
                                                        @php $grade = "A"
                                                        @endphp   
                                                        @elseif($value->average_marks>=73 && $value->average_marks<=83 )
                                                        @php $grade = "A-"
                                                        @endphp
                                                        @elseif($value->average_marks>=65 && $value->average_marks<=82 )
                                                        @php $grade = "B+"
                                                        @endphp
                                                        @elseif($value->average_marks>=60 && $value->average_marks<=64 )
                                                        @php $grade = "B"
                                                        @endphp
                                                        @elseif($value->average_marks>=54 && $value->average_marks<=60 )
                                                        @php $grade = "B-"
                                                        @endphp
                                                        @elseif($value->average_marks>=46 && $value->average_marks<=53 )
                                                        @php $grade = "C+"
                                                        @endphp
                                                        @elseif($value->average_marks>=42 && $value->average_marks<=45 )
                                                        @php $grade = "C"
                                                        @endphp
                                                        @elseif($value->average_marks>=36 && $value->average_marks<=41 )
                                                        @php $grade = "C-"
                                                        @endphp
                                                        @elseif($value->average_marks>=32 && $value->average_marks<=35 )
                                                        @php $grade = "D+"
                                                        @endphp
                                                        @elseif($value->average_marks>=28 && $value->average_marks<=31 )
                                                        @php $grade = "D"
                                                        @endphp
                                                        @elseif($value->average_marks>=24 && $value->average_marks<=27 )
                                                        @php $grade = "D-"
                                                        @endphp
                                                        @elseif($value->average_marks>=10 && $value->average_marks<=23 )
                                                        @php $grade = "E"
                                                        @endphp
                                                       @endif

                                        <h3 class="text-right">Mean Grade:  {{$grade}}</h3>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                 <div class="pull-left m-t-5">
                                            
                                            <address>
                                              <strong><i>This is a generated system report and don't need any signature</i>.</strong>
                                              
                                              </address>

                                        </div>
                            </div>
                        </div>

                    </div>

                </div>
               
            </div>
            <!-- Page Content Ends -->
            <!-- ================== -->

            <!-- Footer Start -->
           @include('projects.footer')
            <!-- Footer Ends -->



        </section>
        <!-- Main Content Ends -->
        


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="/js/jquery.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/modernizr.min.js"></script>
        <script src="/js/pace.min.js"></script>
        <script src="/js/wow.min.js"></script>
        <script src="/js/jquery.scrollTo.min.js"></script>
        <script src="/assets/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets/datatables/dataTables.bootstrap.js"></script>
       

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
    

    </body>

<!-- Mirrored from coderthemes.com/velonic_3.0/admin_2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2018 10:16:24 GMT -->
</html>
