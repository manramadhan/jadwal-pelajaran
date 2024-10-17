<?php
define('DB_PATH', __DIR__ . '/jadwal.db');

function connectDB() {
    try {
        $db = new SQLite3(DB_PATH);
        
        // Jika tabel belum ada, buat tabel jadwal
        $db->query ("CREATE TABLE IF NOT EXISTS jadwal (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            hari TEXT NOT NULL,
            waktu TEXT NOT NULL,
            mata_pelajaran TEXT NOT NULL
        )");

        return $db;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}
?>
