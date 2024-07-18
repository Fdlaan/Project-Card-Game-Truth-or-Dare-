<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="assets/TOD-removebg-preview.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <img src="assets/title.png" alt="gambar title">

    <div class="button">
        <form action="kartu.php">
            <button onclick="window.location.href = 'kartu.php';" type="button" class="btn btn-primary btn-lg"><p>START GAME</p></button>
        </form>
    </div>

    <!-- POP UP Tutorial -->
    <div class="modal fade" id="tutorialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tutorial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Selamat datang di game Truth Or Dare</p>
                    <li>Langkah 1</li>
                    <div class="embed-responsive embed-responsive-16by9" style="max-width: 400px; max-height: 400px">
                        <video class="embed-responsive-item w-100" controls autoplay muted>
                            <source src="assets/lv_0_20240715171403.mp4" type="video/mp4">
                        </video>
                    </div>
                    <li>Langkah 2</li>
                    <div class="embed-responsive embed-responsive-16by9" style="max-width: 400px; max-height: 400px">
                        <video class="embed-responsive-item w-100" controls autoplay muted>
                            <source src="assets/pilih kartu 17.mp4" type="video/mp4">
                        </video>
                    </div>
                    <li>Langkah 3</li>
                    <div class="embed-responsive embed-responsive-16by9" style="max-width: 400px; max-height: 400px">
                        <video class="embed-responsive-item w-100" controls autoplay muted>
                            <source src="assets/lv_0_20240715171403.mp4" type="video/mp4">
                        </video>
                </div>
                    <li>Langkah 4</li>
                    <div class="embed-responsive embed-responsive-16by9" style="max-width: 400px; max-height: 400px">
                        <video class="embed-responsive-item w-100" controls autoplay muted>
                            <source src="assets/lv_0_20240715171403.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-lg" data-bs-dismiss="modal" onclick="window.location.href = 'kartu.php'">Start Game</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        window.onload = function() {
            var myModal = new bootstrap.Modal(document.getElementById('tutorialModal'), {});
            myModal.show();
        };
    </script>
</body>
</html>
