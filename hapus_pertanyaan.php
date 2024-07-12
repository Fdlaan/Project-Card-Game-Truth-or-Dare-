<?php

include 'db.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "DELETE FROM questions WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();


    header('Location: pertanyaan.php');
    exit();
} else {

    echo "Gagal menghapus pertanyaan. Silakan coba lagi.";
}
