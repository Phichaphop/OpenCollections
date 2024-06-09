<div class="form-group">
    <div class="form-set">

        <input id="InputVerifyCode" name="verify_code" class="input" type="text" minlength="1" maxlength="6" required="required" onkeyup="CheckVerifyCode()">
        <span class="label"><?= $verify ?></span>

        <div id="MsgBoxVerify" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconVerify" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgVerify" class="validation-message"></p>
        </div>

    </div>
</div>