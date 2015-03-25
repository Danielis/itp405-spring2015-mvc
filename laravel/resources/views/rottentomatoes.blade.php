@extends('layout')

@section('content')
	<div class="sideBar">
		<div class="sideBarItem">
			<h2> Movies: </h2>
		</div>
	@foreach ($dvds as $key=>$dvd)
		<div class="sideBarItem">
			<a href="{{url('rottentomatoes/'.$dvd->title.'/details')}}"><span style="color:black;">{{$key}}:</span> {{$dvd->title}}</a>
		</div>
	@endforeach
	</div>

	@if(isset($dvdTomatoes))
		<div class="sideBarResults">
			<div>
				<h1> Your Movie: </h1>
				<h2><?php echo $dvdTomatoes->title?></h2>
				<img src="<?php echo $dvdTomatoes->posters->thumbnail?>">
			</div>
			<div>
				<p>Critic Score: <?php echo $dvdTomatoes->ratings->critics_score?> </p>
				<p>Audience Score: <?php echo $dvdTomatoes->ratings->audience_score?></p>
				<p>Runtime: <?php echo $dvdTomatoes->runtime?></p>
			</div>
			<div>
				@foreach ($dvdTomatoes->abridged_cast as $cast)
				<span> {{$cast->name}} ||</span>
				@endforeach
			</div>
			
		</div>
		
	@endif
@stop