<?php
require 'db.php';

// Ambil semua jadwal berdasarkan hari
function getJadwalByHari($hari) {
    $db = connectDB();
    $stmt = $db->prepare('SELECT * FROM jadwal WHERE hari = :hari ORDER BY waktu');
    $stmt->bindValue(':hari', $hari, SQLITE3_TEXT);
    $result = $stmt->execute();

    $jadwal = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $jadwal[] = $row;
    }
    return $jadwal;
}

// Tambah jadwal
function addJadwal($hari, $waktu, $mata_pelajaran) {
    $db = connectDB();
    $stmt = $db->prepare('INSERT INTO jadwal (hari, waktu, mata_pelajaran) VALUES (:hari, :waktu, :mata_pelajaran)');
    $stmt->bindValue(':hari', $hari, SQLITE3_TEXT);
    $stmt->bindValue(':waktu', $waktu, SQLITE3_TEXT);
    $stmt->bindValue(':mata_pelajaran', $mata_pelajaran, SQLITE3_TEXT);
    return $stmt->execute();
}

// Hapus jadwal
function deleteJadwal($id) {
    $db = connectDB();
    $stmt = $db->prepare('DELETE FROM jadwal WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    return $stmt->execute();
}

// Ambil jadwal berdasarkan ID
function getJadwalById($id) {
    $db = connectDB();
    $stmt = $db->prepare('SELECT * FROM jadwal WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    return $stmt->execute()->fetchArray(SQLITE3_ASSOC);
}

// Update jadwal
function updateJadwal($id, $waktu, $mata_pelajaran) {
    $db = connectDB();
    $stmt = $db->prepare('UPDATE jadwal SET waktu = :waktu, mata_pelajaran = :mata_pelajaran WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->bindValue(':waktu', $waktu, SQLITE3_TEXT);
    $stmt->bindValue(':mata_pelajaran', $mata_pelajaran, SQLITE3_TEXT);
    return $stmt->execute();
}
?>
