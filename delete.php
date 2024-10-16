<?php
require 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteJadwal($id);
    header('Location: index.php');
    exit();
}
?>
