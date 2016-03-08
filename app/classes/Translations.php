<?php
class Translations
{
    public static function loadIndex()
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
        $arr["str_menu_languages"] = Lang::getLanguages();
        $arr["str_menu_btn_login"] = Lang::trans("label.str_menu_btn_login");
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

        Translations::assignTrans($arr);
    }

    public static function assignTrans($arr)
    {
        foreach ($arr as $key => $val)
            View::assign($key, $val);
    }
}
