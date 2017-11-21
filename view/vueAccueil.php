<?php
foreach($billets as $billet) {
?>
    <div id="block" class=" col-sm-6 col-md-6 col-lg-4">
        <div class="block-article">
        <img src ="/view/images/<?= $billet->getImage() ;?>" class="img-responsive" alt="image alaska">
            <div class="body-block">
                <br>
                <br>
                <p>Crée par Jean Forteroche le<?= $billet->getDateformate();?></p>
                <br>
                <h3><?= $billet->getTitre() ;?></h3></a>
                <br>
                <br>
                <p><?= substr($billet->getContenu(),0,340);?> ...</p>
                <br>
                <br>
                <a class="btn btn-primary btn-lg" href="index.php?action=billet&id=<?= $billet->getId();?>">Lire la suite</a>
            </div>
        </div>
    </div>
<?php
}
?>


