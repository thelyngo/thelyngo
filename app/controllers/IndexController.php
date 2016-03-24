<?php

class IndexController extends Controller
{
    /** @Override */
    public function __construct($params)
    {
        //N'a pas sa place ici
        View::assign("str_menu_languages", Lang::getLanguages());
    }

    public function indexAction()
    {
        if (Tools::isSubmit('subscriberNewsletter'))
            $this->manageSubsribeNewsletter();
        else if (Tools::isSubmit('contactForm'))
            $this->manageContact();
        else if (Tools::isSubmit('loginArea'))
            $this->manageLogin();

        View::assign('form', Auth::getActionForm());

        return View::render("index");
    }

    //Devrait être une action du core et non d'un controleur
    public function choseLangAction()
    {
        if (!isset(self::$params['params']['0']) || !Lang::exist(self::$params['params']['0']))
            die(raise("404"));
        else
        {
            Lang::loadLang(self::$params['params']['0']);
            Tools::redirectReferer();
        }
    }

    public function manageLogin()
    {
        $form = Tools::getPosts();
        $fields = array('login', 'password');

        if (Validate::isAllSet($form, $fields) && Validate::isCleanHtml($form))
        {
            if (Auth::login($form['login'], $form['password']))
                Tools::redirect("admin/");
            else
                View::alert(Lang::trans('label.notif_connection_fail'), 'error');
        }
        else
            View::alert(Lang::trans('label.notif_form_invalid'), 'error');
    }

    public function manageContact()
    {
        $form = Tools::getPosts();
        $fields = array('contactName', 'contactEmail', 'contactMessage');
        //On récupère et on test l'email du mot de passe oublié
        if (Validate::isAllSet($form, $fields) && Validate::isCleanHtml($form))
        {
            $to = "jsauvannet@gmail.com";

            $params = array("name" => $form['contactName'], "email" => $form['contactEmail'], "message" => $form['contactMessage'], "images" => _APP_URL_ . _IMG_DIR_);
            $mail = Mail::send(Lang::trans('label.str_mail_contact_subject'), 'mail/contact', $params, array('TheLyngo', "contact@thelyngo.com"), array($to));

            if ($mail)
                View::alert(Lang::trans('label.notif_contact_ok'), 'success');
            else
                View::alert(Lang::trans('label.notif_contact_fail'), 'error');
        }
        else
            View::alert(Lang::trans('label.notif_form_invalid'), 'error');
    }

    public function manageSubsribeNewsletter()
    {
        $form = Tools::getPosts();
        $fields = array('email');
        //On récupère et on test l'email du mot de passe oublié
        if (Validate::isAllSet($form, $fields) && Validate::isCleanHtml($form))
        {
            $repoNS = ORM::get('NewsletterSub');
            $subscriber = $repoNS->findOneBy(array('email' => $form['email']));

            //Récupère-t-on un subscriber pour l'email saisi ?
            if (Validate::isLoadedObject($subscriber))
                View::alert(Lang::trans('label.notif_subscriber_registration_exist'));
            //Non, on procède à l'enregistrement
            else
            {
                $to = "jsauvannet@gmail.com";

                $params = array("email" => $form['email'], "images" => "http://thelyngo.com" . _IMG_DIR_);
                $mail = Mail::send(Lang::trans('label.str_mail_newsletter_subject'), 'mail/newsletter_subscriber', $params, array('TheLyngo', "contact@thelyngo.com"), array($to, _APP_URL_ . _IMG_DIR_));

                if ($mail)
                {
                    $subscriber = new NewsletterSub();
                    $subscriber->email = $form['email'];
                    $subscriber->created_at = date_create();

                    ORM::persist($subscriber);
                    ORM::flush();

                    View::alert(Lang::trans('label.notif_subscriber_registration_ok'), 'success');
                }
                else
                    View::alert(Lang::trans('label.notif_subscriber_registration_fail'), 'error');
            }
        }
        else
            View::alert(Lang::trans('label.notif_subscriber_registration_invalid'), 'error');
    }

    public function termsAction()
    {
        if (Tools::isSubmit('loginArea'))
            $this->manageLogin();

        View::assign('form', Auth::getActionForm());

        return View::render("terms");
    }
}
