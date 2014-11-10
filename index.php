<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>MyTime Exercise</title>
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
	</div>

	<div id="results-background">
		
		<div class="container">
			<div class="row" >
					<div class="col-xs-5" id="col-xs-5">
						<?php foreach($mytime_data as $business_data) 
							{
								echo '<div class="results-container first">';
									echo '<img src="' . $business_data["photo_url"] . '" alt="Photo of business owner">';
									echo '<img id="yelp-rating" src="' . $business_data["yelp_rating_image_url"] . '" alt="' . $business_data["yelp_rating"] . '"> <img id="yelp-logo" src="yelp-logo.png" alt="Yelp logo">';
								echo '</div>';
							}
						?>
					</div>
					<div class="col-xs-7" id="col-xs-7">
						<?php foreach($mytime_data as $business_data) 
							{
								echo '<div class="results-container second">';
									echo '<ul class="business-data">';
										echo '<li><h3 class="business-data first">' . $business_data["name"] . '</h3></li>';
										echo '<li><h3 class="business-data">' . $business_data["service_name"] . '</h3></li>';
										echo '<li><h3 class="business-data">' . $business_data["city"] . '</h3></li>';
										echo '<li><h3 class="business-data"><span class="glyphicon glyphicon-flash"></span><span id="blue">Next appt ' . $business_data["next_appointment_times"][0] . '</span></h3></li>';
										echo '<li><h3 class="business-data last"><span id="sale">Sale</span> $' . $business_data["min_price"] . ' - ' . $business_data["max_price"] . '</h3></li>';
									echo '</ul>';
								echo '</div>';
							}
						?>
					</div>
			</div>
		</div>
	
	</div>

</body>
</html>