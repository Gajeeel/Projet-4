<?php

require'vendor/autoload.php';

use Con\controleurAccueil;
use Con\controleurAdmin;
use Con\controleurBillet;
use Con\controleurConnexion;
use Acme\billet;
use Acme\commentaire;
use Acme\modele;
use Vue\vue;

class Routeur {

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlConnexion;
    private $ctrlAdmin;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlConnexion = new ControleurConnexion();
        $this->ctrlAdmin = new ControleurAdmin();
    }

    // Traite une requête entrante
    public function routerRequete() {
        
        try {
            session_start();
            if (isset($_GET['action'])) {

                if ($_GET['action'] == 'billet') {

                    $id_news = intval($this->getParametre($_GET,'id'));
                    if ($id_news != 0) {

                        $this->ctrlBillet->billet($id_news);

                    }

                    else {

                        throw new Exception("Identifiant de billet non valide");

                    }

                }

                else if ($_GET['action'] == 'commenter') {

                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $commentaires = $this->getParametre($_POST, 'commentaire');
                    $id_news = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->commenter($pseudo, $commentaires, $id_news);
                    header('Location: index.php?action=admin');

                }

                else if ($_GET['action'] == 'connexion') {

                    $this->ctrlConnexion->connexion();

                }

                else if (($_GET['action'] == 'ajouter') and (isset($_SESSION['admin']))) {

                    $titre = $this->getParametre($_POST, 'titre');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $image = htmlspecialchars($_FILES['image']['name']);
                    if(isset($_FILES['image'])) { 

                        $dossier = 'view/images/';
                        $fichier = basename($_FILES['image']['name']);
                        if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) {

                            $this->ctrlAdmin->ajouter($titre,$contenu,$image);
                            header('Location: index.php?action=admin');

                        }

                        else //Sinon (la fonction renvoie FALSE).
                        {

                              echo 'Echec de l\'upload !';

                        }

                    }

                }

                else if (($_GET['action'] == 'supprimer') and (isset($_SESSION['admin']))) {

                    $id_news = intval($this->getParametre($_GET,'id'));
                    $this->ctrlAdmin->supprimer($id_news);
                    header('Location: index.php?action=admin');

                }

                else if ($_GET['action'] == 'signaler') {

                    $id_comm = intval($this->getParametre($_GET,'id'));
                    $id_news = intval($this->getParametre($_GET,'ida'));
                    $this->ctrlBillet->signaler($id_comm);
                    $this->ctrlBillet->billet($id_news);

                }

                else if (($_GET['action'] == 'supprimercom') and (isset($_SESSION['admin']))) {

                    $id_comm = intval($this->getParametre($_GET,'id'));
                    $this->ctrlAdmin->supprimerComm($id_comm);
                    header('Location: index.php?action=admin');

                }

                else if (($_GET['action'] == 'update') and (isset($_SESSION['admin']))) {

                    $id_news = intval($this->getParametre($_GET,'id'));
                    $this->ctrlAdmin->update($id_news);

                }

                else if (($_GET['action'] == 'modifier') and (isset($_SESSION['admin']))) {

                    $titre = $this->getParametre($_POST, 'titre');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $id_news = intval($this->getParametre($_GET,'id'));
                    $image = htmlspecialchars($_FILES['image']['name']);
                    if(isset($_FILES['image'])) { 

                         $dossier = 'view/images/';
                         $fichier = basename($_FILES['image']['name']);
                         if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) {

                              echo 'Upload effectué avec succès !';
                              $this->ctrlAdmin->modifier($contenu,$titre,$image,$id_news);
                              header('Location: index.php?action=admin');

                         }

                         else //Sinon (la fonction renvoie FALSE).
                         {

                              $this->ctrlAdmin->modifier2($contenu,$titre,$id_news);
                              header('Location: index.php?action=admin');

                         }

                    }

                }

                else if (($_GET['action'] == 'insert') and (isset($_SESSION['admin']))) {

                    $this->ctrlAdmin->insert();

                }

                else if ($_GET['action'] == 'cotoadmin'){

                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $mdp = htmlspecialchars($_POST['mdp']);
                    if($pseudo == 'admin' AND $mdp == '1234'){

                        $_SESSION['admin'] = true;
                        header('Location: index.php?action=admin');

                    } else {
                      
                        throw new Exception("Identifiant ou Mot de passe erroné");

                    }

                }

                else if ($_GET['action'] == 'deconnexion'){

                  $this->ctrlConnexion->deconnexion();

                }

                else if (($_GET['action'] == 'admin') and (isset($_SESSION['admin']))) {

                    $this->ctrlAdmin->admin();

                }

                else {

                    throw new Exception("Action non valide");

                }

            } else {  // aucune action définie : affichage de l'accueil

                $this->ctrlAccueil->accueil();

            }

        }

        catch (Exception $e) {

            $this->erreur($e->getMessage());

        }

    }

  // Affiche une erreur
  private function erreur($msgErreur) {

      $vue = new Vue("Erreur");
      $vue->generer2(array('msgErreur' => $msgErreur));

  }

  // Recherche un paramètre dans un tableau
  private function getParametre($tableau, $nom) {

      if (isset($tableau[$nom])) {

          return htmlspecialchars($tableau[$nom]);

      } else

          throw new Exception("Paramètre '$nom' absent");

  }

}