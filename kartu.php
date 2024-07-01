<?php
    session_start();
?>




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
            background: linear-gradient(180deg, rgba(7, 5, 137, 0.75) 0%, rgba(28, 234, 248, 0.75) 100%);
            ;
        }

        .kartu {
            position: relative;
            font-weight: bold;
            flex-direction: column;
            background: linear-gradient(180deg, rgba(7, 5, 137, 0.75) 0%, rgba(28, 234, 248, 0.75) 100%);
            box-shadow: 0 2px 2px rgba(28, 234, 248, 0.75);
            overflow: auto;
        }

        h1 {
            position: relative;
            font-weight: bold;
            color: white;
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
            <a href="pertanyaan.php?image=1.png">
                <div class="card text-bg-dark">
                    <img src="assets/1.png" class="card-img" alt="Cover Kartu 1">
                    <div class="card-img-overlay">
                    </div>
                </div>
            </a>

            <a href="pertanyaan.php?image=langit1.png">
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
