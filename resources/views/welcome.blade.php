<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Te extraño... ¿película? 💖</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body, html {
      height: 100%;
      background: #0d001a;
      overflow: hidden;
      font-family: Arial, Helvetica, sans-serif;
      color: #fff;
      touch-action: manipulation;
    }

    .text-center {
      position: absolute;
      top: 30%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #ff4da6;
      font-size: clamp(3rem, 10vw, 6rem);
      font-weight: bold;
      text-align: center;
      text-shadow: 0 0 25px #ff1493, 0 0 50px #c71585;
      z-index: 30;
      pointer-events: none;
      animation: pulse 4s infinite ease-in-out;
      white-space: nowrap;
      transition: top 1s ease; /* Suave movimiento al dar SÍ */
    }
    @keyframes pulse {
      0%, 100% { transform: translate(-50%, -50%) scale(1); }
      50% { transform: translate(-50%, -50%) scale(1.05); }
    }

    .question-container {
      position: absolute;
      top: 55%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 25;
      text-align: center;
      width: 90%;
      max-width: 700px;
      transition: opacity 1s ease; /* Desaparece suave */
    }
    .question {
      font-size: clamp(1.5rem, 6vw, 3rem);
      color: #ff85c0;
      margin-bottom: 40px;
      text-shadow: 0 0 15px #ff1493;
    }
    .buttons {
      display: flex;
      justify-content: center;
      gap: clamp(50px, 10vw, 150px);
      align-items: center;
      flex-wrap: wrap;
    }
    button {
      font-size: clamp(1.2rem, 5vw, 2rem);
      padding: clamp(12px, 4vw, 20px) clamp(30px, 8vw, 60px);
      border: none;
      border-radius: 50px;
      transition: all 0.2s;
      box-shadow: 0 0 20px rgba(255, 77, 166, 0.6);
      min-width: 150px;
    }
    #yesBtn {
      background: linear-gradient(45deg, #ff0080, #ff8c00);
      color: white;
      cursor: pointer;
      z-index: 25;
    }
    #yesBtn:hover {
      transform: scale(1.1);
      box-shadow: 0 0 40px #ff1493;
    }
    #noBtn {
      background: linear-gradient(45deg, #ff0080, #ff8c00);
      color: white;
      pointer-events: none;
      user-select: none;
      transition: left 0.08s ease-out, top 0.08s ease-out;
      will-change: left, top;
      box-shadow: 0 0 20px rgba(255,0,128,0.7);
      z-index: 15;
      cursor: default;
    }

    #result {
      display: none;
      position: absolute;
      top: 60%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 90%;
      max-width: 900px;
      text-align: center;
      font-size: clamp(1.6rem, 5vw, 2.8rem);
      color: #ff69b4;
      text-shadow: 0 0 25px #ff1493;
      animation: fadeIn 2s;
      z-index: 35;
      background: rgba(13, 0, 26, 0.7);
      padding: 40px;
      border-radius: 30px;
      box-shadow: 0 0 50px rgba(255, 105, 180, 0.6);
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translate(-50%, -60%); }
      to { opacity: 1; transform: translate(-50%, -50%); }
    }

    .heart {
      position: absolute;
      animation: float 12s linear infinite;
      pointer-events: none;
      user-select: none;
      opacity: 0.7;
    }

    @keyframes float {
      0%   { transform: translateY(100vh) scale(1); opacity: 0.3; }
      30%  { opacity: 0.9; }
      70%  { opacity: 0.9; }
      100% { transform: translateY(-15vh) scale(1.4); opacity: 0; }
    }

    /* Ajustes para pantallas grandes (PC/laptop) */
    @media (min-width: 1024px) {
      .text-center { top: 15%; font-size: 7rem; }
      .question-container { top: 50%; }
      .question { font-size: 3rem; margin-bottom: 50px; }
      .buttons { gap: 200px; }
      button { font-size: 2.2rem; padding: 20px 70px; min-width: 220px; }
      #result { top: 65%; font-size: 3.2rem; padding: 50px; max-width: 1000px; }
    }
  </style>
</head>
<body>
  <div class="text-center">TE EXTRAÑO</div>

  <div class="question-container" id="questionContainer">
    <div class="question">¿Quieres ver una película conmigo? 🍿</div>
    <div class="buttons">
      <button id="yesBtn">SÍ 😍</button>
      <button id="noBtn">NO 😔</button>
    </div>
  </div>

  <div id="result">
    Tu sonrisa acelera mi corazón más que cualquier alarma en UCI...<br>
    ¿me dejas ser tu diagnóstico crónico y sin cura? 💓😏
  </div>

  <script>
    const noBtn = document.getElementById('noBtn');
    const yesBtn = document.getElementById('yesBtn');
    const result = document.getElementById('result');
    const questionContainer = document.getElementById('questionContainer');

    function moverNoBtn() {
      const rect = noBtn.getBoundingClientRect();
      const btnWidth = rect.width || 120;
      const btnHeight = rect.height || 60;
      const SAFE_MARGIN = 150;

      const minX = SAFE_MARGIN;
      const maxX = window.innerWidth - btnWidth - SAFE_MARGIN;
      const minY = SAFE_MARGIN;
      const maxY = window.innerHeight - btnHeight - SAFE_MARGIN;

      const newX = minX + Math.random() * (maxX - minX);
      const newY = minY + Math.random() * (maxY - minY);

      noBtn.style.left = newX + "px";
      noBtn.style.top = newY + "px";
      noBtn.style.position = 'absolute';
    }

    setTimeout(() => {
      noBtn.style.position = 'absolute';
      moverNoBtn();
    }, 800);

    document.addEventListener("mousemove", (e) => {
      const rect = noBtn.getBoundingClientRect();
      const dist = Math.hypot(e.clientX - (rect.left + rect.width/2), e.clientY - (rect.top + rect.height/2));
      if (dist < 120) moverNoBtn();
    });

    document.addEventListener("touchstart", (e) => {
      const touch = e.touches[0];
      if (!touch) return;
      const rect = noBtn.getBoundingClientRect();
      const dist = Math.hypot(touch.clientX - (rect.left + rect.width/2), touch.clientY - (rect.top + rect.height/2));
      if (dist < 150 || e.target === noBtn) {
        e.preventDefault();
        moverNoBtn();
      }
    }, { passive: false });

    document.addEventListener("touchmove", (e) => {
      const touch = e.touches[0];
      if (!touch) return;
      const rect = noBtn.getBoundingClientRect();
      const dist = Math.hypot(touch.clientX - (rect.left + rect.width/2), touch.clientY - (rect.top + rect.height/2));
      if (dist < 150) moverNoBtn();
    }, { passive: true });

    function autoMove() {
      moverNoBtn();
      setTimeout(autoMove, 1200 + Math.random() * 800);
    }
    setTimeout(autoMove, 2000);

    yesBtn.addEventListener("click", () => {
      // Ocultar pregunta y botones
      questionContainer.style.opacity = '0';
      questionContainer.style.pointerEvents = 'none';

      // Mostrar resultado
      result.style.display = "block";

      // Ocultar y eliminar NO
      noBtn.style.display = 'none';
      noBtn.remove();

      // Mover título "TE EXTRAÑO" hacia arriba para centrar mejor la frase
      document.querySelector('.text-center').style.top = '15%';
    });

    function createHeart() {
      const heart = document.createElement("div");
      heart.classList.add("heart");
      heart.innerHTML = "❤";
      heart.style.left = Math.random() * 100 + "vw";
      heart.style.fontSize = (Math.random() * 25 + 8) + "px";
      const colors = ["#ff4da6", "#ff69b4", "#ff1493", "#ff85c0"];
      heart.style.color = colors[Math.floor(Math.random() * colors.length)];
      heart.style.animationDuration = (Math.random() * 6 + 6) + "s";
      heart.style.filter = Math.random() > 0.7 ? "blur(1.5px)" : "none";
      document.body.appendChild(heart);
    }

    setInterval(createHeart, 200);
  </script>
</body>
</html>