<?php include('header-contents.php'); ?>


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
                            <h1 data-aos="fade-up" data-aos-delay="">Get In Touch</h1>
                            <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Solutions, whatever your size or needs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div style="margin-top:-40px;" class="site-section">
        <div class="container">
            <h3>Please share your feedback with us below</h3>
            <strong>Please note this feedback is for Geosoft care and is not visible to the care provider you work with.</strong>
            <div style='margin-top:50px;'></div>
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Kindly select your prefered feedback! <span style="color: red;">*</span></label>
                                <select name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <option value="Null">Select option...</option>
                                    <option value="Viewing care plans">Viewing care plans</option>
                                    <option value="Submitting medications">Submitting medications</option>
                                    <option value="Submitting tasks">Submitting tasks</option>
                                    <option value="Visit check in/out">Visit check in/out</option>
                                    <option value="Viewing my rota">Viewing my rota</option>
                                    <option value="Speed and reliability">Speed and reliability</option>
                                    <option value="New Idea">New Idea</option>
                                    <option value="Recording observations">Recording observations</option>
                                    <option value="Viewing my profile">Viewing my profile</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="name">Drop a note</label>
                                <textarea class="form-control" name="message" cols="30" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="name">Would you be okay for us to contact you? <span style="color: red;">*</span></label>
                                <select name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <option value="Null">Select option...</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Maybe">Maybe</option>
                                    <option value="Not neccessary">Not neccessary</option>
                                    <option value="Neccessary">Neccessary</option>
                                </select>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="submit" class="btn btn-primary d-block w-100" value="Submit feedback">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--Site review panel start here-->
    <?php include('site-review-panel.php'); ?>
    <!--Site review panel end here-->


    <!--Site footer panel start here-->
    <?php include('footer-contents.php'); ?>
    <!--Site footer panel end here-->