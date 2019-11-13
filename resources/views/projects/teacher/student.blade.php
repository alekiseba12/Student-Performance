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

        

          <!--Form Wizard-->
        <link rel="stylesheet" type="text/css" href="/assets/form-wizard/jquery.steps.css" />

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
                      
                  <div class="col-md-6">
                   @if ($message = Session::get('info'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                 </div>
             </div>
             @endif
         </div>
                   <div class="row">
                    <div class="col-md-12">
                       
                        <div class="panel panel-default">
                            <div class="panel-heading"> 
                                <h3 class="panel-title">Student Details</h3> 
                            </div> 
                            <div class="panel-body"> 
                                 <div class="row pull-right">
                                       <div class="col-sm-6">
                                        <div class="m-b-30">
                                        <a href="{{route('studentsubjects')}}"><button  class="btn btn-info waves-effect waves-light">Add Subject <i class="fa fa-plus"></i></button></a>
                                           </div>
                                          </div>
                                        </div>
                                       <form id="basic-form" action="{{route('insertstudentdetails')}}" method="post">
                                        @csrf
                                         <div>
                                        <h3>Names Details</h3>
                                        <section>
                                            <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="userName">Admission No/Borth No *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control required" id="userName" name="admin_no" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="password"> First Name *</label>
                                                <div class="col-lg-10">
                                                    <input id="password" name="firstname" type="text" class="required form-control">

                                                </div>
                                            </div>

                                            <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="confirm">Last Name *</label>
                                                <div class="col-lg-10">
                                                    <input id="confirm" name="lastname" type="text" class="required form-control">
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label class="col-lg-12 control-label ">(*) Mandatory</label>
                                            </div>
                                        </section>
                                        <h3>Profile</h3>
                                        <section>
                                        <div class="form-group clearfix">
                                        <label class="col-md-3 control-label">Gender</label>
                                        <div class="col-md-9">
                                            <div class="radio-inline">
                                                <label class="cr-styled" for="example-radio4">
                                                    <input type="radio" id="example-radio4" name="gender" value="male" style="width: 16px"> 
                                                    <i class="fa"></i>
                                                   Male 
                                                </label>
                                            </div>
                                            <div class="radio-inline">
                                                <label class="cr-styled" for="example-radio5">
                                                    <input type="radio" id="example-radio5" name="gender" value="female" style="width: 16px"> 
                                                    <i class="fa"></i> 
                                                    Female
                                                </label>
                                            </div>
                                       
                                        </div>
                                    </div>
                                            <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="surname"> Location *</label>
                                                <div class="col-lg-10">
                                                    <input id="surname" name="location" type="text" class="required form-control">

                                                </div>
                                            </div>


                                            <div class="form-group clearfix">
                                                <label class="col-lg-12 control-label ">(*) Mandatory</label>
                                            </div>

                                        </section>
                                        <h3>Stream or Class</h3>
                                        <section>
                                      
                                            <div class="form-group clearfix">
                                                     <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="address">Parental Type *</label>
                                                <div class="col-lg-10">
                                                    <select id="address" name="parental" type="text" class="form-control" placeholder="Choose the parental">
                                                      
                                                        <option value="#">&nbsp;</option>
                                                        <option value="Both biological parents">Both biological parents</option>
                                                        <option value="Single biological father">Single biological father</option>
                                                        <option value="Single biological mother">Single biological mother</option>
                                                        <option value="Guardian">Guardian</option>
                                                        <option value="Sonsporship">Sponsorship</option>
                                                        <option value="Self reliable">Self reliable</option>

                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            </div>
                                              <div class="form-group clearfix">
                                                     <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="address">Stream/Class *</label>
                                                <div class="col-lg-10">
                                                    <select id="address" name="stream_id" type="text" class="form-control" placeholder="Choose the Class/Stream">
                                                        @if(count($streams)>0)
                                                        @foreach($streams->all() as $stream)
                                                        <option value="#">&nbsp;</option>
                                                        <option value="{{$stream->stream_id}}">{{$stream->stream}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            </div>
                                                <div class="form-group clearfix">
                                                     <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="address">Academic Year *</label>
                                                <div class="col-lg-10">
                                                    <select id="address" name="academic_year" type="text" class="form-control" placeholder="Choose the parental">
                                                      
                                                        <option value="#">&nbsp;</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            </div>
                                        </section>
                                        <h3>Finish</h3>
                                        <section>
                                              <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="surname"> Location *</label>
                                                <div class="col-lg-10">
                                                    <input id="surname" name="kcpe_marks" type="text" class="required form-control">

                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </form> 
                            </div>  <!-- End panel-body -->
                        </div> <!-- End panel -->

                    </div> <!-- end col -->

                </div> <!-- End row -->
                     

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
        
        <!--Form Validation-->
        <script src="/assets/form-wizard/bootstrap-validator.min.js" type="text/javascript"></script>

        <!--Form Wizard-->
        <script src="/assets/form-wizard/jquery.steps.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="/assets/jquery.validate/jquery.validate.min.js"></script>

        <!--wizard initialization-->
        <script src="/assets/form-wizard/wizard-init.js" type="text/javascript"></script>


        <script src="/js/jquery.app.js"></script>
         <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
    

    </body>

<!-- Mirrored from coderthemes.com/velonic_3.0/admin_2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2018 10:16:24 GMT -->
</html>
