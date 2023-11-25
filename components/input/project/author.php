<?php
if (isset($_GET['insert'])) {
    $value = GetAuthorByID($MyID, $conn);
} else if (isset($_GET['update']) && isset($_GET['project'])) {
    $value = GetAuthorByID($data['author'], $conn);
    echo "<script>" . " var DataAuthor = '" . $value['id'] . "'" . "</script>";
} else {
    $value = "";
}
?>

<div class="form-group">
    <div class="form-input">
        <select id="Author" name="author" class="input" onchange="CheckSelectAuthor()">
            <?php if (isset($_SESSION['admin'])) { ?>
                <option value="<?= $value['id']; ?>"><?= $value['username']; ?></option>
                <?php $GetAuthorEx = GetAuthorEx($value['id'], $conn);
                foreach ($GetAuthorEx as $GetAuthorExRow) { ?>
                    <option value="<?= $GetAuthorExRow['id']; ?>"><?= $GetAuthorExRow['username']; ?></option>
                <?php }
            } else { ?>
                <option value="<?= $value['id']; ?>"><?= $value['username']; ?></option>
            <?php } ?>
        </select>
        <span class="label"><?= $author ?></span>
        <p id="MsgAuthor" class="validation-message"></p>
    </div>
</div>