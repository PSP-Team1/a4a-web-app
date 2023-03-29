<?= view('templates/header'); ?>

<div class="container">

    <div class="ibox">

        <div class="ibox-title">
            <h1>Revenue Processing Dashboard (Live: <i class="fa fa-cc-stripe"></i>)</h1>
        </div>
        <div class="ibox-content">
            <div class="row">

                <div class="col-lg-6">
                    <canvas id="transactionChart"></canvas>

                </div>
                <div class="col-lg-12 mt-5">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Amount</th>
                                <th>Currency</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($charges->data as $charge) : ?>
                                <tr>
                                    <td><?= $charge->id ?></td>
                                    <td><?= $charge->amount / 100 ?></td>
                                    <td><?= strtoupper($charge->currency) ?></td>
                                    <td><?= $charge->status ?></td>
                                    <td><?= date('F j, Y', $charge->created) ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('transactionChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($chartData['labels']) ?>,
            datasets: [{
                label: 'Total revenue per hour',
                data: <?= json_encode($chartData['data']) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<?= view('templates/footer'); ?>