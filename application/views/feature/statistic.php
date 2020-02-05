<!-- Begin Page Content -->
<div class="container-fluid">
    <?php

    $kelas = ['Anak Indria', 'Anak Kecil', 'Anak Besar', 'Anak Remaja'];
    $service = ['Pelayan Firman', 'Liturgis', 'Pendamping', 'Gitar', 'Keyboard', 'Cajon'];
    // $jumlah = [];
    // foreach ($charts  as $c) :
    //     // array_push($kelas, $c['name']);
    //     array_push($jumlah, $c['count']);

    // endforeach;
    // 
    ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Jumlah ASM</h1>
    <div class="container-fluid">
        <div class="row-lg-2">
            <canvas id="myChart" width="200" height="80"></canvas>
        </div>
        <div class="row">
            <h2 class="h3 mb-4 text-gray-800" height="400"><?= $title; ?> Bidang Pelayanan GSM </h2>
            <div class="container">
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i>Pelayan Firman
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i>Liturgis
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i>Pendamping
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i>Gitar
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-secondary"></i>Keyboard
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i>Cajon
                        </span>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>



<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {

            labels: <?= json_encode($kelas); ?>,
            datasets: [{
                    label: '2018',
                    data: <?= json_encode($jumlahasm); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: '2019',
                    data: <?= json_encode($jumlahasm); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 2)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }
            ]
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

    var ctx1 = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: <?= json_encode($service); ?>,
            datasets: [{
                data: <?= json_encode($jumlahgsm); ?>,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#e7505a', '#a9a9a9', '#cccc33'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#df0a15', '#5a5959', '#eeee03'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->