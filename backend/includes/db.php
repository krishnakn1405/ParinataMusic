<?php

if (!defined('SITE')) {
    die();
}

session_start();
$connect = mysqli_connect('localhost', 'root', '', 'parinata_music');
