<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">   
    <title>Article</title>
    <script src="https://use.fontawesome.com/ab98c46f8d.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/view/css/style.css">
    <meta name="viewport" content="width=device-width , initial-scale=1">
    
</head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#monMenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"> BLOG DE JEAN FORTEROCHE</a>
                </div>
                <div class="collapse navbar-collapse" id="monMenu">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><span class=" glyphicon glyphicon-home"></span> Accueil</a></li>
                        <li><a href="index.php"><span class=" glyphicon glyphicon-book"></span> Chapitres</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if(isset($_SESSION['admin'])){
                        ?>
                        <li><a href="index.php?action=admin"><span class=" glyphicon glyphicon-log-in"></span> Admin</a></li>
                        <?php
                        } else {
                        ?>
                        <li><a href="index.php?action=connexion"><span class=" glyphicon glyphicon-log-in"></span> Connexion</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div>
        <img src="view/images/ecrire.jpg" class="img-responsive" id="image-back" style="position:relative; max-height:500px; width:94%; margin:0 auto; margin-bottom:20px; margin-top:100px;">
        </div>

        <div class="container-fluid" id="acc">
            <div class="row">
                <?= $contenu ?> 
            </div>     
        </div>  

        <div class="footer-copyright">
            <div class="container-fluid">
                <strong>© 2017 Copyright: Jean Forteroche</strong>
            </div>
        </div>         
    </body>
</html>