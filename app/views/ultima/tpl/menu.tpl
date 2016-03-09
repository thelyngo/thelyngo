<!--Header-->
<header class="stiky-header">
    <div class="container group">
        <a class="logo" href="{$base}/"><img src="{$images}logo-dark.png" alt="TheLyngo"/></a>
        <a class="logo-mobile" href="{$base}/"><img src="{$images}logo-mobile.png" alt="TheLyngo"/></a>
        <div class="navi-toggle group">
            <span class="dot"></span><span class="line"></span>
            <span class="dot"></span><span class="line"></span>
            <span class="dot"></span><span class="line"></span>
            <span class="dot"></span><span class="line"></span>
        </div>
        {if !isset($user)}
        <a class="btn btn-primary btn-login" href="#" data-toggle="modal" data-target="#loginModal"><i class="icon-user"></i>{$str_menu_btn_login}</a>
        {/if}
        <nav class="main-navi">
            <ul>
                <li class="active"><a class="scroll-up" href="{$base}/#">{$str_menu_home}</a></li>
                <li class="has-dropdown"><a class="scroll" href="{$base}/#features">{$str_menu_rub}<i class="fa fa-caret-down"></i></a>
                <ul class="dropdown">
                    <li><a href="{$base}/#prices">{$str_menu_rub_prices}</a></li>
                    <li><a href="{$base}/#contact">{$str_menu_rub_contact}</a></li>
                    <li><a href="{$base}/#newsletter">{$str_menu_rub_newsletter}</a></li>
                </ul>
            </li>
            <li class="has-dropdown"><a href="#langues">{$str_menu_rub_your_language}<i class="fa fa-caret-down"></i></a>
                <ul class="dropdown">
                    {foreach from=$str_menu_languages item=item key=key}
                        <li><a href="{$base}/lang/{$key}">{$item}</a></li>
                    {/foreach}
                </ul>
            </li>
            <li><a href="{$base}/terms">{$str_menu_rub_terms}</a></li>
            {if isset($user)}
            <li class="has-dropdown"><a href="{$base}/#account">{$str_menu_rub_account} {$user->getUsername()}<i class="fa fa-caret-down"></i></a>
                <ul class="dropdown">
                    <li><a href="{$base}/admin">{$str_menu_rub_admin}</a></li>
                    <li><a href="{$base}/auth/logout">{$str_menu_rub_disconnect}</a></li>
                </ul>
            </li>
            {/if}
          </ul>
        </nav>
    </div>
</header>
