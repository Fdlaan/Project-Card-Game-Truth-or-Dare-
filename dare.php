<?php
    session_start();
    if (isset($_GET['image'])) {
        $_SESSION['background_image'] = htmlspecialchars($_GET['image']);
    }

    $image = isset($_SESSION['background_image']) ? $_SESSION['background_image'] : 'default.png';
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pertanyaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            <a class="navbar-brand" href="#">DAFTAR TANTANGAN</a>
            <div class="tod">
                <a href="pertanyaan.php" class="btn btn-light">Truth</a>
                <a href="#" class="btn btn-light">Dare</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">Buat suara bebek, tiap 1 menit sekali selama 10 menit</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">Selfie dengan hewan apapun yang ada di sekitarmu, kemudian upload di sosmed!.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">Ganti foto profil kamu dengan pemain yang berada duduk di sebelahmu!.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">ajak 3 orang berkenalan yang tidak kamu kenal yang berada di sekitarmu!.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">bicara hanya menggunakan huruf o selama 10 menit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">Joget tiktok dengan lagu/trend yang lagi viral.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">tetap dalam posisi berdiri sampai melewati giliran 5 orang pemain</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">ambil beras 1 sendok makan lalu hitung jumlah butirnya dalam waktu 3 menit</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">dalam waktu 30 detik, menangislah sampai bisa mengeluarkan air mata</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">ganti foto profil WA kamu dengan foto pemain yang duduk di sebelah kiri kamu! (pertakankan selama 24 jam)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">stel lagu dangdut, lalu joget sampai melewati giliran 3 pemain</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">gambar LOVE di jidat kamu menggunakan lipstik atau spidol, dan jangan di hapus sampai permainan berakhir</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">Tiru salah satu foto yang ada di media sosialmu secara acak</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">ambil salah satu foto pemain, dan jadikan story IG/WA dengan caption 'kesayanganku'!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">genggam tangan pemain lain yang ada di sebelah kananmu sampai melewati giliran 3 pemain</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">cari lalu selfie dengan benda apapun yang berwarna ungu yang berada di sekitarmu (waktunya hanya 30 detik, lalu upload di sosmed kamu)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">ajak tos 3 orang yang tidak kamu kenal yang berada di sekitarmu!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">pasang status WA dengan lirik lagu kangen band yang berjudul pujaan hati (bagian reff nya saja)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">sebutkan 5 penyanyi indonesia yang namanya berawalan dari huruf A (waktunya hanya 15 detik)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">Lari di tempat sampai melewati giliran 3 pemain </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light">
                    <div class="card-header">Dare</div>
                    <div class="card-body">
                        <p class="card-text">Stand  up comedy di depan pemain lain sampai ada yang tertawa</p>
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
