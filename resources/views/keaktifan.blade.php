@extends('partials.sidebar')

@section('content')
<h3 class="mb-3 mt-0">Keaktifan Mahasiswa</h3>
<div class="row my-4">
    <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Statistik Zona dan Status Kesehatan Mahasiswa</h6>
            </div>
            <div class="card-body p-3">
                {{-- <div id="pie_gabungan1"></div> --}}
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">TAK</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($gabungan1->take(5) as $g1)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $g1->NIM }}</td>
                        <td>{{ $g1->Nama }}</td>
                        <td>{{ $g1->tak }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
<div class="row my-5">
    <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
        <div class="row px-2">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6>Statistik Nama Lomba</h6>
                </div>
                <div class="card-body p-3">
                    <div id="pie_lomba" style="height: 300px"></div>
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
                    var data1 = google.visualization.arrayToDataTable([
                        ['Angkatan', 'Bisnis Plan BINUS', 'Bisnis Plan UI', 'Gemastik XI', 'Gemastik XII', 'Gemastik XIII', 'Hackathon Telkom', 'Hackathon Telkomsel', 'Imagine Cup 2018', 'Imagine Cup 2019', 'Karya Tulis Ilmiah', 'PKM 2018', 'PKM 2019', 'PKM 2020', 'Tidak ada'],
                        ['2016', 0, {{ $a_16[0]->total }}, {{ $a_16[1]->total }}, {{ $a_16[2]->total }}, {{ $a_16[3]->total }}, {{ $a_16[4]->total }}, {{ $a_16[5]->total }}, {{ $a_16[6]->total }}, {{ $a_16[7]->total }}, {{ $a_16[8]->total }}, {{ $a_16[9]->total }}, 0, {{ $a_16[10]->total }}, 0],
                        ['2017', {{ $a_17[0]->total }}, {{ $a_17[1]->total }}, {{ $a_17[2]->total }}, 0, 0, {{ $a_17[3]->total }}, {{ $a_17[4]->total }}, {{ $a_17[5]->total }}, {{ $a_17[6]->total }}, 0, {{ $a_17[7]->total }}, {{ $a_17[8]->total }}, {{ $a_17[9]->total }}, {{ $a_17[10]->total }}],
                        ['2018', {{ $a_18[0]->total }}, {{ $a_18[1]->total }}, {{ $a_18[2]->total }}, {{ $a_18[3]->total }}, {{ $a_18[4]->total }}, {{ $a_18[5]->total }}, 0, 0, 0, {{ $a_18[6]->total }}, {{ $a_18[7]->total }}, {{ $a_18[8]->total }}, {{ $a_18[9]->total }}, {{ $a_18[10]->total }}],
                        ['2019', {{ $a_19[0]->total }}, {{ $a_19[1]->total }}, {{ $a_19[2]->total }}, {{ $a_19[3]->total }}, {{ $a_19[4]->total }}, {{ $a_19[5]->total }}, 0, {{ $a_19[6]->total }}, {{ $a_19[7]->total }}, {{ $a_19[8]->total }}, {{ $a_19[9]->total }}, {{ $a_19[10]->total }}, {{ $a_19[11]->total }}, {{ $a_19[12]->total }}],
                    ]);
                    var options1 = {
                        // title : 'Statistik Zona Tinggal Mahasiswa dan Status Kesehatan Mahasiswa',
                        vAxis: {title: 'Jumlah', color:'black'},
                        hAxis: {title: 'Angkatan'},
                        seriesType: 'bars',
                    };
                    // Instantiate and draw our chart, passing in some options.
                    var chart1 = new google.visualization.ComboChart(document.getElementById('pie_lomba'));
                    chart1.draw(data1, options1);
                }
  </script>
@endsection 