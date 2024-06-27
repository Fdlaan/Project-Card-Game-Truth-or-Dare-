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
            min-height: 100vh;
            font-size: 2vw;
        }

        body {
            display: flex;
            background: white;
            text-align: center;
            width: 100%;
            height: 100%;
        }

        h1 {
            position: relative;
            display: flex;
            font-weight: bold;
            padding-top: 25px;
            margin-bottom: 15px;
        }

        a {
            position: relative;
            width: 20vw;
            top: 20vh;
            left: -7vw;
            margin: 55px;
            float: left;
        }

        img {
            border: 3px solid black;
            box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
        }

        nav {
            position: relative;
            float: left;
            width: fit-content;
            height: 10vh;
            left: 35vw;
        }
    </style>
</head>

<body>

    <nav>
        <h1 style="margin-top: 15px">PILIH KARTU</h1>
    </nav>

    <a href="pertanyaan.php">
        <div class="card text-bg-dark">
            <img src="assets/1.png" class="card-img" alt="Cover Kartu 1">
            <div class="card-img-overlay">
            </div>
        </div>
    </a>

    <a href="pertanyaan.php">
        <div class="card text-bg-dark">
            <img src="assets/langit1.png" class="card-img" alt="Cover Kartu 1">
            <div class="card-img-overlay">
            </div>
        </div>
    </a>

</body>

</html>