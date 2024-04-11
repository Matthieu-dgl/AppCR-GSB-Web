<div></div>
<div>
    <h2 class="TitlePage">Statistiques d'échantillons</h2>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <form method="post" action="">
        <b><label class="labelStats" for="annee">Année</label></b>
        <select id="annee" name="annee">
            <?php foreach ($years as $year) : ?>
                <option value="<?= $year['annee'] ?>"><?= $year['annee'] ?></option>
            <?php endforeach; ?>
            <option value="autre">-------</option>
        </select>

        <b><label class="labelStats" for="echantillons">Échantillons</label></b>
        <select id="NomEchantillon" name="echantillons">
            <?php foreach ($echantillons as $row) : ?>
                <option value="<?= $row['id_echantillon'] ?>"><?= $row['nom'] ?></option>
            <?php endforeach; ?>
            <option value="autre">-------</option>
        </select>
        <button class="ButtonStats" type="submit" name='button'>Rechercher</button>
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