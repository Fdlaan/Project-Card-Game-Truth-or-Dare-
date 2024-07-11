<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
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
                    <div class="embed-responsive embed-responsive-16by9" style="max-width: 350px;">
                        <video class="embed-responsive-item w-100" controls autoplay muted>
                            <source src="assets/bandicam 2024-07-11 15-52-56-397.mp4" type="video/mp4">
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
