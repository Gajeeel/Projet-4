<div class="col-lg-10 col-lg-offset-1 insert">
    <h2>Rédiger un nouvel article</h2>
    <br>
    <form role="form" action="index.php?action=ajouter" method="POST" enctype="multipart/form-data">
        <div class="form-group form-insert col-lg-6 col-lg-offset-3">
            <label for="nom">Titre</label>
            <input type="text" placeholder="Titre de l'article" name="titre" required class="form-control">
        </div>
        <div class="form-group form-insert col-lg-6 col-lg-offset-3">
            <label for="nom">Image</label>
            <br>
            <input type="file" id="image" name="image" required class="form-control">
        </div>
        <div class="form-group form-insert col-lg-12">
            <label for="nom">Contenu</label>
            <textarea placeholder="Contenu de votre article" rows="10" name="contenu" class="form-control"></textarea>
            <button type="submit" formnovalidate="true" value="Poster l'article" name="articles" class="btn btn-primary btn-lg form-insert">Poster l'article</button>
        </div>
    </form>
</div> 
  