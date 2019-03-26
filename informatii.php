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
  #map {
        height: 800px;
      }
  </style>
</head>

<body>

    <!-- Navigation -->
    <?php include 'menu.php';?>

    <!-- Page Content -->
    <div class="container-fluid ">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-4 col-md-5 mt-0">
                <div id="map"></div>
                <?php /*<img src = "images/harta.jpg" class="img-responsive" />"*/?>
            </div>
            <div class="col-lg-7 col-md-7 mt-5 ml-5">
                <?php if($logat){?>
                <div id="demo">

                </div>
                <p>Selecteză raionul de pe hartă pentru a afla detalii privind:
                    <ol type="disc">
                        <li>Indicatorii bacteriologici .</li>
                        <li>Indicatorii chimici .</li>
                        <li>Numărul de fîntîni private și publice pe fiecare raion . </li>

                    </ol>

                </p>


                <?php }else {?>
                <p><em>
                        Apa curata este incolara,inodora(fara miros) si fara gust. Nu contine sedimente organice sau minerale cu mai putin bacterii. Cea mai mare preocupare a consumatorilor este ce pH trebuie sa aiba apa plata. Din punct de vedere chimic,apa curata, buna de baut, are un pH intre 6,5 si 8,5.
                    </em></p>
                <p><em>
                        În apa de fântână, concentraţiile crescute de nitraţi pot proveni din
                        mai multe surse:
                        compoziţia naturală a solului;
                        folosirea pe scară largă a fertilizantelor azotoase;
                        nerespectarea condiţiilor igienico-sanitare şi de
                        amplasare a fântânilor.
                    </em></p>
                <p><em>În rezultatul evaluării stării sanitare şi a investigaţiilor de laborator a calităţii apei, s-a stabilit că ponderea probelor de apă din reţelele de apeducte per total (apeducte comunale urbane, rurale, apeducte departamentale şi ale instituţiilor pentru copii), care nu corespund normelor igienice după indicatorii sanitaro-chimici, în a.2016 a constituit 16,6%, în comparaţie cu 17,6% în a.2013 şi 16,1% în a.2014, 17,3% în a.2015, iar după indicatorii microbiologici a constituit 13,6%, în comparaţie cu 7,8% în a.2013, 10,9% în a.2014, 6,7% în a.2015, fapt care denotă o stabilizarere a calităţii apei cu tendinţă de îmbunătăţire după indicatorii sanitaro-chimici şi înrăutăţire după indicatorii microbiologici.</em></p>

                <?php }?>
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

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="lib/gmaps.js"></script>
    <link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.3.0/bootstrap.min.css" />

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

        var map;
        $(document).ready(function() {
            map = new GMaps({
                el: '#map',
                lat: 47.497687152759305,
                lng: 28.566202870681543,
                zoom: 8,
                mapTypeId: 'roadmap'
            });

            <?php $getRaion = mysqli_query($con, "SELECT * FROM raion ");
		while ($row = mysqli_fetch_array($getRaion)){ ?>
            map.addMarker({
                lat: <?php echo $row['lat']?>,
                lng: <?php echo $row['lng']?>,
                title: 'Marker with InfoWindow',
                click: function(e) {
                    if (console.log)
                        console.log(e);
                    showUser('<?=$row['
                        id_raion ']?>');
                },

                infoWindow: {
                    content: '<p><?=$row['
                    raion ']?></p>'
                }
            });

            <?php }?>
        });


        function showUser(str) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("demo").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "info.php?q=" + str, true);
            xhttp.send();
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
