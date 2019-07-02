<?php  
include "lib/koneksi.php";
session_start();
if(isset($_SESSION['pelanggan']))
{
	header("location:member/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | ANS STORE</title>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="asset/css/prettyPhoto.css" rel="stylesheet">
    <link href="asset/css/price-range.css" rel="stylesheet">
    <link href="asset/css/animate.css" rel="stylesheet">
	<link href="asset/css/main.css" rel="stylesheet">
	<link href="asset/css/responsive.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
	.btn:active, .btn.active {
		background-color : orange;
		color : white
	}
	.btn-group-toggle .btn {
		border: 1px solid #bfbebe;
	}
	.value-button {
	  display: inline-block;
	  border: 1px solid #ddd;
	  margin: 0px;
	  width: 40px;
	  height: 41px;
	  text-align: center;
	  vertical-align: middle;
	  padding: 11px 0;
	  background: #eee;
	  -webkit-touch-callout: none;
	  -webkit-user-select: none;
	  -khtml-user-select: none;
	  -moz-user-select: none;
	  -ms-user-select: none;
	  user-select: none;
	}

	.value-button:hover {
	  cursor: pointer;
	}

	form #decrease {
	  margin-right: -4px;
	}

	form #increase {
	  margin-left: -4px;
	}

	form #input-wrap {
	  margin: 0px;
	  padding: 0px;
	}

	input#number {
	  text-align: center;
	  border: none;
	  border-top: 1px solid #ddd;
	  border-bottom: 1px solid #ddd;
	  margin: 0px;
	  width: 40px;
	  height: 40px;
	}

	input[type=number]::-webkit-inner-spin-button,
	input[type=number]::-webkit-outer-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}
	</style>
<script>
	function resetjml(){
      document.getElementById("number").value= 0;
	}

</script>	
    <link rel="shortcut icon" href="asset/images/home/logox.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +6281334678626</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> ansstore@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="asset/images/home/logox.png" alt="" /></a>
						</div>
							<div class="btn-group pull-right">
							
							
							
						</div>
						</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<!--<li><a href="#"><i class="fa fa-user"></i> Account</a></li> -->
								<!--<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li> -->
								
								<li><a href="keranjang_new.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="produk.php">Shop</a>
                                </li> 
								
								<li><a href="pemesanan.php">Help</a></li>
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->