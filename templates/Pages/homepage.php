<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 * @var \App\Model\Entity\Item[] $items
 * @var \App\Model\Entity\Inquiry $inquiry
 */

$SamTwitter = 'https://www.twitter.com/';
$SamFacebook = 'https://www.facebook.com/';
$SamLinkedIn = 'https://www.linkedin.com/';

$modalItems = $item;

?>

<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Welcome to Shining Glass</div>
        <div class="masthead-heading text-uppercase">We Sell Glass Artworks</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#portfolio">Discover Beauty</a>
    </div>
</header>

<!-- Portfolio Grid-->
<section class="page-section" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Our Artworks</h2>
            <h3 class="section-subheading text-muted" style="margin-bottom: 1rem;">To submit a purchase inquiry and view more details, please visit our gallery page.</h3>
            <a class="btn btn-primary btn-l text-uppercase" href="<?= $this->Url->build(['controller' => 'items', 'action' => 'gallery',])?>">View Full Gallery</a>
            <br/><br/>
        </div>
        <div class="row">
            <?php
            foreach ($item->all() as $item) {
                ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?= $item->id ?>">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="productimages/thumbnails/GlassArt<?= $item->id ?>.jpg"/>
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?= h($item->name) ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Team-->
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2>Meet the artist behind Shining Glass...</h2>
            <br/>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    <img width="300" height="300" class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                    <h4>Sam Smith</h4>
                    <br/>
                    <a class="btn btn-dark btn-social mx-2" href="<?= $SamTwitter?>" aria-label="Sam Smith Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="<?= $SamFacebook?>" aria-label="Sam Smith Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="<?= $SamLinkedIn?>" aria-label="Sam Smith LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <br/>
                <div class="mx-auto large text-muted">
                        Sam Smith is a talented artist who has been working with glass for over 10 years. He founded Shining Glass at the age of 20, and has been
                        building his portfolio of bespoke art pieces ever since. To Sam, glass artwork is more than just a profession. It's his passion, and he
                        wants to share this passion with the world.<br/><br/>Sam can be contacted via Twitter, Facebook and LinkedIn with the links provided. He is always
                        looking for feedback and loves to hear from fellow artists and art appreciators.
                </div>
            </div>
        </div>
        <div class="row">
        </div>
    </div>
</section>
<!-- About-->
<section class="page-section" id="about">
    <div class="container">
        <h2 class="section-heading text-uppercase text-center pb-4">Our Story</h2>
        <ul class="timeline">
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2011-2014</h4>
                        <h4 class="subheading">Sam's Humble Beginnings</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">
                            Sam Smith started small. In 2011, Sam decided to pursue his passion and devote himself to glass artwork full-time.
                        </p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>March 2014</h4>
                        <h4 class="subheading">Shining Glass is Born</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">
                            March of 2014 marks the start of Shining Glass. The business started small, and gradually grew to meet increasing customer demand.
                        </p></div>
            </li>
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>December 2019</h4>
                        <h4 class="subheading">Melbourne Storefront Opens</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">
                            With the opening of the Melbourne storefront, Shining Glass entered the next stage in its journey.
                        </p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>May 2022</h4>
                        <h4 class="subheading">New Website Launches</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">
                            The new Shining Glass website represents the next big step for our business, serving new customers and introducing the wider world to Sam Smith's beautiful glass artwork.
                        </p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <h4>
                        Be Part
                        <br />
                        Of Our
                        <br />
                        Story!
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- Contact-->
<section class="page-section bg-light" id="contact">
    <div class="container">
        <div class="pb-5">
            <h1 class="section-heading text-uppercase text-center pb-5">Contact Us</h1>
            <div class="row">
                <div class="col-lg-1 mx-auto large text-muted"></div>
                <div class="col-lg-3 mx-auto large text-muted">
                    <h3>Contact Details</h3>
                    <div class="pb-2">Phone: 0451119078</div>
                    <div class="pb-2">Email: sales@shiningglass.com</div><br/>
                </div>
                <div class="col-lg-4 mx-auto large text-muted">
                    <h3>Operating Hours</h3>
                    <div>Our hotline provides customer assistance from 9:00 to 21:00 Monday to Friday (AEST)
                        and from 9:30 to 18:30 Saturday to Sunday (except national holidays).
                    </div>
                </div>
                <div class="col-lg-3 mx-auto large text-muted">
                    <h3>Address</h3>
                    Shining Glass Pty Ltd<br/>
                    Level 16, 201 Elizabeth Street<br/>
                    Melbourne<br/>
                    Victoria 3001
                </div>
            </div>
        </div>
        <br/>
        <div id="inquiry">
            <h3>Send an Inquiry</h3>
            <div class="mx-auto"><p class="large text-muted">For any inquiries about sales, support, or the website, please fill out the form below.</p></div>
            <form id="contactForm" method="post" accept-charset="utf-8" action="<?= $this->Url->build(['controller' => 'inquiries', 'action' => 'add',])?>">
                <fieldset>
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" required="required" name="full_name" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" maxlength="50">
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" required="required" name="email" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" maxlength="100">
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" required="required" name="phone_number" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required"  maxlength="12">
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" required="required" name="message" id="message" placeholder="Your Message *" data-sb-validations="required" maxlength="900"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                    </div>
                </div>
                </fieldset>
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" type="submit">Send Inquiry</button></div>
            </form>
            <br/>
            <?php if ($this->request->getQuery('result') == 'success'){
                ?>
                <div class="text-center text-white mb-3">
                    <div style="color:black">Inquiry submission successful!</div>
                </div>
            <?php } else if ($this->request->getQuery('result') == 'failure'){
                ?>
                <div class="text-center text-white mb-3">
                    <div style="color:black">Inquiry submission failed. Please make sure your details are correct.</div>
                    <div class="clearfix"></div>
                </div>
            <?php } ?>


        </div>
    </div>
</section>
<!-- Portfolio Modals-->
<?php foreach ($modalItems as $item) {
    ?>
    <div class="portfolio-modal modal fade" id="portfolioModal<?= $item->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Item details-->
                                <h2 class="text-uppercase"><?= $item->name ?></h2>
                                <img class="img-fluid d-block mx-auto" src="productimages/thumbnails/GlassArt<?= $item->id ?>.jpg" alt="..." />
                                <p><?= $item->description ?></p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Price:</strong>
                                        <?= $item->price ?>
                                    </li>
                                    <li>
                                        <strong>Date Created:</strong>
                                        <?= $item->date_of_creation ?>
                                    </li>
                                </ul>
                                <!--<button href="../Transactions/invoice" type="button">
                                    Request Invoice
                                </button>-->
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Return to Homepage
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} ?>

</body>
</html>
