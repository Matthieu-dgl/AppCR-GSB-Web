<div></div>
<div class="center">
    <h2 class="TitlePage">Modification Produit :</h2>
        <?php
        while ($row = $ProduitDetail->fetch()) {
            echo '<form class="FormInfo" action="" method="post">';

            echo '<p class="labelStats"> Identifiant du produit : '.$row['id_echantillon'] . '<br><br><br></p>';
            echo '<label class="" for="nom">Date de distribution : </label>';
            echo '<input type="text" name="nouvelle_date" value="' . $row['dateDistribution'] . '"><br><br>';

            echo '<label for="prenom">Nom</label><br>';
            echo '<input type="text" name="nouveau_nom" value="' . $row['nom'] . '"><br><br>';

            echo '<label for="specialite">Quantité </label><br>';
            echo '<input type="text" name="nouvelle_Quantité" value="' . $row['quantite'] . '"><br><br>';

            echo '<label for="sortie">Publié </label><br>';
            echo '
            <select name="nouvelle_sortie" required>
                <option value="zero">non publié</option>
                <option value="1">publié</option>
                
        </select><br><br>';

            echo '<label for="description">Description</label><br>';
            echo '<textarea name="nouvelle_description">' . $row['description'] . '</textarea><br><br><br>';

            echo '<button class="ButtonStats" name="button_produit">modifier</button>';
            //echo '<button name="button_supprimer">supprimer</button>';

            echo '</form>';
        }
        ?>

    </div>
</div>
