<?php
namespace App\Model;
use App\Utils\DBconnect;
class Users extends DBconnect{

    private ?int $id_users;
    private ?string $pseudo_users;

    private ?string $first_name_users;

    private ?string $name_users;
    private ?string $email_users;
    private ?string $password_users;

    private ?string $description_users;
    private ?bool $active_users;
    private ?string $statut_users;
    private ?string $users_profile_picture;
    private ?string $users_front_picture;

    public function getId():?int{
        return $this->id_users;
    }
    public function setId(?int $id){
        $this->id_users = $id;
    }
    public function getPseudo():?string{
        return $this->pseudo_users;
    }
    public function setPseudo(?string $pseudo){
        $this->pseudo_users = $pseudo;
    }
    public function getFirst_name_users():?string{
        return $this->first_name_users;
    }
    public function setFirst_name_users(?string $first_name_users){
        $this->first_name_users = $first_name_users;
    }
    public function setName(?string $name_users){
        $this->name_users = $name_users;
    }
     public function getName():?string{
        return $this->name_users;
    }
    public function getEmail():?string{
        return $this->email_users;
    }
    public function setEmail(?string $email_users){
        $this->email_users = $email_users;
    }
    public function getPassword():?string{
        return $this->password_users;
    }
    public function setPassword(?string $password_users){
        $this->password_users = $password_users;
    }
    public function getDescription():?string{
        return $this->description_users;
    }
    public function setDescription(?string $description_users){
        $this->description_users = $description_users;
    }
    public function getActive_users():?bool{
        return $this->active_users;
    }
    public function setActive_users(?bool $active_users){
        $this->description_users = $active_users;
    }
    public function getStatut():?string{
        return $this->statut_users;
    }
    public function setStatut(?string $statut_users){
        $this->$statut_users = $statut_users;
    }
    public function getUsers_profile_picture():?string{
        return $this->users_profile_picture;
    }
    public function setUsers_profile_picture(?string $Users_profile_picture){
        $this->users_profile_picture = $Users_profile_picture;
    }
    public function getUsers_front_picture():?string{
        return $this->users_front_picture;
    }
    public function setUsers_front_picture(?string $Users_front_picture){
        $this->users_front_picture = $Users_front_picture;
    }
    public function add(){
        try{
            $pseudo = $this->pseudo_users;
            $first_name = $this->first_name_users;
            $name = $this->name_users;
            $email = $this->email_users;
            $password = $this->password_users;
            $profile_picture = $this->users_profile_picture;
            $front_picture = $this->users_front_picture;
        $req = $this->connexion()->prepare(
            "INSERT INTO users(pseudo_users,first_name_users,name_users, 
                email_users, password_users,users_profile_picture,users_front_picture) VALUES(?,?,?,?,?,?,?)"
        );
        $req->BindParam(1,$pseudo,\PDO::PARAM_STR);
        $req->bindParam(2,$first_name,\PDO::PARAM_STR);
        $req->bindParam(3,$name,\PDO::PARAM_STR);
        $req->bindParam(4,$email,\PDO::PARAM_STR);
        $req->bindParam(5,$password,\PDO::PARAM_STR);
        $req->bindParam(6,$profile_picture,\PDO::PARAM_STR);
        $req->bindParam(7,$front_picture,\PDO::PARAM_STR);
        $req->execute();
        }
        catch(\Exception $e){
            die('Error : '.$e->getMessage());
        }
    }
    public function findOneBy(){
        try{
            $pseudo = $this->pseudo_users;
            $req = $this->connexion()->prepare(
                "SELECT id_users,pseudo_users,first_name_users,name_users,email_users,password_users,users_profile_picture,users_front_picture 
                FROM users WHERE pseudo_users = ?");
            $req->bindParam(1,$pseudo,\PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Users::class);
            $req->execute();
             return $req->fetch();
        }catch(\Exception $e){
            die('Error : '.$e->getMessage());
        }
    }
    public function findAll(){
        try {
            $id = $this->getId();
            $req = $this->connexion()->prepare(
                "SELECT id_users, pseudo_users, first_name_users, 
                email_users, users_profile_picture FROM users WHERE id_users != ?");
            $req->bindParam(1, $id, \PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Users::class);
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function updatePP(){
        try {
            $id = $_SESSION["id"];
            $profile_picture = $this->users_profile_picture;
            $req = $this->connexion()->prepare('UPDATE users SET users_profile_picture = ? 
             WHERE id_users = ?');
            $req->bindParam(1, $profile_picture, \PDO::PARAM_STR);
            $req->bindParam(2, $id, \PDO::PARAM_INT);
            $req->execute();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
}















?>
