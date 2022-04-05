<?php
    require_once "php/connect.php";
    
    $gg = "";
    $yt = "";
    $ar = "";

    if($c->connect_errno==0)
    {
        if(isset($_GET['search'])){

            $search = $_GET['search'];

            $type = $_GET['type'];
            if($type=="google") $gg = "selected";
            else if($type=="youtube") $yt = "selected";
            else if($type=="article") $ar = "selected";

            $catid = $_GET['cat'];
            if($catid!="")
            {
                $catsql = "SELECT `name` FROM `categories` WHERE `id`=$catid";
                if($rcat = @$c->query($catsql)) 
                {
                    $row = mysqli_fetch_assoc($rcat);
                    $cat = $row['name'];
                    $rcat->close();
                }
            } else $cat = "";

            $and = 0;

            if($type=="") $insqlt = "";
            else $insqlt  = "`type`='$type'";

            if($cat=="") $insqlc = "";
            else $insqlc  = "`category`='$cat'";

            if($search=="") $insqls = "";
            else $insqls = "(`desc` LIKE '%$search%' OR `category` LIKE '%$search%')";

            if(($type!="") && (($cat!="") || ($search!=""))) $and1 = "AND";
            else $and1 = "";

            if(($cat!="") && ($search!="")) $and2 = "AND";
            else $and2 = "";

            if(($type!="") || ($cat!="") || ($search!="")) $where = "WHERE";
            else $where = "";

            $sql = "$where $insqlt $and1 $insqlc $and2 $insqls";

        } else {
            $search = "";
            $type = "";
            $cat = "";
            $sql = "";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Shortcut icon" href="img/setbol/setbolshortcut.jpg" />
    <title>UKS Setbol Oświęcim | Aktualności</title>
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
					<div class="title p1"><i class="icon-newspaper"></i> AKTUALNOŚCI</div>
				</div>
                <div class="newspanel container">
                    <form method="get">
                        <div class="row no-gutters">
                            <div class="col-6 col-md-3">
                                <input name="search" type="search" value="<?php echo $search; ?>">
                                <button type="submit" class="search button"><i class="icon-search"></i></button>
                            </div>
                            <div class="col-6 col-md-3">
                                <select name="type" id="type">
                                    <option value="">WSZYSTKO</option>
                                    <option value="google" <?php echo $gg; ?>>ALBUMY</option>
                                    <option value="youtube" <?php echo $yt; ?>>FILMY</option>
                                    <option value="article" <?php echo $ar; ?>>ARTYKUŁY</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-3">
                                <select name="cat" id="type">
                                    <option value="">WSZYSTKO</option>
                                    <?php
                                        if($c->connect_errno==0)
                                        {
                                            $catsql = "SELECT `id`, `name` FROM `categories` WHERE `posts`>0";
                                            if($rcat = @$c->query($catsql)) 
                                            {
                                                $hmcat = mysqli_num_rows($rcat);
                                                for ($i = 1; $i <= $hmcat; $i++)
                                                {
                                                    $row = mysqli_fetch_assoc($rcat);
                                                    $id = $row['id'];
                                                    $name = $row['name'];
                                                    $ucname = strtoupper($name);

                                                    if($name==$cat) $selected = " selected";
                                                    else $selected = "";

                                                    echo "<option value='$id'$selected>$ucname</option>";
                                                }
                                                $rcat->close();
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-6 col-md-3">
                                <button type="submit" class="button">WYSZUKAJ</button>
                            </div>
                        </div>
                    </form>
                </div>
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
                            $howmuch = 12;
                            $news = "SELECT `type`, `date`, `link`, `imgpath`, `desc` FROM `news` $sql ORDER BY `date` DESC LIMIT $howmuch";
                            // echo $news;
                            if($n = @$c->query($news)) 
                            {
                                $howmucha = mysqli_num_rows($n);
                                if($howmucha==12) $last = true;
                                else $last = false;
                                for ($i = 1; $i <= $howmucha; $i++)
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

                                    if($last==true && $i==$howmucha) {
                                        echo<<<END
                                        <div class="box last col-md-3">
                                            <div class="tile gradient" onclick="link('news.php')">
                                                <div class="text">ZOBACZ KOLEJNE</div>
                                            </div>
                                        </div>

END;
                                    } else {
                                        echo<<<END
                                        <div class="box col-md-3">
                                            <div class="tile">
                                                <div class="type">
                                                    <i class="icon-$typeicon"></i>
                                                    <div class="date">$date</div>
                                                </div>
                                                <div class="desc" onclick="link('$link')">
                                                    <div class="dtext">$desc</div>
                                                    <div class="more"><i class="icon-right-circled"></i></div>
                                                </div>
                                                <img src="$imgpath"/>
                                            </div>
                                        </div>
END;
                                    }

                                }
                                $n->close();
                            }
                            $c->close();
                        }
                    ?>
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