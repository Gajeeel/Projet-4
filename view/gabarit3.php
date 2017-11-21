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
                    <ul class="nav nvabar-nav navbar-right">
                        <li><a href="index.php?action=deconnexion"><span class=" glyphicon glyphicon-log-in"></span> Deconnexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid" id="admin">
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