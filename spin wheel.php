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
  <title>Spinning Wheel</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-image: url('assets/<?php echo $image; ?>');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .wheel-container {
      display: flex;
      flex-direction: row;
      align-items: flex-start;
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
      margin-bottom: 15px;
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

    .scoreboard {
      display: none;
    }

    #scoreboard {
      font-family: Arial, Helvetica, sans-serif;
      background-color: rgba(255, 255, 255, 1);
      border: 2px solid black;
      padding: 5px;
      border-radius: 10px;
      text-align: center;
      height: fit-content;
      margin-top: 20%;
    }

    a {
      text-decoration: none;
      font-weight: bold;
      color: #0071BC;
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
    }

    .input-container button {
      border-radius: 15px;
      font-weight: bold;
    }

    .wheel-container button {
      border-radius: 15px;
      font-weight: bold;
    }

    .modal {
      border-radius: 15px;
      width: 500px;
      background-image: url('assets/<?php echo $image; ?>');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .modal p {
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: bold;
      color: #2D3BB9;
    }

    .modal button {
      border-radius: 15px;
      margin-inline: 43%;
    }

    .modal #okButton {
      margin-inline: 43%;
    }


    @media screen and (max-width: 850px) {

      .wheel-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
      }

      #scoreboard {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 5px;
        border-radius: 10px;
        text-align: center;
        margin-top: 10px;
        height: fit-content;
        width: 520px;
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
        <input type="text" id="itemInput" placeholder="Tambahkan Pemain!" />
        <button class="add-button" id="addButton">Tambah Pemain</button>
      </div>
      <canvas id="wheel" width="500" height="500"></canvas>
      <button id="spinButton">Spin!</button>
      <button id="showScore">Scoreboard</button>
    </div>
    <div class="scoreboard" id="scoreboard">
      <h3>Scoreboard</h3>
      <div id="scores"></div>
    </div>
  </div>
  <div class="modal" id="modal">
    <p id="selectedPlayer"></p>
    <button id="truthButton">Truth</button>
    <button id="dareButton">Dare</button>
    <p id="truthDareQuestion"></p>
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

    const truthQuestions = [
      "ceritakan pengalaman memalukan yang tidak bisa kamu lupakan?",
      "jika kamu menemukan uang 100JT dijalan, apa yang akan kamu lakukan?",
      "sebutkan cinta pertamamu!!",
      "sebutkan 3 hal yang membuat kamu mudah emosi?",
      "ceritakan kejadian paling horor, mistis yang pernah kamu alami?",
      "tunjuk 1 pemain yang menurutmu lebih cantik/ ganteng dari kamu!",
      "jika kamu bisa pergi nge-date dengan artis idolamu, siapa artis yang akan kamu pilih?",
      "ceritakan mimpi yang paling aneh dan konyol yang pernah kamu alami",
      "ceritakan pengalaman paling memalukan yang tidak bisa kamu lupakan sampai sekarang!",
      "sebutkan nama cinta monyet pertamamu!",
      "kira-kira berapa lama kamu mampu bertahan tanpa memegang ponsel?",
      "sebutkan 5 tipe ideal untuk menjadi pasanganmu!",
      "ceritakan moment lucu masa kecil kamu yang tidak bisa kamu lupakan! ",
      "sebutkan 5 hal yang membuat kamu takut!",
      "sebutkan negara yang ingin kamu kunjungi jika punya banyak uang!",
      "ceritakan moment paling bahagia yang membuat kamu ingin mengulangnya",
      "apakah kamu pernah merasa insecure?, saat apakah itu?",
      "jika kamu bisa kembali ke masa lalu, apa yang ingin kamu perbaiki?",
      "mana yang membuat kamu paling sedih? dibohongi atau ditinggalkan?",
      "dari semua pemain tunjuk 1 orang yang menurut kamu paling gabisa jaga rahasia!",
      "Kalau kamu tiba tiba bisa menghilang, apakah hal pertama yang akan kamu lakukan?",
    ];

    const dareChallenges = [
      "buat suara bebek, tiap 1 menit sekali selama 10 menit",
      "selfie dengan hewan apapun yang ada di sekitarmu , kemudian upload di sosmed!.",
      "ganti foto profil kamu dengan pemain yang berada duduk di sebelahkananmu!.",
      "ajak 3 orang berkenalan yang tidak kamu kenal yang berada di sekitarmu!.",
      "bicara hanya menggunakan huruf o selama 10 menit.",
      "joget tiktok dengan lagu/trend yang lagi viral.",
      "tetap dalam posisi berdiri sampai melewati giliran 5 orang pemain",
      "ambil beras 1 sendok makan lalu hitung jumlah butirnya dalam waktu 3 menit",
      "dalam waktu 30 detik, menangislah sampai bisa mengeluarkan air mata",
      "ganti foto profil WA kamu dengan foto pemain yang duduk di sebelah kiri kamu! (pertakankan selama 24 jam)",
      "stel lagu dangdut, lalu joget sampai melewati giliran 3 pemain",
      "gambar LOVE di jidat kamu menggunakan lipstik atau spidol, dan jangan di hapus sampai permainan berakhir",
      "ambil salah satu foto pemain, dan jadikan story IG/WA dengan caption 'kesayanganku'!",
      "genggam tangan pemain lain yang ada di sebelah kananmu sampai melewati giliran 3 pemain",
      "cari lalu selfie dengan benda apapun yang berwarna ungu yang berada di sekitarmu (waktunya hanya 30 detik, lalu upload di sosmed kamu)",
      "ajak tos 3 orang yang tidak kamu kenal yang berada di sekitarmu!",
      "pasang status WA dengan lirik lagu kangen band yang berjudul pujaan hati (bagian reff nya saja)",
      "sebutkan 5 penyanyi indonesia yang namanya berawalan dari huruf A (waktunya hanya 15 detik)",
      "lari di tempat sampai melewati giliran 3 pemain",
      "stand up comedy di depan pemain lain sampai ada yang tertawa!",
      "Tiru salah satu foto yang ada di media sosialmu secara acak!",
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

    const updateScores = () => {
      scoresDiv.innerHTML = "";
      Object.keys(scores).forEach(player => {
        scoresDiv.innerHTML += `<p>${player}: Truth - ${scores[player].truth}, Dare - ${scores[player].dare}</p>`;
      });
    };

    spinButton.addEventListener("click", () => {
      if (segments.length === 0) {
        alert("Tambahkan Pemain!");
        return;
      }
      spinAngleStart = Math.random() * 10 + 10;
      spinTime = 0;
      spinTimeTotal = Math.random() * 12 + 13 * 1000; // Mempercepat waktu putaran total
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
        scores[newItem] = { truth: 0, dare: 0 };
        itemInput.value = "";
        drawRouletteWheel();
        updateScores();
      } else {
        alert("Tambahkan Pemain!");
      }
    });

    truthButton.addEventListener("click", () => {
      const player = selectedPlayer.textContent.split(": ")[1];
      scores[player].truth += 1;
      truthDareQuestion.textContent = getRandomItem(truthQuestions);
      truthButton.style.display = "none";
      dareButton.style.display = "none";
      okButton.style.display = "block";
      updateScores();
    });

    dareButton.addEventListener("click", () => {
      const player = selectedPlayer.textContent.split(": ")[1];
      scores[player].dare += 1;
      truthDareQuestion.textContent = getRandomItem(dareChallenges);
      truthButton.style.display = "none";
      dareButton.style.display = "none";
      okButton.style.display = "block";
      updateScores();
    });

    okButton.addEventListener("click", () => {
      modal.style.display = "none";
      truthDareQuestion.textContent = "";
      truthButton.style.display = "inline-block";
      dareButton.style.display = "inline-block";
      okButton.style.display = "none";
    });

    showScore.addEventListener("click", () => {
      scoreboard.classList.toggle("scoreboard")
    });

    drawRouletteWheel();
  </script>

  <a href="title.php"><i class="bi bi-x-circle"></i></a>
</body>

</html>