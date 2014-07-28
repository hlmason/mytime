<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>MyTime Exercise></title>
	<!-- [if lt IE 9]> -->
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <!-- [endif] -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <?php
    	$mytime_data_url = "http://www.mytime.com/api/v1/deals.json?what=Massage&when=Anytime&where=34.052200,-118.242800";
    	$mytime_data_json = file_get_contents($mytime_data_url);
    	$mytime_data = json_decode($mytime_data_json, TRUE);
	?>
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header"><!-- For Firefox and IE -->
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	            </button>
				<a class="navbar-brand" href="#">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>

			</div>

			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		
		<div class="row">
			<h2 id="search-header">Search</h2>
		</div>

		<div class="row" id="form-container">
			<form>
				<a href="#"><span class="glyphicon glyphicon-search"></span></a>
				<input type="text" placeholder=" Search for a business or service">
			</form>
		</div>

		<div class="row">
			<div class="col-xs-6 filter-n-map-container">
				<a href="#">
					<span class="glyphicon glyphicon-filter"></span>
					<h3 class="filter-n-map-header">Filter</h3>
				</a>
			</div>
			<div class="col-xs-6 filter-n-map-container">
				<a href="#">
					<span class="glyphicon glyphicon-globe"></span>
					<h3 class="filter-n-map-header">Map</h3>
				</a>
			</div>
		</div>

		<div class="row" id="img-n-name-container">
			<div class="col-xs-4">
					<?php foreach($mytime_data as $business_data) 
						{
							echo '<img src="' . $business_data["photo_url"] . '" alt="Photo of business owner">';
							echo '<li><img src="' . $business_data["yelp_rating_image_url"] . '" alt="' . $business_data["yelp_rating"] . '"><img src="yelp-logo.png" alt="Yelp logo"></li>';
						}
					?>
			</div>
			<div class="col-xs-8">
				<ul>
					<?php foreach($mytime_data as $business_data) 
						{
							echo '<li><h3 class="business-data-header first">' . $business_data["name"] . '<h3></li>';
							echo '<li><h3 class="business-data-header">' . $business_data["modifiers_values"][0] . '<h3></li>';
							echo '<li><h3 class="business-data-header">' . $business_data["city"] . '<h3></li>';
							echo '<li><h3 class="business-data-header">Next appt ' . $business_data["next_appointment_times"][0] . '<h3></li>';
						}
					?>
				</ul>
			</div> 
		</div>

		<div class="row">
			<div class="col-xs-12">
					<?php foreach($mytime_data as $business_data) 
						{
							// if isset($_GET["yelp_rating_image_url"]) 
							// {
								// echo '<li><img src="' . $business_data["yelp_rating_image_url"] . '" alt="' . $business_data["yelp_rating"] . '"><img src="yelp-logo.png" alt="Yelp logo"></li>';
							// }
						}
					?>
			</div>
		</div>
	
	</div>

</body>
</html>