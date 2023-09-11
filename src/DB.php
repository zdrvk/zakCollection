<?php

$db = new PDO('mysql:host=db; dbname=gamecollection', 'root', 'password');
// This line is telling PDO to give me the results as ASSOC arrays
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
