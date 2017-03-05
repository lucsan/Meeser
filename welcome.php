<?php

include 'tools/Htmlize.php';
$readme = htmlizeData(file_get_contents('readme'), 'left');

print '
<html>
    <head>
        <style>
            div {text-align: center; }
            div.left { text-align: left; }
        </style>
    </head>
    <body>
        <div style="">
            <img style="width: 64px;" src="/tools/lucsan_compass.png" />
        </div>
        <div style="font-size: larger; font-weight: bold; ">
            Welcome to mewebi
        </div>
        <div style="" >
            the micro php web server.
        </div>
        <div>
            <a href="/help/help">Help</a>
        </div>
        <div style="margin-top: 60px;">
            <div style="width: 400px; text-align: left; background: lightblue; ">';
            print $readme;
print '     </div>
        </div>
    </body>
</html>';
exit();
