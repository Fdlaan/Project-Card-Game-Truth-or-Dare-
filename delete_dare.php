<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);


    $sql = "DELETE FROM dare_challenges WHERE id='$id'";


    if ($conn->query($sql) === TRUE) {

        header("Location: pertanyaan.php");
        exit();
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID tidak ditemukan";
}
?>
