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
            <h3 class="cs-heading" align="center">{$str_admin_user_list_title}</h3>
            <div class="row-header" align="center">
                <a class="btn btn-primary" href="{$base}/admin/user/add">{$str_admin_user_add}</a>
            </div>
            <table class="table-striped">
                <tr>
                    <th>#</th>
                    <th>{$str_form_username}</th>
                    <th>{$str_form_email}</th>
                    <th>{$str_admin_user_role}</th>
                    <th>{$str_admin_user_account_state}</th>
                    <th>{$str_form_actions}</th>
                </tr>
                {if isset($users) && $users|@count gt 0}
                {foreach from=$users item=item name="tabUsers"}
                <tr>
                    <td>{$smarty.foreach.tabUsers.index + 1}</td>
                    <td>{$item->getUsername()}</td>
                    <td>{$item->getEmail()}</td>
                    <td>
                    {if $item->getRole()->getId() eq 1}
                        {$str_user_role_member}
                    {else if $item->getRole()->getId()  eq 2}
                        {$str_user_role_moderator}
                    {else if $item->getRole()->getId()  eq 3}
                        {$str_user_role_admin}
                    {else}
                        {$str_user_role_guest}
                    {/if}
                    </td>
                    <td>
                    {if $item->getIsActivated()}
                        <font color="green">{$str_user_account_active}</font>
                    {else}
                        <font color="red">{$str_user_account_inactive}</font>
                    {/if}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{$base}/admin/user/{$item->getId()}/edit">{$str_action_edit}</a>
                    {if $item->getId() neq $user->getId()}
                        {if $item->getIsActivated() eq 0}
                        <a class="btn btn-primary" href="{$base}/admin/user/{$item->getId()}/unban">{$str_action_enable}</a>
                        {else}
                        <a class="btn btn-primary" href="{$base}/admin/user/{$item->getId()}/ban">{$str_action_disable}</a>
                        {/if}
                    {/if}
                    </td>
                </tr>
                {/foreach}
                {else}
                <tr>
                    <td colspan="5">{$str_admin_user_list_nodata}</td>
                </tr>
                {/if}
            </table>
        </div>
    </div>
