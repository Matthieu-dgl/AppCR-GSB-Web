<div></div>
<div id="container_historiqueCR">
    <h2 class="TitlePage">Boîte Mail</h2>

    <a  class="ButtonOption" href="Index.php?page=EnvoiMail">Nouveau Mail</a>
    <br><br>

    <?php
    foreach ($mails as $row) {
        echo "
                <details class='historiqueCR'>
                    <summary> {$row['date']} ----- <span>De :</span> {$row['nom_visiteur']} {$row['prenom_visiteur']} ----- <span>Objet :</span> {$row['objet']}</summary> 
                    <h3 class='commentaireCR'>{$row['message']}</h3>
                </details> <br><br>
            ";
    }
    ?>
</div>

