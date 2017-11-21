<header>
    <nav>
         <div class="container">
            <ul class="menu">
                <li><a href="/index.php">Accueil</a></li>
                <li><a href="/controller/articles.php">Chapitres</a></li>
                <?php
                if(!isset($_SESSION['admin']) OR !$_SESSION['admin']) {
                ?>
                <li><a href="/controller/connexion.php">Connexion</a></li>
                <?php
                } else {
                ?>
                <li><a href="/controller/admin.php">Admin</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>
</header>