<?php
$pass = trim($_POST['code']); 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Playing</title>
  <style>
    body {
      text-align: center;
      background-image: url(gradient.png);
      color: white;
      font-family: sans-serif;
    }
    @font-face {
        font-family: 'Dream Head';
        src: url('fonts/Dream Head.otf') format('opentype'); 
    }
    @font-face {
        font-family: 'Keep on Truckin';
        src: url('fonts/KeeponTruckin.ttf') format('truetype');
    }
    @font-face {
        font-family: 'Arista';
        src: url('fonts/Arista-Pro-Alternate-Bold-trial.ttf') format('truetype');
    }
    h1 {
      font-size: 200px;
      margin: 5px;
      margin-top: 80px;
      text-shadow: 0 0 12px #000000;
      font-family: 'Dream Head';
    }
    h2 {
      margin: 1px;
      text-shadow: 0 0 12px #000000;
      font-family: 'Keep on Truckin';
    }
    #vinyl {
      width: 300px;
      height: 300px;
      margin: 10px;
      transition: transform 0.3s ease;
    }

    .spin {
      animation: spin 3s linear infinite;
    }

    @keyframes spin {
      from { transform: rotate(0deg); }
      to   { transform: rotate(360deg); }
    }

    audio {
      display: none;
    }

    button {
      font-family: 'Arista';
      background: white;
      color: black;
      font-size: 18px;
      padding: 10px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-family: 'Arista';
      box-shadow: 0 4px 15px;
      transition: all 0.3s ease;    
    }
    button:hover {
      transform: scale(1.05);
      background: orange;
    }
  </style>
</head>
<body>

<?php include 'jukeboxsongmap.php'; ?>

<h1><?php echo htmlspecialchars($pass); ?></h1>

<?php
if (array_key_exists($pass, $songMap)) {
  $song = $songMap[$pass];
  echo "<h2>Now playing: " . htmlspecialchars($song['title']) . "</h2>";
  echo "<img id='vinyl' src='vinyl.png' alt='Spinning Vinyl'>";
  echo "<audio id='player' autoplay>
          <source src='songs/" . htmlspecialchars($song['file']) . "' type='audio/mpeg'>
          Your browser does not support the audio element.
        </audio>";
} else {
  echo "<h2>This code doesn't have a correlated song.</h2>";
}
?>

<br><br>
<a href="jukeboxindex.html"><button>Play another song</button></a>

<script>
  const player = document.getElementById("player");
  const vinyl = document.getElementById("vinyl");

  if (player && vinyl) {
    player.addEventListener("play", () => vinyl.classList.add("spin"));
    player.addEventListener("pause", () => vinyl.classList.remove("spin"));
    player.addEventListener("ended", () => vinyl.classList.remove("spin"));
  }
    
  document.addEventListener("keydown", (e) => {
  if (e.code === "Space") {
    e.preventDefault(); // prevents page scrolling
    if (player.paused) {
      player.play();
    } else {
      player.pause();
    }
  }
});

</script>
</body>
</html>
