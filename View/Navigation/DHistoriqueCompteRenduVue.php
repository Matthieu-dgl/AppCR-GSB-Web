<div></div>
<div id="container_historiqueCR">
    <h2 class="TitlePage">Mes Comptes Rendus</h2>
    <a class="ButtonOption" href="Index.php?page=NouveauCR">Nouveau rapport</a><br><br>
    <?php
    foreach ($resultatsCR as $row) {
        echo "
                <details class='historiqueCR'>
                    <summary> {$row['date']} ----- <span>Destinataire :</span> {$row['nom_praticien']} ----- <span>Motif :</span> {$row['motif']} ----- <span>Note :</span> {$row['note']} </summary> 
                    <div class='traitV'></div>
                    <h3 class='commentaireCR'>{$row['bilan']}</h3>
                    <form method='post'>
                        <a class='BtnModifier' href='Index.php?page=ModifCRDelegue&id_compteRendu={$row['id_compteRendu']}'>Modifier</a>
                        <input type='hidden' name='idCR' value='{$row['id_compteRendu']}'>
                        <button class='BtnSupprimer' name='supprimer'>Supprimer</button>
                    </form>
                </details> <br>
            ";
    }
    ?>

</div>
