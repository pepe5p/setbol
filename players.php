<?php
    require_once "php/connect.php";

    if((isset($_GET['search'])) && ($_GET['search']!="")){
        $search = $_GET['search'];
        $sql = "WHERE (lname LIKE '%$search%') OR (fname LIKE '%$search%')";
    } else $sql = "";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Shortcut icon" href="img/setbol/setbolshortcut.jpg" />
    <title>UKS Setbol Oświęcim | Zawodniczki</title>
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
		<section id="news">
			<div class="section">
				<div class="container">
					<div class="return"><a href="main.php"><i class="icon-left-circled"></i></a></div>
				</div>
				<div class="titlebox pb1">
					<div class="title p1"><i class="icon-users"></i> ZAWODNICZKI</div>
				</div>
                <div class="newspanel container">
                    <form method="get">
                        <div class="row no-gutters">
                            <div class="col-10 col-md-7 offset-md-2">
                                <input name="search" type="search" placeholder="Wpisz imię lub nazwisko.">
                                <button type="submit" class="search button"><i class="icon-search"></i></button>
                            </div>
                            <div class="col-2 col-md-1">
                                <button type="button" class="button"><i class="icon-cancel"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container">
                    <div class="row no-gutters">
                        <div class="tbox col-md-8 offset-md-2">
                            <div class="table">
                                <table>
                                    <tr>
                                        <td>NAZWISKO</td>
                                        <td>IMIE</td>
                                        <td>ROCZNIK</td>
                                        <td>PROFIL</td>
                                    </tr>
                                    <?php
                                        if($c->connect_errno!=0)
                                        {
                                            echo<<<END
                                            <div class="box lastnews col-md-3">
                                                <div class="tile last">
                                                    <div class="lastdtext">Błąd połączenie z bazą danych!</div>
                                                </div>
                                            </div>
END;
                                        }
                                        else 
                                        {
                                            $players = "SELECT id, fname, lname, birth FROM `players` $sql ORDER BY lname, fname";
                                            // echo $players;
                                            if($p = @$c->query($players)) 
                                            {
                                                $howmucha = mysqli_num_rows($p);
                                                for ($i = 1; $i <= $howmucha; $i++)
                                                {
                                                    $row = mysqli_fetch_assoc($p);
                                                    $pid = $row['id'];
                                                    $fname = $row['fname'];
                                                    $lname = $row['lname'];
                                                    $birth = $row['birth'];

                                                    $year = substr($birth, 2, 2);

                                                    echo<<<END
                                                    <tr>
                                                        <td>$fname</td>
                                                        <td>$lname</td>
                                                        <td>$year</td>
                                                        <td><a href="playerprof.php?id=$pid">ZOBACZ</a></td>
                                                    </tr>
END;
                                                }
                                                $p->close();
                                            }
                                            $c->close();
                                        }
                                    ?>
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
        function reset(){
            alert(window.location);
        }
    </script>
</body>
</html>