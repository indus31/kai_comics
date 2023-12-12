<?php
namespace App\Model;
use App\Utils\DBConnect;
use App\Model\Users;
class Users_post extends DBConnect{
    /*---------------------------- 
                Attributs
    -----------------------------*/
    private int $id_users_post;
    private ?string $content_post;
    public $date_creation;
    private ?string $picture_post;
    private ?Users $id_author; 
   
    /*---------------------------- 
            Constructeur
    -----------------------------*/
    public function __construct(){
        
        $this->id_author = New Users();
    }
    /*---------------------------- 
            Getters et Setters
    -----------------------------*/
    public function getId(){
        return $this->id_users_post;
    }
    public function setId(?int $id):void{
        $this->id_users_post = $id;
    }
    public function getContentPost():?string{
        return $this->content_post;
    }
    public function setContentPost(?string $content):void{
        $this->content_post = $content;
    }
    public function getDate():?string{
        return $this->date_creation;
    }
    public function setDateCreation($date):void{
        $this->date_creation = $date;
    }
    public function getPicturePost():?string{
        return $this->picture_post;
    }
    public function setPicturePost(?string $picture){
        $this->picture_post = $picture;
    }
    public function getAuteur():?Users{
        return $this->id_author;
    }
    public function setAuteur(?Users $auteur):void{
        $this->id_author = $auteur;
    }
    /*---------------------------- 
                Méthode
    -----------------------------*/
    public function add(){
        try {
            $content = $this->getContentPost();
            $date = $this->getDate();
            $picture = $this->getPicturePost();
            $auteur = $this->getAuteur()->getId();
            $req = $this->connexion()->prepare('INSERT INTO users_post(message_post,
            date_creation, picture_post, id_author)
            VALUES (?,?,?,?)');
            $req->bindParam(1, $content, \PDO::PARAM_STR);
            $req->bindParam(2, $date, \PDO::PARAM_STR);
            $req->bindParam(3, $picture, \PDO::PARAM_STR);
            $req->bindParam(4, $auteur, \PDO::PARAM_INT);
            $req->execute();
        } catch (\Exception $e) {
            die('Error :'.$e->getMessage());
        } 
    }
    public function findOneBy(){
        try {
            $content = $this->getContentPost();
            $date = $this->getDate();
            $picture = $this->getPicturePost();
            $auteur = $this->getAuteur()->getId();
            $req = $this->connexion()->prepare('SELECT id_users_post,message_post, 
            date_creation,picture_post, id_users FROM users_post 
            WHERE message_post = ? AND date_creation = ? AND id_author = ? 
            ');
            $req->bindParam(1, $content, \PDO::PARAM_STR);
            $req->bindParam(2, $date, \PDO::PARAM_STR);
            $req->bindParam(3,$picture,\PDO::PARAM_STR).
            $req->bindParam(4, $auteur, \PDO::PARAM_INT);
            $req->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Users_post::class);
            $req->execute();
            return $req->fetch();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function findAllPost(){
        try {
            $this->getAuteur()->setId($_SESSION["id"]);
            $id = $this->getAuteur()->getId();
            $req = $this->connexion()->prepare("SELECT * FROM users_post WHERE id_author = ? ");
            $req->bindParam(1,$id,\PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
}

//     public function find(){
//         try {
//             $requete = 'SELECT id_chocoblast FROM chocoblast WHERE id_chocoblast = ?';
//             $requete2 = 'SELECT id_chocoblast, slogan_chocoblast,
//             date_chocoblast, auteur_chocoblast AS auteur_id, auteur.nom_utilisateur AS auteur_nom,
//             auteur.prenom_utilisateur AS auteur_prenom, cible_chocoblast AS cible_id,
//             cible.nom_utilisateur AS cible_nom, cible.prenom_utilisateur AS cible_prenom
//             FROM chocoblast 
//             INNER JOIN utilisateur AS cible ON chocoblast.cible_chocoblast = cible.id_utilisateur
//             INNER JOIN utilisateur AS auteur ON chocoblast.auteur_chocoblast = auteur.id_utilisateur
//             WHERE id_chocoblast = ?';
//             $id = $this->getId();
//             $req = $this->connexion()->prepare($requete);
//             $req->bindParam(1, $id , \PDO::PARAM_INT);
//             $req->execute();
//             //test si la requête renvoi un enregistrement
//             if($req->fetch()){
//                 $req2 = $this->connexion()->prepare($requete2);
//                 $req2->bindParam(1, $id , \PDO::PARAM_INT);
//                 $req2->execute();
//                 $req2->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Chocoblast::class);
//                 $choco = $req2->fetch();
//                 $choco->getAuteur()->setId($choco->auteur_id);
//                 $choco->getAuteur()->setNom($choco->auteur_nom);
//                 $choco->getAuteur()->setPrenom($choco->auteur_prenom);
//                 $choco->getCible()->setId($choco->cible_id);
//                 $choco->getCible()->setNom($choco->cible_nom);
//                 $choco->getCible()->setPrenom($choco->cible_prenom);
//             }
//             else{
//                 $choco = null;
//             }
//             return $choco;
//         } catch (\Exception $e) {
//             die('Error : '.$e->getMessage());
//         }
//     }
//     
//     public function update(){
//         try {
//             $id = $this->id_chocoblast;
//             $slogan = $this->slogan_chocoblast;
//             $date = $this->date_chocoblast;
//             $auteur = $this->auteur_chocoblast->getId();
//             $cible = $this->cible_chocoblast->getId();
//             $req = $this->connexion()->prepare('UPDATE chocoblast SET slogan_chocoblast = ?, 
//             date_chocoblast = ?, cible_chocoblast = ? WHERE id_chocoblast = ? AND auteur_chocoblast = ?');
//             $req->bindParam(1, $slogan, \PDO::PARAM_STR);
//             $req->bindParam(2, $date, \PDO::PARAM_STR);
//             $req->bindParam(3, $cible, \PDO::PARAM_INT);
//             $req->bindParam(4, $id, \PDO::PARAM_INT);
//             $req->bindParam(5, $auteur, \PDO::PARAM_INT);
//             $req->execute();
//         } catch (\Exception $e) {
//             die('Error : '.$e->getMessage());
//         }
//     }
//     public function filterAll($filter){
//         try {
//             $requete = 'SELECT id_chocoblast, slogan_chocoblast, date_chocoblast, cible.nom_utilisateur 
//             AS cible_nom, cible.prenom_utilisateur AS cible_prenom, cible.image_utilisateur AS cible_image, 
//             auteur.nom_utilisateur AS auteur_nom, auteur.prenom_utilisateur AS auteur_prenom,
//             auteur.image_utilisateur AS auteur_image, auteur.id_utilisateur AS auteur_id
//             FROM chocoblast 
//             INNER JOIN utilisateur AS cible ON chocoblast.cible_chocoblast = cible.id_utilisateur
//             INNER JOIN utilisateur AS auteur ON chocoblast.auteur_chocoblast = auteur.id_utilisateur ';
           
//             switch ($filter) {
//                 case 1:
//                     $order = 'ORDER BY slogan_chocoblast ASC';
//                     break;
//                 case 2:
//                     $order = 'ORDER BY slogan_chocoblast DESC';
//                     break;
//                 case 3:
//                     $order = 'ORDER BY date_chocoblast ASC';
//                     break;
//                 case 4:
//                     $order = 'ORDER BY date_chocoblast DESC';
//                     break;
//                 default:
//                     $order = "";
//                     break;
//             }
//             $requete .= $order;
//             $req = $this->connexion()->prepare($requete);
//             $req->execute();
//             return $req->fetchAll(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Chocoblast::class);
//         } catch (\Exception $e) {
//             die('Error : '.$e->getMessage());
//         }
//     }
// 