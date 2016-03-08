<?php

class IndexController extends Controller
{
    /** @Override */
    /*public function __construct($params)
    {
        parent::__construct($params);
    }*/

    public function indexAction()
    {
        Translations::loadIndex();

        if (Tools::isSubmit('subscriberNewsletter'))
            $this->manageSubsribeNewsletter();
        else if (Tools::isSubmit('contact'))
            $this->manageContact();
        else if (Tools::isSubmit('login'))
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
            Tools::redirect();
        }
    }

    public function manageLogin()
    {
        $form = Tools::getPosts();

        ds($form);
    }

    public function manageContact()
    {
        $form = Tools::getPosts();
        $fields = array('name', 'email', 'message');
        //On récupère et on test l'email du mot de passe oublié
        if (Validate::isAllSet($form, $fields) && Validate::isCleanHtml($form))
        {
            $to = "jsauvannet@gmail.com";

            $params = array("name" => $form['name'], "email" => $form['email'], "message" => $form['message'], "images" => "http://192.168.0.10:8888" . _IMG_DIR_);
            $mail = Mail::send('Nouveau message de HamzaTraduction', 'mail/contact', $params, 'HamzaTraduction', array($to));

            if ($mail)
                View::alert(Lang::trans('label.contact_ok'), 'success');
            else
                View::alert(Lang::trans('label.contact_fail'), 'error');
        }
        else
            View::alert(Lang::trans('label.contact_invalid'), 'error');
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
                View::alert(Lang::trans('label.subscriber_registration_exist'));
            //Non, on procède à l'enregistrement
            else
            {
                $to = "jsauvannet@gmail.com";

                $params = array("email" => $form['email'], "images" => "http://192.168.0.10:8888" . _IMG_DIR_);
                $mail = Mail::send('Nouvel inscrit à votre newsletter', 'mail/newsletter_subscriber', $params, 'HamzaTraduction', array($to, "http://192.168.0.10:8888" . _IMG_DIR_));

                if ($mail)
                {
                    $subscriber = new NewsletterSub();
                    $subscriber->email = $form['email'];
                    $subscriber->created_at = date_create();

                    ORM::persist($subscriber);
                    ORM::flush();

                    View::alert(Lang::trans('label.subscriber_registration_ok'), 'success');
                }
                else
                    View::alert(Lang::trans('label.subscriber_registration_fail'), 'error');
            }
        }
        else
            View::alert(Lang::trans('label.subscriber_registration_invalid'), 'error');
    }
}
