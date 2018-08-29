<?php
	require_once('login/dbconn_mysql.php');
	if(isset($_GET['action'])){
		$gettrailers = $mysqli->query("SELECT * FROM movies WHERE status='Active' AND genre=$_GET[action] ");		
	}elseif(isset($_GET['search'])){
		$gettrailers = $mysqli->query("SELECT * FROM movies WHERE status='Active' AND title LIKE '%$_GET[search]%' OR description LIKE '%$_GET[search]%'");		
	}else{
		$gettrailers = $mysqli->query("SELECT * FROM movies WHERE status='Active'");		
	}

?><!-- page not protected by a login -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
     <link rel="stylesheet" href="/css/style.css" >
    <script src="/js/scripts.js" ></script>

    <title>Gemartt Productions</title>
  </head>
  <body>
  	<?php require_once('menu.php'); ?>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Subscription Plan</h1>
          <p class="lead text-muted">
		  This platform is powered by your contribution as a member and we deeply appreciate your membership.
		  Below are our two subscription plans. With the Basic Plan we include ads on the page or videos and the Plus Plan we remove advertisements.		  
		  </p>
          <!---<p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>--->
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
			<div class="col-md-6">
			  <div class="card mb-4 box-shadow">		  
				<h3 align="center" >Basic</h3>
				<hr class="colored">
				<div>
					<span class="number" style="font-weight:800;margin-left:20px;display:inline-block;" >
						<sup>$</sup>2
					</span>/ month 
					<span style="margin-left:20px;display:inline-block;font-size:9px;" >OR</span>
					<span class="number" style="font-weight:800;margin-left:20px;display:inline-block;">
						<sup>GHC</sup>10
					</span>/ month
				</div>	  
				<div class="card-body">
					  <ul class="list-group">
						<li class="list-group-item">Advertisement included</li>
					  </ul>	
				</div>
			  </div>
			</div>
			<div class="col-md-6">
			  <div class="card mb-4 box-shadow">		  
				<h3 align="center" >Plus</h3>
				<hr class="colored">
				<div>
					<span class="number" style="font-weight:800;margin-left:20px;display:inline-block;" >
						<sup>$</sup>6
					</span>/ month 
					<span style="margin-left:20px;display:inline-block;font-size:9px;" >OR</span>
					<span class="number" style="font-weight:800;margin-left:20px;display:inline-block;">
						<sup>GHC</sup>30
					</span>/ month
				</div>	  
				<div class="card-body">
					  <ul class="list-group">
						<li class="list-group-item">No advertisements</li>
					  </ul>	
				</div>
			  </div>
			</div>
          </div>
        </div>
      </div>
    </main>
	<?php require_once("footer.php"); ?>
  </body>
</html>
