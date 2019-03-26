<?php
$ar_clean = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

include('admin/includes/db.php');



if($_POST['task'] == 'send') {
	$name = trim($ar_clean['name']);
	$email = trim($ar_clean['email']);
	$msg = trim($ar_clean['mess']);
	$now2 = date("Y-m-d H:i:s");
	$getInsert = mysqli_query($con, "INSERT INTO contact (nume,mesaj,email,active,data) VALUES ('$name','$msg','$email','0','$now2')");
			/*"INSERT INTO comentarii (nume,mesaj,active) VALUES ('$nume','$mes','0' )";*/
			
	if ($getInsert) {
		echo "1";
		
	} else {

		echo "La moment nu a fost transmis mesajul. Incercati mai tarziu!";

	}

}
if($_POST['task'] == 'send') {
	$name = trim($ar_clean['name']);
	$email = trim($ar_clean['email']);
	$msg = trim($ar_clean['mess']);
	$now2 = date("Y-m-d H:i:s");
	$getInsert = mysqli_query($con, "INSERT INTO contact (nume,mesaj,email,active,data) VALUES ('$name','$msg','$email','0','$now2')");
			/*"INSERT INTO comentarii (nume,mesaj,active) VALUES ('$nume','$mes','0' )";*/
			
	if ($getInsert) {
		echo "1";
		
	} else {

		echo "La moment nu a fost transmis mesajul. Incercati mai tarziu!";

	}

}

if($_POST['task'] == 'send_p') {
	$name = trim($ar_clean['name']);
	$msg = trim($ar_clean['mess']);
	$tel = trim($ar_clean['tel']);
	$an = trim($ar_clean['an']);
	$now2 = date("Y-m-d H:i:s");
	$getInsert = mysqli_query($con, "INSERT INTO programare (nume,telefon,anul,comentariu,data) VALUES ('$name','$tel','$an','msg','$now2')");
			/*"INSERT INTO comentarii (nume,mesaj,active) VALUES ('$nume','$mes','0' )";*/
		
	if ($getInsert) {
		echo "1";
		
	} else {

		echo "La moment nu a fost transmis mesajul. Incercati mai tarziu!";

	}

}

if($_POST['task'] == 'reg') {
	$name = trim($ar_clean['name']);
	$email = trim($ar_clean['email']);
	$parola = trim($ar_clean['parola']);
	$now2 = date("Y-m-d H:i:s");
	
	$getInsert = mysqli_query($con, "INSERT INTO utilizatori (nume,email,parola) VALUES ('$name','$email','$parola')");
		
	if ($getInsert) {
		echo "1";
		
	} else {

		echo "La moment nu a fost pretrecuta înregistarea. Incercati mai tarziu!";

	}

}
if($_POST['task'] == 'log') {
	$name = trim($ar_clean['name']);
	$email = trim($ar_clean['email']);
	
	
	$getSelect = mysqli_query($con, "SELECT * FROM utilizatori WHERE email = '$email' AND parola = '$name'");
	$result = mysqli_fetch_assoc($getSelect);
	if(mysqli_num_rows($getSelect)>0){
		session_start();
		$id = $result['id'];
		$nume = $result['nume'];
		$email_l = $result['email'];
		$_SESSION['user_name']= $nume;
		$_SESSION['user_id']= $id;
		$_SESSION['user_email']= $email;
		echo "1";
		
	} else {

		echo "Email sau parola incorectă!";

	}

}
?>