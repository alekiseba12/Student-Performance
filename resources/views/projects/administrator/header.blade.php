    <header class="top-head container-fluid">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
              
                <ul class="list-inline navbar-right top-menu top-right-menu">  
                    <li class="dropdown text-center">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="img/avatar-2.jpg" class="img-circle profile-img thumb-sm">
                            <span class="username"> {{ Auth::user()->name }} </span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                            <li><a href="{{route('teacherProfile')}}"><i class="fa fa-briefcase"></i>Profile</a></li>
                            <li><a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> Log Out</a></li>
                        </ul>
                    </li>   
                </ul>

            </header>