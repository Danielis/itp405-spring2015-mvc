@extends('layout')

@section('content')
	
	@if (Session::has('success'))
		<h2 class="success">{{ Session::get('success') }}</h2>
	@endif

	@foreach ($errors->all() as $error)
		<h3 class="error">{{ $error }}</h3>
	@endforeach
	
	<div class="header">
		<h1> Welcome!</h1>
		<h2> Reviewing: </h2>
	</div>
	<div class="results">
		<table>
			<thead>
				<tr>
					<th>Title</th>
					<th>Rating</th>
					<th>Genre</th>
					<th>Label</th>
					<th>Sound</th>
					<th>Format</th>
					<th>Release Date</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($dvds as $dvd)
				<tr>
					<td>{{$dvd->title}}</td>
					<td>{{$dvd->rating_name}}</td>
					<td>{{$dvd->genre_name}}</td>
					<td>{{$dvd->label_name}}</td>
					<td>{{$dvd->sound_name}}</td>
					<td>{{$dvd->format_name}}</td>
					<td>{{$dvd->release_date_f}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="review">
		<h2> Submit a Review: </h2>
		<form action="{{url("dvds")+$id}}" method="get">
			<span> Rating: </span>
			<select name="rating">
				@for ($i=1;$i<=10;$i++)
					@if ($i == Request::old('rating'))
					<option  selected="1"  value="{{$i}}">{{$i}}</option>
					@else
					<option value="{{$i}}">{{$i}}</option>
					@endif
				@endfor
			</select>
			<span> Title: </span>
			<input class="title" name="title" type="text" placeholder="Enter Title" value="{{ Request::old('title') }}">
			<span> Description: </span>
			<input class="description" name="description" type="text" placeholder="Enter Description" value="{{ Request::old('description') }}">
			<input name="dvd_id" type="hidden" value="{{$id}}">
			<input class="submit" type="submit" name="submit" value="Submit">
		</form>
	</div>
	@if (Session::has('reviews'))
	<div class="results">
	<h2> Complete Reviews: </h2>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Rating</th>
					<th>Dvd_id</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				@foreach (Session::get('reviews') as $review)
				<tr>
					<td>{{$review->id}}</td>
					<td>{{$review->title}}</td>
					<td>{{$review->rating}}</td>
					<td>{{$review->dvd_id}}</td>
					<td>{{$review->description}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	@endif
@stop