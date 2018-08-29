<?php
	require_once('login/dbconn_mysql.php');
		// check to see if email already in use
$gettrailers = $mysqli->query("SELECT * FROM movies WHERE status='Active'");
$getfeatured = $mysqli->query("SELECT * FROM movies WHERE status='Active' AND featured='Yes'");
	
?><!-- page not protected by a login -->
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="/bootstrap-4.1.0/dist/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="/bootstrap-4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>    <link rel="stylesheet" href="/css/style.css" >
	<title>Gemartt Productions</title>
	<script src="/js/scripts.js" ></script>
</head>
<body class="text-center" >
  <?php require_once('menu.php'); ?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner"><i class="fas fa-user"></i>
		<div class="carousel-item active" style="background:#000;font-family:vendana;" >
			<img class="d-block w-100" src="/images/default.png" alt="First slide" style="font-family:san-safri;" >
		</div>
  		<?php
		foreach($getfeatured->fetch_all() as $key=>$value){	
		echo '
		<div class="carousel-item">
		  <img class="d-block w-100" src="/videos/images/'.$value[2].'" alt="Second slide">
		</div>';
		}
		?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <main role="main">
      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
			<?php
			foreach($gettrailers->fetch_all() as $key=>$value){	
			echo '
				<div class="col-md-4">
				  <div class="card mb-4 box-shadow">';
				  if($value[7]=='Yes'){
					echo '<div class="box"><div class="ribbonr"><span>New</span></div></div>';				  					  
				  }
				  if($value[8]=='Yes'){
					echo '<div class="box"><div class="ribbon"><span>COMING SOON</span></div></div>';				  
				  }
					echo'<p style="font-weight:800;text-align:center;" >'.$value[1].'</p>
					<img class="card-img-top" src="/videos/images/'.$value[2].'" alt="Card image cap">
					<div class="card-body">
					  <p class="card-text">'.$value[9].'</p>
					  <div class="d-flex justify-content-between align-items-center">
						<div class="btn-group">
						  <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#exampleModal" onclick="showtrailer(\''.$value[3].'\',\''.$value[1].'\')" >View Trailer</button>
						</div>
						<!---<small class="text-muted">'.date("l",$value[11])."/".date("Y-m-d",$value[11]).'</small>--->
					  </div>
					</div>
				  </div>
				</div>				
				';
			}
			?>		
          </div>
        </div>
      </div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closemodal();" >
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
		  
		  </div>
		  <div class="modal-footer">
		  </div>
		</div>
	  </div>
	</div>
    </main>
	<?php require_once("footer.php"); ?>
  </body>
</html>
