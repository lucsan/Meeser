# Creates the php micro web server
# http://php.net/manual/en/features.commandline.webserver.php

param (
    [string]$port = 8000,
    [switch]$background = $False
)

function background {
    start-process php -ArgumentList '-S',"localhost:$port routes.php"
}

function inProcess {
    php -S localhost:$port routes.php
}

if ($background -eq $True) {
    background
} else {
    inProcess
}
