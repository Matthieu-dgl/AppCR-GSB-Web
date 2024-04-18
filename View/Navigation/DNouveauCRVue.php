<div></div>
<div>
    <form id="FormCR" method="post" action="" ">
        <h1 id="TitreLogin" class="Text Titre">Faire un Compte Rendu </h1>
        <br>
        <br>
        <label>Motif</label><br>
    <select type="" name="motif" placeholder="Motif">
        <option value="NULL">Sélectionner un motif</option>
        <option value="Visite">Visite</option>
        <option value="Contre Visite">Contre Visite</option>
    </select><br><br>
        <label>Date de la visite</label><br>
        <input type="date" name="date"><br><br>
        <label>Mettre une note</label><br>
        <select type="" name="note" placeholder="Email">
            <option value="NULL">Mettre une note</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br><br>
        <?php
        echo "
            <label>Choisir un Praticien</label><br>
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
        <br><br>
        <?php

        echo "
            <label>Choisir un ou plusieurs échantillons</label><br>
            <select name='idechantillon1' required autocomplete='off'>
                <option value='NULL'>Choisir un échantillon</option>";

        // Génération des options pour tous les echantillons
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
        ?>

        <br><br>
        <label>Mettre un commentaire</label><br>
        <textarea name="commentaire" placeholder="Commentaire"></textarea><br><br>

        <button name="button">Envoyer le Compte Rendu</button>
    </form>
</div>

