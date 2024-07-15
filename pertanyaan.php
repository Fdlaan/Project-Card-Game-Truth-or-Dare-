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
                                            <a href="#" class="btn btn-outline-danger btn-sm delete-btn"><i class="bi bi-trash"></i></a>
                                            <a href="#" class="btn btn-outline-primary btn-sm edit-btn"><i class="bi bi-pencil-square"></i></a>
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
            <div class="col-md-6">
                <div class="container">
                    <div class="tambah d-flex justify-content-between align-items-center mb-3">
                        <h3>Dare</h3>
                        <a href="tambah_tantangan.php" data-bs-toggle="modal" data-bs-target="#addDareModal"><i class="bi bi-plus-circle"></i></a>
                    </div>
                    <?php
                    include 'db.php';
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
                                            <a href="#" class="btn btn-outline-danger btn-sm delete-btn"><i class="bi bi-trash"></i></a>
                                            <a href="#" class="btn btn-outline-primary btn-sm edit-btn"><i class="bi bi-pencil-square"></i></a>
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

    <div class="next text-end mt-4">
        <a href="spin wheel.php" class="btn btn-primary">
            NEXT
        </a>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Pertanyaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editQuestion" class="form-label">Pertanyaan</label>
                            <input type="text" class="form-control" id="editQuestion" name="question" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveEdit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addTruthModal" tabindex="-1" aria-labelledby="addTruthModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTruthModalLabel">Tambah Pertanyaan Truth</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="tambah_pertanyaan.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="truthQuestion" class="form-label">Pertanyaan</label>
                            <input type="text" class="form-control" id="truthQuestion" name="question" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addDareModal" tabindex="-1" aria-labelledby="addDareModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDareModalLabel">Tambah Tantangan Dare</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="tambah_tantangan.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="dareText" class="form-label">Tantangan</label>
                            <input type="text" class="form-control" id="dareText" name="dare_text" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var editButtons = document.querySelectorAll('.edit-btn');
        var deleteButtons = document.querySelectorAll('.delete-btn');
        var editModal = new bootstrap.Modal(document.getElementById('editModal'));
        var editQuestionInput = document.getElementById('editQuestion');
        var saveEditButton = document.getElementById('saveEdit');
        var currentCard;

        editButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                var card = event.target.closest('.card');
                currentCard = card;
                var question = card.dataset.question;
                editQuestionInput.value = question;
                editModal.show();
            });
        });

        saveEditButton.addEventListener('click', function () {
            var newQuestion = editQuestionInput.value;
            currentCard.querySelector('.card-text').innerText = newQuestion;
            currentCard.dataset.question = newQuestion;
            editModal.hide();
        });

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                if (confirm('Yakin ingin menghapus?')){
                    var card = event.target.closest('.card');
                    card.remove();
                }
            });
        });

        // Menangani penambahan pertanyaan Truth
        document.getElementById('addTruthForm').addEventListener('submit', function (event) {
            event.preventDefault();
            var question = document.getElementById('truthQuestion').value;
            addQuestion('truth', question);
            document.getElementById('addTruthForm').reset();
            var addTruthModal = bootstrap.Modal.getInstance(document.getElementById('addTruthModal'));
            addTruthModal.hide();
        });

        // Menangani penambahan tantangan Dare
        document.getElementById('addDareForm').addEventListener('submit', function (event) {
            event.preventDefault();
            var question = document.getElementById('dareText').value;
            addQuestion('dare', question);
            document.getElementById('addDareForm').reset();
            var addDareModal = bootstrap.Modal.getInstance(document.getElementById('addDareModal'));
            addDareModal.hide();
        });

        function addQuestion(type, question) {
            var containerId = type === 'truth' ? 'truth-list' : 'dare-list';
            var container = document.getElementById(containerId);

            var cardHtml = `
                <div class="mb-3">
                    <div class="card text-bg-light custom-card" data-type="${type}" data-question="${question}">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            ${type.charAt(0).toUpperCase() + type.slice(1)}
                            <div class="edit-apus">
                                <a href="#" class="btn btn-outline-danger btn-sm delete-btn"><i class="bi bi-trash"></i></a>
                                <a href="#" class="btn btn-outline-primary btn-sm edit-btn"><i class="bi bi-pencil-square"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">${question}</p>
                        </div>
                    </div>
                </div>`;

            container.insertAdjacentHTML('beforeend', cardHtml);

            // Tambahkan event listener untuk tombol edit dan delete baru
            var newCard = container.lastElementChild;
            newCard.querySelector('.edit-btn').addEventListener('click', function (event) {
                var card = event.target.closest('.card');
                currentCard = card;
                var question = card.dataset.question;
                editQuestionInput.value = question;
                editModal.show();
            });
            newCard.querySelector('.delete-btn').addEventListener('click', function (event) {
                if (confirm('Yakin ingin menghapus?')){
                    var card = event.target.closest('.card');
                    card.remove();
                }
            });
        }
    });
</script>

</body>

</html>
