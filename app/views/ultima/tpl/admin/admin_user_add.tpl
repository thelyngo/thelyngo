    <!--HEADER-->
    {include file="header.tpl"}

    <!--LOGIN AREA-->
    {include file="login.tpl"}

    <!--MENU-->
    {include file="menu.tpl"}

    <!--MENU-->
    {include file="admin/admin_menu.tpl"}

    <div class="container">
        <div class="row">
            <hr/>
            <h3 class="cs-heading" align="center">{$str_admin_user_add}</h3>
            <form role="form" method="post" action="{$form}">
                <div class="form-group">
                    <label for="username">{$str_form_username}</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="{$str_form_username_ph}" required>
                </div>
                <div class="form-group">
                    <label for="email">{$str_form_email}</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="{$str_form_email_ph}" required>
                </div>
                <div class="form-group">
                    <label for="password">{$str_form_password}</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="{$str_form_password_ph}" required>
                </div>
                <div class="form-group">
                    <label for="password2">{$str_form_password_confirm}</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="{$str_form_password_confirm_ph}" required>
                </div>
                <a class="btn btn-primary" href="{$base}/admin/user">{$str_action_back}</a> <button type="submit" class="btn btn-primary" name="addUser">{$str_action_save}</button>
            </form>
        </div>
    </div>
