<!DOCTYPE html>
<html>
<head>
	<title>Results</title>
	<link rel="stylesheet" href="<?php echo asset('css/custom.css')?>" type="text/css"> 
</head>
<body>
	<div class="header">
		<h1> Welcome to the Matrix!</h1>
		<h2> Your Results: </h2>
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
				<?php foreach ($dvds as $dvd){?>
				<tr>
					<td><?php echo $dvd->title?></td>
					<td><?php echo $dvd->rating_name?></td>
					<td><?php echo $dvd->genre_name?></td>
					<td><?php echo $dvd->label_name?></td>
					<td><?php echo $dvd->sound_name?></td>
					<td><?php echo $dvd->format_name?></td>
					<td><?php echo $dvd->release_date_f?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>