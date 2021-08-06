<div id="contact-us" class="block-28 space-between-blocks border-top border-bottom">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-6 h-100 block-28__content-side">
                <div class="contact-info">
                    <h5 class="contact-info__title mb-3">Get in Touch</h5>
                    <p class="contact-info__paragraph mb-5">
                        Celebrate Life! A whole new world awaits you with Our spectacular water parks, resorts, and recreation magic imaginable, life special moments are even more enjoyable when you celebrate at Lumbini Amusement Park & Resort. Ride the fantasy!
                    </p>
                    <div class="mb-5">
                        <h4 class="contact-info__title-2 mb-3">Contact Details</h4>
                        <p class="d-flex flex-column">
                            <span class="contact-info__item mb-2">
                                <i class="fa fa-phone" style="font-size: 18px;"></i><span class="mx-2">985-7039218</span>
                            </span>
                            <span class="contact-info__item mb-2 ">
                                <i class="fa fa-envelope"></i><span class="mx-2">info@lumbinifunpark.com</span>
                            </span>
                            <span class="contact-info__item mb-2">
                                <i class="fa fa-map-marker" style="font-size: 18px;font-size: 20px;margin-left: 2px;margin-right: 1px;"></i><span class="mx-2">Belhaiya-1 Bhairahawa</span>
                            </span>
                        </p>
                    </div>
                    <div class="mb-5">
                        <h4 class="contact-info__title-2 mb-3">Follow Us On</h4>
                        <p class="d-flex flex-column">
                            <span class="contact-info__item mb-2">
                                <a class="social-icon" style="background-color:#4267B2;" href="https://www.facebook.com/lumbiniapr" role="button"><i class="fa fa-facebook mx-2"></i></a>
                                <a class="social-icon" style="background-color: #dd4b39;" href="https://www.instagram.com/lumbinifunpark/" role="button"><i class="fa fa-instagram mx-2"></i></a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 h-100 block-28__form-side">
                <form id="form" class="contact-form text-center">
                    <div class="contact-form__header mb-5">
                        <h6 class="contact-form__title mb-3">Contact Us</h6>
                        <p class="contact-form__paragraph mb-0 mx-auto">
                            Still looking for Help? Send us a message
                        </p>
                    </div>
                    <input type="text" name="from_name" id="from_name" class="contact-form__input" placeholder="Full Name" required>
                    <input type="email" name="email" id="email" class="contact-form__input" placeholder="Email" required">
                    <input type="number" name="phone_no" id="phone_no" class="contact-form__input" placeholder="Phone Number" required>
                    <textarea name="message" id="message" class="contact-form__input" placeholder="Type your message ..."></textarea>
                    <input type="submit" id="button" value="Send Email" class="btn btn-primary">
                </form>

                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2/dist/email.min.js"></script>

                <script type="text/javascript">
                    emailjs.init('user_Qa9aDFs91NOqyomP7FlsN')

                </script>

                <script type="text/javascript">
                    const btn = document.getElementById('button');

                    document.getElementById('form')
                        .addEventListener('submit', function(event) {
                            event.preventDefault();

                            btn.value = 'Sending...';

                            const serviceID = 'default_service';
                            const templateID = 'template_6w4la0h';

                            emailjs.sendForm(serviceID, templateID, this)
                                .then(() => {
                                    btn.value = 'Send Email';
                                    alert('Email Sent! Thank you we will get back to you soon.');
                                    window.location.href = window.location.href;
                                }, (err) => {
                                    btn.value = 'Send Email';
                                    alert(JSON.stringify(err));
                                });
                        });

                </script>
            </div>
        </div>
    </div>
</div>

<div class="block-32 space-between-blocks">
    <div class="container">
    <div class="col-lg-8 col-xl-7 mx-auto text-center mb-5">
        <h2 class="block__title mb-3">Book Now And Save 20%</h2>
        <p class="block__paragraph mb-0">
        Take advantage of our special promotions and save money.
        </p>
    </div>
    <div class="text-center">
        <a role="button" class="btn btn-primary" href="/buytickets">Buy Now</a>
    </div>
    </div>
</div>
