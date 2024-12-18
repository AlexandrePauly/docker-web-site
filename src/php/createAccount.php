<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include_once('../bdd/bdd.php');
include("head.php");

$name = $surname = $email = $birthday = $password = $password_verif = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['action'] == 'inscription') {
        $nameUser = $_POST['nom'];
        $surname = $_POST['prenom'];
        $email = $_POST['email'];
        $birthday = $_POST['date_naiss'];
        $passwordUser = $_POST['mdp'];
        $password_verif = $_POST['mdp_verif'];

        if (!empty($passwordUser) && !empty($password_verif) && $passwordUser == $password_verif) {
            //Ouvrture de la connexion à la base de données
            $mysqli = connectDB2();

            //Initialisation de la liste des utilisateurs
            $users = signIn($mysqli);
            
            $check = false;

            foreach($users as $row){
                //Vérifier si l'utilisateur n'existe pas déjà à partir de l'adresse mail
                if ($row['email'] == $email){
                    //L'utilisateur existe déjà, afficher un message d'erreur
                    echo "<script>alert('Cet email est déjà utilisé. Veuillez choisir une autre adresse email.');</script>";
                    $check = true;
                }
            }

            if ($check == false){
                //L'utilisateur n'existe pas encore, enregistrer les données
                signUp($nameUser, $surname, $email, $birthday, $passwordUser, $mysqli);

                //Rediriger vers la page de connexion
                header('Location: connexion.php');

                exit();
            }

            //Fermeture de la connexion à la base de données
            disconnectDB($mysqli);
        }
    }           
}
?>

<body>
    <!-- Menu pour créer un compte -->
    <div class="form-box createAccount-box">
        <div class="form-value">
            <form action="" method="POST">
                <h1>Créer un compte</h1>

                <!-- Champ caché -->
                <input type="hidden" name="action" value="inscription" id="ghost">

                <!-- Nom de la personne -->
                <div class="inputbox">
                    <ion-icon name="people-outline"></ion-icon>
                    <input type="text" title="" name="nom" value="<?php echo $name;?>" required>
                    <label for="">Nom</label>
                </div>
                                    
                <!-- Prénom de la personne -->
                <div class="inputbox">
                    <ion-icon name="people-outline"></ion-icon>
                    <input type="text" title="" name="prenom" value="<?php echo $surname;?>" required>
                    <label for="">Prénom</label>
                </div>

                <!-- Email de la personne -->
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" title="" name="email" value="<?php echo $email;?>" required>
                    <label for="">Adresse e-mail</label>
                </div>

                <!-- Date de naissance de la personne -->
                <div class="inputbox">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <input id="max_day" type="date" title="Date de naissance" name="date_naiss" min="1900-01-01" value="<?php echo $birthday;?>" required>
                    <label for=""></label>
                </div>

                <!-- Date du jour comme date maximale de naissance -->
                <script>
                    var date = new Date();

                    var current_date;

                    if(date.getMonth() + 1 > 9){
                        if(date.getDate()>9){
                            current_date = (date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate());
                        }
                        else{
                            current_date = (date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + "0" + date.getDate());
                        }
                    }
                    else{
                        if(date.getDate()>9){
                            current_date = (date.getFullYear() + "-" + "0" + (date.getMonth() + 1) + "-" + date.getDate());
                        }
                        else{
                            current_date = (date.getFullYear() + "-" + "0" + (date.getMonth() + 1) + "-" + "0" + date.getDate());
                        }
                    }

                    document.getElementById("max_day").max = current_date;
                </script>

                <!-- Mot de passe de la personne -->
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" title="" name="mdp" value="" required>
                    <label for="">Mot de passe</label>
                </div>

                <!-- Vérification du mot de passe de la personne -->
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" title="" name="mdp_verif" value="" required>
                    <label for="">Vérification du mot de passe</label>
                </div>

                <!-- Boutton pour créer son compte -->
                <button title="Se connecter">Créer</button>

                <!-- Se connecter -->
                <div class="register">
                    <a href="connexion.php" title="Vers la connexion à votre compte">Se connecter</a>
                    <p>ou</p>
                    <a href="../index.php" title="Vers la page d'accueil">Accueil</a>
                </div>
            </form>
        </div>
    </div>
</body>