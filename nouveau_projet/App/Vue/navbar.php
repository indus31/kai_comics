<?php ob_start()?>
<?php if(isset($_SESSION['connected'])):?>
    <header>
        <img  id="logo" src="img/logo_2.png" alt=""id="logo">
        <input  id="search_input" type="search" name="search" id="search">
        <img  id="search_icon" src="img/common_icon/search_icon.png" alt="">
        <nav>
            <img class="navicon" src="Public\asset\img\icon_navBar\planete.png" alt="icon planete" srcset="">
            <img class="navicon" src="Public\asset\img\icon_navBar\livre.png" alt="icon livre" srcset="">
            <img class="navicon"src="Public\asset\img\icon_navBar\auberge.png" alt="icon auberge" srcset="">
            <img class="navicon" src="Public\asset\img\icon_navBar\bell.png" alt="icon cloche" srcset="">
            <img class="navicon" src="Public\asset\img\icon_navBar\user_bibi.png" alt="icon bibi" srcset="">
        </nav>
    </header>
<?php endif;?>
<?php $navbar = ob_get_clean()?>