
<div></div>
<div>
    <h2 class="TitlePage">Envoyer un mail :</h2>
    <form class="FormMail" method="post">
        <b><label for="objet">Objet</label></b><br>
        <input type="text" name="objet" required><br><br>
        <b><label for="visiteur">Destinataire</label></b><br>
        <?php

        echo "
            <select name='visiteur' required autocomplete='off'>
                <option value='NULL'>Choisir un visiteur</option>";

        foreach ($VisiteurAll as $gd) {
            echo "<option value='{$gd['id_user']}'>{$gd['Nom']}</option>";
        }

        echo "
          </select>
          ";
        ?>
        <br>
        <br>
        <b><label for="commentaire">Message</label><br></b>
        <textarea name="commentaire" required></textarea><br><br>

        <button name="button" type="submit" value="Envoyer">Envoyer</button>
    </form>