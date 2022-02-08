<?php

require __DIR__ . "/Config.php";
require __DIR__ . "/class/PDOconnect.php";

$connetion = PDOconnect::connect();

var_dump($connetion);
