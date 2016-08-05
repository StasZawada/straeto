<!DOCTYPE html>

<html>
    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- app's own CSS -->
        <link href="/css/styles.css" rel="stylesheet"/>

        <!-- https://developers.google.com/maps/documentation/javascript/ -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxEMrjG9nFykSuNp0wkW15BRn84rXn_j8" type="text/javascript"></script>

        <!-- http://google-maps-utility-library-v3.googlecode.com/svn/tags/markerwithlabel/1.1.10/ -->
        <script src="/js/markerwithlabel_packed.js"></script>

        <!-- http://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>
       
        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <!-- http://underscorejs.org/ -->
        <script src="/js/underscore-min.js"></script>

        <!-- app's own JavaScript -->
        <script src="/js/scripts.js"></script>

		<meta charset="UTF-8">

        <title>icelandic buses live</title>

    </head>
    <body>

        <!-- fill viewport -->
        <div class="container-fluid">

            <!-- https://developers.google.com/maps/documentation/javascript/tutorial -->
            <div id="map-canvas"></div>

         
            <div id="menu">
            <div id="top-left" onClick="clear_selection()"><span>clear selection</span></div>
            <div id="top-right" onClick="zwin()"><span>hide menu</span></div>
            <div  id="left">
                <div id="modul1" onClick="kolor(1)"><img src="../img/number_1.png">Hlemmur - Klukkuvellir</div>
                <div id="modul2" onClick="kolor(2)"><img src="../img/number_2.png">Hlemmur - Versalir</div>
                <div id="modul3" onClick="kolor(3)"><img src="../img/number_3.png">Hlemmur - Mjódd</div>
                <div id="modul4" onClick="kolor(4)"><img src="../img/number_4.png">Hlemmur - Mjódd</div>
                <div id="modul5" onClick="kolor(5)"><img src="../img/number_5.png">Nauthóll - Elliðabraut / Árvað</div>
                <div id="modul6" onClick="kolor(6)"><img src="../img/number_6.png">Hlemmur - Háholt</div>
                <div id="modul11" onClick="kolor(11)"><img src="../img/number_11.png">Nesvegur / Skerjabraut - Mjódd</div>
                <div id="modul12" onClick="kolor(12)"><img src="../img/number_12.png">Breiðhöfði / Ártún - Skeljanes</div>
                <div id="modul13" onClick="kolor(13)"><img src="../img/number_13.png">Sléttuvegur - Öldugrandi</div>
                <div id="modul14" onClick="kolor(14)"><img src="../img/number_14.png">Verzló - Grandi</div>
                <div id="modul15" onClick="kolor(15)"><img src="../img/number_15.png">Reykjavegur - Flyðrugrandi</div>
                <div id="modul16" onClick="kolor(16)"><img src="../img/number_16.png">Hlemmur - Árbær</div>
                <div id="modul17" onClick="kolor(17)"><img src="../img/number_17.png">Hlemmur - Berg</div>
                <div id="modul18" onClick="kolor(18)"><img src="../img/number_18.png">Hlemmur - Spöngin</div>
                <div id="modul21" onClick="kolor(21)"><img src="../img/number_21.png">Fjörður - Mjódd</div>
                <div id="modul22" onClick="kolor(22)"><img src="../img/number_22.png">Fjörður - Hraun</div>
                <div id="modul23" onClick="kolor(23)"><img src="../img/number_23.png">Ásgarður - Álftanes</div>
                <div id="modul24" onClick="kolor(24)"><img src="../img/number_24.png">Spöngin - Garðabær</div>
                <div id="modul26" onClick="kolor(26)"><img src="../img/number_26.png">Spöngin - Árbær</div>
                <div id="modul27" onClick="kolor(27)"><img src="../img/number_27.png">Háholt - Laxnes</div>
                <div id="modul28" onClick="kolor(28)"><img src="../img/number_28.png">Hamraborg - Mjódd</div>
                <div id="modul29" onClick="kolor(29)"><img src="../img/number_29.png">Háholt - Kjaralnes</div>
                <div id="modul31" onClick="kolor(31)"><img src="../img/number_31.png">Gufunesbær - Egilshöll</div>
                <div id="modul33" onClick="kolor(33)"><img src="../img/number_33.png">Fjörður - Ásar</div>
                <div id="modul34" onClick="kolor(34)"><img src="../img/number_34.png">Fjörður - Ásar</div>
                <div id="modul35" onClick="kolor(35)"><img src="../img/number_35.png">Hamraborg - Kársnes</div>
                <div id="modul43" onClick="kolor(43)"><img src="../img/number_43.png">Fjörður - Kaplakriki</div>
                <div id="modul44" onClick="kolor(44)"><img src="../img/number_44.png">Fjörður - Vörðutorg</div>
            <br>
                    
            </div>
           
        </div>
        
        <div id="right_menu">
            <div id="top-left-right" onClick="zwin_alarmy()"><span>alarms</span></div>
            <div id="top-right-right" onClick="zwin_alarmy()"><span>show menu</span></div>
            <div id="form">
               <iframe src="form.php" scrolling="no"></iframe>               
            </div>
            
            
        </div>
        
        
        </div>
        
        <div id="alarm"><h1>A L A R M</h1><br><br>
        <p></p>
        
        <div id="exs" onClick="close_alarm()">X</div>
        <div id="alarm-sound">
            
            
            
        </div>
        
        
        </div>
        <!-- Start of StatCounter Code for Default Guide -->
		<script type="text/javascript">
        var sc_project=11064971; 
        var sc_invisible=1; 
        var sc_security="ae0401f6"; 
        var scJsHost = (("https:" == document.location.protocol) ?
        "https://secure." : "http://www.");
        document.write("<sc"+"ript type='text/javascript' src='" +
        scJsHost+
        "statcounter.com/counter/counter.js'></"+"script>");
        </script>
        <noscript><div class="statcounter"><a title="web stats"
        href="http://statcounter.com/" target="_blank"><img
        class="statcounter"
        src="//c.statcounter.com/11064971/0/ae0401f6/1/" alt="web
        stats"></a></div></noscript>
        <!-- End of StatCounter Code for Default Guide -->
        
    </body>
</html>