@extends('partials.sidebar')

@section('content')
<h3 class="mb-3 mt-0">Kesehatan Mahasiswa</h3>
{{-- <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Mahasiswa</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $mahasiswa->count() }}
                                <span class="text-success text-sm font-weight-bolder">+55%</span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Mahasiswa Sehat</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $sehat->count() }}
                                <span class="text-success text-sm font-weight-bolder">+3%</span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Mahasiswa Sakit</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $sakit->count() }}
                                <span class="text-danger text-sm font-weight-bolder">-2%</span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Penerima Beasiswa</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $beasiswa->count() }}
                                <span class="text-success text-sm font-weight-bolder">+5%</span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row my-4">
    <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Statistik Zona dan Status Kesehatan Mahasiswa</h6>
            </div>
            <div class="card-body p-3">
                <div id="pie_gabungan1"></div>
            </div>
        </div>
    </div>
</div>
<div class="row my-4">
    <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Statistik Kesehatan Mahasiswa dan Zona Tinggal</h6>
            </div>
            <div class="card-body p-3">
                <div id="pie_gabungan2"></div>
            </div>
        </div>
    </div>
</div>
<div class="row my-4">
    <div class="col-lg-6 col-md-4 mb-md-0 mb-4">
        <div class="row px-2">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6>Statistik Zona Mahasiswa</h6>
                </div>
                <div class="card-body p-3">
                    <div class="">
                        <div id="pie_zona" class="" height="500px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-8">
        <div class="row px-2">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6>Statistik Kondisi Mahasiswa</h6>
                </div>
                <div class="card-body p-3">
                    <div class="">
                        <div id="pie_kondisi" class="" height="500px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {
                    'packages': ['corechart']
                });

                // Set a callback to run when the Google Visualization API is loaded.
                google.charts.setOnLoadCallback(drawChart);

                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                function drawChart() {

                    // Create the data table.
                    var data1 = new google.visualization.DataTable();
                    data1.addColumn('string', 'Zona Tinggal');
                    data1.addColumn('number', 'Total');
                    data1.addRows([
                        <?php
                        foreach($filter_zona as $z) {
                            echo "['".$z->zona_tinggal."', ".$z->total."],";
                        }
                        ?>
                    ]);

                    // Set chart options
                    var options1 = {'title':'Persebaran Zona Tinggal Mahasiswa'};
                    // Instantiate and draw our chart, passing in some options.
                    var chart1 = new google.visualization.PieChart(document.getElementById('pie_zona'));
                    chart1.draw(data1)
                    // ------------------------------------
                    var data2 = google.visualization.arrayToDataTable([
                        ['Zona Tinggal', 'Sehat', 'Sakit'],
                        <?php
                        foreach($gabungan1 as $g1) {
                            echo "['".$g1->zona_tinggal."', ".$g1->Sakit.", ".$g1->Sehat."],";
                        }
                        ?>
                    ]);

                    var options2 = {
                        // title : 'Statistik Zona Tinggal Mahasiswa dan Status Kesehatan Mahasiswa',
                        vAxis: {title: 'Jumlah', color:'black'},
                        hAxis: {title: 'Zona Tinggal'},
                        seriesType: 'bars',
                        colors: ['green', 'red']
                    };

                    var chart2 = new google.visualization.ComboChart(document.getElementById('pie_gabungan1'));
                    chart2.draw(data2, options2);
                    // ------------------------------------
                    var data3 = google.visualization.arrayToDataTable([
                        ['Kondisi', 'Hitam', 'Merah', 'Orange', 'Hijau'],
                        <?php
                        foreach($gabungan2 as $g2) {
                            echo "['".$g2->Kondisi."', ".$g2->Hitam.", ".$g2->Merah.", ".$g2->Orange.", ".$g2->Hijau."],";
                        }
                        ?>
                    ]);

                    var options3 = {
                        // title : 'Statistik Zona Tinggal Mahasiswa dan Status Kesehatan Mahasiswa',
                        vAxis: {title: 'Zona Tinggal', color:'black'},
                        hAxis: {title: 'Kondisi Kesehatan'},
                        seriesType: 'bars',
                        colors: ['black', 'red', 'orange', 'green']
                    };
                    var chart3 = new google.visualization.ComboChart(document.getElementById('pie_gabungan2'));
                    chart3.draw(data3, options3);
                    // ------------------------------------
                    var data4 = new google.visualization.DataTable();
                    data4.addColumn('string', 'Kondisi');
                    data4.addColumn('number', 'Total');
                    data4.addRows([
                        ['Sehat', {{ $sehat->count() }}],
                        ['Sakit', {{ $sakit->count() }}],
                    ]);

                    // Set chart options
                    var options4 = {'title':'Persebaran Zona Tinggal Mahasiswa'};
                    // Instantiate and draw our chart, passing in some options.
                    var chart4 = new google.visualization.PieChart(document.getElementById('pie_kondisi'));
                    chart4.draw(data4)
                }
  </script>
@endsection 