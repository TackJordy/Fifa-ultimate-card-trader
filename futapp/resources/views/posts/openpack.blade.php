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
	<div class="container openpack">
		<div class="row">
			<div class="span12">
				<h1>Open your next pack in {{$diff_in_hours}} minutes</h1>
			<a href="/openpack/newplayers"><img src="/images/opengoldpack.png" alt="opengoldpack" class="openpack"></a>
			</div>
			
			</div> 

</div>
</section>
@endsection