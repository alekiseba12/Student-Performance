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
        <link href="assets/modal-effect/css/component.css" rel="stylesheet">

        


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

             <div class="wraper container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Student Subjects Performance List</h3>
                            </div>
                            <div class="panel-body">
                                  <div class="row">
                             <div class="col-lg-6">
                                <a href="{{route('studentperformanceForm')}}"><button class="btn btn-success m-b-5"> <i class="fa fa-plus"></i> <span>Add Performance</span> </button> </a>
                                
                                
                                      </div>
                                      </div>
                                <br>
                                <div class="row">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Admission No/Birth No</th>
                                                    <th>Academic Term</th>
                                                    <th>Examination</th> 
                                                    <th>Subject</th>
                                                    <th>Marks</th>
                                                    <th>Improved By</th>
                                                    <th>Reduced By</th>
                                                    <th>Subject Grade</th>
                                                    <th>Action</th>
                                                    
                                                    
                                                </tr>
                                              
                                            </thead>

                                     
                                            <tbody>
                                                 
                                                @foreach($performances as $value)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$value->admin_no}}</td>
                                                    <td>{{$value->term}}</td>
                                                    <td>{{$value->exam}}</td>
                                                    <td>{{$value->subject}}</td>
                                                    <td>{{$value->marks}}</td>
                                                    
                                                    <td>#</td>
                                                    <td>#</td>
                                                    <td>{{$value->p_grade}}</td>

                                                   
                                                    <td class="actions">
                                                 
                                                    <a  href='{{url("getperformanceForm/{$value->id}")}}'><button class="btn btn-icon btn-info m-b-5" data-toggle="modal" data-target="#con-close-modal"> <i class="fa fa-pencil-square-o"></i> </button></a>
                                                      <a  href='{{url("deleteperfomancedetails/{$value->id}")}}'><button class="btn btn-icon btn-danger m-b-5" onclick="return confirm('Are you sure?')"> <i class="ion-trash-a"></i> </button>
                                                </td>
                                                    
                                                </tr>
                                                    @endforeach
                                              
                                              
                                            </tbody>
                                        </table>
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
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>
       

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
    

    </body>

<!-- Mirrored from coderthemes.com/velonic_3.0/admin_2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2018 10:16:24 GMT -->
</html>
