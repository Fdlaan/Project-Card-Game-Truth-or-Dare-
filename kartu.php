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
            font-size: 2vw;
        }

        body {
            background: white;
            background-image: url("assets/bg.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }

        .kartu {
            position: relative;
            font-weight: bold;
            flex-direction: column;
            background-color: mediumpurple;
            border: 2px solid black;
            overflow: auto;
        }

        h1 {
            position: relative;
            font-weight: bold;
        }

        a {
            max-width: 500px;
            margin: 55px;
        }

        .flexcard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax());
            justify-items: center;
        }

        img {
            border: 3px solid black;
            box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
        }

        .flex-container {
            flex-direction: column;
            display: flex;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="flex-container">

        <div class="kartu">
            <h1 style="margin-top: 15px">PILIH KARTU</h1>
        </div>

        <div class="flexcard">
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
        </div>
    </div>

</body>

</html>