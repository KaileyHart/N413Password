<?php
                	
        // $dbhost = 'localhost'; //XAMPP is 'localhost:3306'
        // $dbuser = 'kalyhart';
        // $dbpwd  = 'silurian remounts loosed nark'; //XAMPP password is ''
        // $dbname = 'kalyhart_db';
        // $link = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname);
        // if (!$link) { die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error()); }

        $dbhost = 'localhost:3306'; //XAMPP is 'localhost:3306'
        $dbuser = 'root';
        $dbpwd  = ''; //XAMPP password is ''
        $dbname = 'n413_list';
        $link = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname);
        if (!$link) { die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error()); }
?>