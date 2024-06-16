<?php
if (isset($_GET['insert'])) {
    $value = "";
} else if (isset($_GET['update']) && isset($_GET['project'])) {
    $value = GetProjectTypeByID($data['type'], $conn);
    echo "<script>" . " var DataProjectType = '" . $value['id'] . "'" . "</script>";
} else {
    $value ="";
}
?>

<div class="form-group">
    <div class="form-set">
        <select id="ProjectType" name="project_type" class="input" onchange="CheckSelectProjectType()">
            <?php if (isset($_GET['update']) && isset($_GET['project'])) { ?>
                <option value="<?= $value['id']; ?>"><?= $value['type']; ?></option>
                <?php
                $TypeEx = GetProjectTypeEx($value['id'], $conn);
                foreach ($TypeEx as $TypeExRow) { ?>
                    <option value="<?= $TypeExRow['id']; ?>"><?= $TypeExRow['type']; ?></option>
                <?php }
            } else { ?>
                <option value=""><?= $please_select_project_type ?></option>
                <?php
                $PType = GetProjectTypeData($conn);
                foreach ($PType  as $PTypeRow) { ?>
                    <option value="<?= $PTypeRow['id']; ?>"><?= $PTypeRow['type']; ?></option>
            <?php }
            }  ?>
        </select>
        <span class="label"><?= $project_type ?></span>
        <div id="MsgBoxProjectType" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconProjectType" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgProjectType" class="validation-message"></p>
        </div>
    </div>
</div>