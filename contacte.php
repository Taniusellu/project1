<?php
include ("admin/includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        var close__btn = 'Close';
		</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aqumea</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-post.css" rel="stylesheet">
    <link href="css/ws.css" rel="stylesheet">
    <link href="css/blocks.css" rel="stylesheet">
    <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <style>
        .col-sm-4 p{
		
      text-align: center;
	  color: #0575be !important;
    margin-bottom: 100px;
    }

    .col-sm-4 img{
		width:280px;
		height: 180px;
      text-align: center;
      margin: 25px 0;
    }
	.title-4 {
		text-align: center;
		 color: #0575be !important;
		
		 margin-bottom: 55px;
	}
  
  </style>
</head>

<body>

    <!-- Navigation -->
    <?php include 'menu.php';?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-md-6 mt-3 ml-auto">

            </div>
            <div class="col-lg-6 col-md-6 mt-3 ">

            </div>
            <!-- Post Content Column -->
            <div class="col-lg-6 col-md-6 mt-3 mb-5">
                <form>

                    <div class="form-group ">
                        <label for="inputAddress">Nume</label>
                        <input type="text" class="form-control" id="nume_c" <?php if($logat) echo 'value="' .$username.'"'; ?>placeholder="Introduceți numele dvs.">
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress">Email</label>
                        <input type="text" class="form-control" id="email_c" <?php if($logat) echo 'value="' .$useremail.'"'; ?> placeholder="Introduceți email dvs.">
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress">Mesaj</label>
                        <textarea type="text" class="form-control" id="mesaj_c" placeholder="Introduceți mesajul dvs.">
	</textarea>
                    </div>

                    <button type="button" class="btn btn-primary" onClick="send()" ;>Transmite !</button>
                </form>
            </div>

            <div class="col-lg-1 col-md-1 mt-3 mb-5">
            </div>
            <div class="col-lg-5 col-md-1 mt-5 mb-5">
                <p> Adresa: s.Ștefănești, R-nul Florești</p>
                <p> Numar: + 373 (68) 883 944</p>
                <p> Email: tatianamoraru1998@gmail.com</p>

                <p><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-1.jpg" alt="image-1" /></p>

            </div>



            <!-- Sidebar Widgets Column -->


        </div>

    </div>
    <!-- /.row -->


    <!-- /.container -->

    <!-- Footer -->
    <footer class="" style="  background-color: #000022;">
        <div class="container ">
            <div class="row "> </div>
            <div class="col-md-12 px-5 f-bottom">

                <div class="col-md-6 px-5">
                    <p class="text-white ">Copyright &copy; Contacteza pentru mai multe informatii</p>
                </div>
                <div class="col-md-6 px-5">
                    <a href="contacte.php">Contacte</a>
                </div>

            </div>

        </div>




    </footer>
    <!-- /.container -->



    <script src="lib/jquery/jquery.2.2.2.js"></script>
    <script src="lib/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/blocks.js"></script>
    <script src="js/index.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        function send() {

            var name = $.trim($('#nume_c').val());
            var mess = $.trim($('#mesaj_c').val());
            var email = $.trim($('#email_c').val());


            var a = 0;

            if (name.length == '') {
                accent($('#nume_c'));

                a++;
            }
            if (mess.length == '') {
                accent($('#mesaj_c'));
                a++;
            }
            if (email.length == '') {
                accent($('#email_c'));

                a++;
            }
            if (!isEmail(email) && email.length > 1) {
                accent($('#email_c'));
                show('Completați corect email-ul !');
                a++;
            }

            if (a > 0) {
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "rez.php",
                    data: "task=send&name=" + name + "&mess=" + mess + "&email=" + email,
                    success: function(msg) {

                        if ($.trim(msg) == '1') {
                            $('.form-group').find('input,textarea').val('');
                            show('Vă mulțumim pentru părere !');
                        } else {
                            show(msg);
                        }
                    }
                });
            }
        }

        function hel() {
            alert('wdwad');
        }

    </script>
</body>

</html>
<?php 

/*include('admin/includes/db.php');

function dataready($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
} 

if(isset($_POST['submit'])){

	$nume= $_POST['nume'];
	$mes= $_POST['mesaj'];

	
	
	if($nume=='' || $mes==""){
	echo "<script>show('Completati toate cimpurile !')</script>";
	
	} else {
	

	$query = "INSERT INTO comentarii (nume,mesaj,active) VALUES ('$nume','$mes','0' )";
	
	if(mysqli_query($con,$query)){
		echo "<script>show('Adaugat cu succes!')</script>";
	}
	}
}*/

?>
