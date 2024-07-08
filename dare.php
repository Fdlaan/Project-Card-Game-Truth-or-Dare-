<?php
session_start();
if (isset($_GET['image'])) {
    $_SESSION['background_image'] = htmlspecialchars($_GET['image']);
}
$image = isset($_SESSION['background_image']) ? $_SESSION['background_image'] : 'bg1.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tantangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_pertanyaan.css">
    <style>
        body {
            background-image: url('assets/<?php echo $image; ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="kembali">
                <a href="kartu.php"><i class="bi bi-arrow-left-circle"></i></a>
            </div>
            <a class="navbar-brand">DAFTAR TANTANGAN</a>
        </div>
    </nav>

    <div class="tod">
        <a href="pertanyaan.php" class="btn btn-truth">Truth</a>
        <a href="#" class="btn btn-dare active">Dare</a>
    </div>

    <div class="container mt-5">
        <a href="tambah_tantangan.php"><i class="bi bi-plus-circle"></i></a>
        <div class="row">
            <?php
            include 'db.php';
            $sql = "SELECT id, dare_text FROM dare_challenges";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-4 mb-3">
                        <div class="card text-bg-light custom-card">
                            <div class="card-header">Dare</div>
                            <div class="card-body">
                                <p class="card-text">' . htmlspecialchars($row['dare_text']) . '</p>
                                <a href=".php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a>
                                <a href="delete_dare.php?id=' . $row['id'] . '" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "No challenges found";
            }
            ?>
        </div>
    </div>

    <div class="next text-end mt-4">
        <a href="spin wheel.php" class="btn btn-primary">
            NEXT
        </a>
    </div>
</body>
</html>
