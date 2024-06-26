<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    </style>
  </head>
  <body>
    <div class="wheel-container">
      <div class="input-container">
        <input type="text" id="itemInput" placeholder="Enter item" />
        <button class="add-button" id="addButton">Add Item</button>
      </div>
      <canvas id="wheel" width="500" height="500"></canvas>
      <button id="spinButton">Spin</button>
    </div>
    <script>
      const canvas = document.getElementById("wheel");
      const ctx = canvas.getContext("2d");
      const spinButton = document.getElementById("spinButton");
      const addButton = document.getElementById("addButton");
      const itemInput = document.getElementById("itemInput");

      let segments = [];
      const colors = [
        "#FF5733",
        "#33FF57",
        "#3357FF",
        "#F333FF",
        "#FF33A1",
        "#FF8633",
        "#33FFDA",
        "#8333FF",
      ];

      let startAngle = 0;
      let arc = 0;
      let spinTimeout = null;

      let spinAngleStart = 10;
      let spinTime = 40;
      let spinTimeTotal = 40;

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

        const spinAngle =
          spinAngleStart - easeOut(spinTime, 0, spinAngleStart, spinTimeTotal);
        startAngle += (spinAngle * Math.PI) / 180;
        drawRouletteWheel();
        spinTimeout = setTimeout(rotateWheel, 30);
      };

      const stopRotateWheel = () => {
        clearTimeout(spinTimeout);
        const degrees = (startAngle * 180) / Math.PI + 90;
        const arcd = (arc * 180) / Math.PI;
        const index = Math.floor((360 - (degrees % 360)) / arcd);
        alert("You got " + segments[index]);
      };

      const easeOut = (t, b, c, d) => {
        const ts = (t /= d) * t;
        const tc = ts * t;
        return b + c * (tc + -3 * ts + 3 * t);
      };

      spinButton.addEventListener("click", () => {
        if (segments.length === 0) {
          alert("Please add items to the wheel first.");
          return;
        }
        spinAngleStart = Math.random() * 10 + 10;
        spinTime = 0;
        spinTimeTotal = Math.random() * 3 + 4 * 1000;
        rotateWheel();
      });

      addButton.addEventListener("click", () => {
        const newItem = itemInput.value.trim();
        if (newItem) {
          segments.push(newItem);
          itemInput.value = "";
          drawRouletteWheel();
        } else {
          alert("Please enter an item to add.");
        }
      });

      drawRouletteWheel();
    </script>
  </body>
</html>