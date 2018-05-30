  @extends('layouts.master')

  @section('content')
  
  <section id="subintro">

    <div class="container">
      <div class="row">
        <div class="span4">
          <h3><strong>Player abbilities</strong></h3>
        </div>
        <div class="span8">
          <ul class="breadcrumb notop">
            <li><a href="/">Home</a><span class="divider">/</span></li>
            <li class="active">	{{$player->Name}}</li>
          </ul>
        </div>
      </div>
    </div>

  </section>
  <section id="maincontent">
    <div class="container">
      <div class="row">
       <div class="span12">
        
          <div class="heading">
            <h3><strong>{{$player->Name}}</strong></h3>
          </div>
          <div class="clearfix">
          </div>
          <div class="row">
            <div class="span4">
             <div id="player">
              <div class="card">
               <p class="name">{{$player->Name}}</p>
               <p class="rating">{{$player->Overall}}</p>
               <!--<p class="position">NA</p>-->
               <img src="{{$player->ClubLogo}}" class="clublogo">
               <img src="{{$player->Flag}}" class="country">
               <img src="{{$player->Photo}}" class="playerphoto">
               <div class="skills">
                <ul>
                 <li><strong>{{$player->Acceleration}}</strong> PAC</li>
                 <li><strong>{{$player->Dribbling}}</strong> DRI</li>
                 <li><strong>{{$player->Shotpower}}</strong> SHO</li>
                 <li><strong>{{$player->Interceptions}}</strong> DEF</li>
                 <li><strong>{{$player->Shortpassing}}</strong> PAS</li>
                 <li><strong>{{$player->Stamina}}</strong> PHY</li>
               </ul>
             </div>
           </div>
         </div>		
       </div>
       @isset ($player->playerid)
       <div class="span4">
        <h2>Sell Card</h2>
         {!! Form::open(['url' => 'sell','id'=>$player->playerid]) !!}
          <?php
           echo Form::label('startprice', 'Start Price');
           echo Form::text('startprice');
            echo Form::label('buynowprice', 'Buy Now Price');
           echo Form::text('buynowprice');
           echo Form::hidden('cardid', $player->playerid);
            echo Form::hidden('playerid', $player->Index);
            echo Form::hidden('userid', $player->userid);
            echo Form::hidden('mycardsid', $player->id);
           echo '<br/>';
           echo Form::submit('Sell', ['class' => 'btn btn-primary']);
          ?>
        {!! Form::close() !!}
         <!--<form method="get" action="">
          <h2>Sell Card</h2>
          <div class="form-group">
           <label for="startprice">Start Price</label>
           <input type="text" name="startprice" placeholder="Start Price" class="form-control">
         </div>
         <div class="form-group">
          <label for="buynowprice">Buy Now Price</label>
          <input type="text" name="buynowprice" placeholder="Buy Now Price" class="form-control">
        </div>
        <input type="submit" name="submit" value="Sell" class="btn btn-primary btn-rounded">-->
      
    </form>
  </div>
  @endisset
  <div class="span4">
    <aside>
      <div class="widget">
        <h4>{{$player->Name}}</h4>
        <div class="row-fluid">	                   	
         <div class="span6">	<strong>Age :</strong></div>
         <div class="span6">	{{$player->Age}}</div>                   		
       </div>	
       <div class="row-fluid">	                   	
         <div class="span6">	<strong>Nationality :</strong></div>
         <div class="span6">	<img src="{{$player->Flag}}"> {{$player->Nationality}}</div>                   		
       </div>	
       <div class="row-fluid">	                   	
         <div class="span6">	<strong>Club :</strong></div>
         <div class="span6">	<img src="{{$player->ClubLogo}}"> {{$player->Club}}</div>                   		
       </div>	
       <div class="row-fluid">	                   	
         <div class="span6">	<strong>Value :</strong></div>
         <div class="span6">	{{$player->Value}}</div>                   		
       </div>	
       <div class="row-fluid">	                   	
         <div class="span6">	<strong>Wage :</strong></div>
         <div class="span6">	{{$player->Wage}}</div>                   		
       </div>	
     </div>
   </aside>
 </div>
</div>
</div>
<div class="row playerskills">
 <div class="span4"><h3>PACE</h3>
   <div class="row-fluid">	                   	
     <div class="span8">	<strong>Acceleration :</strong></div>
     <div class="span4">{{$player->Acceleration}}</div>                   		
   </div>	
   <div class="row-fluid">                      
    <div class="span8"> <strong>Sprint Speed :</strong></div>
    <div class="span4">{{$player->Sprintspeed}}</div>
  </div>



</div>	
<div class="span4"><h3>SHOOTING</h3>
 <div class="row-fluid">	                   	
   <div class="span8">	<strong>Positioning :</strong></div>
   <div class="span4">{{$player->Positioning}}</div>             		
 </div>	
 <div class="row-fluid">                      
  <div class="span8"> <strong>Finishing :</strong></div>
  <div class="span4">{{$player->Finishing}}</div>                       
</div> 
<div class="row-fluid">                      
  <div class="span8"> <strong>Shot Power :</strong></div>
  <div class="span4">{{$player->Shotpower}}</div>
</div>
<div class="row-fluid">                      
  <div class="span8"> <strong>Long Shots :</strong></div>
  <div class="span4">{{$player->Longshots}}</div>
</div>
<div class="row-fluid">                      
  <div class="span8"> <strong>Volleys :</strong></div>
  <div class="span4">{{$player->Volleys}}</div>
</div>
<div class="row-fluid">                      
  <div class="span8"> <strong>Penalties :</strong></div>
  <div class="span4">{{$player->Penalties}}</div>
</div> 
</div>	
<div class="span4"><h3>PASSING</h3>
 <div class="row-fluid">                      
  <div class="span8"> <strong>Vision :</strong></div>
  <div class="span4">{{$player->Vision}}</div>                 
</div> 
<div class="row-fluid">                      
  <div class="span8"> <strong>Crossing :</strong></div>
  <div class="span4">{{$player->Crossing}}</div>                       
</div> 
<div class="row-fluid">                      
  <div class="span8"> <strong>Free Kick :</strong></div>
  <div class="span4">{{$player->Freekickaccuracy}}</div>
</div>
<div class="row-fluid">                      
  <div class="span8"> <strong>Short Passing :</strong></div>
  <div class="span4">{{$player->Shortpassing}}</div>
</div>
<div class="row-fluid">                      
  <div class="span8"> <strong>Long Passing :</strong></div>
  <div class="span4">{{$player->Longpassing}}</div>
</div>
<div class="row-fluid">                      
  <div class="span8"> <strong>Curve :</strong></div>
  <div class="span4">{{$player->Curve}}</div>
</div> 
</div>	
</div>
<div class="row playerskills">
 <div class="span4"><h3>DRIBBLING</h3>
   <div class="row-fluid">                      
    <div class="span8"> <strong>Agility :</strong></div>
    <div class="span4">{{$player->Agility}}</div>                 
  </div> 
  <div class="row-fluid">                      
    <div class="span8"> <strong>Balance :</strong></div>
    <div class="span4">{{$player->Balance}}</div>                       
  </div> 
  <div class="row-fluid">                      
    <div class="span8"> <strong>Reactions :</strong></div>
    <div class="span4">{{$player->Reactions}}</div>
  </div>
  <div class="row-fluid">                      
    <div class="span8"> <strong>Ball Control :</strong></div>
    <div class="span4">{{$player->Ballcontrol}}</div>
  </div>
  <div class="row-fluid">                      
    <div class="span8"> <strong>Dribbling :</strong></div>
    <div class="span4">{{$player->Dribbling}}</div>
  </div>
  <div class="row-fluid">                      
    <div class="span8"> <strong>Composure :</strong></div>
    <div class="span4">{{$player->Composure}}</div>
  </div> 	
</div>	
<div class="span4"><h3>DEFENDING</h3>
 <div class="row-fluid">                      
  <div class="span8"> <strong>Interceptions :</strong></div>
  <div class="span4">{{$player->Interceptions}}</div>                 
</div> 

<div class="row-fluid">                      
  <div class="span8"> <strong>Marking :</strong></div>
  <div class="span4">{{$player->Marking}}</div>
</div>
<div class="row-fluid">                      
  <div class="span8"> <strong>Standing Tackle :</strong></div>
  <div class="span4">{{$player->Standingtackle}}</div>
</div>
<div class="row-fluid">                      
  <div class="span8"> <strong>Sliding Tackle :</strong></div>
  <div class="span4">{{$player->Slidingtackle}}</div>
</div>

</div>	
<div class="span4"><h3>PHYSICAL</h3>
 <div class="row-fluid">                      
  <div class="span8"> <strong>Jumping :</strong></div>
  <div class="span4">{{$player->Jumping}}</div>                 
</div> 
<div class="row-fluid">                      
  <div class="span8"> <strong>Stamina :</strong></div>
  <div class="span4">{{$player->Stamina}}</div>                       
</div> 
<div class="row-fluid">                      
  <div class="span8"> <strong>Strength :</strong></div>
  <div class="span4">{{$player->Strength}}</div>
</div>
<div class="row-fluid">                      
  <div class="span8"> <strong>Aggression :</strong></div>
  <div class="span4">{{$player->Aggression}}</div>
</div>

</div>	
</div>



<!-- end article full post -->
</div>


</div>

</div>
</div>

</section>
@endsection