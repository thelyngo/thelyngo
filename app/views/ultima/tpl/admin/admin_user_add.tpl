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
            <h3 class="cs-heading" align="center">{trans s="str_admin_user_add"}</h3>
            <form role="form" method="post" action="{$form}">
                <div class="form-group">
                    <label for="username">{trans s="str_form_username"}</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="{trans s='str_form_username_ph'}" required>
                </div>
                <div class="form-group">
                    <label for="email">{trans s="str_form_email"}</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="{trans s='str_form_email_ph'}" required>
                </div>
                <div class="form-group">
                    <label for="password">{trans s="str_form_password"}</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="{trans s='str_form_password_ph'}" required>
                </div>
                <div class="form-group">
                    <label for="password2">{trans s="str_form_password_confirm"}</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="{trans s='str_form_password_confirm_ph'}" required>
                </div>
                <a class="btn btn-primary" href="{$base}/admin/user">{trans s="str_action_back"}</a> <button type="submit" class="btn btn-primary" name="addUser">{trans s="str_action_save"}</button>
            </form>
        </div>
    </div>
