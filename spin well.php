<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spinning Wheel</title>
    <style>
        /* CSS untuk roda berputar */
        .wheel {
            width: 300px;
            height: 300px;
            border: 10px solid #333;
            border-radius: 50%;
            position: relative;
            margin: 50px auto;
        }

        .wheel .segment {
            width: 50%;
            height: 50%;
            position: absolute;
            top: 0;
            left: 50%;
            transform-origin: 0% 100%;
            border-right: 10px solid #333;
        }

        .pointer {
            width: 0;
            height: 0;
            border-left: 20px solid transparent;
            border-right: 20px solid transparent;
            border-bottom: 20px solid #333;
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
        }

        .spin-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="wheel">
        <!-- Segments of the wheel -->
        <div class="segment" style="background: red; transform: rotate(0deg);"></div>
        <div class="segment" style="background: blue; transform: rotate(60deg);"></div>
        <div class="segment" style="background: green; transform: rotate(120deg);"></div>
        <div class="segment" style="background: yellow; transform: rotate(180deg);"></div>
        <div class="segment" style="background: orange; transform: rotate(240deg);"></div>
        <div class="segment" style="background: purple; transform: rotate(300deg);"></div>
    </div>
    <div class="pointer"></div>
    <button class="spin-btn" onclick="spinWheel()">Spin</button>

    <script>
        function spinWheel() {
            const wheel = document.querySelector('.wheel');
            const degrees = Math.floor(Math.random() * 360) + 720; // Minimum 2 full rotations
            wheel.style.transition = 'transform 4s ease-out';
            wheel.style.transform = `rotate(${degrees}deg)`;
        }
    </script>
</body>
</html>
