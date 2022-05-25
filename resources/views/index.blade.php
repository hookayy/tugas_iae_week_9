@extends('partials.sidebar')

@section('content')
<h3 class="mb-3 mt-0">Dashboard Admin</h3>
<div class="row">
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
</div>
<div class="row my-4">
    <div class="col-lg-6 col-md-4 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Beasiswa</h6>
                        {{-- <p class="text-sm mb-0">
                <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">30 done</span> this month
              </p> --}}
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penyedia
                                    Beasiswa</th>
                                {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Members</th> --}}
                                {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Budget</th> --}}
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Jumlah Mahasiswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach($filter_beasiswa as $b)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('img/'.strtolower(substr($b->Jenis_Beasiswa,9,)).'.png') }}"
                                                    class="rounded img-cover" width="50px" alt="logo">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 mx-2 text-sm">{{ $b->Jenis_Beasiswa }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span
                                                        class="text-xs font-weight-bold">{{ $progress = (round((($b->total)/($beasiswa->count()))*100,2)) }}
                                                        %</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info"
                                                    style="{{ 'width:'.round($progress).'%;' }} }}"
                                                    role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-8">
        <div class="row">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6>Persebaran Zona Mahasiswa</h6>
                </div>
                <div class="card-body p-3">
                    <div class="">
                        <div id="pie_zona" class="" height="500px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6>Persebaran Lomba Mahasiswa</h6>
                </div>
                <div class="card-body p-3">
                    <div class="">
                        <div id="pie_lomba" class="" height="800px"></div>
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
                    chart1.draw(data1);

                    var data2 = new google.visualization.DataTable();
                    data2.addColumn('string', 'Nama Lomba');
                    data2.addColumn('number', 'Total');
                    data2.addRows([
                        <?php
                        foreach($filter_lomba as $l) {
                            echo "['".$l->nama_lomba."', ".$l->total."],";
                        }
                        ?>
                    ]);

                    // Set chart options
                    var options2 = {
                        'title':'Persebaran Zona Tinggal Mahasiswa',
                        'chartArea' : {width: 800, height: 800},
                    }; 
                    // Instantiate and draw our chart, passing in some options.
                    var chart2 = new google.visualization.PieChart(document.getElementById('pie_lomba'));
                    chart2.draw(data2);
                }
  </script>
@endsection 