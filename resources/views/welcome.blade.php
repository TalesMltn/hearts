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
      top: 25%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #ff4da6;
      font-size: clamp(3rem, 10vw, 5rem);
      font-weight: bold;
      text-align: center;
      text-shadow: 0 0 25px #ff1493, 0 0 50px #c71585;
      z-index: 30;
      pointer-events: none;
      animation: pulse 4s infinite ease-in-out;
      white-space: nowrap;
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
      max-width: 500px;
    }
    .question {
      font-size: clamp(1.5rem, 6vw, 2.5rem);
      color: #ff85c0;
      margin-bottom: 30px;
      text-shadow: 0 0 15px #ff1493;
    }
    .buttons {
      display: flex;
      justify-content: center;
      gap: clamp(40px, 15vw, 100px);
      align-items: center;
    }
    button {
      font-size: clamp(1.2rem, 5vw, 1.8rem);
      padding: clamp(12px, 4vw, 15px) clamp(30px, 8vw, 40px);
      border: none;
      border-radius: 40px;
      transition: all 0.2s;
      box-shadow: 0 0 20px rgba(255, 77, 166, 0.6);
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
      font-size: clamp(1.4rem, 5vw, 2.2rem);
      color: #ff69b4;
      margin-top: 20px;
      text-shadow: 0 0 20px #ff1493;
      animation: fadeIn 2s;
      z-index: 25;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.8); }
      to { opacity: 1; transform: scale(1); }
    }

    .heart {
      position: absolute;
      animation: float 8s linear forwards; /* Más corto para que desaparezcan antes */
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
  </style>
</head>
<body>
  <div class="text-center">TE EXTRAÑO</div>

  <div class="question-container">
    <div class="question">¿Quieres ver una película conmigo? 🍿</div>
    <div class="buttons">
      <button id="yesBtn">SÍ 😍</button>
      <button id="noBtn">NO 😔</button>
    </div>

    <div id="result">
      Tu sonrisa acelera mi corazón más que cualquier alarma en UCI...<br>
      ¿me dejas ser tu diagnóstico crónico y sin cura? 💓😏
    </div>
  </div>

  <script>
    const noBtn = document.getElementById('noBtn');
    const yesBtn = document.getElementById('yesBtn');
    const result = document.getElementById('result');

    function moverNoBtn() {
      const rect = noBtn.getBoundingClientRect();
      const btnWidth = rect.width || 120;
      const btnHeight = rect.height || 60;
      const SAFE_MARGIN = 100;

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
      result.style.display = "block";
      noBtn.style.display = 'none';
      noBtn.remove();
    });

    let activeHearts = 0; // Contador para límite

    function createHeart() {
      if (activeHearts > 60) return; // Límite máximo: 60 visibles

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
      activeHearts++;

      // Cuando termine la animación, restamos el contador
      heart.addEventListener('animationend', () => {
        heart.remove();
        activeHearts--;
      });
    }

    setInterval(createHeart, 200); // Cambiado a 300ms → más suave y controlado
  </script>
</body>
</html>