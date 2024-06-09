<?php
if (isset($_GET['insert'])) {
    $value = "";
} else if (isset($_GET['update'])) {
    $value = $user['role'];
    $GetRoleByName = GetRoleByName($value, $conn);
    echo "<script>" . " var DataRole = '" . $GetRoleByName['id'] . "'" . "</script>";
} else {
    $value = "";
}

?>

<div class="form-group">
    <div class="form-set">

    <select id="Role" name="role" class="input" onchange="CheckRole()">
            <?php if (isset($_GET['update']) && isset($_GET['role'])) { ?>
                <option value="<?= $GetRoleByName['id']; ?>"><?= $GetRoleByName['role']; ?></option>
                <?php
                $id = $GetRoleByName['id'];
                $GetRoleEx = GetRoleEx($GetRoleByName['id'], $conn);
                foreach ($GetRoleEx as $GetRoleExRow) { ?>
                    <option value="<?= $GetRoleExRow['id']; ?>"><?= $GetRoleExRow['role']; ?></option>
                <?php }
            } else { ?>
                <?php
                $GetRoleData = GetRoleData($conn);
                foreach ($GetRoleData  as $GetRoleDataRow) { ?>
                    <option value="<?= $GetRoleDataRow['id']; ?>"><?= $GetRoleDataRow['role']; ?></option>
            <?php }
            }  ?>
        </select>
        <span class="label"><?= $role ?></span>
        <div id="MsgBoxRole" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconRole" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgRole"></p>
        </div>
    </div>
</div>