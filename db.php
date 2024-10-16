<?php
function connectDB() {
    try {
        $db_path = __DIR__ . '/jadwal.db';
        $db = new SQLite3($db_path);
        
        // Jika tabel belum ada, buat tabel jadwal
        $db->exec("CREATE TABLE IF NOT EXISTS jadwal (
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
