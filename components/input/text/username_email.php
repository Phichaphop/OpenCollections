<div class="form-group">
    <div class="form-set">
        <input id="Username" name="username" class="input" type="text" minlength="1" maxlength="50" required="required" onkeyup="CheckUsernameEmail()">
        <span class="label"><?= $username_email ?></span>
        <div id="MsgBoxUsername" class="validation-msg">
            <div class="MsgContent">
                <span id="MsgIconUsername" class="material-symbols-outlined icon"></span>
            </div>
            <p id="MsgUsername" class="validation-message"></p>
        </div>
    </div>
</div>