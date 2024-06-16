<div></div>
<div>
    <h2 class="titre_praticien">Compte Rendu :</h2>
    <br>
    <br>
    <br>
    <br>
    <?php
    while ($row = $CR->fetch()) {

        echo '<form class="FormInfo" action="" method="post">';
        echo '<p class="labelStats"> Identifiant du CR : '.$row['id_compteRendu'] . '<br></p><br><br>';

        echo '<label for="motif">Motif</label><br>';
        echo ' <select type="" name="nouveau_motif" placeholder="Motif">
            <option value="'.$row['motif'].'">'.$row['motif'].'</option>
            <option value="Visite">Visite</option>
            <option value="Contre Visite">Contre Visite</option>
        </select><br><br>';


        echo '<label for="note">Date</label><br>';
        echo '<input type="date" name="nouvelle_date" value="' . $row['date'] . '"><br><br>';

        echo '<label for="praticien">Praticien</label><br>';
        echo "<select name='nouveau_praticien' required autocomplete='off'>";
        echo "<option value='{$row['id_praticien']}'>{$row['pNom']}</option>";

        foreach ($PraticienAll as $gd) {
            echo "<option value='{$gd['id_praticien']}'>{$gd['nom']}</option>";
        }

        echo "</select><br><br>";

        echo '<label for="echantillon">Échantillon</label><br>';
        echo "<select name='nouvelle_echantillon' required autocomplete='off'>";
        echo "<option value='{$row['eID']}'>{$row['eNom']}</option>";

        foreach ($EchantillonAll as $gd) {
            echo "<option value='{$gd['id_echantillon']}'>{$gd['nom']}</option>";
        }

        echo "</select><br><br>";

        echo '<label for="note">Note</label><br>';
        echo '<select name="nouvelle_note">
                    <option value="' . $row['note'] . '"> ' . $row['note'] . '</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select><br><br>';

        echo '<label for="bilan">Bilan</label><br>';
        echo '<textarea name="nouveau_bilan">' . $row['bilan'] . '</textarea><br><br><br>';

        echo '<button class="ButtonStats" name="button_CR">modifier</button>';
        echo '</form>';
    }
    ?>

</div>
</div>
