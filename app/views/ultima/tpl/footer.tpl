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
                        <p class="copyright">&copy; {'Y'|date} TheLyngo. {trans s="str_copyrigth"}</p>
                    </div>
                </div>
            </div>
        </footer>

        <!--Scroll To Top Button-->
        <div id="scroll-top" class="scroll-up"><i class="icon-arrow-up"></i></div>

        {$js_files}
        <script src="{$js}cookiechoices.js"></script>
        <script type="text/javascript">
            var consentBarContent   = "{trans s='str_header_cookie_consent_content'}"
            ,   consentBarAccept    = "{trans s='str_header_cookie_consent_accept'}"
            ,   consentBarMore      = "{trans s='str_header_cookie_consent_more'}";

            document.addEventListener('DOMContentLoaded', function(event) {
                cookieChoices.showCookieConsentBar(consentBarContent, consentBarAccept, consentBarMore, '/terms');
            });
        </script>

    </body><!--Close Body-->
</html>
