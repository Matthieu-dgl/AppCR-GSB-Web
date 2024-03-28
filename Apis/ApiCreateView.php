<body>
<h2>Créer un Compte-Rendu</h2>
<form action="Controller.php" method="post">
    <label for="motif">Motif:</label>
    <input type="text" id="motif" name="motif" required><br>
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br>
    <label for="note">Note:</label>
    <input type="text" id="note" name="note" required><br>
    <?php
    echo "
            <label>Choisir un Praticien -> </label>
            <select name='praticien' required autocomplete='off'>
                <option value='NULL'>Choisir un praticien</option>";
    foreach ($PraticienAll as $gd) {
        echo "<option value='{$gd['id_praticien']}'>{$gd['nom']}</option>";
    }

    echo "
          </select>
          <input name='idDemande' type='hidden' value='{$gd['id_praticien']}'>
          ";
    ?>
    <br>
    <?php

    echo "
            <label>Choisir un ou plusieurs échantillons -> </label>
            <select name='idechantillon1' required autocomplete='off'>
                <option value='NULL'>Choisir un échantillon</option>";

    foreach ($EchantillonAll as $gd) {
        echo "<option value='{$gd['id_echantillon']}'>{$gd['nom']}</option>";
    }

    echo "
          </select>
          ";
    ?>
    <?php

    echo "
            <select name='idechantillon2' required autocomplete='off'>
                <option value='NULL'>Choisir un échantillon</option>
                <option value='NULL'>pas de deuxième échantillon</option>";

    foreach ($EchantillonAll as $gd) {
        echo "<option value='{$gd['id_echantillon']}'>{$gd['nom']}</option>";
    }

    echo "
          </select>

          ";
    ?><br>

    <label for="commentaire">Commentaire:</label><br>
    <textarea id="commentaire" name="commentaire" rows="4" cols="50" required></textarea><br>
    <button type="submit" name="submit">Créer Compte-Rendu</button>
</form>
</body>