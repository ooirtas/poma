@extends('layouts.app')

@section('title','Dashboard Admin')

@section('contents');

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Dashboard.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
    <div class="container-fluid">
                <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Total Organisasi</div>
                                <div class="stat-digit"><i class="fa fa-usd"></i>{{ $totalOrganisasi }}</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-s w-85" role="progressbar" aria-valuenow="{{ $totalOrganisasi }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Total Anggota BEM</div>
                                <div class="stat-digit"><i class="fa fa-usd"></i>{{ $totalAnggotaBem }}</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="{{ $totalAnggotaBem }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Total Anggota MPM</div>
                                <div class="stat-digit"><i class="fa fa-usd"></i>{{ $totalAnggotaMpm }}</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="{{ $totalAnggotaMpm }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Total Pengurus</div>
                                <div class="stat-digit"><i class="fa fa-usd"></i>{{ $totalPengurus }}</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="{{ $totalPengurus }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- /# column -->
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Anggota Organisasi </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-10 col-lg-7">
                                                      <!-- Pie Chart -->
                                        <div id="pieChart"></div>
                                        <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            // PHP code to generate data for series
                                            @php
                                                $labels = $prodi->pluck('nama_program_studi')->toArray();
                                            @endphp

                                            @php
                                                $programStudiCounts = $pengurus->groupBy('program_studi_id')->map->count();
                                            @endphp

                                    const programStudiCounts = @json($programStudiCounts);

                                    new ApexCharts(document.querySelector("#pieChart"), {
                                        series: Object.values(programStudiCounts),
                                                chart: {
                                                    height: 200,
                                                    type: 'pie',
                                                    toolbar: {
                                                        show: true
                                                    }
                                                },
                                                labels: @json($labels)
                                            }).render();
                                        });
                                    </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="m-t-10">
                                    <h4 class="card-title">Laporan </h4>
                                </div>
                                <div id="barChart" style="min-height: 235px;" class="echart"></div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    echarts.init(document.querySelector("#barChart")).setOption({
      xAxis: {
        type: 'category',
        data: ['Menilai', 'Belom']
      },
      yAxis: {
        type: 'value'
      },
      series: [{
        data: [0, 20, 40, 60, 80, 100],
        type: 'bar'
      }]
    });
  });
</script>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection