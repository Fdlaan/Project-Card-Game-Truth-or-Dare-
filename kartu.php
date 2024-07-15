<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu</title>
    <link rel="icon" href="assets/TOD-removebg-preview.png">
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
            background-image: url(assets/6.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .kartu {
            position: relative;
            font-weight: bold;
            flex-direction: column;
            text-align: center;
            border-radius: 6px;
            overflow: auto;
        }

        h1 {
            font-weight: bold;
            color: white;
            margin-top: 10px;
            font-size: 92px;
        }

        a {
            max-width: fit-content;
            margin: 55px;
        }

        .flexcard {
            display: flex;
            flex-direction: row;
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

        @media screen and (max-width: 1066px) {

            .flex-container {
                flex-direction: column;
                display: flex;
                justify-content: center;
                text-align: center;
            }

            .flexcard {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax());
                flex-direction: column;
                justify-items: center;
            }

        }
    </style>
</head>

<body>

    <div class="flex-container">

        <div class="kartu">
            <h1>PILIH KARTU</h1>
        </div>

        <div class="flexcard">
            <a href="pertanyaan.php?image=Pink2.png">
                <div class="card text-bg-dark">
                    <img src="assets/Pink.png" class="card-img" alt="Cover Kartu 1">
                    <div class="card-img-overlay">
                    </div>
                </div>
            </a>

            <a href="pertanyaan.php?image=3.png">
                <div class="card text-bg-dark">
                    <img src="assets/2.png" class="card-img" alt="Cover Kartu 1">
                    <div class="card-img-overlay">
                    </div>
                </div>
            </a>
        </div>
    </div>

</body>

</html>