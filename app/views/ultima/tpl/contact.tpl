    <section class="page-block contacts" id="contacts">
        <div class="container">
            <div class="row page-header">
                <h2>Contacts</h2>
                <span>Subtext for header</span>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="row space-bottom">
                        <div class="col-lg-9 col-md-9">
                            <h3>What we do</h3>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <img class="img-center" src="{$images}contacts/man.png" alt="About Us"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-lg-offset-1">
                    <div class="row space-bottom">
                        <div class="col-lg-8 col-md-8">
                            <h3>Adress</h3>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <img class="img-center" src="{$images}contacts/map.png" alt="Adress"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>4120 Lenox Avenue, New York, NY, 10035 76 Saint Nicholas Avenue</p>
                        </div>
                    </div>
                    <div class="row space-bottom">
                        <div class="col-lg-8 col-md-8">
                            <h3>Contacts</h3>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <img class="img-center" src="{$images}contacts/phone.png" alt="Contacts"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>+48 555 234 54 34<br/>+48 555 234 54 33<br/>info@email.com<br/>support@email.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-lg-offset-1">
                    <div class="row space-bottom">
                        <div class="col-lg-8 col-md-8">
                            <h3>Contact us</h3>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <img class="img-center" src="{$images}contacts/plan.png" alt="Adress"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" class="feedback-form ajax-form" action="{$form}">
                                <div class="form-group">
                                    <label class="sr-only" for="contactName">Name</label>
                                    <input type="text" class="form-control" name="contactName" id="contactName" placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="contactEmail">Email</label>
                                    <input type="text" class="form-control" name="contactEmail" id="contactEmail" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="contactMessage">Message</label>
                                    <textarea class="form-control" name="contactMessage" id="contactMessage" rows="5" placeholder="Message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="contactForm">Submit</button>
                                <!-- Validation Response -->
                                <div class="response-holder"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
