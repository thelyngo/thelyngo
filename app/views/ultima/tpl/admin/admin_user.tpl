    <!--THELYNGO TOP-->
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
            <h3 class="cs-heading" align="center">{trans s="str_admin_user_list_title"}</h3>
            <div class="row-header" align="center">
                <a class="btn btn-primary" href="{$base}/admin/user/add">{trans s="str_admin_user_add"}</a>
            </div>
            <table class="table-striped">
                <tr>
                    <th>#</th>
                    <th>{trans s="str_form_username"}</th>
                    <th>{trans s="str_form_email"}</th>
                    <th>{trans s="str_admin_user_role"}</th>
                    <th>{trans s="str_admin_user_account_state"}</th>
                    <th>{trans s="str_form_actions"}</th>
                </tr>
                {if isset($users) && $users|@count gt 0}
                {foreach from=$users item=item name="tabUsers"}
                <tr>
                    <td>{$smarty.foreach.tabUsers.index + 1}</td>
                    <td>{$item->getUsername()}</td>
                    <td>{$item->getEmail()}</td>
                    <td>
                    {if $item->getRole()->getId() eq 1}
                        {trans s="str_user_role_member"}
                    {else if $item->getRole()->getId()  eq 2}
                        {trans s="str_user_role_moderator"}
                    {else if $item->getRole()->getId()  eq 3}
                        {trans s="str_user_role_admin"}
                    {else}
                        {trans s="str_user_role_guest"}
                    {/if}
                    </td>
                    <td>
                    {if $item->getIsActivated()}
                        <font color="green">{trans s="str_user_account_active"}</font>
                    {else}
                        <font color="red">{trans s="str_user_account_inactive"}</font>
                    {/if}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{$base}/admin/user/{$item->getId()}/edit">{trans s="str_action_edit"}</a>
                    {if $item->getId() neq $user->getId()}
                        {if $item->getIsActivated() eq 0}
                        <a class="btn btn-primary" href="{$base}/admin/user/{$item->getId()}/unban">{trans s="str_action_enable"}</a>
                        {else}
                        <a class="btn btn-primary" href="{$base}/admin/user/{$item->getId()}/ban">{trans s="str_action_disable"}</a>
                        {/if}
                    {/if}
                    </td>
                </tr>
                {/foreach}
                {else}
                <tr>
                    <td colspan="5">{trans s="str_admin_user_list_nodata"}</td>
                </tr>
                {/if}
            </table>
        </div>
    </div>
