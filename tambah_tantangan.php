<?php
include 'db.php'; // Pastikan file ini mengatur koneksi ke database dengan benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $dare_text = $conn->real_escape_string($_POST['dare_challenges']); // Ambil data dari form dan sanitasi

    // Query untuk memasukkan data baru ke database
    $sql = "INSERT INTO dare_challenges (dare_text) VALUES ('$dare_text')";

    // Eksekusi query dan cek apakah berhasil
    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, arahkan kembali ke dare.php
        header("Location: dare.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
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
