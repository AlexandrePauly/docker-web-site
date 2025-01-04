<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include("login.php");
    include("head.php");
?>

<body>
<?php if (isset($error_message)): ?>
    <div class="error"><?php echo $error_message; ?></div>
<?php endif; ?>

    <!-- Menu pour se connecter -->
    <div class="form-box">
        <div class="form-value">
            <form action="connexion.php" method="POST">
                <h1>Connexion</h1>

                <!-- Champ caché -->
                <input type="hidden" name="action" value="connexion" id="ghost">

                <!-- Email de la personne -->
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" title="" name="email" required>
                    <label for="">Adresse e-mail</label>
                </div>

                <!-- Mot de passe de la personne -->
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" title="" name="mdp" required>
                    <label for="">Mot de passe</label>
                </div>

                <!-- Oublie du mot de passe -->
                <div class="forget">
                    <a href="../contact.php" title="Vers le formulaire de contact">Mot de passe oublié ?</a>
                </div>

                <!-- Boutton pour s'identifier -->
                <button title="Se connecter">Connexion</button>

                <!-- S'enregistrer -->
                <div class="register">
                    <a href="createAccount.php" title="Vers la création de votre compte">Créer un compte</a>
                    <p>ou</p>
                    <a href="../index.php" title="Vers la page d'accueil">Accueil</a>
                </div>
            </form>
        </div>
    </div>
</body>