<?php
class Translations
{
    public static function loadHeader()
    {
        $arr = array();

        /* Menu */
        $arr["str_menu_home"] = Lang::trans("label.str_menu_home");
        $arr["str_menu_rub"] = Lang::trans("label.str_menu_rub");
        $arr["str_menu_rub_prices"] = Lang::trans("label.str_menu_rub_prices");
        $arr["str_menu_rub_contact"] = Lang::trans("label.str_menu_rub_contact");
        $arr["str_menu_rub_newsletter"] = Lang::trans("label.str_menu_rub_newsletter");
        $arr["str_menu_rub_your_language"] = Lang::trans("label.str_menu_rub_your_language");
        $arr["str_menu_rub_terms"] = Lang::trans("label.str_menu_rub_terms");
        $arr["str_menu_rub_account"] = Lang::trans("label.str_menu_rub_account");
        $arr["str_menu_rub_admin"] = Lang::trans("label.str_menu_rub_admin");
        $arr["str_menu_rub_disconnect"] = Lang::trans("label.str_menu_rub_disconnect");
        $arr["str_menu_languages"] = Lang::getLanguages();
        $arr["str_menu_btn_login"] = Lang::trans("label.str_menu_btn_login");
        $arr["str_copyrigth"] = Lang::trans("label.str_copyrigth");

        Translations::assignTrans($arr);
    }

    public static function loadIndex()
    {
        $arr = array();

        $arr["str_form_name"] = Lang::trans("label.str_form_name");
        $arr["str_form_name_ph"] = Lang::trans("label.str_form_name_ph");
        $arr["str_form_email"] = Lang::trans("label.str_form_email");
        $arr["str_form_email_ph"] = Lang::trans("label.str_form_email_ph");
        $arr["str_form_message"] = Lang::trans("label.str_form_message");
        $arr["str_form_message_255_ph"] = Lang::trans("label.str_form_message_255_ph");
        $arr["str_form_btn_send"] = Lang::trans("label.str_form_btn_send");
        $arr["str_form_btn_signin"] = Lang::trans("label.str_form_btn_signin");
        $arr["str_form_username"] = Lang::trans("label.str_form_username");
        $arr["str_form_username_ph"] = Lang::trans("label.str_form_username_ph");
        $arr["str_form_password"] = Lang::trans("label.str_form_password");
        $arr["str_form_password_ph"] = Lang::trans("label.str_form_password_ph");
        $arr["str_subscriber_title"] = Lang::trans("label.str_subscriber_title");
        $arr["str_subscriber_subtitle"] = Lang::trans("label.str_subscriber_subtitle");

        Translations::assignTrans($arr);
    }

    public static function loadAdminMenu()
    {
        $arr = array();

        $arr["str_admin_welcome"] = Lang::trans("label.str_admin_welcome");
        $arr["str_admin_manage_users"] = Lang::trans("label.str_admin_manage_users");
        $arr["str_admin_list_members_newsletter"] = Lang::trans("label.str_admin_list_members_newsletter");
        $arr["str_admin_write_newsletter"] = Lang::trans("label.str_admin_write_newsletter");

        Translations::assignTrans($arr);
    }

    public static function loadNewsletterSubs()
    {
        $arr = array();

        $arr['str_admin_newsletter_user_title'] = Lang::trans("label.str_admin_newsletter_user_title");
        $arr['str_form_subscribe_at'] = Lang::trans("label.str_form_subscribe_at");
        $arr['str_admin_newsletter_no_data'] = Lang::trans("label.str_admin_newsletter_no_data");
        $arr["str_form_email"] = Lang::trans("label.str_form_email");

        Translations::assignTrans($arr);
    }

    public static function loadUsers()
    {
        $arr = array();

        $arr['str_admin_user_list_title'] = Lang::trans("label.str_admin_user_list_title");
        $arr['str_admin_user_add'] = Lang::trans("label.str_admin_user_add");
        $arr['str_admin_user_role'] = Lang::trans("label.str_admin_user_role");
        $arr['str_admin_user_account_state'] = Lang::trans("label.str_admin_user_account_state");
        $arr['str_form_actions'] = Lang::trans("label.str_form_actions");
        $arr['str_user_role_member'] = Lang::trans("label.str_user_role_member");
        $arr['str_user_role_moderator'] = Lang::trans("label.str_user_role_moderator");
        $arr['str_user_role_admin'] = Lang::trans("label.str_user_role_admin");
        $arr['str_user_role_guest'] = Lang::trans("label.str_user_role_guest");
        $arr['str_user_account_active'] = Lang::trans("label.str_user_account_active");
        $arr['str_user_account_inactive'] = Lang::trans("label.str_user_account_inactive");
        $arr['str_action_edit'] = Lang::trans("label.str_action_edit");
        $arr['str_action_enable'] = Lang::trans("label.str_action_enable");
        $arr['str_action_disable'] = Lang::trans("label.str_action_disable");
        $arr['str_admin_user_list_nodata'] = Lang::trans("label.str_admin_user_list_nodata");
        $arr["str_form_email"] = Lang::trans("label.str_form_email");
        $arr["str_form_username"] = Lang::trans("label.str_form_username");

        Translations::assignTrans($arr);
    }

    public static function loadUserAdd()
    {
        $arr = array();

        $arr["str_form_email"] = Lang::trans("label.str_form_email");
        $arr["str_form_username"] = Lang::trans("label.str_form_username");
        $arr["str_form_email_ph"] = Lang::trans("label.str_form_email_ph");
        $arr["str_form_username_ph"] = Lang::trans("label.str_form_username_ph");
        $arr["str_form_password"] = Lang::trans("label.str_form_password");
        $arr["str_form_password_ph"] = Lang::trans("label.str_form_password_ph");
        $arr["str_form_password_confirm"] = Lang::trans("label.str_form_password_confirm");
        $arr["str_form_password_confirm_ph"] = Lang::trans("label.str_form_password_confirm_ph");
        $arr["str_action_back"] = Lang::trans("label.str_action_back");
        $arr["str_action_save"] = Lang::trans("label.str_action_save");
        $arr["str_admin_user_add"] = Lang::trans("label.str_admin_user_add");

        Translations::assignTrans($arr);
    }

    public static function loadUserEdit()
    {
        $arr = array();

        $arr["str_form_email"] = Lang::trans("label.str_form_email");
        $arr["str_form_username"] = Lang::trans("label.str_form_username");
        $arr["str_form_email_ph"] = Lang::trans("label.str_form_email_ph");
        $arr["str_form_username_ph"] = Lang::trans("label.str_form_username_ph");
        $arr["str_admin_user_role"] = Lang::trans("label.str_admin_user_role");
        $arr["str_action_back"] = Lang::trans("label.str_action_back");
        $arr["str_action_save"] = Lang::trans("label.str_action_save");
        $arr["str_action_select"] = Lang::trans("label.str_action_select");
        $arr["str_admin_user_edit"] = Lang::trans("label.str_admin_user_edit");
        $arr["str_user_role_admin"] = Lang::trans("label.str_user_role_admin");
        $arr["str_action_enable"] = Lang::trans("label.str_action_enable");
        $arr["str_action_disable"] = Lang::trans("label.str_action_disable");
        $arr["str_admin_user_active_account"] = Lang::trans("label.str_admin_user_active_account");

        Translations::assignTrans($arr);
    }

    public static function assignTrans($arr)
    {
        foreach ($arr as $key => $val)
            View::assign($key, $val);
    }
}
