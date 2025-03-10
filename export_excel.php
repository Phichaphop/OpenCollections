<?php
require_once 'backend/config.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=projects.xls");
header("Pragma: no-cache");
header("Expires: 0");

$projects = reportProject($conn);
?>

<html>

<head>
    <meta charset="UTF-8">
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            src: url('resource/font/THSarabunNew.ttf') format('truetype');
        }

        body {
            font-family: 'THSarabunNew', sans-serif;
            font-size: 16pt;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <table>
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
        <?php foreach ($projects as $row) { ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['author']) ?></td>
                <td><?= htmlspecialchars($row['advisor']) ?></td>
                <td><?= htmlspecialchars($row['major']) ?></td>
                <td><?= htmlspecialchars($row['dept']) ?></td>
                <td><?= htmlspecialchars($row['faculty']) ?></td>
                <td><?= htmlspecialchars($row['ins']) ?></td>
                <td><?= htmlspecialchars($row['type']) ?></td>
                <td><?= htmlspecialchars($row['status']) ?></td>
                <td><?= DateFormat($row['date']) ?></td>
                <td><?= htmlspecialchars($row['note']) ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>