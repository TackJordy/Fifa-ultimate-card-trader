<header>
    <!-- Navbar
    ================================================== -->
    <div class="cbp-af-header">
      <div class=" cbp-af-inner">
        <div class="container">
          <div class="row">

            <div class="span4">
              <!-- logo -->
              <div class="logo">
                <h1><a href="/">Fifa</a></h1>
                <!-- <img src="assets/img/logo.png" alt="" /> -->
              </div>
              <!-- end logo -->
            </div>

            <div class="span8">
              <!-- top menu -->
              <div class="navbar">
                <div class="navbar-inner">
                  <nav>
                    <ul class="nav topnav">

                      <li class="dropdown active">
                        <a href="/">Home</a>
                      </li>
                     
                      <li>
                        <a href="/players">Players</a>
                        
                      </li>
                      <li>
                        <a href="/leaderboard">Leaderboard</a>
                        
                      </li>  
                      
                      
                      @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                      @else
                         <li>
                        <a href="/mycards">My Cards</a>
                        
                      </li>
                      <li>
                        <a href="/market">Market</a>
                        
                      </li>
                      <li>
                        <a href="/openpack">Open Pack</a>
                        
                      </li>
                      <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                       </li>
                      <?php $user =  \App\User::where('id',Auth::id())->select('coins')->first(); ?>
                       <li id="coins">
                        
                                <a href="#" >{{$user->coins}}</a>
                        
                      </li>
                      @endguest
                      
                    </ul>
                  </nav>
                  @guest
                  @else 
                  <div id="mobilelogout">
                   
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                       
                      </div>
                      @endguest
                </div>
              </div>
              <!-- end menu -->
            </div>

          </div>
        </div>
      </div>
    </div>
  </header>