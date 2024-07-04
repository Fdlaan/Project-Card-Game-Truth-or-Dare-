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
            <a class="navbar-brand">DAFTAR KEJUJURAN</a>
        </div>
    </nav>

    <div class="tod">
        <a href="#" class="btn btn-truth active">Truth</a>
        <a href="dare.php" class="btn btn-dare">Dare</a>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Ceritakan pengalaman memalukan yang tidak bisa kamu lupakan?</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Jika kamu menemukan uang 100JT di jalan, apa yang kamu lakukan?</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Sebutkan cinta pertamamu!!</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Sebutkan 3 hal yang membuat kamu mudah emosi?</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Ceritakan kejadian paling horor, mistis yang perah kamu alami</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Tunjuk 1 permainan yang  menurutmu lebih cantik/ganteng dari kamu!</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Jika kamu bisa pergi nge-date dengan artis idolamu, siapa artis yang akan kamu pilih?</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Ceritakan mimpi yang paling aneh dan konyol yang pernah kamu alami</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Ceritakan pengalaman paling memalukan yang tidak bisa kamu lupakan sampai sekarang!</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Sebutkan nama cinta monyet pertamamu!</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Kira-kira berapa lama kamu mampu bertahan tanpa memegang ponsel?</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Sebutkan 5 tipe ideal untuk menjadi pasanganmu!</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Ceritakan moment lucu masa kecil kamu yang tidak bisa kamu lupakan!</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Sebutkan 5 hal yang membuat kamu takut!</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Sebutkan negara yang ingin kamu kunjungi jika punya banyak uang!</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Ceritakan moment paling bahagia yang membuat kamu ingin mengulangnya</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Apakah kamu pernah merasa insecure?, saat apakah itu?</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Jika kamu bisa kembali ke masa lalu, apa yang ingin kamu perbaiki?</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Dari semua pemain tunjuk 1 orang yang menurut kamu paling gabisa jaga rahasia!</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Mana yang membuat kamu paling sedih? dibohongi atau ditinggalkan?</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card text-bg-light custom-card">
                    <div class="card-header">Truth</div>
                    <div class="card-body">
                        <p class="card-text">Kalau kamu tiba tiba bisa menghilang, apakah hal pertama yang akan kamu lakukan?</p>
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