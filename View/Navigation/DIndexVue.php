<div></div>
<div>
    <h2 class="TitlePage">Nombre d'échantillons utilisé sur le dernier mois</h2>
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


    <div>
        <h2 class="TitlePage">Statistiques d'échantillons</h2>
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
            <button class="ButtonStats" type="submit" name='button'>Rechercher</button>
        </form>

        <canvas id="echantillonChart2" width="500" height=250"></canvas>

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



    <h2 class="TitlePage">Compte Rendu sur la région</h2>

    <form method="post">
        <label class="labelStats">Mois :</label>
        <select class="selectStat" name="mois">
            <option value="01">Janvier</option>
            <option value="02">Février</option>
            <option value="03">Mars</option>
            <option value="04">Avril</option>
            <option value="05">Mai</option>
            <option value="06">Juin</option>
            <option value="07">Juillet</option>
            <option value="08">Août</option>
            <option value="09">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>
        </select>
        <label class="labelStats">Nature du CR :</label>
        <select class="selectStat" name="natureCR">
            <option value="V">Visite</option>
            <option value="CV">Contre Visite</option>
        </select>
        <button class="ButtonStats" name="buttonStat">Rechercher</button>
    </form>

    <?php foreach ($data2 as $row): ?>
        <p class="textDashboard"><span><?= $row['count'] ?></span> compte(s) rendu(s) sur le mois <span><?= $row['month'] ?></span></p>
    <?php endforeach; ?>



    <h2 class="TitlePage">Visiteur sur la région</h2>
    <div class="scrollable-table">
        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($visiteur as $row) : ?>
                <tr>
                    <td><?= $row['nom'] ?></td>
                    <td><?= $row['prenom'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div><br>


</div>