<?php  session_start();  
    if(!isset($_SESSION['use']))
    {
    header("Location:auth");  
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic Site Info -->
        <html lang="en">
        <title>CHK | TOOLS</title>
        <meta name="description" content="MADE WITH ♡ BY TEAM THUNDER">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/icon.png">
        <!-- Assets-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="assets/css/links.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.2.0/mdb.min.js"></script>
    </head>
        <body id="body-pd">
        <header class="header" id="header">
        <div class="header__toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
         </div>
        </header>

        <div class="l-navbar" id="nav-bar">
        <nav class="nav">
        <div>
        <a href="/" class="nav__logo">
        <i class='fas fa-code nav__logo-icon'></i>
        <span class="nav__logo-name">Arceus</span>
        </a>

        <div class="nav__list">
        <a href="/" class="nav__link">
        <ion-icon name="grid-outline"></ion-icon>
        <span class="nav__name">Dashboard</span>
        </a>

        <a href="" class="nav__link active">
        <ion-icon name="hammer-outline" class="nav__icon"></ion-icon>
        <span class="nav__name">Tools</span>
        </a>



        </div>
        </div>

        <a href="off.php" class="nav__link">
        <i class='bx bx-log-out nav__icon' ></i>
        <span class="nav__name">Log Out</span>
        </a>
        </nav>
        </div>

    <body style="background: #2c2e36;">
    <br><br><br><br>

    <div class="card border border-warning" style="background:#2c2e36">
    <b><div class="card-header" style="color:#fff">
        Tools
        </div></b>
        &nbsp;
    <div class="card-body">
    <h5 class="card-title" style="color:#fff">CC Checker</h5>
    <p class="card-text" style="color:#fff">
    This tool helps you check if the card is live or not!
    </p>
    <div class="text-right">
    <a class="btn btn-outline-primary" style="color:#fff" href="chk1" role="button">Take me there!</a>
    <hr>
    </div>

    <h5 class="card-title" style="color:#fff">SK Checker</h5>
    <p class="card-text" style="color:#fff">
    This tool helps you check if your stripe key is live or not!
    </p>
    <div class="text-right">
    <a class="btn btn-outline-primary" style="color:#fff" href="skchk" role="button">Take me there!</a>
    </div>


    </div>
    </div>
    </div>
    </div>

    <!-- JS -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="assets/js/sidebar.js"></script>

</body>
</html>
