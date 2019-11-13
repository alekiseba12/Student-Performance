 <nav class="navigation">
                <ul class="list-unstyled">
                    <li class="active"><a href="{{url('/admin')}}"><i class="ion-home"></i> <span class="nav-label">Dashboard</span></a></li>
                    <li><a href="{{url('studentdashboard')}}"><i class="fa fa-user"></i> <span class="nav-label">Manage Student</span></a></li>
                    <li><a href="{{route('allstudents')}}"><i class="fa fa-users"></i> <span class="nav-label">View Students</span></a></li>
                   
                    <li><a href="{{route('viewstudentsubjectsdetails')}}"><i class="fa fa-eye"></i> <span class="nav-label">Students Subjects</span></a></li>
                    <li class="has-submenu"><a href="{{route('examForm')}}"><i class="ion-leaf"></i> <span class="nav-label">Manage Exams</span> </a> 
                    <li class="has-submenu"><a href="{{route('viewexaminations')}}"><i class="fa fa-envelope"></i> <span class="nav-label">View Exams</span> </a> 
                    <li class="has-submenu"><a href="{{route('studentperformance')}}"><i class="ion-record"></i> <span class="nav-label">Students Performance</span> </a>    
                    </li>
                     <li class="has-submenu"><a href="{{route('studentoverallperformance')}}"><i class="fa fa-user"></i> <span class="nav-label">Student Performance</span> </a>    
                    </li>
                   <li class="has-submenu"><a href="{{route('getstreamperformance')}}"><i class="ion-home"></i> <span class="nav-label">Stream Performance</span> </a>  
                   <li class="has-submenu"><a href="{{route('getsubjectperformance')}}"><i class="fa fa-book"></i> <span class="nav-label">Student Subject Performance</span> </a>    
                    </li>  
                    </li>
                </ul>
            </nav>