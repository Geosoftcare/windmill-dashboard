<!--Site header panel start here-->
<?php include('header-contents.php'); ?>
<!--Site header panel end here-->


<main id="main">
  <div class="hero-section inner-page">
    <div class="wave">

      <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
          </g>
        </g>
      </svg>

    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-md-7 text-center hero-text">
              <h1 data-aos="fade-up" data-aos-delay="">Get in touch</h1>
              <p class="mb-5" data-aos="fade-up" data-aos-delay="100">It's so exciting to know more.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5 align-items-end">
        <div class="col-md-6" data-aos="fade-up">

          <h2>Contact Us</h2>
          <p class="mb-0">Geosoftcare users can contact us via the form below or through our support phone line. <br> By submitting this form, you confirm that you agree to our website terms of use our Privacy Policy and understand how we store cookies on your device.</p>
        </div>

      </div>

      <div class="row">
        <div class="col-md-4 ml-auto order-2" data-aos="fade-up">
          <ul class="list-unstyled">
            <li class="mb-3">
              <strong class="d-block mb-1">Address</strong>
              <span>29, Waterloo Road, Wolverhampton, WV1 4DJ, England, United Kingdom.</span>
            </li>
            <li class="mb-3">
              <strong class="d-block mb-1">Support</strong>
              <span>+1 232 3235 324</span>
            </li>
            <li class="mb-3">
              <strong class="d-block mb-1">General line</strong>
              <span>(0) 190 281 0119</span>
            </li>
            <li class="mb-3">
              <strong class="d-block mb-1">Support</strong>
              <span>support@geosoftcare.co.uk</span>
            </li>
            <li class="mb-3">
              <strong class="d-block mb-1">Sales</strong>
              <span>sales@geosoftcare.co.uk</span>
            </li>
          </ul>
        </div>

        <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">

            <div class="row">
              <div class="col-md-6 form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <label for="name">Email</label>
                <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
              <div class="col-md-12 form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="col-md-12 form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" cols="30" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>

              <div class="col-md-12 form-group">
                <span><input type="checkbox" style="width:20px; height:20px;" value="txtSubscribe" /> &nbsp; Click the checkbox to subscribe to our news channel.</span>
                <div class="validate"></div>
              </div>


              <div class="col-md-12 mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>

              <div class="col-md-6 form-group">
                <input type="submit" class="btn btn-primary d-block w-100" value="Send Message">
              </div>
            </div>

          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1212.026950957359!2d-2.134832411029053!3d52.58671869301969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48709b9b30158e81%3A0xf3ba704a1a4aad78!2sWaterloo%20Rd%2C%20Wolverhampton%20WV1%204DJ!5e0!3m2!1sen!2suk!4v1713281813905!5m2!1sen!2suk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>

  <!--Site review panel start here-->
  <?php include('site-review-panel.php'); ?>
  <!--Site review panel end here-->


  <!--Site footer panel start here-->
  <?php include('footer-contents.php'); ?>
  <!--Site footer panel end here-->