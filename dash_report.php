<?php

require_once 'backend/config.php';

$projects = reportProject($conn); // ✅ ดึงข้อมูลเป็น array

$projectTypeCounts = [];
$projectStatusCounts = [];

if (is_array($projects)) {
    foreach ($projects as $row) {
        $projectTypeCounts[$row['type']] = ($projectTypeCounts[$row['type']]) + 1;
        $projectStatusCounts[$row['status']] = ($projectStatusCounts[$row['status']]) + 1;
    }
} else {
    echo "No projects data found.";
    // หรือ ทำอย่างอื่น เช่น stop script
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include "components/layout/head.php" ?>

<body onload="set()">

    <?php require_once 'components/loading/loading.php'; ?>

    <div class="container">

        <?php include "components/layout/aside.php" ?>

        <?php require_once 'components/layout/header.php'; ?>

        <section>

            <div class="section-read">

                <div class="content-header">
                    <h1><?= $project_summary ?></h1>
                    <a href="export_excel.php" class="btn-success"><?php include 'components/icon/excel.php'; ?> <?= $export ?> <?= $excel ?></a>
                </div>

                <div class="charts-container">
                    <div class="chart">
                        <canvas id="typeChart"></canvas>
                    </div>
                    <div class="chart">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>

                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th><?= $title ?></th>
                                <th><?= $author ?></th>
                                <th><?= $advisor ?></th>
                                <th><?= $major ?></th>
                                <th><?= $department ?></th>
                                <th><?= $faculty ?></th>
                                <th><?= $institute ?></th>
                                <th><?= $type ?></th>
                                <th><?= $status ?></th>
                                <th><?= $release_date ?></th>
                                <th><?= $note ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($projects as $project) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($project['id']) ?></td>
                                    <td><?= htmlspecialchars($project['title']) ?></td>
                                    <td><?= htmlspecialchars($project['author']) ?></td>
                                    <td><?= htmlspecialchars($project['advisor']) ?></td>
                                    <td><?= htmlspecialchars($project['major']) ?></td>
                                    <td><?= htmlspecialchars($project['dept']) ?></td>
                                    <td><?= htmlspecialchars($project['faculty']) ?></td>
                                    <td><?= htmlspecialchars($project['ins']) ?></td>
                                    <td><?= htmlspecialchars($project['type']) ?></td>
                                    <td><?= htmlspecialchars($project['status']) ?></td>
                                    <td><?= DateFormat($project['date']) ?></td>
                                    <td><?= htmlspecialchars($project['note']) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

        <?php require_once 'components/layout/footer.php'; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const typeData = <?= json_encode(array_values($projectTypeCounts)) ?>;
        const typeLabels = <?= json_encode(array_keys($projectTypeCounts)) ?>;
        new Chart(document.getElementById("typeChart"), {
            type: 'bar',
            data: {
                labels: typeLabels,
                datasets: [{
                    label: 'Project Types',
                    data: typeData,
                    backgroundColor: '#4CAF50' // ใช้สีเขียวมินิมอล
                }]
            }
        });

        const statusData = <?= json_encode(array_values($projectStatusCounts)) ?>;
        const statusLabels = <?= json_encode(array_keys($projectStatusCounts)) ?>;
        new Chart(document.getElementById("statusChart"), {
            type: 'pie',
            data: {
                labels: statusLabels,
                datasets: [{
                    label: 'Project Status',
                    data: statusData,
                    backgroundColor: ['#FF6347', '#32CD32', '#FFD700'] // สีแดง, เขียว, เหลือง
                }]
            }
        });
    </script>
</body>

</html>