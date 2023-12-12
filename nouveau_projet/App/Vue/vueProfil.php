
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PF</title>
    <link rel="stylesheet" href="Public\asset\style\style_profil_02.css">
    <script type="text/javascript" src="Public\asset\script\script_profil.js"></script>
</head>
<body id="app">
    <section>
        <img id="bandeau_profil" src="<?= $_SESSION["imageBandeau"]?>">
            <div>
                <img id="photo_profil" src="<?= $_SESSION["image"]?>" alt="" srcset="">
                <div id="cadre_prenom">
                    <h3><?php echo $_SESSION['pseudo']?></h3>
                </div>
            </div>
            <div id="changerPhoto">
                <img src="Public\asset\img\common_icon\icon_changer_photo.png" alt="">
                <p>changer photo profil</p>
            </div>
            <div id="changerBandeau">
                <img src="Public\asset\img\common_icon\icon_changer_photo.png" alt="">
                <p>changer bandeau</p>
            </div>
            <div id="cadre_description">
                <p>developpeur de profession, je dessine sur
                    mon temps libre ! je suis plutôt un lecteur 
                    mais j’ai quand même commencer une BD :
                    “retour à la terre “ n’hésite pas à la lire !</p>
            </div>
            <button class="button"  id="publier">publier</button>
    <form id="formulaire_publication" action="" method="post" enctype="multipart/form-data">
        <img id="btnClose" src="Public/asset/img/close.png" alt="">
        <input type="file" name="photo_publication" id="">
        <textarea name="texte_publication" id="" cols="30" rows="10"></textarea>
        <input type="submit" name="submit" value="poster">
    </form>
    <!-- <form id="formulaire_changerPP" action="" method="post" enctype="multipart/form-data">
        <img class="btnClose" src="Public/asset/img/close.png" alt="">
        <input type="file" name="changer_pp" id="">
        <input type="submit" name="submitChangePP" value="poster">
    </form> -->
    <div id="content">
        <div id="content_title">
            <h3>Publications</h3>
        </div>
        <div class="cadrePublication">
            <?php
             if(empty($posts)){
                ?><p>vous n'avez pas encore de publications</p><?php
            }else{
                foreach($posts as $post):
                ?>
            <div class="content_title_publication">
                <img class="smallProfile" src="<?= $_SESSION["image"]?>" alt="">
            <p><?php echo $_SESSION['pseudo']?> a publié</p>
            <p>le <?php echo $post["date_creation"]?></p>
            </div>
            <p>message post : <?php echo $post["message_post"]?></p>
            <img class="imgPublication" src="<?= $post['picture_post']?>" alt="message"/>
        <?php endforeach?>
       <?php } ?>
        </div>
    </div>
        
    <p><?=$error?></p>
    
</section>

<script type="text/javascript" src="Public\asset\script\script_profil.js"></script>
</body>
</html>