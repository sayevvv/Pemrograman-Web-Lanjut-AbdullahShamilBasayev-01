@extends('layouts.template')

@section('content')
    <div class="row">
        <!-- Bento Boxes -->
        <a class="col-md-4 mb-3" href="{{ url('penjualan') }}">
            <div class="card text-dark h-100 shadow-sm card-outline card-primary">
                <div class="card-body d-flex flex-column h-100">
                    <h5 class="card-title">Total Penjualan</h5>
                    <p class="card-text h3 mb-0 mt-auto text-end">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</p>
                </div>
            </div>
        </a>

        <a class="col-md-4 mb-3" href="{{ url('stok') }}">
            <div class="card text-dark h-100 shadow-sm card-outline card-danger">
                <div class="card-body d-flex flex-column h-100">
                    <h5 class="card-title">Total Stok</h5>
                    <p class="card-text h3 mb-0 mt-auto text-end">{{ $totalStok }}</p>
                </div>
            </div>
        </a>

        <a class="col-md-4 mb-3" href="{{ url('user') }}">
            <div class="card text-dark h-100 shadow-sm card-outline card-warning">
                <div class="card-body d-flex flex-column h-100">
                    <h5 class="card-title">Total Pengguna</h5>
                    <p class="card-text h3 mb-0 mt-auto text-end">{{ $totalUser }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="row">
        <div class="col-md-7 mb-4"> <!-- chart lebih lebar -->
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-bold">Grafik Penjualan Harian</h5>
                    <div class="d-flex justify-content-end mb-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="toggleChartType()">Ganti Tipe Chart</button>
                    </div>
                    <div class="mt-auto" style="position: relative; height: 300px; width: 100%;">
                        <canvas id="salesChart"></canvas>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-5 mb-4"> <!-- tabel lebih sempit -->
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Penjualan Terakhir</h5>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pembeli</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        let currentChartType = 'bar';
        let chartInstance;

        function toggleChartType() {
            currentChartType = currentChartType === 'bar' ? 'line' : 'bar';

            // Hapus chart sebelumnya
            if (chartInstance) {
                chartInstance.destroy();
            }

            // Panggil ulang inisialisasi chart dengan tipe baru
            loadSalesChart();
        }
        // DataTable Configuration
        let dataPenjualan;
        $(document).ready(function() {
            initializeDataTable();
            loadSalesChart();
        });

        function initializeDataTable() {
            dataPenjualan = $('#table_penjualan').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('penjualan/list') }}",
                    type: "POST",
                    dataType: "json"
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "pembeli"
                    },
                    {
                        data: "total_harga",
                        className: "text-end",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "penjualan_tanggal", // Kolom untuk sorting
                        visible: false, // Tidak ditampilkan
                        searchable: false
                    }
                ],
                order: [
                    [3, 'desc']
                ],
                scrollY: "350px",
                scrollCollapse: true,
                paging: false, // hilangkan pagination
                info: false, // hilangkan info "Showing x of y"
                searching: false, // hilangkan kotak search
                lengthChange: false // hilangkan dropdown "show x entries"
            });
        }


        // Chart Handling
        function loadSalesChart() {
            $.ajax({
                url: "{{ url('penjualan/chart-data') }}",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    initializeChart(response);
                },
                error: function(xhr) {
                    console.error('Error loading chart data:', xhr.responseText);
                    showChartError();
                }
            });
        }

        function initializeChart(salesData) {
            const ctx = document.getElementById('salesChart').getContext('2d');
            const labels = salesData.map(item => {
                const date = new Date(item.date);
                return date.getDate() + ' ' + date.toLocaleString('id-ID', {
                    month: 'short'
                });
            });
            const data = salesData.map(item => parseInt(item.total));
            const maxValue = Math.max(...data);
            const STEP_SIZE = 1000000;
            const roundedMax = Math.ceil(maxValue / STEP_SIZE) * STEP_SIZE;

            chartInstance = new Chart(ctx, {
                type: currentChartType,
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Penjualan Harian',
                        data: data,
                        backgroundColor: currentChartType === 'bar' ? '#4e73df' : 'transparent',
                        borderColor: '#3a56c4',
                        borderWidth: 2,
                        fill: false,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: 10
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Tanggal'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            max: roundedMax,
                            title: {
                                display: true,
                                text: 'Total Penjualan (Rp)'
                            },
                            ticks: {
                                count: 6,
                                callback: function(value) {
                                    if (value >= 1000000) {
                                        return 'Rp ' + (value / 1000000).toFixed(1) + ' Jt';
                                    } else if (value >= 1000) {
                                        return 'Rp ' + (value / 1000).toFixed(0) + ' Rb';
                                    } else {
                                        return 'Rp ' + value;
                                    }
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                title: function(tooltipItems) {
                                    return 'Tanggal: ' + salesData[tooltipItems[0].dataIndex].date;
                                },
                                label: function(context) {
                                    const value = context.parsed.y;
                                    return 'Penjualan: Rp ' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    }
                }
            });
        }


        function showChartError() {
            $('#salesChart').replaceWith(
                '<div class="alert alert-danger">Gagal memuat data grafik. Silakan refresh halaman.</div>'
            );
        }

        // Modal Handling
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
    </script>
@endpush
