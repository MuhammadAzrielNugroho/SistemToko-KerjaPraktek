@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- TITLE -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <!-- STAT CARD -->
    <div class="row mb-4">

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card shadow h-100 border-left-primary">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs text-primary text-uppercase mb-1">Total Toko</div>
                        <div class="h4 mb-0 font-weight-bold">{{ $totalToko }}</div>
                    </div>
                    <i class="fas fa-store fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card shadow h-100 border-left-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs text-success text-uppercase mb-1">Total Kategori</div>
                        <div class="h4 mb-0 font-weight-bold">{{ $totalKategori }}</div>
                    </div>
                    <i class="fas fa-tags fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card shadow h-100 border-left-info">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs text-info text-uppercase mb-1">Total Kota</div>
                        <div class="h4 mb-0 font-weight-bold">{{ $totalKota }}</div>
                    </div>
                    <i class="fas fa-city fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- CHART -->
    <div class="row">

        <!-- BAR -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Toko per Kategori</h6>
                </div>
                <div class="card-body">
                    <div style="height:300px;">
                        <canvas id="chartKategori"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- PIE -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Toko per Kota</h6>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div style="width:280px;">
                        <canvas id="chartKota"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

// BAR CHART
new Chart(document.getElementById('chartKategori'), {
    type: 'bar',
    data: {
        labels: @json($kategoriLabels),
        datasets: [{
            label: 'Jumlah Toko',
            data: @json($kategoriValues),
            borderRadius: 6,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        }
    }
});

// PIE CHART
new Chart(document.getElementById('chartKota'), {
    type: 'pie',
    data: {
        labels: @json($kotaLabels),
        datasets: [{
            data: @json($kotaValues),
        }]
    },
    options: {
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});

</script>

@endsection