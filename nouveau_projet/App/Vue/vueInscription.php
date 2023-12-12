<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="Public\asset\style\style_inscription.css">
</head>
<body>
<section id="inscription">
        <div class="inscriptionP1">
            <img src="Public/asset/img/logo_2.png" alt=""id="logo">
            <h1 class="secondaryColor">inscription</h1>
            
        </div>
        <form class="formInscription" method="post" action="">

            <div class="formDisplay">
                <label for="pseudo_users">Nom utilisateur : </label>
                <input type="text" name="pseudo_users" id="pseudo" >
            </div>
            <div class="formDisplay">
                <label for="first_name_users">Prénom : </label>
                <input type="text" name="first_name_users" id="firstName" >
            </div >
            <div class="formDisplay">
                <label for="name_users">Nom : </label>
                <input type="text" name="name_users" id="name" >
            </div>

            <div class="formDisplay">
                <label for="email">Enter your email: </label>
                <input type="email" name="email_users" id="email" >
            </div>

            <div class="formDisplay">
                <label  for="password_users">Mot de passe : </label>
                <input type="password" name="password_users" id="passe" >
              </div>

              <div class="formDisplay">
                <label  for="confirm_password">Confirmer mot de passe : </label>
                <input type="password" name="confirm_password" id="repasse" >
              </div> 

              <div class="displayVide">
                <div class="vide"></div>

            <input class="bg2 bouton" id="envoyer" type="submit" name="submit" value="envoyer">
                <!-- <button class="bg2 bouton " type="button"><a class="tertiaryColor"href="Profil.html">envoyer</a></button> -->
              </div>
              <div><?=$error?></div>
    
    
</body>
</html>