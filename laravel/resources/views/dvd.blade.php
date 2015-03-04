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

	<div class="review">
		<h2> Create a DVD: </h2>
		<form action="{{url("dvds")}}" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<span> Genre: </span>
			<select name="genre">
				@foreach ($genres as $genre)
					@if ($genre == Request::old('genre'))
					<option  selected="1"  value="{{$genre->id}}">{{$genre->genre_name}}</option>
					@else
					<option value="{{$genre->id}}">{{$genre->genre_name}}</option>
					@endif
				@endforeach
			</select>

			<span> Label: </span>
			<select name="label">
				@foreach ($labels as $label)
					@if ($label == Request::old('label'))
					<option  selected="1"  value="{{$label->id}}">{{$label->label_name}}</option>
					@else
					<option value="{{$label->id}}">{{$label->label_name}}</option>
					@endif
				@endforeach
			</select>

			<span> Rating: </span>
			<select name="rating">
				@foreach ($ratings as $rating)
					@if ($rating == Request::old('rating'))
					<option  selected="1"  value="{{$rating->id}}">{{$rating->rating_name}}</option>
					@else
					<option value="{{$rating->id}}">{{$rating->rating_name}}</option>
					@endif
				@endforeach
			</select>

			<span> Format: </span>
			<select name="format">
				@foreach ($formats as $format)
					@if ($format == Request::old('format'))
					<option  selected="1"  value="{{$format->id}}">{{$format->format_name}}</option>
					@else
					<option value="{{$format->id}}">{{$format->format_name}}</option>
					@endif
				@endforeach
			</select>

			<span> Sound: </span>
			<select name="sound">
				@foreach ($sounds as $sound)
					@if ($sound == Request::old('sound'))
					<option  selected="1"  value="{{$sound->id}}">{{$sound->sound_name}}</option>
					@else
					<option value="{{$sound->id}}">{{$sound->sound_name}}</option>
					@endif
				@endforeach
			</select>

			<br>
			<span> Title: </span>
			<input class="title" name="title" type="text" placeholder="Enter Title" value="{{ Request::old('title') }}">
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