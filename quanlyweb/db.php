<?php
$link = @mysqli_connect('localhost', 'root', '', 'noithatdanahome');

if (!$link) {
    die('Not connected: ' . mysqli_connect_error());
}

// make 'shoeshop' the current db
$db_selected = @mysqli_select_db($link, 'noithatdanahome');

if (!$db_selected) {
    die('Can\'t use noithatdanahome:' . mysqli_error($link));
}

@mysqli_query($link, 'SET NAMES "UTF8"');
