<?php
	require_once "php/connect.php";
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Shortcut icon" href="img/setbol/setbolshortcut.jpg" />
    <title>UKS Setbol Oświęcim</title>
    <meta name="description" content="Oficjalna strona oświęcimskiego klubu UKS Setbol." />
    <meta name="author" content="Piotr Karaś" />

    <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1" />

	<link rel="stylesheet" href="bootstrapcss/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="fontello/css/setbol.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<?php $fill = false; include_once "php/navigation.php"; ?>
	<header>
		<div class="hbox" id="headerimg">
			<div class="header"></div>
			<div class="hbar">
				<div class="title"><a href="main.php">UKS SETBOL OŚWIĘCIM</a></div>
			</div>
			<div class="scroll"><a href="#content"><span><i class="icon-angle-circled-down"></i></span></a></div>
			<div class="mediabar row">
				<div class="mlink col-3">
					<a href="https://www.facebook.com/setbol/"><i class="icon-facebook-squared"></i></a>
				</div>
				<div class="mlink col-3">
					<a href="https://www.youtube.com/user/ukssetbol"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="mlink col-3">
					<a href="https://photos.google.com/share/AF1QipMKFjZAzW7PqEGZuMTHxrfP4UPCGK8YVwhFWWUwcopEwM_tTnWAD_GbD8azSra-Qw?key=TVM5elhKa2pRRGVsell1bWN6Y3JzcjR2dTlqNVVB"><i class="icon-google"></i></a>
				</div>
			</div>
		</div>
	</header>
	<main id="content">
		<section>
			<div class="navigbar navbar">
				<div class="container">
					<div class="row no-gutters pbox">
						<div class="box col-md-4">
							<div class="flipbox">
								<div class="flip up nimg">
									<div class="icon"><i class="icon-newspaper"></i> AKTUALNOŚCI</div>
								</div>
								<div class="flip down" onclick="scrollit('#news')">
									<div class="downborder">
										<div class="icon">ZOBACZ <i class="icon-right-circled"></i></div>
									</div>
								</div>
							</div>
						</div>
						<div class="box col-md-4">
							<div class="flipbox">
								<div class="flip up mimg">
									<div class="icon"><i class="icon-award"></i> MECZE</div>
								</div>
								<div class="flip down" onclick="scrollit('#matches')">
									<div class="downborder">
										<div class="icon">ZOBACZ <i class="icon-right-circled"></i></div>
									</div>
								</div>
							</div>
						</div>
						<div class="box col-md-4">
							<div class="flipbox">
								<div class="flip up timg">
									<div class="icon"><i class="icon-th-list"></i> TABELA</div>
								</div>
								<div class="flip down" onclick="scrollit('#tables')">
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
		<section id="news">
			<div class="section">
				<div class="titlebox pb1">
					<div class="title p1"><i class="icon-newspaper"></i> AKTUALNOŚCI</div>
				</div>
				<div class="row no-gutters">
					<div class="col-md-2">
						<div class="banner">
							<img src="img/banner.png"/>
						</div>
					</div>
					<div class="col-md-10 row no-gutters">
						<?php
							if($c->connect_errno!=0)
							{
								echo 'błąd połączenie z bazą danych!';
							}
							else 
							{
								$howmuch = 5;

								$news = "SELECT `type`, `date`, `link`, `imgpath`, `desc` FROM `news` ORDER BY `date` DESC LIMIT $howmuch";
								if($n = @$c->query($news)) 
								{
									$howmuch = mysqli_num_rows($n);
									for ($i = 1; $i <= $howmuch; $i++)
									{
										$row = mysqli_fetch_assoc($n);
										$type = $row['type'];
										$datetime = $row['date'];
										$link = $row['link'];
										$imgpath = $row['imgpath'];
										$desc = $row['desc'];

										if($type=="article") $typeicon = "doc-text-inv";
										else if($type=="google") $typeicon = "google";
										else if($type=="youtube") $typeicon = "youtube-play";

										$date = substr($datetime, 0, 10);

										echo<<<END
										<div class="box col-md-4">
											<div class="tile">
												<div class="type">
													<i class="icon-$typeicon"></i>
													<div class="date">$date</div>
												</div>
												<div class="desc" onclick="link('$link')">
													<div class="text">$desc</div>
													<div class="more"><i class="icon-right-circled"></i></div>
												</div>
												<img src="$imgpath"/>
											</div>
										</div>
END;
									}
									$n->close();
								}
								$c->close();
							}
						?>
						<div class="box last col-md-4">
							<div class="tile gradient" onclick="link('news.php')">
								<div class="text">ZOBACZ WIĘCEJ</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="matches">
			<div class="section">
				<div class="titlebox pb2">
					<div class="title p2"><i class="icon-award"></i> NAJBLIŻSZE MECZE</div>
				</div>
				<div class="container">
					<div class="row no-gutters">
						<div class="jambox col-md-6">
							<div class="jam">
								<div class="jaminfo">
									<div class="team">
										<img src="img/setbol/Logo setbol.JPG" class="rounded-circle"/>
										<div class="name">SETBOL</div>
									</div>
									<div class="category">JUNIORKI</div>
									<div class="date">01.02.2019 12:00</div>
									<div class="score">3 : 1</div>
									<div class="opponent">
										<img src="img/teams/kety.jpg" class="rounded-circle"/>
										<div class="name">KĘCZANIN</div>
									</div>
								</div>
								<div class="sets row no-gutters">
									<div class="set col-2 offset-1">25:19</div>
									<div class="set col-2">23:25</div>
									<div class="set col-2">25:21</div>
									<div class="set col-2">25:14</div>
									<div class="set col-2">25:14</div>
								</div>
							</div>
						</div>
						<div class="jambox col-md-6">
							<div class="jam">
								<div class="jaminfo">
									<div class="team">
										<img src="img/setbol/Logo setbol.JPG" class="rounded-circle"/>
										<div class="name">SETBOL</div>
									</div>
									<div class="category">JUNIORKI</div>
									<div class="date">01.02.2019 12:00</div>
									<div class="score">3 : 1</div>
									<div class="opponent">
										<img src="img/teams/kety.jpg" class="rounded-circle"/>
										<div class="name">KĘCZANIN</div>
									</div>
								</div>
								<div class="sets row no-gutters">
									<div class="set col-2 offset-1">25:19</div>
									<div class="set col-2">23:25</div>
									<div class="set col-2">25:21</div>
									<div class="set col-2">25:14</div>
									<div class="set col-2">25:14</div>
								</div>
							</div>
						</div>
						<div class="jambox col-md-6">
							<div class="jam">
								<div class="jaminfo">
									<div class="team">
										<img src="img/setbol/Logo setbol.JPG" class="rounded-circle"/>
										<div class="name">SETBOL</div>
									</div>
									<div class="category">JUNIORKI</div>
									<div class="date">01.02.2019 12:00</div>
									<div class="score">3 : 1</div>
									<div class="opponent">
										<img src="img/teams/kety.jpg" class="rounded-circle"/>
										<div class="name">KĘCZANIN</div>
									</div>
								</div>
								<div class="sets row no-gutters">
									<div class="set col-2 offset-1">25:19</div>
									<div class="set col-2">23:25</div>
									<div class="set col-2">25:21</div>
									<div class="set col-2">25:14</div>
									<div class="set col-2">25:14</div>
								</div>
							</div>
						</div>
						<div class="jambox col-md-6">
							<div class="jam">
								<div class="jaminfo">
									<div class="score">
										<a href="">KOLEJNE</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="tables">
			<div class="section">
				<div class="titlebox pb1">
					<div class="title p1"><i class="icon-th-list"></i> TABELE</div>
				</div>
				<div class="container">
					<div class="row no-gutters">
						<div class="tbox col-md-6">
							<div class="table">
								<table>
									<tr>
										<td>MSC</td>
										<td>NAZWA ZESPOŁU</td>
										<td>PKT</td>
									</tr>
									<tr>
										<td>1</td>
										<td>UKS SETBOL OŚWIĘCIM</td>
										<td>45</td>
									</tr>
									<tr>
										<td>2</td>
										<td>UKS SETBOL OŚWIĘCIM</td>
										<td>40</td>
									</tr>
									<tr>
										<td>1</td>
										<td>UKS SETBOL OŚWIĘCIM</td>
										<td>45</td>
									</tr>
									<tr>
										<td>2</td>
										<td>UKS SETBOL OŚWIĘCIM</td>
										<td>40</td>
									</tr>
									<tr>
										<td>1</td>
										<td>UKS SETBOL OŚWIĘCIM</td>
										<td>45</td>
									</tr>
									<tr>
										<td>2</td>
										<td>UKS SETBOL OŚWIĘCIM</td>
										<td>40</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="tbox col-md-6">
							<div class="table">
								<table>
									<tr>
										<td>MSC</td>
										<td>NAZWA ZESPOŁU</td>
										<td>PKT</td>
									</tr>
									<tr>
										<td>1</td>
										<td>UKS SETBOL OŚWIĘCIM</td>
										<td>45</td>
									</tr>
									<tr>
										<td>2</td>
										<td>UKS SETBOL OŚWIĘCIM</td>
										<td>40</td>
									</tr>
								</table>
							</div>
							<div class="table">
								<table>
									<tr>
										<td>MSC</td>
										<td>NAZWA ZESPOŁU</td>
										<td>PKT</td>
									</tr>
									<tr>
										<td>1</td>
										<td>UKS SETBOL OŚWIĘCIM</td>
										<td>45</td>
									</tr>
									<tr>
										<td>2</td>
										<td>UKS SETBOL OŚWIĘCIM</td>
										<td>40</td>
									</tr>
								</table>
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
	<script>
		$(document).ready(function(){
			var imgheight = $('#headerimg').height()-100;
			var scrollTop = 0;
			$(window).scroll(function(){
				scrollTop = $(window).scrollTop();
				if (scrollTop >= imgheight) {
					$('#navigation').addClass('fill');
				} else if (scrollTop < imgheight) {
					$('#navigation').removeClass('fill');
				}
			});
		});
	</script>
</body>
</html>