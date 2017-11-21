<?php
foreach($billets as $billet) {
?>
<div class="col-lg-10 col-lg-offset-1 insert">
    <h1>Modification de l'article <?= $billet->getId();?></h1>
    <br>
    <form role="form" action="index.php?action=modifier&amp;id=<?= $billet->getId();?>" method="POST" enctype="multipart/form-data">
        <div class="form-group form-insert col-lg-6 col-lg-offset-3">
            <label for="nom">Titre</label>
            <input type="text" placeholder="Titre de l'article" value="<?= $billet->getTitre();?>" name="titre" required class="form-control">
        </div>
        <div class="form-group form-insert col-lg-6 col-lg-offset-3">
            <label for="nom">Image</label>
            <br>
            <input type="file" id="image" name="image" value="<?= $billet->getImage();?>"  required class="form-control">
        </div>
        <div class="form-group form-insert col-lg-12">
            <label for="nom">Contenu</label>
            <textarea placeholder="Contenu de votre article" rows="10" name="contenu"  class="form-control"><?= $billet->getContenu();?></textarea>
            <button type="submit" formnovalidate="true" value="Poster l'article" name="articles" class="btn btn-primary btn-lg form-insert">Poster l'article</button>
        </div>
    </form>
</div>
<?php
}
?>
