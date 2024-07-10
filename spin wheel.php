<?php
session_start();
if (isset($_GET['image'])) {
  $_SESSION['background_image'] = htmlspecialchars($_GET['image']);
}
$image = isset($_SESSION['background_image']) ? $_SESSION['background_image'] : 'default.png';

include 'db.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$truthQuestions = [];
$dareChallenges = [];

$sql = "SELECT question FROM questions";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $truthQuestions[] = $row['question'];
  }
}

$sql = "SELECT dare_text FROM dare_challenges";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $dareChallenges[] = $row['dare_text'];
  }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Spinning Wheel</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      padding: 15px;
      background-image: url('assets/<?php echo $image; ?>');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .wheel-container {
      display: flex;
      flex-direction: row;
      align-items: flex-start;
      background: rgba(255, 255, 255, 0.35);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(3px);
      -webkit-backdrop-filter: blur(3px);
      border-radius: 10px;
      border: 1px solid rgba(255, 255, 255, 0.18);
      padding: 15px;
    }

    .controls-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-right: 20px;
    }

    button {
      margin-top: 20px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border: 1px solid black;
    }

    .input-container {
      display: flex;
      flex-direction: row;
      margin-bottom: 25px;
    }

    input {
      padding: 10px;
      font-size: 16px;
      border: 1px solid black;
    }

    .add-button {
      margin-left: 15px;
      margin-bottom: 10px;
      padding: 5px;
      font-size: 15px;
      cursor: pointer;
    }

    .modal {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border: 2px solid white;
    }

    .modal button {
      margin: 10px;
    }

    #scoreboard {
      font-family: Arial, Helvetica, sans-serif;
      border: 2px solid black;
      padding: 5px;
      border-radius: 10px;
      text-align: center;
      height: fit-content;
      margin-top: 20%;
      background: rgba(255, 255, 255, 0.8);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(3px);
      -webkit-backdrop-filter: blur(3px);
      border-radius: 10px;
    }

    a {
      text-decoration: none;
      font-weight: bold;
      color: #fff;
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 50px;
    }

    .back {
      position: absolute;
      top: 2px;
      left: 75px;
    }

    .input-container input {
      border-radius: 15px;
      height: 30px;
      background: rgba(255, 255, 255, 0.8);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      border-radius: 10px;
    }

    .input-container button {
      border-radius: 15px;
      font-weight: bold;
      width: max-content;
      height: 51px;
      margin-top: 0;
      margin-bottom: 0;
      padding: 10px;
      font-size: 15px;
      cursor: pointer;
      background: rgba(74, 144, 226);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      border-radius: 10px;
      color: white;
    }

    .wheel-container button {
      border-radius: 15px;
      width: 90px;
      font-weight: bold;
      background: rgba(74, 144, 226);
      color: white;
    }

    .modal {
      border-radius: 15px;
      width: 500px;
      background-image: url('assets/<?php echo $image; ?>');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .modal .selectedPlayer {
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
      background: rgba(255, 255, 255, 1);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      font-weight: bold;
      color: #000000;
    }

    .modal p {
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: bold;
      color: #000000;
      background: rgba(255, 255, 255, 1);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(4px);
      -webkit-backdrop-filter: blur(4px);
      border-radius: 10px;
      padding: 5px;
    }

    .modal button {
      border-radius: 15px;
      margin-inline: 43%;
    }

    .modal #okButton {
      margin-inline: 43%;
    }

    .modal .truthDareQuestion {
      display: none;
    }

    #spinButton {
      width: 100px;
    }

    @media screen and (max-width: 850px) {
      .wheel-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
      }

      #scoreboard {
        background-color: rgba(255, 255, 255, 0, 8);
        padding: 5px;
        border-radius: 10px;
        text-align: center;
        margin-top: 10px;
        margin-left: auto;
        margin-right: auto;
        height: fit-content;
      }
    }
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
    rel="stylesheet">
</head>

<body>
  <div class="wheel-container">
    <div class="controls-container">
      <div class="input-container">
        <input type="text" id="itemInput" placeholder="Masukkan nama anda!" />
        <button class="add-button" id="addButton">Tambah Pemain</button>
      </div>

      <canvas id="wheel" width="450" height="450"></canvas>
      <button id="spinButton">Spin!</button>
    </div>

    <div class="scoreboard" id="scoreboard">
      <h3>Scoreboard</h3>
      <div id="scores"></div>
    </div>
  </div>

  <div class="modal" id="modal">
    <p class="selectedPlayer" id="selectedPlayer"></p>
    <button id="truthButton">Truth</button>
    <button id="dareButton">Dare</button>
    <p class="truthDareQuestion" id="truthDareQuestion"></p>
    <button id="okButton" style="display:none;">OK</button>
  </div>

  <div class="back">
    <a href="pertanyaan.php"><i class="bi bi-arrow-left-circle"></i></a>
  </div>

  <script>
    const canvas = document.getElementById("wheel");
    const ctx = canvas.getContext("2d");
    const spinButton = document.getElementById("spinButton");
    const addButton = document.getElementById("addButton");
    const itemInput = document.getElementById("itemInput");
    const modal = document.getElementById("modal");
    const selectedPlayer = document.getElementById("selectedPlayer");
    const truthButton = document.getElementById("truthButton");
    const dareButton = document.getElementById("dareButton");
    const truthDareQuestion = document.getElementById("truthDareQuestion");
    const okButton = document.getElementById("okButton");
    const scoreboard = document.getElementById("scoreboard");
    const scoresDiv = document.getElementById("scores");
    const showScore = document.getElementById("showScore");

    let segments = [];
    const colors = [
      "#FF5733", "#33FF57", "#3357FF", "#F333FF",
      "#FF33A1", "#FF8633", "#33FFDA", "#8333FF",
    ];

    let startAngle = 0;
    let arc = 0;
    let spinTimeout = null;

    let spinAngleStart = 50; // Sudut putaran awal yang lebih besar
    let spinTime = 5;
    let spinTimeTotal = 2000; // Waktu putaran total yang lebih cepat

    const scores = {};

    const truthQuestions = <?php echo json_encode($truthQuestions); ?>;
    const dareChallenges = <?php echo json_encode($dareChallenges); ?>;

    const getRandomItem = (arr) => arr[Math.floor(Math.random() * arr.length)];

    const drawRouletteWheel = () => {
      ctx.clearRect(0, 0, canvas.width, canvas.height);

      if (segments.length === 0) {
        ctx.fillStyle = "#ddd";
        ctx.beginPath();
        ctx.arc(225, 225, 215, 0, 2 * Math.PI);
        ctx.fill();
      } else {
        arc = Math.PI / (segments.length / 2);

        segments.forEach((segment, i) => {
          const angle = startAngle + i * arc;
          ctx.fillStyle = colors[i % colors.length];
          ctx.beginPath();
          ctx.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2, angle, angle + arc, false);
          ctx.arc(canvas.width / 2, canvas.height / 2, 0, angle + arc, angle, true);
          ctx.stroke();
          ctx.fill();
          ctx.save();

          ctx.fillStyle = "white";
          ctx.translate(
            canvas.width / 2 + Math.cos(angle + arc / 2) * (canvas.width / 4),
            canvas.height / 2 + Math.sin(angle + arc / 2) * (canvas.height / 4)
          );
          ctx.rotate(angle + arc / 2 + Math.PI / 2);
          ctx.fillText(segment, -ctx.measureText(segment).width / 2, 0);
          ctx.restore();
        });
      }

      ctx.fillStyle = "black";
      ctx.beginPath();
      ctx.moveTo(225 - 4, 200 - (200 + 20));
      ctx.lineTo(225 + 4, 200 - (200 + 20));
      ctx.lineTo(225 + 4, 200 - (200 - 50));
      ctx.lineTo(225 + 9, 200 - (200 - 50));
      ctx.lineTo(225 + 0, 200 - (200 - 60));
      ctx.lineTo(225 - 9, 200 - (200 - 50));
      ctx.lineTo(225 - 4, 200 - (200 - 50));
      ctx.lineTo(225 - 4, 200 - (200 + 20));
      ctx.fill();
    };

    const spin = () => {
      spinAngleStart += Math.random() * 10 - 5;
      spinTime = 0;
      spinTimeTotal = Math.random() * 3000 + 2000;
      rotateWheel();
    };

    const rotateWheel = () => {
      spinTime += 30;

      if (spinTime >= spinTimeTotal) {
        stopRotateWheel();
        return;
      }

      const spinAngle = spinAngleStart - easeOut(spinTime, 0, spinAngleStart, spinTimeTotal);
      startAngle += (spinAngle * Math.PI) / 180;
      drawRouletteWheel();
      spinTimeout = setTimeout(rotateWheel, 30);
    };

    const stopRotateWheel = () => {
      clearTimeout(spinTimeout);
      const degrees = (startAngle * 180) / Math.PI + 90;
      const arcd = (arc * 180) / Math.PI;
      const index = Math.floor((degrees % 360) / arcd);
      modal.style.display = "block";
      selectedPlayer.textContent = `Player: ${segments[index]}`;
    };

    const easeOut = (t, b, c, d) => {
      const ts = (t /= d) * t;
      const tc = ts * t;
      return b + c * (tc + -3 * ts + 3 * t);
    };

    const closeModal = () => {
      modal.style.display = "none";
      truthDareQuestion.textContent = "";
      okButton.style.display = "none";
    };

    const handleTruthClick = () => {
      truthDareQuestion.textContent = `Truth: ${getRandomItem(truthQuestions)}`;
      truthButton.style.display = "none";
      dareButton.style.display = "none";
      okButton.style.display = "block";
      truthDareQuestion.style.display = "block"; // Ensure the question is displayed
    };

    const handleDareClick = () => {
      truthDareQuestion.textContent = `Dare: ${getRandomItem(dareChallenges)}`;
      truthButton.style.display = "none";
      dareButton.style.display = "none";
      okButton.style.display = "block";
      truthDareQuestion.style.display = "block"; // Ensure the question is displayed
    };

    const handleAddButtonClick = () => {
      const newPlayer = itemInput.value.trim();
      if (newPlayer) {
        segments.push(newPlayer);
        scores[newPlayer] = { truth: 0, dare: 0 };
        updateScores();
        itemInput.value = "";
        drawRouletteWheel();
      }
    };

    const updateScores = () => {
      scoresDiv.innerHTML = '';
      for (const player in scores) {
        const playerScore = scores[player];
        const scoreDiv = document.createElement('div');
        scoreDiv.classList.add('score');
        scoreDiv.innerHTML = `<strong>${player}:</strong> Truths: ${playerScore.truth}, Dares: ${playerScore.dare}`;
        scoresDiv.appendChild(scoreDiv);
      }
    };

    addButton.addEventListener("click", handleAddButtonClick);
    spinButton.addEventListener("click", spin);
    truthButton.addEventListener("click", handleTruthClick);
    dareButton.addEventListener("click", handleDareClick);
    okButton.addEventListener("click", () => {
      closeModal();
      truthButton.style.display = "block";
      dareButton.style.display = "block";
    });

    drawRouletteWheel();
  </script>
</body>

</html>