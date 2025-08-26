<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['digits']) && isset($_POST['songname'])) {
    $newcode = trim($_POST['digits']);
    $newsong = trim($_POST['songname']);
    $timestamp = date("Y-m-d H:i:s");

    $logEntry = "$timestamp - Code entered: $newcode, Song suggested: $newsong\n";
    file_put_contents("suggestions.txt", $logEntry, FILE_APPEND);
} else {
    echo "Invalid access or missing form data.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Submission Successful</title>
  <meta name="viewport" content="width=display-width, initial-scale=1.0">
</head>
<body>
  <h1 style="font-size: 80px;">Congratulations!</h1>  
  <h3>You have submitted "<?php echo htmlspecialchars($newsong); ?>" with its designated three-digit code: <strong><?php echo htmlspecialchars($newcode); ?></strong>!</h3>
  <p>The developer will take notice of this soon.</p>
  <a href="jukeboxindex.html"><button>Go back</button></a>
<style>
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
    body {
        background-image: url(gradient.png);
        color: white;
        text-align: center;
        text-shadow: 0 0 12px #000000;
    }  
    h1 {
        font-family: 'Dream Head';
    }
    h3 {
        font-family: 'Keep on Truckin';
    }
    p {
        font-family: 'Arista';
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
</style>
</body>
</html>
