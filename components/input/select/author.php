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
    <div class="form-set">
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
        <div id="MsgBoxAuthor" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconAuthor" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgAuthor" class="validation-message"></p>
        </div>
    </div>
</div>