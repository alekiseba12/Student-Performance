<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/velonic_3.0/admin_2/recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2018 10:23:03 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="img/favicon_1.ico">

        <title>Forget Password: Performance Evaluation System</title>

        


        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/bootstrap-reset.css" rel="stylesheet">

        <!--Animation css-->
        <link href="/css/animate.css" rel="stylesheet">

        <!--Icon-fonts css-->
        <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />

        <!--Morris Chart CSS -->
        <link rel="/stylesheet" href="assets/morris/morris.css">


        <!-- Custom styles for this template -->
        <link href="/css/style1.css" rel="stylesheet">
        <link href="/css/helper.css" rel="stylesheet">
        

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

        <div class="wrapper-page animated fadeInDown">
            <div class="panel panel-color panel-primary">

                <form method="POST" action="{{route('password.email')}}" role="form" class="text-center"> 
                    @csrf
                      <div class="user-thumb"> 
                        <img src="/img/sheikh.jpg" class="img-responsive img-circle thumb-lg" alt="thumbnail">
                    </div> 
                    <br>
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Enter your <b>Email</b> and instructions will be sent to you!
                    </div>
                    <div class="form-group m-b-0"> 
                        <div class="input-group"> 
                            <input type="email" class="form-control" placeholder="Enter Email" name="email"> 
                            <span class="input-group-btn"> <button type="submit" class="btn btn-primary">Reset</button> </span> 
                        </div> 
                    </div> 
                    
                </form>

                                        
                
            </div>
        </div>

        




        <!-- js placed at the end of the document so the pages load faster -->
        <script src="/js/jquery.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/pace.min.js"></script>
        <script src="/js/wow.min.js"></script>
        <script src="/js/jquery.nicescroll.js" type="text/javascript"></script>
            

        <!--common script for all pages-->
        <script src="js/jquery.app.js"></script>

    
    </body>

<!-- Mirrored from coderthemes.com/velonic_3.0/admin_2/recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2018 10:23:03 GMT -->
</html>