@extends('layouts.master')

@section('content')
<div id="market">
<section id="subintro">

  <div class="container">
    <div class="row">
      <div class="span4">
        <h3><strong>Market</strong></h3>
      </div>
      <div class="span8">
        <ul class="breadcrumb notop">
          <li><a href="/">Home</a><span class="divider">/</span></li>
          <li class="active">	Market</li>
        </ul>
      </div>
    </div>

  </div>


</section>
<section id="maincontent">
  <div class="container market">
    <div class="row">
      <div class="span12">
      <h4 v-text="message"></h4>
    </div>
    </div>
    <div class="row">
      <div class="span12 markethead">
       
            
                    <div class="cardattr" v-for="player in players" v-on:click="fetchPlayerDetails(player)" >
                 
                  
                    <div class="card" v-bind:class="getPlayerClass(player)">
                      <p class="name" v-text="player.Name"></p>
                      <p class="rating" v-text="player.Overall"></p>
                      <p class="position">NA</p>
                      <img  v-bind:src="player.ClubLogo" class="clublogo">
                      <img v-bind:src="player.Flag" class="country">
                      <img v-bind:src="player.Photo" class="playerphoto">
                      <div class="skills">

                
                <ul>
                  <li><strong v-text="player.Acceleration"></strong> PAC</li>
                  <li><strong v-text="player.Dribbling"></strong> DRI</li>
                  <li><strong v-text="player.Shotpower"></strong> SHO</li>
                  <li><strong v-text="player.Interceptions"></strong> DEF</li>
                  <li><strong v-text="player.Shortpassing"></strong> PAS</li>
                  <li><strong v-text="player.Stamina"></strong> PHY</li>
                </ul>

              </div>
              
            </div>
            
          </a>
        </div>
                  
      </div>
    </div>
    <div class="row"> 
        <div class="span12 marketunev">
            <div class="span6"> Start Price</div>
            <div class="span6" id="startprice" v-text="currentPlayer.startPrice"></div>
          </div>
    </div>
    <div class="row"> 
        <div class="span12 marketev"> 
        <div class="span6"> Current Bid</div>
            <div class="span6" id="currentbid" v-text="currentPlayer.bidPrice"> -</div> </div>
    </div>
    <div class="row"> 
        <div class="span12 marketunev">
        <div class="span6"> Buy now price</div>
            <div class="span6" id="buynow" v-text="currentPlayer.buyNowPrice"></div>  </div>
    </div>
    <div class="row"> 
        <div class="span12 marketev">
        <div class="span6"> Time Remaining</div>
            <div class="span6" id="timeremaining" v-text="remTime"></div>  </div>
    </div>
    <div class="row bidding">
      
      <div class="span6"><input type="text" name="bidamount" id="bidamount" placeholder="Bid Amount" v-model="inputtext"><input type="button" name="bid" class="btn btn-primary" value="Bid" data-toggle="modal" data-target="#myModal" v-on:click="bidactive()"></div>
      <div class="span6"><input type="button" name="buynow" class="btn btn-primary" value="Buy Now" data-toggle="modal" data-target="#myModal" v-on:click="buyactive()"></div>
  </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" v-text="buybidtext" v-if="self.buy==true"> </h4><h4 v-if="self.buy==true" v-text="self.currentPlayer.buyNowPrice"></h4>
           <h4 class="modal-title" v-text="buybidtext" v-if="self.buy==false"> </h4><h4 v-if="self.buy==false" v-text="inputtext"></h4>
        </div>
        
        <div class="modal-footer">

          <button type="button" class="btn btn-primary" data-dismiss="modal" v-if="self.buy==true" v-on:click="buyCurrentPlayer()">Confirm</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" v-if="self.buy==false" v-on:click="bidCurrentPlayer()">Confirm bid</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  </div>
</section>
<script src="/js/market.js" type="text/javascript"></script>
@endsection
