<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        updateJadwal($_POST['id'], $_POST['waktu'], $_POST['mata_pelajaran']);
        header('Location: index.php');
        exit();
    }
}

// Mengambil ID dari parameter URL dan mendapatkan data jadwal
$jadwal = getJadwalById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal</title>
    <link rel="stylesheet" href="../jadwal-pelajaran/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Jadwal</h1>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($jadwal['id']); ?>">
            <div class="form-group">
                <label for="waktu">Waktu</label>
                <input type="text" id="waktu" name="waktu" placeholder="Masukkan waktu" value="<?php echo htmlspecialchars($jadwal['waktu']); ?>" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="mata_pelajaran">Mata Pelajaran</label>
                <input type="text" id="mata_pelajaran" name="mata_pelajaran" placeholder="Masukkan mata pelajaran" value="<?php echo htmlspecialchars($jadwal['mata_pelajaran']); ?>" required autocomplete="off">
            </div>
            <button type="submit" name="update" class="save-button">Update</button>
            <a href="index.php" class="btn delete">Kembali</a>
        </form>
    </div>
</body>
</html>
