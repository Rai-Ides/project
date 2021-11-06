<?php  session_start();  
    if(!isset($_SESSION['use']))
    {
    header("Location:../auth.php");  
    }

include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic Site Info -->
        <html lang="en">
        <title>CHK | CC CHECKER</title>
        <meta name="description" content="MADE WITH ♡ BY TEAM THUNDER">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="assets/img/icon.png">
        <!-- Assets-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../assets/css/links.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
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
        <a class="nav__logo">
        <i class='fas fa-code nav__logo-icon'></i>
        <span class="nav__logo-name">Arceus</span>
        </a>

        <div class="nav__list">
        <a class="nav__link active">
        <ion-icon name="card-outline"></ion-icon>
        <span class="nav__name">CC Checker</span>
        </a>

        <a href="../tools.php" class="nav__link">
        <ion-icon name="hammer-outline" class="nav__icon"></ion-icon>
        <span class="nav__name">Tools</span>
        </a>


        </div>
        </div>

        <a href="../off.php" class="nav__link">
        <i class='bx bx-log-out nav__icon' ></i>
        <span class="nav__name">Log Out</span>
        </a>
        </nav>
        </div>


        <body style="background: #2c2e36;" onload="sakalam();">
            <!-- Response Holder -->
            <body style="background: #2c2e36; margin-top: 0px;">
            <div class="container mb-5 mt-5" id="container">
            <div class="row justify-content-md-center" style="margin-top: 100px;">
            <div class="col-md-12">
            <form>
            <div id="content">
            <div class="form-group"><div class="row justify-content-md-center" ><div class="col col-sm-6 col-md-4 col-lg-3 col-6">
            <div class="card" style="background: transparent;color:#FFFFFF;">
            <div class="card-body border border-success rounded-bottom">
            <div >
            <h6 style="text-align: left;color:#FFFFFF;" class="card-title text-truncate">CVV</h6><h6 id="cLive" style="text-align: center">0</h6>
            </div>
            </div>
            </div>
            &nbsp;
            </div>
            <div class="col col-sm-6 col-md-4 col-lg-3 col-6">
            <div class="card" style="background: transparent;color:#FFFFFF;">
            <div class="card-body border border-warning rounded-bottom">
            <div >
            <h6 style="text-align: left;color:#FFFFFF;" class="card-title text-truncate" >CCN</h6><h6 id="cWarn" style="text-align: center">0</h6>
            </div>
            </div>
            </div>
            &nbsp;
            </div>
            <div class="col col-sm-6 col-md-4 col-lg-3 col-6" >
            <div class="card" style="background: transparent;color:#FFFFFF;">
            <div class="card-body border border-danger rounded-bottom" >
            <div >
            <h6 style="text-align: left;color:#FFFFFF;" class="card-title text-truncate" >Dead</h6><h6 id="cDie" style="text-align: center">0</h6>
            </div>
            </div>
            </div>
            </div>
            <div class="col col-sm-6 col-md-4 col-lg-3 col-6" >
            <div class="card" style="background: transparent;color:#FFFFFF;">
            <div class="card-body border border-light rounded-bottom" >
            <div >
            <h6 style="text-align: left;color:#FFFFFF;" class="card-title text-truncate" >Total</h6><h6 id="carregadas" style="text-align: center">0</h6>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <hr>
            </form>

            <!-- CC Placeholder, Select API, Start and Stop -->
            <textarea type="text" class="md-textarea form-control" style="border-color: #fff; background: transparent; color: #FFFFFF; text-align: center;" id="lista" rows="5" placeholder="xxxxxxxxxxxxxxxx|xx|xxxx|xxx"></textarea>
            <br>
            <div class="form-group" id="hidden_div" style="display:none;">
            <textarea name="sk" id="sk" rows="1" type="text" class="form-control" style="border-color: #fff;background: transparent;color: #FFFFFF;overflow:hidden; text-align: center;" placeholder="sk_live_xxxxxxxxxxxxxxxx" class="form-group" id="hidden_div" style="display:none;"></textarea>
            <br>
            </div>

            <select name="gate" id="gate" class="form-control" style="margin-bottom: 20px;background: transparent;color: #fff"  onchange="showDiv('hidden_div', this)">
            <?php for ($i=0; $i < count($api_file); $i++) {
			echo '<option style="background:transparent;color:#2c2e36" value="'.$api_file[$i].'">'.$api_name[$i].'</option>';
			}?>
			</select>
            <button type="button" class="btn btn-outline-light" style="width:100%" id="testar" onclick="enviar()">Start</button>
            </form>
            </div>

            <!-- Card Responses Holder -->
            <br>
            <div class="col-md-13">
            <div class="card border border-success"style="background:#2c2e36">
            <div style="position: absolute;top: 0;right: 0;">
            <div class="btn-group" role="group" aria-label="Basic example">
           <!-- <button type="button" onclick="copyToClipboard('.aprovadas')"class="btn btn-outline-light">COPY CARDS</button>&nbsp;-->
           <button type="button" id="mostra4" class="btn btn-outline-light">SHOW | HIDE</button>
            </div>
            </div>

            <div class="card-body">
            <h6><p style="text-align:left; color: #fff" class="card-title">CVV(Charged)  </span><span id="cLive3" class="badge bg-success">0</p></h6>
            <div id="bode4"><span id=".aprovada" class="aprovada"></span>
            </div>
            </div>
            </div>
            </div>
            <br>

            <div class="col-md-13">
            <div class="card border border-success"style="background:#2c2e36">
            <div style="position: absolute;top: 0;right: 0;">
            <div class="btn-group" role="group" aria-label="Basic example">
           <!-- <button type="button" onclick="copyToClipboard('.aprovadas')"class="btn btn-outline-light">COPY CARDS</button>&nbsp;-->
            <button type="button" id="mostra1" class="btn btn-outline-light">SHOW | HIDE</button>
            </div>
            </div>

            <div class="card-body">
            <h6><p style="text-align:left; color: #fff" class="card-title">CVV  </span><span id="cLive2" class="badge bg-success">0</p></h6>
            <div id="bode1"><span id=".aprovadas" class="aprovadas"></span>
            </div>
            </div>
            </div>
            </div>
            <br>
            <div class="col-md-13">
            <div class="card border border-warning"style="background:#2c2e36">
            <div style="position: absolute;top: 0;right: 0;">
            <div class="btn-group" role="group" aria-label="Basic example">
           <!-- <button type="button" onclick="copyToClipboard('.aprovadas')"class="btn btn-outline-light">COPY CARDS</button>&nbsp;-->
           <button type="button" id="mostra3" class="btn btn-outline-light">SHOW | HIDE</button>
            </div>
            </div>
            <div class="card-body">
            <h6><p style="text-align:left; color: #fff" class="card-title">CCN  </span><span id="cWarn2" class="badge bg-warning">0</p></h6>
            <div id="bode3"><span id=".edrovadas" class="edrovadas"></span>
            </div>
            </div>
            </div>
            </div>
            <br>
            <div class="col-md-13">
            <div class="card border border-danger"style="background:#2c2e36">
            <div style="position: absolute;top: 0;right: 0;">
            <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" id="mostra2" class="btn btn-outline-light">SHOW | HIDE</button>&nbsp;
            </div>
            </div>
            <div class="card-body">
            <h6><p style="text-align:left; color: #fff" class="card-title">Dead  </span><span id="cDie2" class="badge bg-danger">0</p></h6>
            <div id="bode2"><span id=".reprovadas" class="reprovadas"></span>
            </div>
            </div>
            </div>
            </div>

            <!-- JS of Checker -->
            <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
            <script src="../assets/js/sidebar.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.1.0/mdb.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
            <script src="../assets/js/arceus.js" type="text/javascript"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>
</body>
</html>