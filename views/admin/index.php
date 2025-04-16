<?php include '../views/admin/layout/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .dashboard-card {
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }

    .stat-icon {
        font-size: 2rem;
        opacity: 0.7;
    }
</style>
<div class="page-content">
    <div class="container-fluid ">
        <h2 class="mb-4 fw-bold">📊 Thống kê tổng quan</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="dashboard-card bg-light border-start border-primary border-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Tổng đơn hàng</h6>
                            <h4><?= $totalOrders['total_orders'] ?? 0 ?></h4>
                        </div>
                        <i class="bi bi-bag-check stat-icon text-primary"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card bg-light border-start border-success border-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Tổng doanh thu</h6>
                            <h4><?= number_format($totalRevenue['total_revenue'] * 1000 ?? 0) ?>₫</h4>
                        </div>
                        <i class="bi bi-currency-dollar stat-icon text-success"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card bg-light border-start border-warning border-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Đơn đang chờ</h6>
                            <h4><?= $pendingOrders['total'] ?? 0 ?></h4>
                        </div>
                        <i class="bi bi-hourglass-split stat-icon text-warning"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card bg-light border-start border-info border-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Đơn hoàn thành</h6>
                            <h4><?= $completedOrders['total'] ?? 0 ?></h4>
                        </div>
                        <i class="bi bi-check-circle stat-icon text-info"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card bg-light border-start border-danger border-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Tổng sản phẩm</h6>
                            <h4><?= $totalProducts['total_products'] ?? 0 ?></h4>
                        </div>
                        <i class="bi bi-box-seam stat-icon text-danger"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card bg-light border-start border-secondary border-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Sản phẩm đã bán</h6>
                            <h4><?= $soldProducts['total_sold'] ?? 0 ?></h4>
                        </div>
                        <i class="bi bi-cart-check stat-icon text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Biểu đồ -->
        <div class="mt-5 bg-white rounded shadow p-4">
            <h5 class="fw-bold mb-3">📈 Biểu đồ thống kê đơn hàng & doanh thu</h5>
            <canvas id="orderChart" height="100"></canvas>
        </div>
    </div>
</div>
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('orderChart').getContext('2d');
    const orderChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tổng đơn', 'Đang chờ', 'Hoàn thành', 'Đã bán'],
            datasets: [{
                label: 'Số lượng',
                data: [
                    <?= $totalOrders['total_orders'] ?? 0 ?>,
                    <?= $pendingOrders['total'] ?? 0 ?>,
                    <?= $completedOrders['total'] ?? 0 ?>,
                    <?= $soldProducts['total_sold'] ?? 0 ?>
                ],
                backgroundColor: [
                    '#0d6efd',
                    '#ffc107',
                    '#198754',
                    '#6c757d'
                ],
                borderRadius: 8,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    });
</script>
<?php include '../views/admin/layout/footer.php'; ?>