<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public/asset/style/style_inscription.css">
    <title>Connexion</title>
</head>
<body>
<section id="contentConnection">
        <img src="Public\asset\img\logo_2.png" alt="" id="logo">
        <h1 class="secondaryColor">Bienvenue sur PFR...</h1>
        <form action="" method="post">

            <div class="form">
                <label class ="dis"for="pseudo_users">Nom utilisateur : </label>
                <input type="text" name="pseudo_users" id="name" >
              </div>
              <div class="form">
                <label class="pass" for="password_users">Mot de passe : </label>
                <input type="password" name="password_users" id="passe" >
              </div>
              <div class="remember">
                <!-- <label class ="dis" for="rememberMe">se souvenir de moi :</label>
                <input class="checkbox" type="checkbox" name="rememberMe" id=""> -->
              </div>
              <div class="formBouton">
               
              
                <input class="bg2 bouton" type="submit" name="submit" value="connexion">
                <div>
                    <!-- <input class="bg2 bouton" type="submit2" value="Passez"> -->
                </div>
            </div>

        </form>
        <?=$error?>
        <div class="linkInscription">
        <p>première connexion?</p>
        <a href="inscription_PFR">inscrivez-vous ici!</a>
        </div>
    </section>
   
</body>
</html>
<!-- <form action="" method="post">
    <label for="pseudo_users">saisir le pseudo : </label>
    <input type="text" name="pseudo_users" id="">
    <label for="password_users">saisir le password : </label>
    <input type="password" name="password_users" id="">
    <input type="submit" value="envoyer" name="submit">
   </form> -->