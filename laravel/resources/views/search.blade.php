@extends('layout')


@section('content')
	<div class="sideBar">
	@foreach ($genres as $genre)
		<div class="sideBarItem">
			<a href="{{url('genres/'.$genre->genre_name.'/dvds')}}">{{$genre->genre_name}}
		</div>
	@endforeach
	</div>

	@if(isset($dvds))
		<div class="sideBarResults">
			<table>
				<thead>
					<tr>
						<th>Title</th>
						<th class="gr">Rating</th>
						<th class="gr">Genre</th>
						<th>Label</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($dvds as $dvd){?>
					<tr>
						<td class="a"><?php echo $dvd->title?></td>
						<td class="b"><?php echo $dvd->rating->rating_name?></td>
						<td class="c"><?php echo $dvd->genre->genre_name?></td>
						<td class="d"><?php echo $dvd->label->label_name?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	@endif
@stop