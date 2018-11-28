<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <title>Wire Online Magazine</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <link rel="shortcut icon" href="favicon.ico">
    <!-- CSS -->
    <link href="http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="<?php echo URL; ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/icomoon.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/bootstrap.css" rel="stylesheet">
    

    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">

    <script src="<?php echo URL; ?>js/modernizr-2.6.2.min.js"></script>
    <style>
		body {margin:0;}

		.topnav {
		  overflow: hidden;
		  background-color: #333;
		}

		.topnav a {
		  float: left;
		  display: block;
		  color: #f2f2f2;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		  font-size: 17px;
		}

		.topnav a:hover {
		  background-color: #ddd;
		  color: black;
		}

		.active {
		  background-color: #ffbb00;
		  color: white;
		}

		.topnav .icon {
		  display: none;
		}

		@media screen and (max-width: 600px) {
		  .topnav a:not(:first-child) {display: none;}
		  .topnav a.icon {
		    float: right;
		    display: block;
		  }
		}

		@media screen and (max-width: 600px) {
		  .topnav.responsive {position: relative;}
		  .topnav.responsive .icon {
		    position: absolute;
		    right: 0;
		    top: 0;
		  }
		  .topnav.responsive a {
		    float: none;
		    display: block;
		    text-align: left;
		  }
		}
	</style>
</head>
<body>
	<div class="topnav" id="myTopnav">
	  <a href="<?php if(isset($_SESSION["idAdmin"])){echo URL.'admin/index';} else {echo URL.'admin/login';} ?>" class="active">Home</a>

	  <?php if(isset($_SESSION["idAdmin"])){ ?>
	  <a style="float:right" href="<?php echo URL;?>/logout/logout_admin">Logout</a>
	  <a style="float:right" href="#"><?php echo $_SESSION["namaAdmin"]." (Administrator)"?></a>
	  <?php }?>
	  
	  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
	</div>

	<script>
		function myFunction() {
		    var x = document.getElementById("myTopnav");
		    if (x.className === "topnav") {
		        x.className += " responsive";
		    } else {
		        x.className = "topnav";
		    }
		}
	</script>
    <!-- logo -->
    <header id="fh5co-header">
        
        <div class="container-fluid">

            <div class="row">
                
                <div class="col-lg-12 col-md-12 text-center">
                    <h1 id="fh5co-logo"><a href="<?php if(isset($_SESSION["idAdmin"])){echo URL.'admin/index';} else {echo URL.'admin/login';} ?>">Wire Online Magazine - Admin Side</a></h1>
                </div>

            </div>
        
        </div>

    </header>
    <!-- END #fh5co-offcanvas -->
