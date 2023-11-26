<?php


ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

include "functions.php";

function verifyUser($user, $pass)
{
  if (strpos($user, "@") !== false) {
    $user = $user;
  } else {
    $user = "+91" . $user;
  }

  $username = $user;
  $password = $pass;

  $apiKey = "l7xx75e822925f184370b2e25170c5d5820a";
  $headers = array(
    "x-api-key: $apiKey",
    "Content-Type: application/json"
  );

  $payload = array(
    'identifier' => $username,
    'password' => $password,
    'rememberUser' => 'T',
    'upgradeAuth' => 'Y',
    'returnSessionDetails' => 'T',
    'deviceInfo' => array(
      'consumptionDeviceName' => 'SM-G935FD',
      'info' => array(
        'type' => 'android',
        'platform' => array(
          'name' => 'SM-G935FD',
          'version' => '8.0.0'
        ),
        'androidId' => '3c6d6b5702fa09bd'
      )
    )
  );

  $options = array(
    'http' => array(
      'header' => implode("\r\n", $headers),
      'method' => 'POST',
      'content' => json_encode($payload),
    ),
  );

  $context = stream_context_create($options);
  $result = file_get_contents('https://api.jio.com/v3/dip/user/unpw/verify', false, $context);

  return json_decode($result, true);
}


function handleLogin()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $response = verifyUser($username, $password);
    $ssoToken = $response["ssoToken"];

    if (!empty($ssoToken)) {
      $u_name = encrypt_data($username, "TS-JIOTV");
      file_put_contents("assets/data/credskey.jtv", $u_name);
      $j_data = encrypt_data(json_encode($response), $u_name);
      file_put_contents("assets/data/creds.jtv", $j_data);
      header("Location: login.php?success");
      exit();
    } else {
      header("Location: login.php?error");
      exit();
    }
  }
}

handleLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/37fVLxB/f4027915ec9335046755d489a14472f2.png">
  <link rel="stylesheet" href="assets/css/tslogin.css">
  <title>JioTV Login</title>
</head>
<style>
  
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

*
{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;

}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background:url(https://img.playbook.com/GkXdxuPUJybZqdTcLNt124xUnMD_bK19dxy4Z8SczhE/Z3M6Ly9wbGF5Ym9v/ay1hc3NldHMtcHVi/bGljLzJhNWYxODk1/LTE0ZWMtNGNjMi1h/ZGZlLTRkMzQxYWYw/Zjk1OQ);
    background-size: cover;
    background-position: center;
}
.wrapper {
    width: 400px;
    background: transparent;
    border:2px solid rgba(255, 255, 255, .2);
    backdrop-filter:blur(20px);
    box-shadow: 0 0 10px rgba(0 , 0 , 0 , .2);
    color: #fff;
    border-radius: 10px;
    padding: 30px 30px;
 
}
.wrapper h1{
    font-size: 36px;
    text-align: center;
}
.wrapper .input-box {
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0;
}

.input-box input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, .2);
    border-radius: 40px;
    font-size: 16px;
    color: #fff;
    padding: 20px 45px 20px 20px;
}
.input-box input::placeholder{
    color: #fff;
}
.input-box i{
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 20px;

}
.wrapper .remember-forgot{
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0 15px;
}
.remember-forgot label input{
    accent-color: #fff;
    margin-right: 3px;
}
.remember-forgot a{
    color: #fff;
    text-decoration: none;

}
.remember-forgot a:hover{
    text-decoration: underline;
}
.wrapper .btn{
    width: 100%;
    height: 45px;
    border-radius: 40px;
    border: none;
    outline: none;
    background: #fff;
    box-shadow: 0 0 10px rgba(0 , 0 , 0 , .1);
    cursor: pointer;
    font-size: 16px;
    color: #333;
    font-weight: 600;
}
.wrapper .register-link{
   text-align: center;
    font-size: 14.5px;
    margin:20px 0 15px;
}
.register-link p a{
    color: #fff;
    text-decoration: none;
    font-weight: 600;

}
.register-link p a:hover{
    text-decoration: underline;
}
.wrapper{
  width: 100% !important;
}
.alert{
  width: 100% !important;
}
.alert span{
width: 100% !important;
}
  </style>
<body>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<body>
<div style="display:inline-block">
<div class="alert" style="display: none">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
    <br>

<div class="wrapper">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h1>JIO Login</h1>
            <div class="input-box">
                <input type="text"id="username" name="username"  placeholder="Mob without +91/Email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input id="password" name="password" type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <input type="hidden" name="web" value="true" />
              <input type="hidden" name="type" value="password" />
            <div class="remember-forgot">
         
                <a href="https://www.jio.com/selfcare/signup/forgot-password">Forgot password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
           
        </form>
    </div>

    </div>
</body>
</body>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const params = new URLSearchParams(window.location.search);
    const alertEl = document.querySelector(".alert");

    if (params.has("success")) {
      showAlert(alertEl, "Success!", "You have been logged in", "success", "#4CAF50");
      const currentProtocol = window.location.protocol;
      const currentHost = window.location.host;
      const currentPathname = window.location.pathname.replace("app/login.php", "index.php");
      setTimeout(function() {
        const newURL = currentProtocol + "//" + currentHost + currentPathname;
        window.location.replace(newURL);
      }, 500);
    } else if (params.has("error")) {
      showAlert(alertEl, "Error!", "Wrong username or password. Please try again.", "error", "#f44336");
    }
  });

  function showAlert(alertEl, title, message, type, color) {
    alertEl.innerHTML = `
      <span class="closebtn" onclick="closeAlert(this.parentElement);">&times;</span>
      <strong>${title}</strong> ${message}
    `;
    alertEl.classList.add(type);
    alertEl.style.backgroundColor = color;
    alertEl.style.display = "block";
  }

  function closeAlert(alertContainer) {
    alertContainer.style.display = "none";
  }
</script>

</html>