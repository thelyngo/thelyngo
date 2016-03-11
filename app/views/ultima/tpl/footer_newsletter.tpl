        <!--Footer-->

        <div class="row">
            <div class="col-sm-8">
                {include file="alert.tpl"}
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-center text-light">{trans s="str_subscriber_title"}</h2>
                        <p class="text-light text-center">{trans s="str_subscriber_subtitle"}</p>
                    </div>
                </div>
                <div class="row">
                    <!-- Begin MailChimp Signup Form -->
                    <form class="subscribe-form validate" action="{$form}" method="post">
                        <div class="form-group col-lg-7 col-md-8 col-sm-8 col-lg-offset-1">
                            <label class="sr-only" for="email">{trans s="str_form_email"}</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="{trans s='str_form_email_ph'}" required>
                        </div>
                        <div class="form-group col-lg-3 col-md-4 col-sm-4"><input type="submit" value="{trans s='str_form_btn_signin'}" name="subscriberNewsletter" id="mc-embedded-subscribe" class="btn btn-primary btn-block"></div>
                    </form>
                    <!-- Close MailChimp Signup Form -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="copyright">&copy; {'Y'|date} TheLyngo. {trans s="str_copyrigth"}</p>
                    </div>
                </div>
            </div>
        </footer>

        <!--Scroll To Top Button-->
        <div id="scroll-top" class="scroll-up"><i class="icon-arrow-up"></i></div>

        {$js_files}

    </body><!--Close Body-->
</html>
