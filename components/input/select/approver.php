<?php
if (isset($_GET['insert'])) {
    $value = GetApprover($conn);
} else if (isset($_GET['update']) && isset($_GET['project'])) {
    $value = GetApproverByID($data['approver'], $conn);
    echo "<script>" . " var DataApprover = '" . $value['id'] . "'" . "</script>";
} else {
    $value = "";
}
?>

<div class="form-group">
    <div class="form-set">
        <select id="Approver" name="approver" class="input" onchange="CheckSelectApprover()">
            <?php if (isset($_GET['update']) && isset($_GET['project'])) { ?>
                <option value="<?= $value['id']; ?>"><?= $value['username']; ?></option>
                <?php
                $id = $value['id'];
                $ApproverEx = GetApproverEx($value['id'], $conn);
                foreach ($ApproverEx as $ApproverExRow) { ?>
                    <option value="<?= $ApproverExRow['id']; ?>"><?= $ApproverExRow['username']; ?></option>
                <?php }
            } else { ?>
                <option value=""><?= $please_select_approver ?></option>
                <?php foreach ($value  as $ApproverRow) { ?>
                    <option value="<?= $ApproverRow['id']; ?>"><?= $ApproverRow['username']; ?></option>
            <?php }
            }  ?>
        </select>
        <span class="label"><?= $approver ?></span>
        <div id="MsgBoxApprover" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconApprover" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgApprover" class="validation-message"></p>
        </div>
    </div>
</div>