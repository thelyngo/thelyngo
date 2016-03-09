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
            <h3 class="cs-heading" align="center">{$str_admin_user_edit} {$userEdit->getUsername()}:</h3>
            <form role="form" method="post" action="{$form}">
                <div class="form-group">
                    <label for="username">{$str_form_username}</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="{$str_form_username_ph}" value="{$userEdit->getUsername()}" required>
                </div>
                <div class="form-group">
                    <label for="email">{$str_form_email}</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="{$str_form_email_ph}" value="{$userEdit->getEmail()}" required>
                </div>
                <div class="form-group">
                    <label for="role_id">{$str_admin_user_role}</label>
                    <select class="form-control" id="role_id" name="role_id" required>
                        <option value="">{$str_action_select}</option>
                        <option value="3" {if $userEdit->getRole()->getId() eq 3}selected="selected"{/if}>{$str_user_role_admin}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="role_id">{$str_admin_user_active_account}</label>
                    <select class="form-control" id="is_activated" name="is_activated" required>
                        <option value="">{$str_action_select}...</option>
                        <option value="0" {if $userEdit->getIsActivated() eq 0}selected="selected"{/if}>{$str_action_disable}</option>
                        <option value="1" {if $userEdit->getIsActivated() eq 1}selected="selected"{/if}>{$str_action_enable}</option>
                    </select>
                </div>
                <a class="btn btn-primary" href="{$base}/admin/user">{$str_action_back}</a> <button type="submit" class="btn btn-primary" name="editUser">{$str_action_save}</button>
            </form>
        </div>
    </div>
