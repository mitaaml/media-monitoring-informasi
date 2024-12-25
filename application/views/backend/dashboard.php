    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Media Disetujui</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_disetujui; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Media Belum Disetujui</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_belum_disetujui; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Media Ditolak</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_tolak; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Keseluruhan Media</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_disetujui + $total_belum_disetujui + $total_tolak; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Total Media per Kategori</h6>
                    </div>
                    <div class="card-body mb-4">
                    <div class="chart-area">
                        <div id="myAreaChart">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sertakan ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Ambil data kategori dan total media dari controller
        var categoryData = <?php echo json_encode($category_data); ?>;

        // Persiapkan label (kategori) dan data (total media)
        var categoryLabels = categoryData.map(function(item) {
            return item.nama_kategori;
        });

        var categoryTotals = categoryData.map(function(item) {
            return item.total;
        });

        // Membuat grafik area menggunakan ApexCharts
        var options = {
            chart: {
                type: 'area', // Jenis grafik: area
                height: 350,
            },
            dataLabels: {
                enabled: false, // Nonaktifkan data labels
            },
            stroke: {
                curve: 'smooth', // Membuat grafik lebih halus
            },
            series: [{
                name: 'Total Media per Kategori',
                data: categoryTotals // Data total media per kategori
            }],
            xaxis: {
                categories: categoryLabels, // Kategori sebagai label di sumbu X
            },
            fill: {
                opacity: 0.5, // Transparansi area
            },
            title: {
                text: 'Grafik Total Media per Kategori',
                align: 'center'
            }
        };

        var chart = new ApexCharts(document.querySelector("#myAreaChart"), options);
        chart.render(); // Render grafik
    </script>