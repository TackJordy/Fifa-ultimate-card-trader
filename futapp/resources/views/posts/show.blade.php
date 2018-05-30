@extends('layouts.master')

@section('content')
<section id="subintro">

	<div class="container">
		<div class="row">
			<div class="span4">
				<h3><strong>Players</strong></h3>
			</div>
			<div class="span8">
				<ul class="breadcrumb notop">
					<li><a href="/">Home</a><span class="divider">/</span></li>
					<li class="active">Players</li>
				</ul>
			</div>
		</div>
	</div>

</section>
<section id="maincontent">
	<div class="container">
		<div class="row">
			<div id="order">
			{{-- <label for="orderby">Order By: </label> --}}
			{!! Form::open(['url' => 'players']) !!}
		          <?php
		           echo Form::label('Name', 'Search for a player');
		           echo Form::text('Name');
		          
		           echo '<br/>';
		           echo Form::submit('Search', ['class' => 'btn btn-primary']);
		          ?>
		        {!! Form::close() !!}
			<form class="orderform">
			 <select name="orderby" onchange='this.form.submit()'> <option value="Overall">Overall Rating</option> <option value="Acceleration">Acceleration</option> <option value="Dribbling">Dribbling</option> <option value="Shotpower">Shooting</option> <option value="Interceptions">Defense</option><option value="Shortpassing">Passing</option> <option value="Stamina">Physic</option><option value="Name">Name</option><option value="Nationality">Nationality</option> <option value="Club">Club</option> </select>
			 <select name="order"> <option value="desc">Descending</option> <option value="asc">Ascending</option> </select>
			  <select name="show"> <option value="10">Show 10 players</option> <option value="20">Show 20 players</option><option value="30">Show 30 players</option> </select>
			</form>
			 </div>
			<div class="cards">
				@foreach($players as$player)
				<div class="span2">
					@isset($player->playerid)
						<a href="/players/{{$player->Name}}/sell">
					@else 
						<a href="/players/{{$player->Name}}">
					@endisset
					
						<div class="card">
							<p class="name">{{$player->Name}}</p>
							<p class="rating">{{$player->Overall}}</p>
							<p class="position">NA</p>
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
		
	</a>
</div>

@endforeach
</div>

</div>

</section>
@endsection