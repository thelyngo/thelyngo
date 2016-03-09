<!--Login Modal-->
<div class="light-skin modal fade" id="loginModal" tabindex="-1" role="form" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{$str_menu_btn_login}</h4>
            </div>
            <div class="modal-body">
                <form method="post" class="login-form" role="form" action="{$form}">
                    <div class="form-group">
                        <label for="login">{$str_form_email}</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="{$str_form_email_ph}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">{$str_form_password}</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="{$str_form_password_ph}" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="loginArea">{$str_menu_btn_login}</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
