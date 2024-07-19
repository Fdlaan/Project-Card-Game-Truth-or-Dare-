<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dareText = $_POST['dare_text'];

    // Menggunakan prepared statements untuk keamanan
    $stmt = $conn->prepare("INSERT INTO dare_challenges (dare_text) VALUES (?)");
    $stmt->bind_param("s", $dareText);

    if ($stmt->execute() === TRUE) {
        header("Location: pertanyaan.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tantangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Tantangan</h2>
        <form method="post" action="tambah_tantangan.php">
            <div class="mb-3">
                <label for="dare_text" class="form-label">Tantangan</label>
                <textarea class="form-control" id="dare_text" name="dare_text" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
