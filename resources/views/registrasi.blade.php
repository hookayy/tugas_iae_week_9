@extends('partials.sidebar')

@section('content')
<h3 class="mb-3 mt-0">Registrasi Mahasiswa</h3>
<div class="row my-4">
    <div class="col-lg-6 col-md-12 md-mb-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Statistik Alasan Mahasiswa Kendala Registrasi</h6>
            </div>
            <div class="card-body p-3">
                <div id="pie_alasan"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 md-mb-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Statistik Fakultas Mahasiswa Kendala Registrasi</h6>
            </div>
            <div class="card-body p-3">
                <div id="pie_angkatan"></div>
            </div>
        </div>
    </div>
</div>
<div class="row my-4">
    <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6>Data Mahasiswa Kendala Registrasi</h6>
            </div>
            <div class="card-body p-3">
                {{-- <div id="pie_gabungan1"></div> --}}
                <table class="table overflow-auto" style="height: 300px;">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alasan</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($list_mhs as $l)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $l->NIM }}</td>
                        <td>{{ $l->Nama }}</td>
                        <td>{{ $l->alasan }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
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
                    var data1 = new google.visualization.DataTable();
                    data1.addColumn('string', 'Semester');
                    data1.addColumn('number', 'Total');
                    data1.addRows([
                        <?php
                        foreach($per_alasan as $a) {
                            echo "['".$a->alasan."', ".$a->total."],";
                        }
                        ?>
                    ]);

                    // Set chart options
                    var options1 = {'title':'Persebaran Zona Tinggal Mahasiswa'};
                    // Instantiate and draw our chart, passing in some options.
                    var chart1 = new google.visualization.PieChart(document.getElementById('pie_alasan'));
                    chart1.draw(data1);
                    // ------------------------------------
                    var data2 = new google.visualization.DataTable();
                    data2.addColumn('string', 'Angkatan');
                    data2.addColumn('number', 'Total');
                    data2.addRows([
                        <?php
                        foreach($per_ang as $a) {
                            echo "['".$a->fakultas."', ".$a->total."],";
                        }
                        ?>
                    ]);

                    // Set chart options
                    var options2 = {'title':'Persebaran Zona Tinggal Mahasiswa'};
                    // Instantiate and draw our chart, passing in some options.
                    var chart2 = new google.visualization.PieChart(document.getElementById('pie_angkatan'));
                    chart2.draw(data2);
                    // ------------------------------------
                }
  </script>
@endsection 