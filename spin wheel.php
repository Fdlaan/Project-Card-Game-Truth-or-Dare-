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
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }
    .wheel-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    button {
      margin-top: 20px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }
    .input-container {
      margin-bottom: 20px;
      display: flex;
      flex-direction: row;
    }
    input {
      padding: 10px;
      font-size: 16px;
    }
    .add-button {
      margin-left: 10px;
      padding: 10px;
      font-size: 16px;
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
    }
    .modal button {
      margin: 10px;
    }
  </style>
</head>
<body>
  <div class="wheel-container">
    <div class="input-container">
      <input type="text" id="itemInput" placeholder="Tambahkan Pemain!" />
      <button class="add-button" id="addButton">Tambah Pemain</button>
    </div>
    <canvas id="wheel" width="500" height="500"></canvas>
    <button id="spinButton">Spin!</button>
  </div>
  <div class="modal" id="modal">
    <p id="selectedPlayer"></p>
    <button id="truthButton">Truth</button>
    <button id="dareButton">Dare</button>
    <p id="truthDareQuestion"></p>
    <button id="okButton" style="display:none;">OK</button>
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

    let segments = [];
    const colors = [
      "#FF5733", "#33FF57", "#3357FF", "#F333FF",
      "#FF33A1", "#FF8633", "#33FFDA", "#8333FF",
    ];

    let startAngle = 0;
    let arc = 0;
    let spinTimeout = null;

    let spinAngleStart = 10;
    let spinTime = 40;
    let spinTimeTotal = 40;

    const truthQuestions = [
      "What is your biggest fear?",
      "What is your most embarrassing moment?",
      "What is the biggest lie you have ever told?",
      "Who is your secret crush?",
      "What is one thing you have never told anyone?"
    ];

    const dareChallenges = [
      "Do 20 pushups.",
      "Sing a song loudly.",
      "Dance like a crazy person.",
      "Do an impression of someone until another player can guess who you are.",
      "Let another player tickle you."
    ];

    const getRandomItem = (arr) => arr[Math.floor(Math.random() * arr.length)];

    const drawRouletteWheel = () => {
      ctx.clearRect(0, 0, canvas.width, canvas.height);

      if (segments.length === 0) {
        // Draw an empty circle
        ctx.fillStyle = "#ddd";
        ctx.beginPath();
        ctx.arc(250, 250, 200, 0, 2 * Math.PI);
        ctx.fill();

        // Arrow
        ctx.fillStyle = "black";
        ctx.beginPath();
        ctx.moveTo(250 - 4, 250 - (200 + 20));
        ctx.lineTo(250 + 4, 250 - (200 + 20));
        ctx.lineTo(250 + 4, 250 - (200 - 20));
        ctx.lineTo(250 + 9, 250 - (200 - 20));
        ctx.lineTo(250 + 0, 250 - (200 - 30));
        ctx.lineTo(250 - 9, 250 - (200 - 20));
        ctx.lineTo(250 - 4, 250 - (200 - 20));
        ctx.lineTo(250 - 4, 250 - (200 + 20));
        ctx.fill();
      } else {
        arc = Math.PI / (segments.length / 2);

        segments.forEach((segment, i) => {
          const angle = startAngle + i * arc;
          ctx.fillStyle = colors[i % colors.length];
          ctx.beginPath();
          ctx.arc(250, 250, 200, angle, angle + arc, false);
          ctx.arc(250, 250, 0, angle + arc, angle, true);
          ctx.fill();

          ctx.save();
          ctx.fillStyle = "white";
          ctx.translate(
            250 + Math.cos(angle + arc / 2) * 160,
            250 + Math.sin(angle + arc / 2) * 160
          );
          ctx.rotate(angle + arc / 2 + Math.PI / 2);
          ctx.fillText(segment, -ctx.measureText(segment).width / 2, 0);
          ctx.restore();
        });

        // Arrow
        ctx.fillStyle = "black";
        ctx.beginPath();
        ctx.moveTo(250 - 4, 250 - (200 + 20));
        ctx.lineTo(250 + 4, 250 - (200 + 20));
        ctx.lineTo(250 + 4, 250 - (200 - 20));
        ctx.lineTo(250 + 9, 250 - (200 - 20));
        ctx.lineTo(250 + 0, 250 - (200 - 30));
        ctx.lineTo(250 - 9, 250 - (200 - 20));
        ctx.lineTo(250 - 4, 250 - (200 - 20));
        ctx.lineTo(250 - 4, 250 - (200 + 20));
        ctx.fill();
      }
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
      const index = Math.floor((360 - (degrees % 360)) / arcd);
      const selectedSegment = segments[index];
      selectedPlayer.textContent = `Player: ${selectedSegment}`;
      modal.style.display = "block";
    };

    const easeOut = (t, b, c, d) => {
      const ts = (t /= d) * t;
      const tc = ts * t;
      return b + c * (tc + -3 * ts + 3 * t);
    };

    spinButton.addEventListener("click", () => {
      if (segments.length === 0) {
        alert("Tambahkan Pemain!");
        return;
      }
      spinAngleStart = Math.random() * 10 + 10;
      spinTime = 0;
      spinTimeTotal = Math.random() * 3 + 4 * 1000;
      modal.style.display = "none";
      rotateWheel();
    });

    addButton.addEventListener("click", () => {
      if (segments.length >= 5) {
        alert("Maksimal hanya 5 pemain saja!");
        return;
      }
      const newItem = itemInput.value.trim();
      if (newItem) {
        segments.push(newItem);
        itemInput.value = "";
        drawRouletteWheel();
      } else {
        alert("Tambahkan Pemain!");
      }
    });

    truthButton.addEventListener("click", () => {
      truthDareQuestion.textContent = getRandomItem(truthQuestions);
      truthButton.style.display = "none";
      dareButton.style.display = "none";
      okButton.style.display = "block";
    });

    dareButton.addEventListener("click", () => {
      truthDareQuestion.textContent = getRandomItem(dareChallenges);
      truthButton.style.display = "none";
      dareButton.style.display = "none";
      okButton.style.display = "block";
    });

    okButton.addEventListener("click", () => {
      modal.style.display = "none";
      truthDareQuestion.textContent = "";
      truthButton.style.display = "inline-block";
      dareButton.style.display = "inline-block";
      okButton.style.display = "none";
    });

    drawRouletteWheel();
  </script>
</body>
</html>
