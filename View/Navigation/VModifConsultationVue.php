<div></div>
<div>

    <h2 class="TitlePage">Modification de mes informations personnelles</h2>

    <form class="FormInfo" method="post">
        <br>
        <label>Nom</label><br>
        <input name="nom" value="<?php echo $_SESSION['Nom'] ?>" required autocomplete="off"><br><br><br>
        <label>Prénom</label><br>
        <input name="prenom" value="<?php echo $_SESSION['Prenom'] ?>"><br><br><br>
        <label>Mail</label><br>
        <input name="mail" value="<?php echo $_SESSION['Email'] ?>"><br><br><br>
        <label>Région</label><br>
        <select name="region">
            <?php
            foreach ($nomRegion as $r) {
                echo "<option value='{$_SESSION['Region']}'>{$r['RNom']}</option>";
            }
            ?>
            <?php
            foreach ($RegionAll as $gd) {
                echo "<option value='{$gd['id_region']}'>{$gd['RNom']}</option>";
            }
            ?>
        </select><br><br><br>

        <button name="BtnModifInfoPerso">Modifier</button>

    </form>

</div>
