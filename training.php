<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Shortcut icon" href="img/setbol/setbolshortcut.jpg" />
    <title>UKS Setbol Oświęcim | Treningi</title>
    <meta name="description" content="Oficjalna strona oświęcimskiego klubu UKS Setbol." />
    <meta name="author" content="Piotr Karaś" />

    <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1" />

	<link rel="stylesheet" href="bootstrapcss/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="fontello/css/setbol.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<?php $fill = true; include_once "php/navigation.php"; ?>
	<div class="topspace"></div>
    <main>
		<section>
			<div class="navigbar navbar">
				<div class="container">
					<div class="return"><a href="main.php"><i class="icon-left-circled"></i></a></div>
				</div>
				<div class="titlebox pb1">
					<div class="title p1"><i class="icon-users"></i> TRENINGI</div>
				</div>
				<div class="container">
					<div class="row no-gutters pbox">
						<div class="box col-md-4">
							<div class="flipbox">
								<div class="flip up nimg">
									<div class="icon">DANE DO PRZELEWU</div>
								</div>
								<div class="flip down" onclick="link('club/tdetails.php')">
									<div class="downborder">
										<div class="icon">ZOBACZ <i class="icon-right-circled"></i></div>
									</div>
								</div>
							</div>
						</div>
						<div class="box col-md-4">
							<div class="flipbox">
								<div class="flip up mimg">
									<div class="icon">STATUT</div>
								</div>
								<div class="flip down" onclick="link('club/statue.php')">
									<div class="downborder">
										<div class="icon">ZOBACZ <i class="icon-right-circled"></i></div>
									</div>
								</div>
							</div>
						</div>
						<div class="box col-md-4">
							<div class="flipbox">
								<div class="flip up timg">
									<div class="icon">ZARZĄD</div>
								</div>
								<div class="flip down" onclick="link('club/management.php')">
									<div class="downborder">
										<div class="icon">ZOBACZ <i class="icon-right-circled"></i></div>
									</div>
								</div>
							</div>
						</div>
						<div class="box col-md-4">
							<div class="flipbox">
								<div class="flip up simg">
									<div class="icon">TRENERZY</div>
								</div>
								<div class="flip down" onclick="link('club/coaches.php')">
									<div class="downborder">
										<div class="icon">ZOBACZ <i class="icon-right-circled"></i></div>
									</div>
								</div>
							</div>
						</div>
						<div class="box col-md-4">
							<div class="flipbox">
								<div class="flip up pimg">
									<div class="icon">SALE SPORTOWE</div>
								</div>
								<div class="flip down" onclick="link('club/gyms.php')">
									<div class="downborder">
										<div class="icon">ZOBACZ <i class="icon-right-circled"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	    <?php include_once "php/sponsors.php"; ?>
    </main>
	<?php include_once "php/footer.php"; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="bootstrapjs/bootstrap.min.js"></script>
	<script src="js/nav.js"></script>
</body>
</html>