@extends('layouts.master')

@section('content')
<section id="subintro">

	<div class="container">
		<div class="row">
			<div class="span4">
				<h3><strong>Open pack</strong></h3>
			</div>
			<div class="span8">
				<ul class="breadcrumb notop">
					<li><a href="/">Home</a><span class="divider">/</span></li>
					<li class="active">Open pack</li>
				</ul>
			</div>
		</div>
	</div>

</section>
<section id="maincontent">
	<div class="container newplayers">
		<div class="row">
			<div class="cards">
				@foreach($players as$player)
				<div class="span2">
					<a href="/players/{{$player->Name}}">
						<div class="card">
							<p class="name">{{$player->Name}}</p>
							<p class="rating">{{$player->Overall}}</p>
							<p class="position">NA</p>
							<img src="{{$player->ClubLogo}}" class="clublogo">
							<img src="{{$player->Flag}}" class="country">
							<img src="{{$player->Photo}}" class="playerphoto">
							<div class="skills">

				{{-- <p>{{$player->Acceleration}}</p>
				<p>PAC</p>
				<p>{{$player->Dribbling}}</p>
				<p>DRI</p> --}}
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
			<div class="row">
			<a href="/mycards" class="btn btn-large btn-primary">Players are added to my cards. Go to my cards</a>
			</div>
</div>
</section>
@endsection