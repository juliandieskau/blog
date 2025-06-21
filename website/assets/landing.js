// Create animation on landing page
const canvas = document.getElementById('landing-canvas');
const ctx = canvas.getContext('2d');
const noiseCanvas = document.getElementById('noise-layer');
const noiseCtx = noiseCanvas.getContext('2d');

let particles = [];
const MAX_PARTICLES = 200;
const CONNECTION_RADIUS = 150;

function resizeCanvas() {
  const dpr = window.devicePixelRatio || 1;
  const width = document.documentElement.clientWidth;
  const height = document.documentElement.clientHeight;

  canvas.width = width * dpr;
  canvas.height = height * dpr;
  canvas.style.width = width + 'px';
  canvas.style.height = height + 'px';
  ctx.setTransform(1, 0, 0, 1, 0, 0);
  ctx.scale(dpr, dpr);

  noiseCanvas.width = width * dpr;
  noiseCanvas.height = height * dpr;
  noiseCanvas.style.width = width + 'px';
  noiseCanvas.style.height = height + 'px';
  noiseCtx.setTransform(1, 0, 0, 1, 0, 0);
  noiseCtx.scale(dpr, dpr);
}
resizeCanvas();
window.addEventListener('resize', resizeCanvas);

// Particle class
class Particle {
  constructor() {
    this.reset();
  }

  reset() {
  const width = canvas.width / (window.devicePixelRatio || 1);
  const height = canvas.height / (window.devicePixelRatio || 1);
  this.x = Math.random() * width;
  this.y = Math.random() * height;
  const angle = Math.random() * 2 * Math.PI;
  const speed = Math.random() * 1.5 + 0.5;
  this.vx = Math.cos(angle) * speed;
  this.vy = Math.sin(angle) * speed;
  this.radius = Math.random() * 1 + 1;
  }

  update() {
    this.x += this.vx;
    this.y += this.vy;

    const width = canvas.width / (window.devicePixelRatio || 1);
    const height = canvas.height / (window.devicePixelRatio || 1);

    // Despawn when offscreen and respawn elsewhere
    if (
      this.x < -50 || this.x > width + 50 ||
      this.y < -50 || this.y > height + 50
    ) {
      this.reset();
    }
  }

  draw() {
    ctx.shadowBlur = 10;
    ctx.shadowColor = "white";
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
    ctx.fillStyle = "white";
    ctx.fill();
    ctx.shadowBlur = 0;
  }
}

// Create particles
for (let i = 0; i < MAX_PARTICLES; i++) {
  particles.push(new Particle());
}

// Draw connections
function drawConnections() {
  for (let i = 0; i < particles.length; i++) {
    let connected = 0;
    for (let j = 0; j < particles.length && connected < 5; j++) {
      if (i !== j) {
        const dx = particles[i].x - particles[j].x;
        const dy = particles[i].y - particles[j].y;
        const dist = Math.sqrt(dx * dx + dy * dy);

        if (dist < CONNECTION_RADIUS) {
          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          ctx.strokeStyle = `rgba(255, 255, 255, ${1 - dist / CONNECTION_RADIUS})`;
          ctx.lineWidth = 2;
          ctx.stroke();
          connected++;
        }
      }
    }
  }
}

// Soft glow layer
function drawGlowLayer() {
  for (let p of particles) {
    const glowRadius = 100;

    // Create glowing circles with drop off from the center
    const glow = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, glowRadius);
    glow.addColorStop(0.0, 'rgba(255, 255, 255, 0.08)'); // strong center glow
    glow.addColorStop(0.2, 'rgba(255, 255, 255, 0.04)'); // quick drop-off
    glow.addColorStop(0.5, 'rgba(255, 255, 255, 0.02)'); // softer edges
    glow.addColorStop(1.0, 'rgba(255, 255, 255, 0.00)'); // fade out completely

    ctx.fillStyle = glow;
    ctx.beginPath();
    ctx.arc(p.x, p.y, 100, 0, 2 * Math.PI);
    ctx.fill();
  }
}

// Animation loop
function animate() {
  // Fade the background slightly (creates a trail effect)
  ctx.fillStyle = "rgba(0, 0, 0, 0.1)";
  ctx.fillRect(0, 0, canvas.width, canvas.height);

  // Soft glow layer
  drawGlowLayer();

  // Draw all particles and connections
  for (let p of particles) {
    p.update();
    p.draw();
  }

  drawConnections();

  requestAnimationFrame(animate);
}
animate();

// Click to redirect
document.addEventListener('click', () => {
  window.location.href = "/about.php"; // Change to profile page
});

// Show "Click to enter" after 20s
setTimeout(() => {
  document.getElementById('click-text').style.opacity = 1;
  document.getElementById('click-text').style.display = 'block';
}, 5000);

// Create perlin noise layer
function generateNoiseFrame() {
  const imageData = noiseCtx.createImageData(noiseCanvas.width, noiseCanvas.height);
  const buffer = new Uint32Array(imageData.data.buffer);
  for (let i = 0; i < buffer.length; i++) {
    const value = Math.random() * 255 | 0;
    buffer[i] = (30 << 24) | (value << 16) | (value << 8) | value;
  }
  noiseCtx.putImageData(imageData, 0, 0);
}

setInterval(generateNoiseFrame, 100); // update every 100ms