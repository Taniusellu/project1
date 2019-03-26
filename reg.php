<?php
include ("admin/includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        var close__btn = 'Închide';
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
                        <input type="text" class="form-control" id="nume" placeholder="Introduceți numele dvs.">
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Introduceți email dvs.">
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress">Parola</label>
                        <input type="password" class="form-control" id="parola" placeholder="Introduceți parola dvs.">
                    </div>
                    <div class="form-group ">
                        <label for="inputAddress"> Repeta parola</label>
                        <input type="password" class="form-control" id="parola2" placeholder="Repetati parola dvs.">
                    </div>


                    <input type="button" class="btn btn-primary" onclick="reg()" value="Înregistrare !"></button>
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

        </div>
    </div>
    <!-- Sidebar Widgets Column -->





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
    <script src="lib/animatecss/animate.css"></script>
    <script src="lib/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="js/blocks.js"></script>
    <script src="js/index.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        function reg() {

            var name = $.trim($('#nume').val());
            var email = $.trim($('#email').val());
            var parola = $.trim($('#parola').val());
            var parola2 = $.trim($('#parola2').val());

            var a = 0;

            if (name.length == '') {
                accent($('#nume'));
                a++;

            }
            if (email.length == '') {
                accent($('#email'));
                a++;

            }
            if (parola.length == '') {
                accent($('#parola'));
                a++;

            }
            if (parola2.length == '') {
                accent($('#parola2'));
                a++;

            }

            if (!isEmail(email)) {
                show('Completați corent email-ul !');
                a++;
            }


            if (parola.length > 0 && parola2.length > 0 && parola != parola2) {
                accent($('#parola'));
                accent($('#parola2'));
                show('Parolele pe care le-ați introdus nu se potrivesc');
                a++;

            }
            if (a > 0) {
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "rez.php",
                    data: "task=reg&name=" + name + "&email=" + email + "&parola=" + parola,
                    success: function(msg) {

                        if ($.trim(msg) == '1') {
                            show('Înregistrat cu succes !!');

                            $('.form-group').find('input,textarea').val('');
                            setInterval(function() {
                                location.href = 'log.php';
                            }, 2000);


                        } else {
                            show(msg);
                        }
                    }
                });
            }
        }

    </script>
</body>

</html>
