    <div class="container">
        <div class="row">
            <h3>{trans s="str_admin_welcome"} {$user->getUsername()}.</h3>
            <hr/>
            <div class="col-lg-4 col-md-4">
                <a class="btn btn-primary" href="{$base}/admin/user"><i class="icon-users"></i> {trans s="str_admin_manage_users"}</a>
            </div>
            <div class="col-lg-4 col-md-12">
                <a class="btn btn-primary" href="{$base}/admin/newsletter/user"><i class="icon-user4"></i> {trans s="str_admin_list_members_newsletter"}</a>
            </div>
            <div class="col-lg-4 col-md-12">
                <a class="btn btn-primary" href="{$base}/admin/password/change"><i class="fa fa-pencil"></i> {trans s="str_admin_change_password"}</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            {include file="alert.tpl"}
        </div>
    </div>
