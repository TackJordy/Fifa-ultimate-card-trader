@extends('layouts.master')

@section('content')
<section id="subintro">

	<div class="container">
		<div class="row">
			<div class="span4">
				<h3><strong>Leaderboard</strong></h3>
			</div>
			<div class="span8">
				<ul class="breadcrumb notop">
					<li><a href="/">Home</a><span class="divider">/</span></li>
					<li class="active">Leaderboard</li>
				</ul>
			</div>
		</div>
	</div>

</section>
<section id="maincontent">
	<div class="container">
		<div class="row">
			 <table class="table">
			 	<tr><th>#</th><th>Name</th><th>Coins</th><th>Total Cards</th><th>Average Rating Cards</th></tr>
			@foreach($users as$key=>$value)
				<tr><td>{{$key+1}}</td><td>{{$value->name}}</td><td>{{$value->coins}}</td><td>{{$value->cards}}</td><td>{{$value->overall}}</td></tr>
				
				
			@endforeach
		</div>
		</table>
	</div>
</section>
@endsection