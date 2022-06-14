<?php

require_once(__DIR__ . '/controller/User.php');
require_once(__DIR__ . '/controller/Toolbox.php');
require_once(__DIR__ . '/controller/Security.php');

session_start();

if(isset($_POST['connection'])){
    if(!empty($_POST['loginC']) && !empty($_POST['passwordC'])){
        $user = new User();
        $user->connection($_POST['loginC'], $_POST['passwordC']);
    }
    else{
        Toolbox::addMessageAlert("Remplir tous les champs.", Toolbox::RED_COLOR);
    }
}

if(isset($_POST['register'])){
    if(!empty($_POST['loginR']) && !empty($_POST['passwordR']) && !empty($_POST['conf-password'])){
        if($_POST['passwordR'] == $_POST['conf-password']){
            $user = new User();
            $user->register($_POST['loginR'], $_POST['passwordR']);
        }
        else{
            Toolbox::addMessageAlert("Mots de passe non identiques", Toolbox::RED_COLOR);
        }
    }
    else{
        Toolbox::addMessageAlert("Remplir tous les champs.", Toolbox::RED_COLOR);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="public/css/root.css" />
    <title>Accueil</title>
</head>
<body>
<?php require('view/header.php');?>
    <main>
        <?php require('view/errors.php');?>
        <div class="container">
            <?php if(!Security::isConnect()){?>
                <div class="container-fieldset">
                        <form action="" method="post" class="formi">
                        <h1 class="connexion" >Connectez-vous</h1>
                            <fieldset class="left">
                        
                                <label for ="loginC">Pseudonyme :</label>
                                <input id="loginC" type="text" name="loginC" placeholder="Oggy" />
                                <br>
                                <label for ="passwordC">  Mot de passe :</label>
                                <input id="passwordC" type="password" name="passwordC" placeholder="*****" />
                                <button class="fin" type="submit" name="connection">Connexion</button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="container-fieldset">
                        <form action="" method="post">
                        <h1 class="inscription" >Créer un compte</h1>
                        <fieldset class="right">
                             
                                <label for ="loginR">Pseudonyme :</label>
                                <input id="loginR" type="text" name="loginR" placeholder="Oggy" />
                                <br>
                                <label for ="passwordR">  Mot de passe :</label>
                                <input id="passwordR" type="password" name="passwordR" placeholder="*****" />
                                <br>
                                <label for ="conf-password">Confirmez le mot de passe :</label>
                                <input id="conf-password" type="password" name="conf-password" placeholder="*****" />
                                <button class ="fin" type="submit" name="register">Créer un compte</button>
                            </fieldset>
                        </form>
                    </div>
                <?php }
                else{ ?>
                    <h1>
            
                    </h1>
                <?php } ?>
        </div>
    </main>
    <?php require_once(__DIR__ . '/view/footer.php'); ?>
</body>
</html>