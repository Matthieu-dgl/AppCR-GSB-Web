<div></div>
<div>
<div>
    <h2 class="TitlePage">Statistiques d'échantillons</h2>

    <div class="StatCarreAll">
        <div class="statCarré">
            <p>
                <?php foreach ($echantillonT as $echantillon) : ?>
                    <?php echo $echantillon['count']; ?>
                <?php endforeach; ?>

            <h3>Nombre d'échantillons totaux</h3>
        </div>
        <div class="statCarré">
            <p>
                <?php foreach ($echantillonS as $echantillon) : ?>
                    <?php echo $echantillon['count']; ?>
                <?php endforeach; ?>
            </p>
            <H3>Nombre d'échantillons sortis</H3>
        </div>
        <div class="statCarré">
            <p>
                <?php foreach ($echantillonTEST as $echantillon) : ?>
                    <?php echo $echantillon['count']; ?>
                <?php endforeach; ?>
            </p>
            <h3>Nombre d'échantillons en test</h3>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <form method="post" action="">
        <label class="labelStats" for="annee">Année :</label>
        <select id="annee" name="annee">
            <?php foreach ($years as $year) : ?>
                <option value="<?= $year['annee'] ?>"><?= $year['annee'] ?></option>
            <?php endforeach; ?>
            <option value="autre">-------</option>
        </select>

        <label class="labelStats" for="echantillons">Échantillons :</label>
        <select id="NomEchantillon" name="echantillons">
            <?php foreach ($echantillons as $row) : ?>
                <option value="<?= $row['id_echantillon'] ?>"><?= $row['nom'] ?></option>
            <?php endforeach; ?>
            <option value="autre">-------</option>
        </select>
        <button class="ButtonStats" type="submit" name='button'>Exécuter</button>
    </form>

    <canvas id="echantillonChart2" width="500" height="250"></canvas>

    <script>
        var ctx = document.getElementById('echantillonChart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: "Nombre d'échantillons utilisés par mois",
                    data: <?= json_encode($data) ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }],
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>

<h2 class="TitlePage">Statistiques des visiteurs</h2>
<div class="StatCarreAll">
        <div class="statCarré">
            <p>
                <?php foreach ($visiteurT as $visiteur) : ?>
                    <?php echo $visiteur['count']; ?>
                <?php endforeach; ?>

            <h3>Nombre de visiteurs médicaux</h3>
        </div>
        <div class="statCarré">
            <p>
                <?php foreach ($praticienT as $praticien) : ?>
                    <?php echo $praticien['count']; ?>
                <?php endforeach; ?>
            </p>
            <H3>Nombre de praticiens </H3>
        </div>
        <div class="statCarré">
            <p>
                <?php foreach ($CRT as $CR) : ?>
                    <?php echo $CR['count']; ?>
                <?php endforeach; ?>
            </p>
            <h3>Nombre de compte rendu</h3>
        </div>
    </div>

    <h2 class="TitlePage">Nombre d'echantillons donnés en France</h2><br><br>

    <div class="graphe">
        <canvas id="echantillonChart"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </div>

    <script>
        var ctx = document.getElementById('echantillonChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?= json_encode(array_column($data1, 'nom')) ?>,
                datasets: [{
                    data: <?= json_encode(array_column($data1, 'count')) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(220, 96, 46, 0.7)',
                        'rgba(219, 138, 116, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(220, 96, 46, 1)',
                        'rgba(219, 138, 116, 0.7)',
                    ],
                    borderWidth: 1,
                }],
            },
        });
    </script>
<br>
            </div>
        </div>
    </div>
    </div> 