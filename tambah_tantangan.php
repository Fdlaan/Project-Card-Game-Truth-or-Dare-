<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dareText = $_POST['dare_text'];


    $sql = "INSERT INTO dare_challenges (dare_text) VALUES ('$dareText')";

    if ($conn->query($sql) === TRUE) {
        header("Location: pertanyaan.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

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
                <label for="dare_challenges" class="form-label">Tantangan</label>
                <textarea class="form-control" id="dare_challenges" name="dare_challenges" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
