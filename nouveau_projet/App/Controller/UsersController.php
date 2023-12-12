<?php 
namespace App\Controller;
use App\Model\Users;
use App\Utils\Utilitaire;
class UsersController extends Users{
    public function addUsers(){
        $error="";
        if(isset($_POST['submit'])){
            if(!empty($_POST['pseudo_users']) AND !empty($_POST['first_name_users'])
            AND !empty($_POST['name_users']) AND !empty($_POST['email_users']) AND
            !empty($_POST['password_users']) AND !empty($_POST['confirm_password'])){
                if($_POST['password_users']==$_POST['confirm_password']){
                    $this->setPseudo($_POST['pseudo_users']);
                    $this->setName($_POST['name_users']);
                    $this->setFirst_name_users($_POST['first_name_users']);
                    $this->setEmail($_POST['email_users']);
                    $this->setUsers_profile_picture("Public/asset/img/profil_default.jpg");
                    $this->setUsers_front_picture("Public/asset/img/bandeau_default.jpg");
                    if(!$this->findOneBy()){
                        $this->setPassword(password_hash($_POST['password_users'],PASSWORD_DEFAULT));
                        $this->add();
                        $error = "le compte a été ajouté en DB";
                        header("Location: ./connexion");
                    }else{
                        $error = "le compte existe déjà";
                    }
                }else{
                    $error ="les mots de passe ne correspondent pas";
                }
            }else{
                $error = "veuillez renseigner tous les champs du formulaire";
            }
        }
        include './App/Vue/vueInscription.php';
    }
    public function connexionUsers(){
        $error=" veuillez saisir vos informations";
        if(isset($_POST['submit'])){
            $error=" etape 1 : le submit fonctionne";
            if(!empty($_POST['pseudo_users']) AND !empty($_POST['password_users'])){
                $this->setPseudo($_POST['pseudo_users']);
                $user = $this->findOneBy();
                if($user){
                    if(password_verify($_POST['password_users'],$user->getPassword())){
                        $error = "connecté";
                        $_SESSION['connected'] = true;
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['name'] = $user->getName();
                        $_SESSION['image'] = $user->getUsers_profile_picture();
                        $_SESSION['imageBandeau'] = $user->getUsers_front_picture();
                        $_SESSION['pseudo'] = $user->getPseudo();
                        header("Location: ./profil");
                    }else{
                        $error = "Les informations de connexion ne sont pas valides (password)";
                    }
                }else{
                    $error = "Les informations de connexion ne sont pas valides ";
                }
            }else{
                $error = "Veuillez renseigner tous les champs du formulaire";
            }
        }
        include './App/Vue/vueConnexionUser.php';
        
    }
    // public function updateProfilPicture(){
    //     $error = "";
    //     $user = 
    // }
    // public function updateProfilPicture(){
        
    //     $user = new Users();
    //     $user->setId(Utilitaire::cleanInput($_SESSION['id']));
    //     $user= $this->findOneBy();
    //     if($user){
    //         //test si le formulaire est submit
    //         if(isset($_POST['submitChangePP'])){
    //         //test si tous les champs sont bien remplis
    //                 if(!empty($_POST['changer_pp'])){ 
    //                             $newPicture = Utilitaire::cleanInput($_POST['changer_pp']);
    //                             $user->setUsers_profile_picture($newPicture);
    //                             $user->updatePP();
    //                             $_SESSION["image"] = $newPicture
    //                             // $error = "La photo de profil a été mis jour";
    //                 }else{
                        
    //                 } 

    //         }else{
                        
    //         }
    //     $error = "impossible de trouver l'utilisateur";
    //     }
    // include'./App/Vue/vueProfil.php';        
            
    // } 
}

    
        
          





?>