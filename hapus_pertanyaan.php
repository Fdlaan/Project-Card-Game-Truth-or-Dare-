<?php
// Koneksi ke database
include 'db.php'; // Sesuaikan dengan file koneksi Anda

// Tangkap parameter id dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query SQL untuk menghapus pertanyaan berdasarkan id
    $sql = "DELETE FROM questions WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    // Redirect kembali ke halaman pertanyaan setelah berhasil menghapus
    header('Location: pertanyaan.php');
    exit();
} else {
    // Jika tidak ada id yang diterima, tampilkan pesan error atau arahkan ke halaman error
    echo "Gagal menghapus pertanyaan. Silakan coba lagi.";
}
