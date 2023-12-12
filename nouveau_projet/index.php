<?php
    require_once './autoload.php';
    require_once './vendor/autoload.php';
    use App\Controller\UsersController;
    use App\Controller\Users_postController;
    $usersController = new UsersController;
    $users_postController = new Users_postController;
    session_start();
    $url = parse_url($_SERVER['REQUEST_URI']);
    $path = isset($url['path']) ? $url['path'] : '/';
    switch ($path) {
        case '/nouveau_projet/connexion':
            $usersController->connexionUsers();
            break;
        case '/nouveau_projet/inscription_PFR':
            $usersController->addUsers();
            break;
        case '/nouveau_projet/profil':
            $users_postController->addUsersPost();
            $users_postController->getAllUsersPost();
            break;
        default:
            include './error.php';
            break;
    }
?>
