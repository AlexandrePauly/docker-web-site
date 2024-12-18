<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    include("php/head.php");
?>

<body>    
    <!-- Inclusion du header -->
    <?php
        include("php/header.php");
    ?>

    <!-- Contenu de page -->
    <section id="pageContent">
        <!-- Inclusion du du menu latéral -->
        <?php
            include("php/main.php");
        ?>
        
        <!-- Partie droite - Contenu de la page -->
        <aside id="rightCol">
            <div class="contact-box">
                <!-- Image à gauche du formulaire -->
                <div id="rightCol-left"></div>

                <?php                
                $name = $surname = $email = $message = $subject = "";
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $test = 0;
                    if (!empty($_POST["name"])) {
                        $name = test_input($_POST["name"]);
                        //Vérification des données entrées par l'utilisateur
                        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                            echo '<script src="js/check_form.js"></script>';
                            $test = 0;
                        }
                        else{
                            $test = 1;
                        }
                    }

                    if (!empty($_POST["surname"])) {
                        $surname = test_input($_POST["surname"]);
                        //Vérification des données entrées par l'utilisateur
                        if (!preg_match("/^[a-zA-Z-' ]*$/",$surname)) {
                            echo '<script src="js/check_form.js"></script>';
                            $test = 0;
                        }
                        else{
                            $test = 1;
                        }
                    }
                    
                    if (!empty($_POST["email"])) {
                        $email = test_input($_POST["email"]);
                        //Vérification des données entrées par l'utilisateur
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo '<script src="js/check_form.js"></script>';
                            $test = 0;
                        }
                        else{
                            $test = 1;
                        }
                    }

                    if (!empty($_POST["subject"])) {
                        $subject = test_input($_POST["subject"]);
                        //Vérification des données entrées par l'utilisateur
                        if (!preg_match("/^[a-zA-Z-' ]*$/",$subject)) {
                            echo '<script src="js/check_form.js"></script>';
                            $test = 0;
                        }
                        else{
                            $test = 1;
                        }
                    }

                    if (!empty($_POST["message"])){
                        $message = test_input($_POST["message"]);
                        $test = 1;
                    }
                    
                    //S'il n'y a pas eu d'erreur
                    if($test == 1){
                        //Génération du message avec toutes les informations du formulaire
                        $body = "Nouveau message de " . $name . " " . $surname;
                        $body .= "\nAdresse Email : " . $email;
                        $body .= "\nSexe : " . $gender;
                        $body .= "\nDate du message : " . $current_date;
                        $body .= "\nProfession : " . $job;
                        $body .= "\nSujet du message : " . $subject;
                        $body .= "\nMessage : " . $message;

                        //Dans le cas où le message est plus long que 70 caractères
                        $body = wordwrap($body,70);
                        
                        // Envoie du mail
                        if(mail("paulyalexa@cy-tech.fr", $subject, $body)){
                            echo "<script>alert('Le mail a pu s\u0027envoyer')</script>";
                            //Réinitialisation des champs du formulaire
                            $name = "";
                            $surname = "";
                            $email = "";
                            $gender = "";
                            $job = "";
                            $subject = "";
                            $message = "";
                            //Affichage du bouton pour rediriger l'utilisateur
                            echo '<form method="get" action="../merci.php?cat=contact" id="redirect-form">';
                            echo '<input type="submit" value="Continuer">';
                            echo '</form>';
                            echo '<script>document.getElementById("redirect-form").submit();</script>';
                        } else{
                            echo "<script>alert('Le mail n\u0027a pas pu s\u0027envoyer')</script>";
                        }

                    }
                    else{
                        echo "<script>alert('Il y a une erreur dans le formulaire, veuillez vérifier vos informations')</script>";
                    }
                }

                //Cette fonction permet de nettoyer les données reçues d'un formulaire
                function test_input($data) {
                    //Supprime les espaces en début et fin de chaîne
                    $data = trim($data);
                    
                    //Supprime les antislashs (\) d'une chaîne
                    $data = stripslashes($data);
                    
                    //Convertit les caractères spéciaux en entités HTML
                    $data = htmlspecialchars($data);
                    
                    //Retourne la chaîne de caractères nettoyée
                    return $data;
                }

                ?>

                <!-- Formulaire de contact -->
                <form id="rightCol-right" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <h1>Contactez-nous!</h1>

                    <!-- Date du jour -->
                    <input type="date" id="today" class="field date" title="Date du contact" name="current_date" disabled="disabled" value="<?php echo $current_date;?>">

                    <!-- Nom de la personne -->
                    <input type="text" class="field" placeholder="Entrez votre nom" title="" name="name" value="<?php echo $name;?>" required>

                    <!-- Prénom de la personne -->
                    <input type="text" class="field" placeholder="Entrez votre prénom" title="" name="surname" value="<?php echo $surname;?>" required>
                    
                    <!-- Email de la personne -->
                    <input type="email" class="field" placeholder="Entrez votre mail : adresse@mail.com" title="" name="email" value="<?php echo $email;?>" required>

                    <!-- Genre de la personne -->
                    <div class="field genre">
                        <div>
                            <input type="radio" name="gender" id="femme" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Femme">
                            <label for="femme">Femme</label>
                        </div>
                        <aside>
                            <input type="radio" name="gender" id="homme" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Homme">
                            <label for="homme">Homme</label>
                        </aside>
                    </div>

                    <!-- Date de naissance de la personne -->
                    <input type="date" id="max_day" class="field date" title="Date d'anniversaire" name="birthday" min="1900-01-01" value="<?php echo $birthday;?>" >

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
                    
                    <!-- Profession de la personne -->
                    <div class="field job">
                        <label for="professions">Fonction</label>
                        <select id="profession" name="job">
                            <option value="" disabled selected>Sélectionnez votre option</option>
                            <option value="enseignant" <?php if (isset($job) && $job=="enseignant") echo "selected";?>>Enseignant</option>
                            <option value="commercial" <?php if (isset($job) && $job=="commercial") echo "selected";?>>Commercial</option>
                            <option value="cadre" <?php if (isset($job) && $job=="cadre") echo "selected";?>>Cadre</option>
                            <option value="agriculteur" <?php if (isset($job) && $job=="agriculteur") echo "selected";?>>Agriculteur</option>
                            <option value="non renseigné" <?php if (isset($job) && $job=="non renseigné") echo "selected";?>>Non renseigné</option>
                        </select>
                    </div>

                    <!-- Sujet du message de la personne -->
                    <input type="text" class="field" placeholder="Entrez le sujet de votre message" title="" name="subject" value="<?php echo $subject;?>" required>

                    <!-- Message de la personne -->
                    <textarea placeholder="Message" class="field" title="" value="<?php echo $message;?>" name="message" required></textarea>
                    
                    <!-- Boutton pour envoyer le message -->
                    <input type="submit" name="submit" value="Envoyer" class="button" onclick="check()"> 
                </form>              
            </div>   
        </aside>

        <!-- Inclusion de la flèche pour remonter au menu -->
        <?php
            include("php/back-to-top.php"); 
        ?>
    </section>

    <!-- Inclusion du footer -->
    <?php
        include("php/footer.php"); 
    ?>
</body>