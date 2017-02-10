<?php
$db = new PDO('mysql:host=localhost;dbname=bootcamp_bookface;charset=utf8', 'bootcamp', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);