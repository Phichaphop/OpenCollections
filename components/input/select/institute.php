<?php
if (isset($_GET['insert'])) {
    $ins_list = "";
} else if (isset($_GET['update']) && isset($_GET['faculty'])) {
    $ins_list = GetInsByFacultyID($data['id'], $conn);
    $GetInsByID = GetInsByID($ins_list, $conn);
    echo "<script>" . " var DataIns = '" . $GetInsByID['id'] . "'" . "</script>";
} else {
    $ins_list = "";
}
?>

<div class="form-group">
    <div class="form-set">
        <select id="Ins" name="ins" class="input" onchange="CheckSelectIns()">
            <?php if (isset($_GET['update'])) { ?>
                <option value="<?= $GetInsByID['id']; ?>"><?= $GetInsByID['ins']; ?></option>
                <?php
                $id = $GetInsByID['id'];
                $GetInsEx = GetInsEx($GetInsByID['id'], $conn);
                foreach ($GetInsEx as $GetInsExRow) { ?>
                    <option value="<?= $GetInsExRow['id']; ?>"><?= $GetInsExRow['ins']; ?></option>
                <?php }
            } else { ?>
                <option value=""><?= $please_select_ins ?></option>
                <?php
                $GetInsData = GetInsData($conn);
                foreach ($GetInsData  as $GetInsDataRow) { ?>
                    <option value="<?= $GetInsDataRow['id']; ?>"><?= $GetInsDataRow['ins']; ?></option>
            <?php }
            }  ?>
        </select>
        <span class="label"><?= $institute ?></span>
        <div id="MsgBoxIns" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconIns" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgIns" class="validation-message"></p>
        </div>
    </div>
</div>