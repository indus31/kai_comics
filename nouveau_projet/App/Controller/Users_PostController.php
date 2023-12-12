<?php
namespace App\Controller;

use App\Model\Users;
use App\Utils\Utilitaire;
use App\Model\Users_post;
use App\vue\Template;
class Users_PostController extends Users_post{
    public function addUsersPost(){
        $error ="";
        $user = new Users();
        $user->setId(Utilitaire::cleanInput($_SESSION['id']));
        $users = $user->findAll();
        if(isset($_POST['submit'])){
            // dd("hello world") ;
            if(!empty($_POST['texte_publication'])  
            ){
                if($_FILES["photo_publication"]["tmp_name"]!=""){
                    move_uploaded_file($_FILES["photo_publication"]["tmp_name"],"./Public/asset/img/img_post/".$_FILES["photo_publication"]["name"]);
                    $this->setPicturePost(Utilitaire::cleanInput("./Public/asset/img/img_post/".$_FILES["photo_publication"]["name"]));
                }else{
                    $this->setPicturePost(Utilitaire::cleanInput("./Public/asset/img/img_post/bandeau_default.jpg"));
                }
                $this->setContentPost(Utilitaire::cleanInput($_POST['texte_publication']));
                
                // $this-setDateCreation(new \DateTimeImmutable());
                $date = new \DateTimeImmutable();
                            
                $this->date_creation = $date->format('Y-m-d');
                
                
                $this->getAuteur()->setId(Utilitaire::cleanInput($_SESSION['id']));
                
                $this->add();
                $error = "La publication a été ajouté en BDD";     
            }
            else{
                $error = "Veuillez remplir tous les champs du formulaire";
            }
        }
        include './App/Vue/vueProfil.php';
    }
    public function getAllUsersPost(){
        $error = "";
        $posts = $this->findAllPost();
        if(empty($Posts)){
            $error = "vous n’avez pas encore publié de contenu";
        }
        include './App/Vue/vueProfil.php';
    }
}
    ?>