
<div></div>

<div>
    <h2 class="TitlePage">Modification User :</h2>
        <?php
        if ($row = $UserDetail->fetch()) {
            echo '<form class="FormInfo" action="" method="post">';
            echo '<input type="hidden" name="Id_user" value="' . $row['Id_user'] . '">';

            echo '<p class="marginTop labelStats"> Identifiant de l\'utilisateur : ' . $row['Id_user'] . '<br><br></p>';

            echo '<label for="nom">Nom : </label><br>';
            echo '<input type="text" name="nouveau_nom" value="' . $row['Nom'] . '"><br><br>';

            echo '<label for="prenom">Prenom : </label><br>';
            echo '<input type="text" name="nouveau_prenom" value="' . $row['Prenom'] . '"><br><br>';

            echo '<label for="Email">Email : </label><br>';
            echo '<input type="text" name="nouvelle_email" value="' . $row['Email'] . '"><br><br>';

            echo '<label for="mdp">Nouveau mot de passe: </label><br>';
            echo '<input type="password" name="nouveau_mdp"><br><br>';

            echo '<label for="mdp">Confirmation du mot de passe: </label><br>';
            echo '<input type="password" name="confirmation"><br><br>';

            echo '<p class="labelStats"> Droit de l\'utilisateur : ' . $row['Type'] . '<br><br><br></p>';

            echo '<button class="ButtonStats" type="submit" name="button_user">modifier</button>';

            echo '</form>';
        }
        ?>
</div>
