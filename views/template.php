<?php // AceArmory (c) 2015 by Siarkowy. All rights reserved. See LICENSE for licensing info. ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= isset($sheet) ? $sheet . ' · ' : '' ?>AceArmory</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="description" content="Simple Armory script to store and compare characters.">
        <meta name="keywords" content="AceArmory, Siarkowy, WoW">
        <meta name="copyright" content="Copyright © 2015 Siarkowy">
        <meta name="author" content="Siarkowy">
        <meta name="email" content="siarkowy@siarkowy.net">

        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="./style.css">

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    </head>
    <body>
        <div id="header">
            <div class="container">
                <div class="page-header">
                    <h1><?= $title ?> <small>AceArmory</small></h1>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="container">
<?php include($view) ?>
            </div>
        </div>

        <div id="footer">
            <div class="container">
                <p><a href="https://github.com/Siarkowy/AceArmory">AceArmory</a> &copy; 2015 by <a href="//siarkowy.net">Siarkowy</a> &bull; All rights reserved</p>
            </div>
        </div>

        <script src="./bootstrap/js/bootstrap.min.js"></script>
   </body>
</html>
