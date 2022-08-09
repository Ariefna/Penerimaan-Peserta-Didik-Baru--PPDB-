<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan Peserta Didik Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Jenis Kelamin</h3>

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
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Jalur</h3>

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
                                        <canvas id="donutChartJalur" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Tanggal Daftar</h3>

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
                                        <div class="chart">
                                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Biaya</h3>

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
                                        <canvas id="donutChartBiaya" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="plugins/chart.js/Chart.min.js"></script>
<?php
$sql1 = "SELECT tgl_siswa, count(tgl_siswa) jumlah FROM siswa group by tgl_siswa";
$result1 = mysqli_query($koneksi, $sql1);
$tgl_siswa = [];
$tgl_siswa_jml = [];
while ($row1 = mysqli_fetch_assoc($result1)) {
    array_push($tgl_siswa, $row1["tgl_siswa"]);
    array_push($tgl_siswa_jml, $row1["jumlah"]);
}
$sql2 = "SELECT coalesce(sum(case when alumni = 2 then 1 else 0 end),0) as umum, coalesce(sum(case when alumni = 3 then 1 else 0 end),0) as prestasi, coalesce(sum(case when alumni = 2 then 1 else 0 end),0) as alumni, coalesce(sum(case when jk = 'L' then 1 else 0 end),0) as totallaki, coalesce(sum(case when jk = 'P' then 1 else 0 end),0) as totalperempuan, coalesce(sum(case when status_pay = '1' then 1 else 0 end),0) as pay_berhasil, coalesce(sum(case when status_pay = '1' then 0 else 1 end),0) as pay_gagal FROM siswa";
$result2 = mysqli_query($koneksi, $sql2);
while ($row2 = mysqli_fetch_assoc($result2)) {
    $laki = $row2["totallaki"];
    $perempuan = $row2["totalperempuan"];
    $umum = $row2["umum"];
    $prestasi = $row2["prestasi"];
    $alumni = $row2["alumni"];
    $pay_berhasil = $row2["pay_berhasil"];
    $pay_gagal = $row2["pay_gagal"];
}
$total_pay = $pay_berhasil + $pay_gagal;
$total_jalur = $umum + $prestasi + $alumni;
?>
<script>
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
        labels: [
            'Laki Laki <?= $laki ?> Orang',
            'Perempuan <?= $perempuan ?> Orang',
        ],
        datasets: [{
            data: [<?= $laki ?>, <?= $perempuan ?>],
            backgroundColor: ['#eb4034', '#3287a8'],
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
<script>
    var donutChartJalurCanvas = $('#donutChartJalur').get(0).getContext('2d')
    var donutData = {
        labels: [
            'Umum <?= ($umum / $total_jalur) * 100 ?>% <?= $umum ?> Orang',
            'Prestasi <?= ($prestasi / $total_jalur) * 100 ?>%  <?= $prestasi ?> Orang',
            'Alumni <?= ($alumni / $total_jalur) * 100 ?>%  <?= $alumni ?> Orang',
        ],
        datasets: [{
            data: [<?= $umum ?>, <?= $prestasi ?>, <?= $alumni ?>],
            backgroundColor: ['#eb4034', '#34ebcc', '#3287a8'],
        }]
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    new Chart(donutChartJalurCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
    })
</script>
<script>
    //-------------
    //- BAR CHART -
    //-------------

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    var data = {
        labels: [<?php echo '"' . implode('","', $tgl_siswa) . '"' ?>],
        datasets: [{
            label: 'Total Pendaftar 100%',
            data: [<?php echo '' . implode(',', $tgl_siswa_jml) . '' ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
    };
    new Chart(barChart, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    })
</script>
<script>
    var donutChartBiayaCanvas = $('#donutChartBiaya').get(0).getContext('2d')
    var donutData = {
        labels: [
            '<?= $pay_berhasil ?> Lunas <?= ($pay_berhasil / $total_pay) * 100 ?>%',
            '<?= $pay_gagal ?> Belum Lunas <?= ($pay_gagal / $total_pay) * 100 ?>%',
        ],
        datasets: [{
            data: [<?= $pay_berhasil ?>, <?= $pay_gagal ?>],
            backgroundColor: ['#eb4034', '#3287a8'],
        }]
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    new Chart(donutChartBiayaCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
    })
</script>