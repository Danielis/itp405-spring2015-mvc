<!DOCTYPE html>
<html>
<head>
	<title>DVD Search</title>
	<link rel="stylesheet" href="<?php echo asset('css/custom.css')?>" type="text/css"> 
</head>
<body>

	<h1>Matrix DVD Search</h1>	
	<div class="search">
		<form action="/dvds" method="get">
			<Span>DVD:</Span>
			<input	type="text" name="dvd_title" value="Search Here">
			<span>Genre:</span>
			<select name="Selgenre">
				<option value="">All</option>
				<?php foreach ($genres as $genre){?>
					<option value="<?php echo $genre->id ?>"><?php echo $genre->genre_name ?></option>
				<?php } ?>
			</select>
			<span>Rating:</span>
			<select name="Selrating">
				<option value="">All</option>
				<?php foreach ($ratings as $rating):?>
					<option value="<?php echo $rating->id ?>"><?php echo $rating->rating_name ?></option>
				<?php endforeach ?>
			</select>
			<input type="submit" value="Search">
		</form>
	</div>
</body>
</html>