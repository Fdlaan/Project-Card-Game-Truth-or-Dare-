<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);

    // Query untuk menghapus data dari database
    $sql = "DELETE FROM dare_challenges WHERE id='$id'";

    // Eksekusi query dan cek apakah berhasil
    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, arahkan kembali ke dare.php
        header("Location: pertanyaan.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID tidak ditemukan";
}
?>
