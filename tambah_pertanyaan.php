<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['question']) && !empty($_POST['question'])) {
        $question = $_POST['question'];

        // Menggunakan prepared statement untuk menghindari SQL injection
        $sql = "INSERT INTO questions (question) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $question);

        if ($stmt->execute()) {
            header("Location: pertanyaan.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Pertanyaan tidak boleh kosong.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pertanyaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Pertanyaan</h2>
        <form method="post" action="tambah_pertanyaan.php">
            <div class="mb-3">
                <label for="question" class="form-label">Pertanyaan</label>
                <textarea class="form-control" id="question" name="question" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
