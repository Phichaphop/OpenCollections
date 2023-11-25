<div class="form-group">
    <div class="form-input">
        <input id="Pass" name="pass" class="input" type="password" minlength="1" maxlength="11" required="required" onkeyup="CheckPass()">
        <span class="label"><?= $password ?></span>
        <span id="VisibilityPass" class="material-symbols-outlined eye" onclick="VisibilityPassChange()">visibility_off</span>
        <p id="MsgPass" class="validation-message"></p>
    </div>
</div>