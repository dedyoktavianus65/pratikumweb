<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch($page){
        case '':
        case 'dashboard':
            file_exists("dashboard.php") ? include "dashboard.php" : include "404.php";
            break;
        case 'dosen':
            file_exists("dosen.php") ? include "dosen.php" : include "404.php";
            break;
        case 'matakuliah':
            file_exists("matakuliah.php") ? include "matakuliah.php" : include "404.php";
            break;
        case 'tugas':
            file_exists("tugas.php") ? include "tugas.php" : include "404.php";
            break;
        default:
            include "404.php";
            break;
    }
} else {
    include "dashboard.php";
}
