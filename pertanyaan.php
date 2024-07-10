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
    <title>Daftar Pertanyaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
        rel="stylesheet">
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
            <a class="navbar-brand">Daftar Pertanyaan</a>
            <div class="tambah">
                <a href="tambah_pertanyaan.php"><i class="bi bi-plus-circle"></i></a>
            </div>
        </div>
    </nav>

    <div class="tod">
        <a href="#" class="btn btn-truth active">Truth</a>
        <a href="dare.php" class="btn btn-dare">Dare</a>
    </div>

    <div class="container mt-5">
        
        
        <div class="row">
            <?php
            include 'db.php';
            $sql = "SELECT id, question FROM questions";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-4 mb-3">
                        <div class="card text-bg-light custom-card">
                            <div class="card-header">Truth
                                <div class="edit-apus">
                                    <a href="hapus_pertanyaan.php?id=' . $row['id'] . '" class="btn btn-outline-danger btn-sm" onclick="return confirm(\'Yakin Ingin Menghapus?\')"><i class="bi bi-trash"></i></a>
                                    <a href="edit_question.php?id=' . $row['id'] . '" class="btn btn-outline-primary btn-sm" onclick="return confirm(\'Yakin ingin mengedit?\')"><i class="bi bi-pencil-square"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">' . htmlspecialchars($row['question']) . '</p>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo "No questions found";
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
