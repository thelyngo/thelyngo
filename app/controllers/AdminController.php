<?php

class AdminController extends Controller
{
    /** @Override */
    public function __construct($params)
    {
        if (!Auth::user() || !Auth::checkMemberRole(_USER_ROLE_ADMIN_))
            die(raise('404'));

        //N'a pas sa place ici
        View::assign("str_menu_languages", Lang::getLanguages());
    }

    public function indexAction()
    {
        return View::render('admin/admin_index');
    }

    public function getUsersAction()
    {
        $repoUser = ORM::get("User");

        //On peut findAll car ce site n'est pas censé avoir beaucoup d'utilisateurs
        $users = $repoUser->findAll();

        View::assign("users", $users);
        return View::render('admin/admin_user');
    }

    public function banUserAction()
    {
        $repoUser = ORM::get("User");

        if (isset(self::$params['params']['0']) && Validate::isLoadedObject($repoUser->findOneBy(array('id' => (int)self::$params['params']['0']))))
        {
            $user = $repoUser->findOneBy(array('id' => (int)self::$params['params']['0']));
            if ($user->getId() == Auth::user()->getId())
                View::alert(Lang::trans('label.notif_form_user_ban_himself'), 'error');
            else
            {
                $user->setIsActivated(0);
                View::alert(Lang::trans('label.notif_form_user_ban'), 'success');
            }
        }
        else
            View::alert(Lang::trans('label.notif_user_not_found'), 'error');

        $users = $repoUser->findAll();
        View::assign("users", $users);

        return View::render('admin/admin_user');
    }

    public function unbanUserAction()
    {
        $repoUser = ORM::get("User");

        if (isset(self::$params['params']['0']) && Validate::isLoadedObject($repoUser->findOneBy(array('id' => (int)self::$params['params']['0']))))
        {
            $user = $repoUser->findOneBy(array('id' => (int)self::$params['params']['0']));

            $user->setIsActivated(1);
            View::alert(Lang::trans('label.notif_form_user_unban'), 'success');
        }
        else
            View::alert(Lang::trans('label.notif_user_not_found'), 'error');

        $users = $repoUser->findAll();
        View::assign("users", $users);

        return View::render('admin/admin_user');
    }

    public function addUserAction()
    {
        $repoUser = ORM::get("User");

        if (Tools::isSubmit("addUser"))
        {
            $form = Tools::getPosts();
            $fields = array('username', 'email', 'password', 'password2');

            if (Validate::isAllSet($form, $fields) && Validate::isCleanHtml($form))
            {
                if ($form['password'] != $form['password2'])
                    View::alert(Lang::trans('label.notif_form_password_dont_match'), 'error');
                else
                {
                    if (Auth::register($form['username'], $form['email'], $form['password'], _USER_ROLE_ADMIN_, 1))
                    {
                        View::alert(Lang::trans('label.notif_form_user_added'), 'success');
                        Tools::redirect("admin/user");
                    }
                    else
                        View::alert(Lang::trans('label.notif_form_invalid'), 'error');
                }
            }
            else
                View::alert(Lang::trans('label.notif_form_invalid'), 'error');
        }

        View::assign('form', Auth::getActionForm());
        return View::render("admin/admin_user_add");
    }

    public function editUserAction()
    {
        $repoUser = ORM::get("User");
        $repoRole = ORM::get("UserRole");

        if (isset(self::$params['params']['0']))
        {
            $user = $repoUser->findOneBy(array('id' => (int)self::$params['params']['0']));
            if (!Validate::isLoadedObject($user))
                return Tools::redirect("admin/user");
        }
        else
            return Tools::redirect("admin/user");

        View::assign("userEdit", $user);
        View::assign('form', Auth::getActionForm());

        if (Tools::isSubmit("editUser"))
        {
            $form = Tools::getPosts();
            $fields = array('username', 'email', 'role_id');

            if (Validate::isAllSet($form, $fields) && Validate::isCleanHtml($form))
            {
                if (!Validate::isUsername($form['username']))
                {
                    View::alert(Lang::trans('label.notif_form_username_invalid'), 'error');
                    return View::render("admin/admin_user_edit");
                }

                if ($user->getUsername() != $form['username'] && Validate::isLoadedObject($repoUser->findOneBy(array('username' => $form['username']))))
                {
                    View::alert(Lang::trans('label.notif_form_username_already_used'), 'error');
                    return View::render("admin/admin_user_edit");
                }

                if (!Validate::isEmail($form['email']))
                {
                    View::alert(Lang::trans('label.notif_form_email_invalid'), 'error');
                    return View::render("admin/admin_user_edit");
                }

                if ($user->getEmail() != $form['email'] && Validate::isLoadedObject($repoUser->findOneBy(array('email' => $form['email']))))
                {
                    View::alert(Lang::trans('label.notif_form_email_already_used'), 'error');
                    return View::render("admin/admin_user_edit");
                }

                if ((isset($form['is_activated']) && !$form['is_activated'] || !isset($form['is_activated'])) && $user->getId() == Auth::user()->getId())
                {
                    View::alert(Lang::trans('label.notif_form_user_ban_himself'), 'error');
                    return View::render("admin/admin_user_edit");
                }

                $role = $repoRole->findOneBy(array('id' => $form['role_id']));
                if (!Validate::isLoadedObject($role))
                {
                    View::alert(Lang::trans('label.notif_form_user_role_unknown'), 'error');
                    return View::render("admin/admin_user_edit");
                }

                $user->setUsername($form['username']);
                $user->setUsernameSlug(Tools::str2url($form['username']));
                $user->setEmail($form['email']);
                $user->setRole($role);
                $user->setIsActivated(isset($form['is_activated']) ? $form['is_activated'] : 0);

                ORM::persist($user);
                ORM::flush();

                View::alert(Lang::trans('label.notif_form_user_update_ok'), 'success');
            }
            else
                View::alert(Lang::trans('label.notif_form_invalid'), 'error');
        }

        View::assign("userEdit", $user);

        return View::render("admin/admin_user_edit");
    }

    public function getNewsletterSubsAction()
    {
        $repoSubs = ORM::get("NewsletterSub");

        $users = $repoSubs->findBy(array(), array('created_at' => 'DESC'), 50);

        View::assign("users", $users);
        return View::render('admin/admin_newsletter_subs');
    }

    public function changePasswordAction()
    {
        View::assign('form', Auth::getActionForm());

        if (Tools::isSubmit("changePassword"))
        {
            $form = Tools::getPosts();
            $fields = array('actual_password', 'password', 'password2');

            if (Validate::isAllSet($form, $fields) && Validate::isCleanHtml($form))
            {
                $password = hash(_USER_CRYPT_, $form["actual_password"].Auth::user()->getSalt()._APP_SALT_);

                if ($form["password"] != $form["password2"])
                {
                    View::alert(Lang::trans('label.notif_form_password_dont_match'), 'error');
                    return View::render('admin/admin_change_password');
                }
                else if (Auth::user()->getPassword() != $password)
                {
                    View::alert(Lang::trans('label.notif_form_password_incorrect'), 'error');
                    return View::render('admin/admin_change_password');
                }
                else
                {
                    Auth::user()->setPassword(hash(_USER_CRYPT_, $form["password"].Auth::user()->getSalt()._APP_SALT_));

                    ORM::persist(Auth::user());
                    ORM::flush();

                    Tools::redirect('auth/logout');
                }
            }
            else
                View::alert(Lang::trans('label.notif_form_invalid'), 'error');
        }

        return View::render('admin/admin_change_password');
    }
}
