<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];
    $mata_pelajaran = $_POST['mata_pelajaran'];

    addJadwal($hari, $waktu, $mata_pelajaran);
    header('Location: index.php');
    exit();
}
?>
