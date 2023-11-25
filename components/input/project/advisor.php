<?php
if (isset($_GET['insert'])) {
    $value = GetAdvisor($conn);
} else if (isset($_GET['update']) && isset($_GET['project'])) {
    $value = GetAdvisorByID($data['advisor'], $conn);
    echo "<script>" . " var DataAdvisor = '" . $value['id'] . "'" . "</script>";
} else {
    $value = "";
}
?>

<div class="form-group">
    <div class="form-input">
        <select id="Advisor" name="advisor" class="input" onchange="CheckSelectAdvisor()">
            <?php if (isset($_GET['update']) && isset($_GET['project'])) { ?>
                <option value="<?= $value['id']; ?>"><?= $value['username']; ?></option>
                <?php
                $id = $value['id'];
                $AdvisorEx = GetAdvisorEx($value['id'], $conn);
                foreach ($AdvisorEx as $AdvisorExRow) { ?>
                    <option value="<?= $AdvisorExRow['id']; ?>"><?= $AdvisorExRow['username']; ?></option>
                <?php }
            } else { ?>
                <option value=""><?= $please_select_advisor ?></option>
                <?php foreach ($value  as $AdvisorRow) { ?>
                    <option value="<?= $AdvisorRow['id']; ?>"><?= $AdvisorRow['username']; ?></option>
            <?php }
            }  ?>

        </select>
        <span class="label"><?= $advisor ?></span>
        <p id="MsgAdvisor" class="validation-message"></p>
    </div>
</div>