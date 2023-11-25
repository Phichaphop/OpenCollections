<?php
if (isset($_GET['insert'])) {
    $faculty_list = GetFacultyData($conn);
} else if (isset($_GET['update'])) {
    $faculty_list = GetFacultyByDeptID($data['id'], $conn);
    $faculty_listEx = SelectFacultyEx($faculty_list['id'], $faculty_list['ins_id'],$conn);
    echo "<script>" . " var DataDept = '" . $faculty_list['id'] . "'" . "</script>";
} else {
    $faculty_list = "";
}
?>

<div class="form-group">
    <div class="form-input">
        <select id="Faculty" name="faculty" class="input" onchange="CheckSelectFaculty()">

            <?php if (isset($_GET['update'])) { ?>
                <option value="<?= $faculty_list['id']; ?>"><?= $faculty_list['faculty']; ?> / <?= $faculty_list['ins']; ?></option>
                <?php foreach ($faculty_listEx as $faculty_listExRow) { ?>
                    <option value="<?= $faculty_listExRow['id']; ?>"><?= $faculty_listExRow['faculty']; ?> / <?= $faculty_listExRow['ins']; ?></option>
                <?php }
            } else { ?>
                <option value=""><?= $please_select_faculty ?></option>
                <?php foreach ($faculty_list as $row) { ?>
                    <option value="<?= $row['id']; ?>"><?= $row['faculty']; ?> / <?= $row['ins']; ?></option>
            <?php }
            }  ?>

        </select>

        <span class="label"><?= $faculty_label ?></span>
        <p id="MsgFaculty" class="validation-message"></p>
    </div>
</div>