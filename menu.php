    <?php
	session_start();
	include ("admin/includes/db.php");
	$logat=false;
	if(isset($_SESSION['user_name']) && $_SESSION['user_name']==true){
		$username = $_SESSION['user_name'];
		$useremail = $_SESSION['user_email'];
		
		$logat=true;
	}
	?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark2 fixed-top" style ="background-color: white; position: relative;    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);">
      <div class="container">
	 
        <a class="navbar-brand" href="index.php"><img src = "images/lg.png" style ="width:130px;"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="nav nav-pills mx-auto">
           
            <li class=" text-uppercase">
              <a class="nav-link" href="index.php"><b> Acasă </b></a>
            </li>
           
            <li class="text-uppercase">
              <a class="nav-link" href="informatii.php">Informații</a>
            </li>
			<li class=" text-uppercase">
              <a class="nav-link" href="portofoliu.php">Portofoliu</a>
            </li>
			<li class=" text-uppercase">
              <a class="nav-link" href="contacte.php">Contacte</a>
            </li>
			
			<?php
								if($logat){
									echo ' <li class=" text-uppercase">
												<a class="nav-link" href="cabinet.php">Profil </a>
											</li>';
									echo '<li class=" text-uppercase">
												 <a class="nav-link"  href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Delogare !</a>
											</li>';
								}
								else{
									echo ' <li class=" text-uppercase">
												<a class="nav-link" href="reg.php">Înregistrare</a>
											</li>';
									echo '<li class=" text-uppercase">
												<a class="nav-link" href="log.php">Logare</a>
											</li>';
								}
			?>
          </ul>
       
        </div>
		
		
      </div>
  
    </nav>