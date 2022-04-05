<?php
    if($fill==true) $fillit = " class='fill'";
    else $fillit = "";
    echo<<<END
	    <nav>
            <button id="tglbtn" type="button" class="togglebtn" onclick="nav()"><i class="icon-menu"></i></button>
            <div id="navigation"$fillit>
                <ul class="nav navbar-nav" id="navigation">
                    <li><i class="icon-home"></i>
                        <div class="flipbox">
                            <div class="flip up">
                                <div class="icon"><i class="icon-home"></i></div>
                            </div>
                            <div class="flip down">
                                <div class="icon"><a href="main.php"><i class="icon-home"></i></a></div>
                            </div>
                        </div>
                    </li>
                    <li>KLUB
                        <div class="flipbox">
                            <div class="flip up">
                                <div class="icon">KLUB</div>
                            </div>
                            <div class="flip down">
                                <div class="icon"><a href="club.php">KLUB</a></div>
                            </div>
                        </div>
                        <ul class="item">
                            <li><a href="club/tdetails.php">DANE DO PRZELEWU</a></li>
                            <li><a href="club/statue.php">STATUT</a></li>
                            <li><a href="club/management.php">ZARZĄD</a></li>
                            <li><a href="club/coaches.php">TRENERZY</a></li>
                            <li><a href="club/gyms.php">SALE SPORTOWE</a></li>
                        </ul>
                    </li>
                    <li>ROZGRYWKI
                        <div class="flipbox">
                            <div class="flip up">
                                <div class="icon">ROZGRYWKI</div>
                            </div>
                            <div class="flip down">
                                <div class="icon"><a href="">ROZGRYWKI</a></div>
                            </div>
                        </div>
                        <ul class="item">
                            <li><a href="">NAJBLIŻSZE MECZE</a></li>
                            <li><a href="">TABELE</a></li>
                        </ul>
                    </li>
                    <li>AKTUALNOŚCI
                        <div class="flipbox">
                            <div class="flip up">
                                <div class="icon">AKTUALNOŚCI</div>
                            </div>
                            <div class="flip down">
                                <div class="icon"><a href="news.php">AKTUALNOŚCI</a></div>
                            </div>
                        </div>
                        <ul class="item">
                            <li><a href="news.php?search=&type=google&cat=">ALBUMY</a></li>
                            <li><a href="news.php?search=&type=youtube&cat=">FILMY</a></li>
                            <li><a href="news.php?search=&type=article&cat=">ARTYKUŁY</a></li>
                            <li><a href="news.php?search=&type=&cat=1">OBOZY SPORTOWE</a></li>
                        </ul>
                    </li>
                    <li>NABÓR
                        <div class="flipbox">
                            <div class="flip up">
                                <div class="icon">NABÓR</div>
                            </div>
                            <div class="flip down">
                                <div class="icon"><a href="enrolment.php">NABÓR</a></div>
                            </div>
                        </div>
                    </li>
                    <li>TRENINGI
                        <div class="flipbox">
                            <div class="flip up">
                                <div class="icon">TRENINGI</div>
                            </div>
                            <div class="flip down">
                                <div class="icon"><a href="training.php">TRENINGI</a></div>
                            </div>
                        </div>
                    </li>
                    <li>ZAWODNICZKI
                        <div class="flipbox">
                            <div class="flip up">
                                <div class="icon">ZAWODNICZKI</div>
                            </div>
                            <div class="flip down">
                                <div class="icon"><a href="players.php">ZAWODNICZKI</a></div>
                            </div>
                        </div>
                    </li>
                    <li>OLS
                        <div class="flipbox">
                            <div class="flip up">
                                <div class="icon">OLS</div>
                            </div>
                            <div class="flip down">
                                <div class="icon"><a href="ols/index.php">OLS</a></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
END;
?>