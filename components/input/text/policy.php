<div class="form-group">
    <div class="form-set">
        <p><input id="Policy" class="checkbox" type="checkbox" onchange="CheckPolicy()"> <?= $access ?> <a class="text-link" href="sign.php?policy"><?= $policy ?></a></p>
        <div id="MsgBoxPolicy" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconPolicy" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgPolicy" class="validation-message"></p>
        </div>
    </div>
</div>