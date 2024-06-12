<div></div>
<div>

    <h1 class="TitlePage">Modification du Praticien</h1>

    <div class="row">
        <br>

            <?php
            while ($row = $PraticienDetail->fetch()) {
                $nomPrenomPraticien = $row['nom'] . ' ' . $row['prenom'];

                echo '<form class="FormInfo" action="" method="post">'; // Le formulaire envoie les données à RModifPraticien.php
                echo '<h2 class="titre_praticien">Praticien :</h2>';
                echo '<br><p class="labelStats"> Identifiant du praticien : '.$row['id_praticien'] . '<br><br></p>';
                echo '<label for="nom">Nom</label><br>';
                echo '<input type="text" name="nouveau_nom" value="' . $row['nom'] . '"><br><br>';

                echo '<label for="prenom">Prénom</label><br>';
                echo '<input type="text" name="nouveau_prenom" value="' . $row['prenom'] . '"><br><br>';

                echo '<label for="specialite">Spécialité</label><br>';
                echo '<input type="text" name="nouvelle_specialite" value="' . $row['specialité'] . '"><br><br>';

                echo '<label for="description">Description</label><br>';
                echo '<textarea name="nouvelle_description">' . $row['description'] . '</textarea><br><br><br>';

                echo '<button class="ButtonStats" name="button_praticien">modifier</button>';

                echo '</form>';
            }
            ?>




            <?php
            while ($row = $CabinetDetail->fetch()) {

                echo '<form id="FormInfoModifPraticien" class="FormInfo" action="" method="post">'; // Le formulaire envoie les données à RModifPraticien.php
                echo '<h3 class="titre_praticien">Cabinet :</h3><br>';
                echo '<p class="labelStats"> Identifiant du cabinet : '.$row['idCabinet'] . '<br><br></p>';
                echo '<label for="nom">Nom </label><br>';
                echo '<input type="text" name="nouveau_nomC" value="' . $row['nomCabinet'] . '"><br><br>';

                echo '<label for="prenom">Rue </label><br>';
                echo '<input type="text" name="nouvelle_rueC" value="' . $row['rue'] . '"><br><br>';

                echo '<label for="specialite">Ville </label><br>';
                echo '<input type="text" name="nouvelle_villeC" value="' . $row['ville'] . '"><br><br>';

                echo '<label for="description">Code postal </label><br>';
                echo '<input type="text" name="nouveau_CPC" value="' . $row['CP'] . '"><br><br>';

                echo '<label for="description">Région </label<br><br>';
                echo '<select name="nouvelle_regionC">';
                while ($region = $nomRegion->fetch(PDO::FETCH_ASSOC)) {
                    $selected = ($region['nom'] === $row['region']) ? 'selected' : '';
                    echo '<option value="' . $region['nom'] . '" ' . $selected . '>' . $region['nom'] . '</option>';
                }
                echo '</select><br><br><br>';

                echo '<button class="ButtonStats" name="button_cabinet">modifier</button>';
                echo '</form>';
            }
            ?>
        </div><br>


<?php
    echo '<h2 class="TitlePage">Rapports associés au Praticien ';
        if (isset($nomPrenomPraticien)) {
        echo $nomPrenomPraticien;
        }
        echo '</h2>';


    while ($row = $Rapport->fetch()) {
        echo '<details class="CRassocie">';
        echo '<summary>' . $row['date'] . ' --- ' . $row['motif'] . ' --- ' . $row['Unom'] . ' ' . $row['UPrenom'] . ' --- Echantillon 1 : ' . $row['Enom1'] . ' --- Echantillon 2 : ' . $row['Enom2'] . '</summary>';
        echo '<p class="commentaireCRassocie">Evaluation de la visite : ' . $row['note'] . '</p><br>';
        echo '<p class="commentaireCRassocie"> Nom du cabinet : ' . $row['Cnom'] . '</p><br>';
        echo '<p class="commentaireCRassocie"> Bilan : ' . $row['bilan'] . '</p><br>';
        echo '</details>';
    }
    ?>

</div>






