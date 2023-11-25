<?php
if (isset($_GET['insert'])) {
    $value = GetMajorData($conn);
} else if (isset($_GET['update']) && isset($_GET['project'])) {
    $value = GetMajorByID($data['major'], $conn);
    $valueEx = GetMajorEx($value['major'], $conn);
    echo "<script>" . " var DataMajor = '" . $value['id'] . "'" . "</script>";
} else {
    $value = "";
}
?>

<div class="form-group">
    <div class="form-input">
        <select id="Major" name="major" class="input" onchange="CheckSelectMajor()">

            <?php if (isset($_GET['update']) && isset($_GET['project'])) { ?>

                <option value="<?= $value['id'] ?>"><?= $value['major'] ?> in <?= $value['dept'] ?> / <?= $value['faculty'] ?> at <?= $value['ins'] ?></option>

                <?php foreach ($valueEx as $valueExRow) { ?>
                    <option value="<?= $valueExRow['id'] ?>"><?= $valueExRow['major'] ?> in <?= $valueExRow['dept'] ?> / <?= $valueExRow['faculty'] ?> at <?= $valueExRow['ins'] ?></option>
                <?php }
            } else { ?>
                <option value=""><?= $please_select_major ?></option>
                <?php foreach ($value  as $row) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['major'] ?> in <?= $row['dept'] ?> / <?= $row['faculty'] ?> at <?= $row['ins'] ?></option>
            <?php }
            }  ?>

        </select>
        <span class="label"><?= $major ?></span>
        <p id="MsgMajor" class="validation-message"></p>
    </div>
</div>