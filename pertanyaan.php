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
    <link rel="icon" href="assets/TOD-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_pertanyaan.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('assets/<?php echo $image; ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            padding: 20px;
            font-family: 'Montserrat', sans-serif;
        }

        .tambah a {
            color: #000000;
            font-size: 2.25rem;
            transition: transform 0.2s ease-in-out;
        }

        .tambah a:hover {
            color: #2ca889;
            transform: scale(1.2);
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .modal .modal-dialog {
            max-width: 80%;
            transition: transform 0.3s ease-out;
        }

        .modal.fade .modal-dialog {
            transform: translateY(-100px);
        }

        .modal-title {
            font-weight: 600;
        }

        .edit-apus a {
            margin-left: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
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
        </div>
    </nav>

    <div class="container mt-5 custom-scrollbar">
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <div class="tambah d-flex justify-content-between align-items-center mb-3">
                        <h3>Truth</h3>
                        <a href="tambah_pertanyaan.php" data-bs-toggle="modal" data-bs-target="#addTruthModal"><i class="bi bi-plus-circle"></i></a>
                    </div>
                    <div id="truth-list">
                        <?php
                        include 'db.php';
                        $sql = "SELECT id, question FROM questions WHERE type = 'truth'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                <div class="mb-3">
                                    <div class="card text-bg-light custom-card" data-id="' . $row['id'] . '" data-type="truth" data-question="' . htmlspecialchars($row['question']) . '">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            Truth
                                            <div class="edit-apus">
                                                <a href="hapus_pertanyaan.php?id=' . $row['id'] . '" class="btn btn-outline-danger btn-sm delete-btn" onclick="return confirm(\'Yakin Ingin Menghapus?\')"><i class="bi bi-trash"></i></a>
                                                <a href="edit_question.php?id=' . $row['id'] . '" class="btn btn-outline-primary btn-sm edit-btn"><i class="bi bi-pencil-square"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">' . htmlspecialchars($row['question']) . '</p>
                                        </div>
                                    </div>
                                </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <div class="tambah d-flex justify-content-between align-items-center mb-3">
                        <h3>Dare</h3>
                        <a href="tambah_tantangan.php" data-bs-toggle="modal" data-bs-target="#addDareModal"><i class="bi bi-plus-circle"></i></a>
                    </div>
                    <div id="dare-list">
                        <?php
                        $sql = "SELECT id, dare_text FROM dare_challenges";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                <div class="mb-3">
                                    <div class="card text-bg-light custom-card" data-id="' . $row['id'] . '" data-type="dare" data-question="' . htmlspecialchars($row['dare_text']) . '">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            Dare
                                            <div class="edit-apus">
                                                <a href="delete_dare.php?id=' . $row['id'] . '" class="btn btn-outline-danger btn-sm delete-btn" onclick="return confirm(\'Yakin Ingin Menghapus?\')"><i class="bi bi-trash"></i></a>
                                                <a href="edit_dare.php?id=' . $row['id'] . '" class="btn btn-outline-primary btn-sm edit-btn"><i class="bi bi-pencil-square"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">' . htmlspecialchars($row['dare_text']) . '</p>
                                        </div>
                                    </div>
                                </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="next text-end mt-4">
        <a href="spin wheel.php" class="btn btn-primary">
            NEXT
        </a>
    </div>
</body>

</html>
