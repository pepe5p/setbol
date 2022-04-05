<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Shortcut icon" href="../img/setbol/setbolshortcut.jpg" />
    <title>UKS Setbol Oświęcim | Sale sportowe</title>
    <meta name="description" content="Oficjalna strona oświęcimskiego klubu UKS Setbol." />
    <meta name="author" content="Piotr Karaś" />

    <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1" />

	<link rel="stylesheet" href="../bootstrapcss/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="../fontello/css/setbol.css" type="text/css" />
	<link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>
<body>
    <div class="topspace"></div>
    <main>
		<div class="container">
            <div class="return"><a href="../club.php"><i class="icon-left-circled"></i></a></div>
        </div>
        <div class="titlebox pb1">
            <div class="title p1"><i class="icon-location-outline"></i> SALE SPORTOWE</div>
        </div>
		<div class="container">
            <div class="row no-gutters cubeallbox">
                <div class="tbox col-md-4">
                    <div class="table">
                        <table>
                            <tr>
                                <td>NAZWA SZKOŁY</td>
                            </tr>
                            <tr>
                                <td id="sp2" class="cubenav" onclick="rotate('rotateX(0) rotateY(0)', 'sp2')">SP nr 2 im. Łukasza Górnickiego</td>
                            </tr>
                            <tr>
                                <td id="pz2" class="cubenav" onclick="rotate('rotateX(-90deg) rotateY(0)', 'pz2')">PZ nr 2 SOMSiT</td>
                            </tr>
                            <tr>
                                <td id="sp11" class="cubenav" onclick="rotate('rotateX(0) rotateY(-90deg)', 'sp11')">SP nr 11 im. Mikołaja Kopernika</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-8 cbox">
                    <div class="cube">
                        <div id="flipcube" class="flipbox">
                            <div class="flip start">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12373.901483372843!2d19.234042!3d50.032358!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc50b7c099240e9d4!2sSzko%C5%82a+Podstawowa+nr+2+im.+%C5%81ukasza+G%C3%B3rnickiego+w+O%C5%9Bwi%C4%99cimiu!5e1!3m2!1spl!2spl!4v1552077185882" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="flip up">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d24748.937224335077!2d19.244911!3d50.030157!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2353615c5694b5b0!2sPowiatowy+Zesp%C3%B3%C5%82+Nr+2+Szk%C3%B3%C5%82+Og%C3%B3lnokszta%C5%82c%C4%85cych+Mistrzostwa+Sportowego+i+Technicznych!5e1!3m2!1spl!2spl!4v1552077270653" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="flip right">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12375.206290311913!2d19.241469!3d50.027294!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x438f3006772e35e4!2sSzko%C5%82a+Podstawowa+Nr+11+im.+Miko%C5%82aja+Kopernika+w+O%C5%9Bwi%C4%99cimiu!5e1!3m2!1spl!2spl!4v1552077292967" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
    </main>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../bootstrapjs/bootstrap.min.js"></script>
    <script>
        function rotate(xy, which){
            $('#flipcube').css('transform', xy);
            $('.cubenav').css('font-weight', '400');
            $('#'+which).css('font-weight', '700');
        }
    </script>
</body>
</html>