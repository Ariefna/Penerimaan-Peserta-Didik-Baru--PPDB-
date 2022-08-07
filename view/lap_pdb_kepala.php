<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-left">Laporan Peserta Didik Baru</h4>
                        <a href="?laporan=l_ppdb" target="_blank" class="btn btn-warning float-right">Laporan PPDB Per Jalur</a>
                    </div>
                    <div class="card-body">

                        <div class="col-md-6">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Donut Chart</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="plugins/chart.js/Chart.min.js"></script>
<?php
$sql2 = "SELECT * FROM siswa";
$result2 = mysqli_query($conn, $sql2);
$kelamin = [];
while ($row2 = mysqli_fetch_assoc($result2)) {
    array_push($kelamin, $row2["Target"]);
}
?>
<script>
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
        labels: [
            'Laki Laki',
            'Perempuan',
        ],
        datasets: [{
            data: [700, 500],
            backgroundColor: ['#f56954', '#00a65a'],
        }]
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
    })
</script>