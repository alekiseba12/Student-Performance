<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/velonic_3.0/admin_2/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2018 10:20:56 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title>Teacher: PES Dashboard</title>

        


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
           @include('projects.administrator.navigation')
                
        </aside>
        <!-- Aside Ends-->


        <!--Main Content Start -->
        <section class="content">
            
            <!-- Header -->
         @include('projects.administrator.header')
            <!-- Header Ends -->


            <!-- Page Content Start -->
            <!-- ================== -->

            <div class="wraper container">
                <br><br>
                    <div class="row pull-center">
                  <div class="col-md-6">
                      @if ($errors->any())
                  <div class="alert alert-danger">
                       <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                     </div>
                 </div>
                    <div class="row pull-center">
                  <div class="col-md-6">
                        @if(session('response')>0)
                       
                     <div class="alert alert-success">
                        {{session('response')}}
                     </div>
      
                     @endif
                     </div>
                 </div>
                <div class="row">
                  
                        <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Teacher Profile</h3></div>
                            <div class="panel-body">
                                <form role="form" action="{{route('teacherprofile')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                  
                                         <div class="form-group col-md-4">
                                        <label for="id" class="col-lg-4 control-label">National ID</label>
                                        
                                        <input type="text" name="national_id" class="form-control" id="id" placeholder="Provide National ID" value="">
                                    </div>

                                      <div class="form-group col-md-4">
                                        <label for="location" class="col-lg-4 control-label">Fullnames</label>
                                        
                                        <input type="text" name="fullnames" class="form-control" id="admin no" placeholder="Provide your fullnames" value="">
                                    </div>
                                         <div class="form-group col-md-4">
                                        <label for="location" class="col-lg-4 control-label">Gender</label>
                                        
                                        <select id="address" name="gender" type="text" class="form-control" placeholder="Choose the Gender">
                                                      
                                                        <option value="#">Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        
                                                    </select>
                                    </div>
                                     
                                      
                                </div>
                                  
                                </div>
                                        <div class="row">
                                              <div class="form-group col-md-4">
                                        <label for="phone" class="col-lg-4 control-label">TSC NO </label>
                                        
                                        <input type="text" name="tsc_no" class="form-control" id="phone number" placeholder="Teacher Service Number" value="">
                                    </div>
                                    
                                      <div class="form-group col-md-4">
                                        <label for="location" class="col-lg-4 control-label">Address</label>
                                        
                                        <input type="text" name="address" class="form-control" id="admin no" placeholder="Location Address" value="">
                                    </div>
                                     
                                       
                                        <div class="form-group col-md-4">
                                        <label for="phone" class="col-lg-4 control-label">Phone Number</label>   
                                        <input type="text" name="phone" class="form-control" id="phone number" placeholder="Phone Number" value="">
                                    </div>
                                 
                                </div>
                                <div class="row">
                                           <div class="form-group col-md-4">
                                        <label for="location" class="col-lg-4 control-label">Category</label>
                                        
                                            <select id="address" name="category" type="text" class="form-control" placeholder="Choose the parental">
                                                      
                                                        <option value="#">Select Category</option>
                                                        <option value="tsc">Teacher Service Commission</option>
                                                        <option value="intern">Intern</option>
                                                        <option value="teaching practise">Teaching Practise</option>
                                                        <option value="bog">BOG Teacher</option>
                                                       

                                                        
                                                    </select>
                                    </div>
                                          
                                    
                                      <div class="form-group col-md-4">
                                        <label for="location" class="col-lg-4 control-label">Profile</label>
                                        
                                        <input type="file" name="profile" class="form-control" id="profile" placeholder="Profile Picture" value="">
                                    </div>
            
                                </div>
                                  
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                    
                   
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
