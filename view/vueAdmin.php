<div class="container">
    <h2 class="liste">Liste des articles </strong><a href="index.php?action=insert" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h2>
    <table class="table table-striped table-bordered col-lg-12">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($billets as $billet) {
        ?>
            <tr>
                <td><?= $billet->getId();?></td>
                <td><?= $billet->getTitre();?></td>
                <td><?= $billet->getDateformate();?></td>
                <th width=300>
                    <a class="btn btn-default" href="index.php?action=billet&id=<?= $billet->getId();?>"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>
                    <a class="btn btn-primary" href="index.php?action=update&id=<?= $billet->getId();?>"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>
                    <a class="btn btn-danger" href="index.php?action=supprimer&id=<?= $billet->getId();?>"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>
                </th>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>     
</div>
<div class="container">
    <h2 class="liste" >Liste des commentaires </strong></h2>
    <table class="table table-striped table-bordered col-lg-12">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pseudo</th>
                <th>Date</th>
                <th>Signalement</th>
                <th>Id article</th>
                <th>Contenu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($commentaires as $co) {
        ?>
            <tr>
                <td><?= $co->getId();?></td>
                <td><?= $co->getPseudo();?></td>
                <td><?= $co->getDateformatee();?></td>
                <td><?= $co->getSignalement();?></td>
                <td><?= $co->getId_article();?></td>
                <td><?= $co->getCommentaire();?></td>
                <th width=130>
                    <a class="btn btn-danger" href="index.php?action=supprimercom&id=<?= $co->getId();?>"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>
                </th>
            </tr>   
        <?php
        }
        ?>
        </tbody>
    </table>
</div>
