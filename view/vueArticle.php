<?php
foreach($billets as $billet){
?>
<div class ="col-sm-10 col-sm-offset-1 col-sm col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
    <div class="body-block-article">
        <img src ="/view/images/<?= $billet->getImage();?>" class="img-responsive" alt="image alaska">
        <br>
        <h2><?= $billet->getTitre();?></h2>
        <br>
        <p>Crée par Jean Forteroche le <span><?= $billet->getDateformate();?></span></p>
        <br>
        <div class="contenu">
            <?= $billet->getContenu();?>
        </div>
    </div>
</div>
<br>
<br>
<div class="col-sm-10 col-sm-offset-1 col-sm col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2"> 
    <div class="body-block-commentaire"> 
        <br>
        <form method="POST" action="index.php?action=commenter">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" placeholder="Nom" name="pseudo" required class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="commentaire">Commentaire</label>
                <textarea placeholder="Votre commentaire" style="min-height:150px;" name="commentaire" required class="form-control mceNoEditor" ></textarea>
            </div>
            <br>
            <input type="hidden" name="id" value="<?= $billet->getId();?>" />
            <button type="submit" name="submit_commentaire" class="btn btn-primary btn-lg">Poster le commentaire</button>
        </form>
    </div>
</div>
<br>
<br>
<?php
}    
?>
<?php
foreach ($commentaires as $commentaire){   
?>
<div class="col-sm-10 col-sm-offset-1 col-sm col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
    <div class="body-block-com">
        <form method ="POST">
            <div class="row">
            <div class="col-lg-12 block-com">
                <br>
            <span class="auteur" style="font-style:italic">Posté par <?= $commentaire->getPseudo();?> le <?= $commentaire->getDateformatee();?></span>
            <br>
            <br>
            <span><?= $commentaire->getCommentaire();?></span>
            <br>
            <br>
            </div>
            <div class="col-lg-12 signal">
            <?php
            foreach($billets as $billet){
            ?>
            <a class="btn btn-danger btn-lg" href="index.php?action=signaler&amp;ida=<?= $billet->getId();?>&amp;id=<?= $commentaire->getId();?>">Signaler</a>
            <?php
            }
            ?>
            </div>
            </div>
        </form>
    </div>
</div>
<?php  
}
?>
</div>

        