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

             <div class="wraper container-fluid">
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
                 </div>
                <div class="row">
                  
                        <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Examination Details</h3></div>
                            <div class="panel-body">
                                <form role="form" action="{{route('examdetails')}}" method="post">
                                    @csrf
                                    <div class="row">
                                   
                                         <div class="form-group col-md-6">
                                        <label for="admin No" class="col-lg-4 control-label">Examination Name</label>
                                        
                                        <input type="text" name="exam" class="form-control" id="admin no" placeholder="Firstname" value="">
                                    </div>
                                          <div class="form-group col-md-6">
                                        <label for="lastname" class="col-lg-4 control-label">Start Date</label>
                                        
                                        <input type="date" name="start_date" class="form-control" id="exam date" placeholder="Starting Date for Exam"  value="">
                                    </div>
                                  
                                </div>
                                        <div class="row">
                                             <div class="form-group col-md-6">
                                        <label for="lastname" class="col-lg-4 control-label">End Date</label>
                                        
                                        <input type="date" name="end_date" class="form-control" id="exam date" placeholder="End Date for Exam"  value="">
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
