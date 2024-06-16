<?php
if (isset($_GET['insert'])) {
    $value = GetMajorData($conn);
} else if (isset($_GET['update']) && isset($_GET['project'])) {
    $value = GetMajorByID($data['major'], $conn);
    $valueEx = GetMajorEx($value['major'], $conn);
    echo "<script>" . " var DataMajor = '" . $value['id'] . "'" . "</script>";
} else {
    $value = GetMajorData($conn);
}
?>

<div class="form-group">
    <div class="form-set">
        <select id="Major" name="major" class="input" onchange="CheckSelectMajor()">

            <?php if (isset($_GET['update']) && isset($_GET['project'])) { ?>

                <option value="<?= $value['id'] ?>"><?= $value['major'] ?> / <?= $value['degree'] ?> in <?= $value['dept'] ?> / <?= $value['faculty'] ?> at <?= $value['ins'] ?></option>

                <?php foreach ($valueEx as $valueExRow) { ?>
                    <option value="<?= $valueExRow['id'] ?>"><?= $valueExRow['major'] ?> / <?= $valueExRow['degree'] ?> in <?= $valueExRow['dept'] ?> / <?= $valueExRow['faculty'] ?> at <?= $valueExRow['ins'] ?></option>
                <?php }
            } else { ?>
                <option value=""><?= $please_select_major ?></option>
                <?php foreach ($value  as $row) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['major'] ?> / <?= $row['degree'] ?> in <?= $row['dept'] ?> / <?= $row['faculty'] ?> at <?= $row['ins'] ?></option>
            <?php }
            }  ?>

        </select>
        <span class="label"><?= $major ?></span>
        <div id="MsgBoxMajor" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconMajor" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgMajor" class="validation-message"></p>
        </div>
    </div>
</div>