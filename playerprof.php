<?php
    require_once "php/connect.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "WHERE id = $id";
    } else {
        header('Location: players.php');
		exit();
    }
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
					<div class="return"><a href="players.php"><i class="icon-left-circled"></i></a></div>
				</div>
				<div class="titlebox pb1">
					<div class="title p1"><i class="icon-users"></i> ZAWODNICZKA</div>
				</div>
                <div class="container">
                    <div class="row no-gutters">
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
                                $player = "SELECT fname, lname, birth, position, `number`, height, imgpath FROM `players` $sql";
                                // echo $players;
                                if($p = @$c->query($player)) 
                                {
                                    $row = mysqli_fetch_assoc($p);
                                    $fname = $row['fname'];
                                    $lname = $row['lname'];
                                    $birth = $row['birth'];
                                    $position = $row['position'];
                                    $num = $row['number'];
                                    $height = $row['height']." cm";
                                    $imgpath = $row['imgpath'];

                                    echo<<<END
                                    <div class="playerimg col-md-6">
                                        <img src="$imgpath">
                                    </div>
                                    <div class="tbox col-md-6">
                                        <div class="table">
                                            <table>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Imie</td>
                                                    <td>$fname</td>
                                                </tr>
                                                <tr>
                                                    <td>Nazwisko</td>
                                                    <td>$lname</td>
                                                </tr>
                                                <tr>
                                                    <td>Data urodzenia</td>
                                                    <td>$birth</td>
                                                </tr>
                                                <tr>
                                                    <td>Numer</td>
                                                    <td>$num</td>
                                                </tr>
                                                <tr>
                                                    <td>Wzrost</td>
                                                    <td>$height</td>
                                                </tr>
                                                <tr>
                                                    <td>Pozycja</td>
                                                    <td>$position</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
END;
                                    $p->close();
                                }
                                $c->close();
                            }
                        ?>
                    </div>
                </div>
			</div>
		</section>
    </main>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="bootstrapjs/bootstrap.min.js"></script>
	<script src="js/nav.js"></script>
</body>
</html>