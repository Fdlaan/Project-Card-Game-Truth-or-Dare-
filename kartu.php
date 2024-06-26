<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            display: flex;
            background: white;
            text-align: center;
        }

        .kartu {
            position: absolute;
            top: 350px;
            right: 800px
        }

        h1 {
            position: absolute;
            top: 10%;
            left: 45%;
            font-weight: bold;
            margin-bottom: 15px;
        }

        a {
            position: absolute;
            bottom: 50px;
            right: 25px;
            width: 200px;
            height: 100px;
        }

        .next p {
            position: absolute;
            font-size: 40px;
            bottom: 5px;
            right: 45px;
        }
    </style>
</head>

<body>

    <nav>
        <h1 style="margin-top: 15px">Pilih Kartu !</h1>
    </nav>

    <div class="kartu">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="next">
        <a href="pertanyaan.php" class="btn btn-primary">
            <p>NEXT</p>
        </a>
    </div>

</body>

</html>