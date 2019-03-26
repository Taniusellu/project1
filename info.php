<?php
include('admin/includes/db.php');

$q = intval($_GET['q']);
	$getRaion = mysqli_query($con, "SELECT *  FROM fintina WHERE id_tip = '1' AND id_raion = $q");
	$getRaionN = mysqli_query($con, "SELECT *  FROM raion WHERE id_raion = $q");
	$getRaion2 = mysqli_query($con, "SELECT *  FROM fintina WHERE id_tip = '2' AND id_raion = $q");
    $getBacterio = mysqli_query($con, "SELECT indicator_raion.id, bacterio.nr_total_bact,
                    	  bacterio.nr_total_bact3,
						  bacterio.nr_total_bact2,
						  bacterio.nr_total_bact4, 
                    	  bacterio.felul_apei,
						  raion.id_raion,
                          raion.raion
					
						  	
						 					  
                          FROM 
						 ((indicator_raion
						
							INNER JOIN bacterio ON indicator_raion.id_bacterio=bacterio.id_bacterio)
                             INNER JOIN raion ON indicator_raion.id_raion=raion.id_raion)
							 where raion.id_raion = '$q'");  
	$getChimic = mysqli_query($con, "SELECT indicator_raion.id, 
						  raion.id_raion,
                          raion.raion,
						  chimic.indicatori,
						  chimic.valori_admise, 
						  chimic.valori_admise_ex,
						  chimic.metoda_de_analiza
                    	 
						  	
						 					  
                          FROM 
						 ((indicator_raion
							INNER JOIN chimic ON indicator_raion.id_chimic=chimic.id_chimic)
                          INNER JOIN raion ON indicator_raion.id_raion=raion.id_raion)
							 where raion.id_raion = '$q'"); 
	
		$row = mysqli_fetch_array($getRaion) ;
		$raion = mysqli_fetch_array($getRaionN) ;
		$row2 = mysqli_fetch_array($getRaion2);
		$bacteria = mysqli_fetch_array($getBacterio);
		$chimic = mysqli_fetch_array($getChimic);
	
	
	 echo '<h4 class="align-items-end"> Rn-ul '.$raion['raion'].'</h4> <br>';
	echo '
	<h5> Numarul de fintini </h5>
	<table class="table table-bordered" style ="font-size: 13px !important;">
    <thead  class="thead-light">
      <tr>
        <th>Numarul de fintini private pe raion</th>
         <th>	Numarul de fintini publice pe raion </th>
        
      </tr>
    </thead>
    <tbody>';
      
	  echo '<tr>
        <td>' . $row['numar'].'</td>
		<td>' . $row2['numar'].'</td>
       
      </tr>
	
    </tbody>
  </table>';

	
	echo '
	<h5> Indicatorii chimicii generali </h5>
	<table class="table table-bordered" style ="font-size: 13px !important;">
    <thead>
      <tr>
        <th>Indicatorii </th>
         <th>Valori admise </th>
         <th>Valori admise exceptional  </th>
         <th>Metode de analiza </th>
         
        
      </tr>
    </thead>
    <tbody>';
      
	  echo '<tr>
        <td>' . $chimic['indicatori'].'</td>
		<td>' . $chimic['valori_admise'].'</td>
		<td>' . $chimic['valori_admise_ex'].'</td>
		<td>' . $chimic['metoda_de_analiza'].'</td>
       
      </tr>
	
    </tbody>
  </table>';
  
  	
	echo '
	<h5> Indicatorii bacteriologicii </h5>
	<table class="table table-bordered" style ="font-size: 13px !important;">
    <thead>
      <tr>
        <th>Felul apei potabile </th>
         <th>Nr. total de bacterii care se dezvolta la 37 C</th>
         <th>Nr. probail de bacterii califorme  </th>
         <th>Metode de analiza </th>
		 <th>Felul apei </th>
        
      </tr>
    </thead>
    <tbody>';
      
	  echo '<tr>
        <td>' . $bacteria['nr_total_bact'].'</td>
		<td>' . $bacteria['nr_total_bact3'].'</td>
		<td>' . $bacteria['nr_total_bact2'].'</td>
		<td>' . $bacteria['nr_total_bact4'].'</td>
		<td>' . $bacteria['felul_apei'].'</td>
       
      </tr>
	
    </tbody>
  </table>';
?>