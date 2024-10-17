<?php
require 'functions.php';

// Ambil semua jadwal untuk setiap hari
$hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelajaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Jadwal Pelajaran</h1>
        <?php foreach ($hari as $day): ?>
            <div class="day-schedule">
                <h2><?php echo $day; ?></h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Waktu</th>
                            <th>Mata Pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $jadwal = getJadwalByHari($day);
                        if (empty($jadwal)) {
                            echo '<tr><td colspan="4">Tidak ada jadwal.</td></tr>';
                        } else {
                            foreach ($jadwal as $index => $item):
                                $no = $index + 1; // Nomor urut
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $item['waktu']; ?></td>
                                <td><?php echo $item['mata_pelajaran']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $item['id']; ?>" class="btn">Edit</a>
                                    <a href="delete.php?id=<?php echo $item['id']; ?>" class="btn delete">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; } ?>
                    </tbody>
                </table>

                <form action="add.php" method="POST" class="add-form">
                    <input type="hidden" name="hari" value="<?php echo $day; ?>">
                    <input type="text" name="waktu" placeholder="Waktu" required autocomplete="off">
                    <input type="text" name="mata_pelajaran" placeholder="Mata Pelajaran" autocomplete="off" required>
                    <button type="submit" class="btn">Tambah</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
