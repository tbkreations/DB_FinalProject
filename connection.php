<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "password";
$dbName = "scholarship_db";

$dbCon = new mysqli($dbHost, $dbUser, $dbPass, $dbName) or die("connection failed");