
<!DOCTYPE html>
<html lang="en">

<head>
    <title>JIOTV+ SpidyWorld</title>
    <meta charset="utf-8">
    <meta name="description" content="ENJOY FREE LIVE JIOTV">
    <meta name="keywords" content="JIOTV, LIVETV, SPORTS, MOVIES, MUSIC">
    <meta name="author" content="Techie Sneh">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/37fVLxB/f4027915ec9335046755d489a14472f2.png">
    <link rel="stylesheet" href="app/assets/css/techiesneh.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="app/assets/css/search.css">
    <link rel="stylesheet" href="master.css">
   
    <script src="https://cdn.jsdelivr.net/npm/lazysizes@5.3.2/lazysizes.min.js"></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/4.1.5/lazysizes.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



</head>

<body>

    <div class="topnav" id="myTopnav">
    <a href="index.php" class="active" >JioTv <i class="fa fa-home" aria-hidden="true"></i></a>
    <a href="sony.php" >Sony LIV <i class="fa fa-tv"></i></a>
    <a href="zee5.php">Zee5 <i class="fa fa-tv"></i></a>
  <a href="discovery.php"> Discovery+ <i class="fa fa-tv"></i></a>
  <a href="shemaroo.php" >Shemaroo <i class="fa fa-tv"></i></a>
  <a href="voot.php" > Voot <i class="fa fa-tv"></i></a>
  <a href="dangalplay.php"  >Dangal Play <i class="fa fa-tv"></i></a>
  <a href="epicon.php">Epic On <i class="fa fa-tv"></i></a>
 <!-- <a href="shemaroo.php">Shemaroo TV <i class="fa fa-tv"></i></a>-->
  <a href="aastha.php">Aastha TV <i class="fa fa-tv"></i></a>
  <a href="sanskaar.php">Sanskar TV <i class="fa fa-tv"></i></a>
  <a href="ptcplay.php" >PTC Play <i class="fa fa-tv"></i></a>
  <div class="right-lnk">
  <a href="#" id="loginButtons">Login/JioTV</i></a>


  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars text-light"></i>
  </a>
</div>
      
 
        <div id="userButtons">
           
        </div><br><br>
    <div id="searchWrapper">
        <input type="text" name="searchBar" id="searchBar" placeholder="Search ..." />
    </div>
    <div id="content">
        <div class="container">
            <div class="filters">
                <label for="genreFilter">Genre:</label>
                <select id="genreFilter">
                    <option value="">All</option>
                    <option value="Entertainment">Entertainment</option>
                    <option value="Movies">Movies</option>
                    <option value="Kids">Kids</option>
                    <option value="Sports">Sports</option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Infotainment">Infotainment</option>
                    <option value="News">News</option>
                    <option value="Music">Music</option>
                    <option value="Devotional">Devotional</option>
                    <option value="Business">Business</option>
                    <option value="Educational">Educational</option>
                    <option value="Shopping">Shopping</option>
                    <option value="JioDarshan">JioDarshan</option>
                </select>

                <label for="langFilter">Language:</label>
                <select id="langFilter">
                    <option value="">All</option>
                    <option value="Hindi">Hindi</option>
                    <option value="English">English</option>
                    <option value="Marathi">Marathi</option>
                    <option value="Punjabi">Punjabi</option>
                    <option value="Urdu">Urdu</option>
                    <option value="Bengali">Bengali</option>
                    <option value="Malayalam">Malayalam</option>
                    <option value="Tamil">Tamil</option>
                    <option value="Gujarati">Gujarati</option>
                    <option value="Odia">Odia</option>
                    <option value="Telugu">Telugu</option>
                    <option value="Bhojpuri">Bhojpuri</option>
                    <option value="Kannada">Kannada</option>
                    <option value="Assamese">Assamese</option>
                    <option value="Nepali">Nepali</option>
                    <option value="French">French</option>
                </select>
            </div>
            <div id="charactersList" class="row">
            </div>
        </div>
    </div>
    <script src="app/assets/js/search.js"></script>
</body>
<script>
  
    document.getElementById("loginButtons").addEventListener("click", function() {
        window.location.href = "app/login.php";
    });

    document.getElementById("logoutButtons").addEventListener("click", function() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "app/logout.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
            }
        };
        xhr.send();
    });

    const PlayListButton = document.getElementById('PlayListButtons');
    PlayListButton.addEventListener('click', () => {

        var protocol = window.location.protocol;
        var localIP = window.location.hostname;
        var port = window.location.port;

        if (window.location.hostname !== "127.0.0.1" && window.location.hostname !== "localhost") {
            var hostJio = window.location.host;
        } else {
            var hostJio = localIP + (port ? ':' + port : '');
        }

        var jioPath = protocol + '//' + hostJio + window.location.pathname.replace(/\/[^/]*$/, '');
        var jioPath = jioPath + '/app/playlist.php';

        navigator.clipboard.writeText(jioPath)
            .then(() => {
                alert('PlayList URL copied to Clipboard!');
            })
            .catch((error) => {
                console.error('Error copying URL:', error);
            });
    });





    function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

</script>

</html>
