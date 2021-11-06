<?php  session_start();  
    if(!isset($_SESSION['use']))
    {
    header("Location:auth.php");  
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic Site Info -->
        <html lang="en">
        <title>CHK</title>
        <meta name="description" content="MADE WITH ♡ BY TEAM THUNDER">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/icon.png">
        <!-- Assets-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="assets/css/links.css">
        <link rel="stylesheet" href="assets/css/footer.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.2.0/mdb.min.js"></script>
    </head>
    <style>
        body{
            color: white;
        }
    </style>
        <body id="body-pd">
        <header class="header" id="header">
        <div class="header__toggle">
        <i class='bx bx-menu' id="header-toggle">
        </i>
         </div>
        Welcome <?php echo $_SESSION['use']; ?>!
        </header>

        <div class="l-navbar" id="nav-bar">
        <nav class="nav">
        <div>
        <a class="nav__logo">
        <i class='fas fa-code nav__logo-icon'></i>
        <span class="nav__logo-name">Arceus</span>
        </a>

        <div class="nav__list">
        <a class="nav__link active">
        <ion-icon name="grid-outline"></ion-icon>
        <span class="nav__name">Dashboard</span>
        </a>

        <a href="tools.php" class="nav__link">
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
        <!-- Content -->
        <div class="card border border-warning  mb-3" style="margin-top:150px;background: transparent">
        <b><div class="card-header" style="color:#fff">
        Bulletin Board
        </div></b>
        <div class="card-body">
        <h5 class="card-title" style="color:#fff">News:</h5>
        <p class="card-text" style="color:#fff">Update Version 1.5:</p>
        <p style="color:#fff">&#9679; Most stable version of this checker. Continuously upgrading checker UI.</p>
        <p class="card-text" style="color:#fff">Update Version 1.4:</p>
        <p style="color:#fff">&#9679; Fixed cards not checking, And moved bulletin board to the main index.</p>
        <p class="card-text" style="color:#fff">Update Version 1.3:</p>
        <p style="color:#fff">&#9679; New Navbar, added an sk checker, and bulletin board (for updates). And fixed some minor bugs.</p>
        </div>
        </div>
        <hr style="margin-top: 96px;">

        <footer id="footer">
        &copy; Coded by <a href="https://t.me/rceus" style="color:#fff"> Arceus </a> and <a href="https://t.me/Haruuuuue"style="color:#fff"> Haru </a>
        </footer>

        <!-- JS of Checker -->
        <script type="module" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.esm.js"></script>
        <script src="assets/js/sidebar.js"></script>

</body>
</html>
