<?php
	require_once('login/dbconn_mysql.php');
	$getgenre = $mysqli->query("SELECT * FROM genre");

	function menu($getgenre){
		$menu = '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
		$menu .= '
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="/">Gemartt Production</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">';
		if (!isset($_SESSION['user_email'])) {
			$menu .= '
			  <li class="nav-item">
				<a class="nav-link" href="/pricing.php">Pricing</a>
			  </li>
			  </ul>
			<span class="navbar-text">
			  <a href="/login/register.php" > <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Register</button></a>&nbsp;&nbsp;&nbsp;
			  <a href="/login/login.php" ><button class="btn btn-outline-success my-2 my-sm-0" type="submit">LogIn</button></a>
			</span>';
		}else{
			$menu .= '
				  <li class="nav-item">
					<a class="nav-link" href="/login/">Welcome '.$_SESSION['user_email'].'</a>
				  </li>	
				  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  General Settings
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <div style="color:blue;font-weight:800;text-align:center;">Movie Genre</div>
					  <div class="dropdown-divider"></div>';
						foreach($getgenre->fetch_all() as $key=>$value){	
						$menu .= '<a class="dropdown-item" href="/login/index.php?action='.$value[0].'">'.$value[1].'</a>
						';
						}
			if ($_SESSION['isadmin']==1) {						
			$menu .= '<div class="dropdown-divider"></div>					  
					  <div style="color:blue;font-weight:800;text-align:center;"><a href="/login/admin.php">Go to Admin <i style="font-weight:normal;font-size:20px;" class="material-icons">arrow forward ios</i></a></div>					  
					  <div class="dropdown-divider"></div>
					  <a class="dropdown-item" href="/videos/add.php">Add A Movie</a>
					  <a class="dropdown-item" href="/videos/listmovies.php">Added Movies</a>
					  <a class="dropdown-item" href="/genre/add.php">Add A Genre</a>
					  <a class="dropdown-item" href="/genre/listgenre.php">Added Genre</a>
					</div>
				  </li>';	
			}					
		}
		$menu .= '
				</ul>';
		if (isset($_SESSION['user_email'])) {				
		$menu .='
		<form class="form-inline my-2 my-lg-0">
		  <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
		  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>&nbsp;&nbsp;
		<span class="navbar-text">
		  <a href="/login/logout.php" ><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button></a>
		</span>				
		';
		}
		$menu .='</div>
			</nav>';
		
		return $menu;	
	}
echo menu($getgenre);
?>