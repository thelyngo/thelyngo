<!--Header-->
<header class="stiky-header">
    <div class="container group">
        <a class="logo" href="index.html"><img src="{$images}logo-dark.png" alt="HamzaTraduction"/></a>
        <a class="logo-mobile" href="index.html"><img src="{$images}logo-mobile.png" alt="HamzaTraduction"/></a>
        <div class="navi-toggle group">
            <span class="dot"></span><span class="line"></span>
            <span class="dot"></span><span class="line"></span>
            <span class="dot"></span><span class="line"></span>
            <span class="dot"></span><span class="line"></span>
        </div>
        <a class="btn btn-primary btn-login" href="#" data-toggle="modal" data-target="#loginModal"><i class="icon-user"></i>{$str_menu_btn_login}</a>
        <nav class="main-navi">
            <ul>
                <li class="active"><a class="scroll-up" href="#">{$str_menu_home}</a></li>
                <li class="has-dropdown"><a class="scroll" href="#features">{$str_menu_rub}<i class="fa fa-caret-down"></i></a>
                <ul class="dropdown">
                    <li><a href="#prices">{$str_menu_rub_prices}</a></li>
                    <li><a href="#contact">{$str_menu_rub_contact}</a></li>
                    <li><a href="#newsletter">{$str_menu_rub_newsletter}</a></li>
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
          </ul>
        </nav>
    </div>
</header>
