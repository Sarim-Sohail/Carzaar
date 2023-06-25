<?php
$conn = mysqli_connect("localhost", "root", "", "se_project");
if ($conn->connect_error) {
  die("Connection Failed" . $conn->connect_error);
}

session_start();

$cID = $_SESSION["id"];
// $cID=$_GET['id'];   //Getting Ad_ID from AllAdsView -->
// exit($cID);

$_SESSION["passcID"] = $cID;


?>









<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard </title>
  <link href="ui-assets/img/brand.png" rel="icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="ui-assets/css/userdashboard.css" rel="stylesheet">
</head>

<body>
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a <h1 class="logo" style="color: white;"> <img src="ui-assets/img/brand.png" href="index.html"> CarZaar</h1></a>
    </div>
  </header>
  <div class="container py-5">
    <div class="d-flex justify-content-center">
      <div class="col-8">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col mt-5">
            <div class="card border-danger card-wr-bg"> <img src="ui-assets/img/buy.jpg" class="card-img-top" alt="...">
              <div class="card-body d-grid gap-3">
                <h5 class="card-title text-center text-capitalize">View Ads</h5>
                <p class="card-text text-center p-0 pb-3">Explore, explore, explore! Who knows you might end up with an
                  amazing deal!</p>
                <button onclick="window.location.href='AllAdsView.php';">
                  Buy
                </button>
              </div>

            </div>
          </div>
          <div class="col">
            <div class="card border-danger card-s-bg "> <img src="ui-assets/img/sell.jpg" class="card-img-top"
                alt="...">
              <div class="card-body d-grid gap-3">
                <h5 class="card-title text-center text-capitalize">Post an ad</h5>
                <p class="card-text text-center p-0 pb-3">Want to sell your vehicle? You are at the right place!</p>
                <button onclick="window.location.href='ad-postform.php';">
                  Sell
                </button>
              </div>

            </div>
          </div>
          <div class="col mt-5">
            <div class="card border-danger card-d-bg"> <img src="ui-assets/img/me.jpg" class="card-img-top" alt="...">
              <div class="card-body d-grid gap-3">
                <h5 class="card-title text-center text-capitalize">My Profile</h5>
                <p class="card-text text-center p-0 pb-3">View and edit your profile here</p>
                <button onclick="window.location.href='UserPersonalView.php';">
                  Me
                </button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </header>
</body>

</html>

<footer <div class="container">
  <div class="dashboard">
    <h4>My</h4> <strong><span>
        <h2>DASHBOARD</h2>
      </span></strong>.
  </div>
  <div class="dashboard>
     
    </div>
  </div>
</footer>
<gwmw style=" display:none;">
    <gwmw style="display:none;">

      <!doctype html>
      <html>

      <head>
        <meta charset="utf-8">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link href="css/style.css" rel="stylesheet">
      </head>

      <body>
        <header id="header" class="d-flex align-items-center">
          <div class="container d-flex align-items-center justify-content-between">

            <a <h1 class="logo" style="color: white;"> <img src="ui-assets/img/brand.png" href="index.html"> CarZaar
              </h1></a>

            <div class="container py-5">
              <div class="d-flex justify-content-center">
                <div class="col-8">
                  <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col mt-5">
                      <div class="card border-warning card-wr-bg"> <img src="images/buildings-skyline.jpg"
                          class="card-img-top" alt="...">
                        <div class="card-body d-grid gap-3">
                          <h5 class="card-title text-center text-capitalize">Silver</h5>
                          <p class="card-text text-center p-0 pb-3">This card has supporting text below as a natural
                            lead-in to additional content.</p>
                        </div>
                        <div class="card-footer text-light bg-warning">
                          <div><i class="bi bi-facebook"></i></div>
                          <div><i class="bi bi-twitter"></i></div>
                          <div><i class="bi bi-youtube"></i></div>
                          <div><i class="bi bi-linkedin"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card border-success card-s-bg "> <img src="images/empire_state.jpg"
                          class="card-img-top" alt="...">
                        <div class="card-body d-grid gap-3">
                          <h5 class="card-title text-center text-capitalize">Gold</h5>
                          <p class="card-text text-center p-0 pb-3">This card has supporting text below as a natural
                            lead-in to additional content. lead-in to additional content additional contentadditional
                            content</p>

                        </div>
                        <div class="card-footer bg-success text-light">
                          <div><i class="bi bi-facebook"></i></div>
                          <div><i class="bi bi-twitter"></i></div>
                          <div><i class="bi bi-youtube"></i></div>
                          <div><i class="bi bi-linkedin"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="col mt-5">
                      <div class="card border-danger card-d-bg"> <img src="images/Shanghai-Tower.jpg"
                          class="card-img-top" alt="...">
                        <div class="card-body d-grid gap-3">
                          <h5 class="card-title text-center text-capitalize">Platinum</h5>
                          <p class="card-text text-center p-0 pb-3">This card has supporting text below as a natural
                            lead-in to additional content.</p>

                        </div>
                        <div class="card-footer bg-danger text-light">
                          <div><i class="bi bi-facebook"></i></div>
                          <div><i class="bi bi-twitter"></i></div>
                          <div><i class="bi bi-youtube"></i></div>
                          <div><i class="bi bi-linkedin"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
      </body>

      </html>
      <gwmw style="display:none;">
        <gwmw style="display:none;">