<?php
if (isset($_GET['insert'])) {
    $dept_list = GetDeptData($conn);
} else if (isset($_GET['update']) && isset($_GET['major'])) {
    $dept_list = GetDeptByMajorID($data['id'], $conn);
    $dept_listEx = SelectDeptEx($dept_list['id'], $dept_list['faculty'], $conn);
    echo "<script>" . " var DataDept = '" . $dept_list['id'] . "'" . "</script>";
} else {
    $dept_list = "";
}
?>

<div class="form-group">
    <div class="form-set">
        <select id="Dept" name="dept" class="input" onchange="CheckSelectDept()">

            <?php if (isset($_GET['update'])) { ?>
                <option value="<?= $dept_list['id'] ?>"><?= $dept_list['dept'] ?> / <?= $dept_list['faculty'] ?> as <?= $dept_list['ins'] ?></option>
                <?php foreach ($dept_listEx as $dept_listExRow) { ?>
                    <option value="<?= $dept_listExRow['id'] ?>"><?= $dept_listExRow['dept'] ?> / <?= $dept_listExRow['faculty'] ?> as <?= $dept_listExRow['ins'] ?></option>
                <?php }
            } else { ?>
                <option value=""><?= $please_select_dept ?></option>
                <?php foreach ($dept_list  as $row) { ?>
                    <option value="<?= $row['id'] ?>"><?= $row['dept'] ?> / <?= $row['faculty'] ?> as <?= $row['ins'] ?></option>
            <?php }
            }  ?>

        </select>

        <span class="label"><?= $dept ?></span>
        
        <div id="MsgBoxDept" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconDept" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgDept" class="validation-message"></p>
        </div>
    </div>
</div>