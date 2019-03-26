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
    <link rel="stylesheet" href="lib/fa/css/font-awesome.min.css">
    <link href="css/blocks.css" rel="stylesheet">
    <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
    <style>
        .col-sm-4 p {

            text-align: center;
            color: #0575be !important;
            margin-bottom: 100px;
        }

        .col-sm-4 img {
            width: 280px;
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

            <!-- Post Content Column -->
            <div class="col-lg-12">

                <img src="images/banner.png" class="img-responsive" />"
            </div>


            <div class="col-sm-4 px-5">
                <img src="images/3.jpg" class="img-responsive" alt="Image">

                <p>Hobby</p>
            </div>
            <div class="col-sm-4 px-5">
                <img src="images/1.jpg" class="img-responsive" alt="Image">
                <p>Pasiune</p>
            </div>
            <div class="col-sm-4 px-5">
                <img src="images/2.jpg" class="img-responsive" alt="Image">

                <p>Culori</p>
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

            var name = $.trim($('#nume').val());
            var mess = $.trim($('#mesaj').val());


            var a = 0;

            if (name.length == '') {
                show('Alert');
                a++;
            }
            if (mess.length == '') {
                show('Completati m');
                a++;
            }
            if (a > 0) {
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "rez.php",
                    data: "task=send&name=" + name + "&mess=" + mess,
                    success: function(msg) {

                        if ($.trim(msg) == '1') {
                            show('este');
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
