<div></div>
<div id="container_historiqueCR">

    <h2 class="TitlePage">Mes Rapports</h2>

    <?php
        foreach ($resultatsCR as $row) {
            echo "
                    <details class='historiqueCR'>
                        <summary> {$row['date']} ----- <span>Praticien :</span> {$row['Pnom']} {$row['PPrenom']} ----- <span>Motif :</span> {$row['motif']}  <br> <span>Echantillon 1:</span> {$row['Enom1']}  ----- <span>Echantillon 2 :</span> {$row['Enom2']} </summary> 
                        <div class='traitV'></div>
                        <h3 class='commentaireCR'>{$row['bilan']}</h3>
                        <h3 class='commentaireCR'>Note : {$row['note']}</h3>
                        <form method='post'>
                            <a class='BtnModifier' href='index.php?page=ModifCR&id_compteRendu={$row['id_compteRendu']}'>Modifier</a>
                            <input type='hidden' name='idCR' value='{$row['id_compteRendu']}'>
                            <button class='BtnSupprimer' name='supprimer'>Supprimer</button>
                        </form>
                    </details> <br>
                ";
        }
    ?>

</div>

