@extends('layouts.master')

@section('content')
		<section id="intro">
      <img src="images/banner2.jpg" alt="banner" name="banner">
   
  

  </section>
  <section id="maincontent">
    <div class="container">
      <div class="row">
        <div class="span4">
          <div class="features">
            <div class="icon">
                
              <i class="icon-bg-dark icon-circled icon-user icon-5x active"><img src="images/players.png" alt="players" name="players"></i>
            </div>
            <div class="features_content">
              <h3>Collect players</h3>
              <p class="left">
                Collect all the best players in the world
              </p>
              <a href="/players" class="btn btn-color btn-primary btn-rounded"><i class="icon-angle-right"></i> See all players</a>
            </div>
          </div>
        </div>
        <div class="span4">
          <div class="features">
            <div class="icon">
              <i class="icon-bg-dark icon-circled icon-random icon-5x"><img src="images/market.png" alt="market" name="market"></i>
            </div>
            <div class="features_content">
              <h3>Transfer Market</h3>
              <p class="left">
               Trade players with people all over the world. Build your way to the top.
              </p>
              <a href="/market" class="btn btn-color btn-primary btn-rounded"><i class="icon-angle-right"></i> Transfer Market</a>
            </div>
          </div>
        </div>
        <div class="span4">
          <div class="features">
            <div class="icon">
              <i class="icon-bg-dark icon-circled icon-gift icon-5x"><img src="images/opengoldpack.png" alt="players" name="players"></i>
            </div>
            <div class="features_content">
              <h3>Open packs</h3>
              <p class="left">
                Open every 3 hours a new pack with 5 new players. These players can be traded.
              </p>
              <a href="/openpack" class="btn btn-color btn-primary btn-rounded"><i class="icon-angle-right"></i> Open pack now</a>
            </div>
          </div>
        </div>

      </div>

      <!-- blank divider -->
      <div class="row">
        <div class="span12">
          <div class="blank10"></div>
        </div>
      </div>

      <div class="row">
        <div class="span12">
          <div class="cta-box">
            <div class="cta-text">
              <h2>Open your first pack now</h2>
            </div>
            <div class="cta">
              <a class="btn btn-large btn-primary btn-rounded btn-color" href="/openpack">
					Open Pack</a>
            </div>
          </div>
          <!-- end tagline -->
        </div>
      </div>

      <div class="row">
       

        <div class="span12">
          <h4>How to play</h4>
          <!-- start: Accordion -->
          <div class="accordion" id="accordion2">
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
								<i class="icon-caret-down"></i> Open packs </a>
              </div>
              <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                  When you are registered/logged in you can click in the navigation bar on open packs. Every 180 minutes you can open a new pack with 5 cards. These players will be added to "My Cards". When you click on a player in my cards you can sell it or view the abilities of the player.  
                </div>
              </div>
            </div>
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
								<i class="icon-caret-right"></i> Market Place </a>
              </div>
              <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                 On the market you can bid on players you want.
                </div>
              </div>
            </div>
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
								<i class="icon-caret-right"></i> Leaderboard </a>
              </div>
              <div id="collapseThree" class="accordion-body collapse">
                <div class="accordion-inner">
                  Get the statistics of all the players.
                </div>
              </div>
            </div>
          </div>
          <!--end: Accordion -->
        </div>
      </div>



    </div>
  </section>
@endsection