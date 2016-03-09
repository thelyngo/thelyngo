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
            <h3 class="cs-heading" align="center">{$str_admin_newsletter_user_title}</h3>

            <table class="table-striped">
                <tr>
                    <th>#</th>
                    <th>{$str_form_email}</th>
                    <th>{$str_form_subscribe_at}</th>
                </tr>
                {if isset($users) && $users|@count gt 0}
                {foreach from=$users item=item name="tabUsers"}
                <tr>
                    <td>N°{$item->id}</td>
                    <td>{$item->email}</td>
                    <td>{$item->created_at|date_format:'%Y-%m-%d'}</td>
                </tr>
                {/foreach}
                {else}
                <tr>
                    <td colspan="3">{$str_admin_newsletter_no_data}</td>
                </tr>
                {/if}
            </table>
        </div>
    </div>
