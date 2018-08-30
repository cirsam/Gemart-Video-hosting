<?php
	require_once('dbconn_mysql.php');
	
	
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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>     <link rel="stylesheet" href="/css/style.css" >
    <script src="/js/scripts.js" ></script>

    <title>Gemartt Productions</title>
  </head>
  <body>
  	<?php require_once('../menu.php');
		if($_SESSION['isadmin']==1 || $_SESSION['paid_status']==="paid"){
	?>

    <main role="main">

      <!---<section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Album example</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
        </div>
      </section>--->

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
						  <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#exampleModal" onclick="watchthis(\''.$value[4].'\',\''.$value[1].'\')" >View Movie</button>
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

    </main>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
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

	<?php 
}else{
	echo '<div style="text-align:center;" ><h1 style="text-align:center;" >You have not paid for this month. <a href="/pricing.php"  ><br />Click here to see how to subscribe here</a></h1></div>';

}
	require_once("../footer.php"); ?>
  </body>
</html>
