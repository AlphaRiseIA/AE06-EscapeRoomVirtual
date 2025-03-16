document.addEventListener("DOMContentLoaded", function () {
    const canvas = document.createElement("canvas");
    document.body.appendChild(canvas);
    canvas.id = "rainCanvas";
    canvas.style.position = "fixed";
    canvas.style.top = "0";
    canvas.style.left = "0";
    canvas.style.width = "100vw";
    canvas.style.height = "100vh";
    canvas.style.pointerEvents = "none";
    canvas.style.zIndex = "2";

    const ctx = canvas.getContext("2d");

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    window.addEventListener("resize", resizeCanvas);
    resizeCanvas();

    const drops = [];
    for (let i = 0; i < 40; i++) {
        drops.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height * 0.2, 
            length: Math.random() * 15 + 10, 
            speed: Math.random() * 6 + 4, 
            delay: Math.random() * 4000, 
        });
    }

    function drawRain() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.strokeStyle = "rgba(173, 216, 230, 0.7)";
        ctx.lineWidth = 1.8;

        drops.forEach((drop) => {
            drop.delay -= 16; 
            if (drop.delay <= 0) {
                ctx.beginPath();
                ctx.moveTo(drop.x, drop.y);
                ctx.lineTo(drop.x, drop.y + drop.length);
                ctx.stroke();

                drop.y += drop.speed;
                if (drop.y > canvas.height * 0.7) { 
                    drop.y = Math.random() * canvas.height * 0.2;
                    drop.x = Math.random() * canvas.width;
                    drop.delay = 4000; 
                }
            }
        });

        requestAnimationFrame(drawRain);
    }

    drawRain();

    function flickerEffect() {
        const flickerDiv = document.createElement("div");
        flickerDiv.id = "flickerEffect";
        flickerDiv.style.position = "fixed";
        flickerDiv.style.top = "0";
        flickerDiv.style.left = "0";
        flickerDiv.style.width = "100vw";
        flickerDiv.style.height = "100vh";
        flickerDiv.style.background = "rgba(0, 0, 0, 0.6)";
        flickerDiv.style.pointerEvents = "none";
        flickerDiv.style.zIndex = "5";
        flickerDiv.style.opacity = "0";
        document.body.appendChild(flickerDiv);

        function flickerAnimation() {
            flickerDiv.style.opacity = Math.random() * 0.8;
            setTimeout(() => {
                flickerDiv.style.opacity = "0";
                setTimeout(flickerAnimation, Math.random() * 1500 + 10);
            }, Math.random() * 100 + 50);
        }

        flickerAnimation();
    }

    flickerEffect();
});
