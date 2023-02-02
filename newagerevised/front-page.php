<?php
get_header();
///
//..............................variable declaration...................// 
// navbar or header 
$leaftsideheading = !empty(get_theme_mod( 'landing_sec_title' )) ? get_theme_mod( 'landing_sec_title' ): 'Start Bootstrap';
$rightsidefeedback = !empty(get_theme_mod( 'right_side_button' )) ? get_theme_mod( 'right_side_button' ) : 'Send Feedback';
// landing section 
$landingPageTitle = nl2br(!empty(get_theme_mod('main_content_heading')) ? get_theme_mod( 'main_content_heading' ) : 'Showcase your app beautifully.');  // landing page main title/heading
$landingpagediscription = nl2br(!empty(get_theme_mod('main_content')) ? get_theme_mod('main_content') : 'Launch your mobile app landing page faster with this free, open source theme from Start Bootstrap!');
// landing page discription 





$orderleftright = (!empty(get_theme_mod('position_set_newage')) ? get_theme_mod('position_set_newage') : "2");
$videotop = wp_get_attachment_url(get_theme_mod('video_upload'));
// Quote/testimonial Section
$testimonialSection = nl2br(get_theme_mod('second_main_content', '"An intuitive solution to a common problem that we all face, wrapped up in a single app!".'));
$twnlogo = get_theme_mod('tnwlogo');
// App features section
$featurevideo = wp_get_attachment_url(get_theme_mod('video_upload_second'));
// Basic features section
$basicfeatureSecheading = get_theme_mod('third_page_heading', 'Enter a new age of web design');
$basicfeaturecontent = nl2br(get_theme_mod('third_page_content', "This section is perfect for featuring some information about your application, why it was built, the problem it solves, or anything else! There's plenty of space for text here, so don't worry about writing too much."));
// Call to action section
$calltoactionpagequote = get_theme_mod('first_quotes', "Stop waiting.");
$calltoactionbtn = get_theme_mod('download_button', 'Download For Free');
// App badge section
$appbadgeheading = get_theme_mod('download_content', 'Get the app now!');
// footer
$footertitle = get_theme_mod('footer_panel_title', '© Your Website 2022. All Rights Reserved.');
// variable declaration for show/hide checkbox
$landingpage_status = get_theme_mod('front_page_display');
$testimonial_sec_status = get_theme_mod('second_page_display');
$app_feature_sec_status = get_theme_mod('feature_page_display');
$basic_feature_sec_status = get_theme_mod('third_page_display');
$call_to_action_sec_status = get_theme_mod('forth_page_display');
$app_badge_sec_status = get_theme_mod('download_page_display');
$footer_sec_status = get_theme_mod('footer_page_display');



// repeater 


?>


<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
  <div class="container px-5">
    <a class="navbar-brand fw-bold" href="#page-top">
      <?php echo $leaftsideheading; ?> <!-- site title -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
      aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="bi-list"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <div class="navbar-nav ms-auto me-4 my-3 my-lg-0">
        <!--  Creating a menu in the header.  -->
        <?php wp_nav_menu(
          [
            'theme_location' => 'navbar-header',
            'items_wrap' => '
            <ul id="" class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                %3$s
            </ul>'
          ]
        )
          ?>
      </div>
      <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal"
        data-bs-target="#feedbackModal">
        <span class="d-flex align-items-center">
          <i class="bi-chat-text-fill me-2"></i>
          <span id="send_feedback" class="small">
            <?php echo $rightsidefeedback; ?> <!-- send feedback-->
          </span>
        </span>
      </button>
    </div>
  </div>
</nav>
<!-- Mashead header-->

<!--  Checking if the front page is set to display.  -->
<?php
if ($landingpage_status == false):
  ?>

  <header class="masthead">
    <div class="container px-5">
      <div class="row gx-5 align-items-center">
        <div class="col-lg-6 order-3">
          <!-- Mashead text and app badges-->
          <div class="mb-5 mb-lg-0 text-center text-lg-start">
            <h1 id="main_content_heading" class="display-1 lh-1 mb-3 ">
              <?php echo $landingPageTitle; ?>
              <!-- main page display heading  -->
            </h1>
            <p id="main_content" class="lead fw-normal text-muted mb-5">
              <?php echo $landingpagediscription; ?>
              <!-- main page/landing page display content  -->
            </p>
            <div class="d-flex flex-column flex-lg-row align-items-center">

              <?php
              $andriodlogoheader_repeater = get_theme_mod('logo_for_header', json_encode([]));
              /*This returns a json so we have to decode it*/
              $andriodlogo_repeater_decoded = json_decode($andriodlogoheader_repeater);
              foreach ($andriodlogo_repeater_decoded as $repeater_item) {
                ?>
                <a class="me-lg-3 mb-4 mb-lg-0" href="<?php echo $repeater_item->link; ?>" target="_blank">
                  <!--  opens in new tab-->
                  <img class="app-badge" src="<?php echo $repeater_item->image_url; ?>" /><!-- andriod -->
                </a>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
        <!--  Setting the order of the column. -->
        <!--  -->
        <div class="col-lg-6  order-<?php echo $orderleftright ?>">
          <!-- Masthead device mockup feature-->
          <div class="masthead-device-mockup">
            <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                  <stop class="gradient-start-color" offset="0%"></stop>
                  <stop class="gradient-end-color" offset="100%"></stop>
                </linearGradient>
              </defs>
              <circle cx="50" cy="50" r="50"></circle>
            </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
              <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                transform="translate(120.42 -49.88) rotate(45)"></rect>
              <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                transform="translate(-49.88 120.42) rotate(-45)"></rect>
            </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
              <circle cx="50" cy="50" r="50"></circle>
            </svg>
            <div class="device-wrapper">
              <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                <style type="text/css">
                  .device[data-device=iPhoneX][data-orientation=portrait][data-color=black]::after {
                    content: "";
                    background-image: url("<?php echo get_theme_mod('frame_logo'); ?>");
                  }
                </style>


                <div class="screen bg-black">
                  <!-- PUT CONTENTS HERE:-->
                  <!-- * * This can be a video, image, or just about anything else.-->
                  <!-- * * Set the max width of your media to 100% and the height to-->
                  <!-- * * 100% like the demo example below.-->
                  <video muted="muted" autoplay="" loop="" style=" max-width: 100%; height: 100%">
                    <source src="<?php echo $videotop; ?>" />
                    <!-- video inside frame -->
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
<?php endif; ?>

<!-- Quote/testimonial aside-->
<!--  Checking if the second page is enabled or not.  -->
<?php
if ($testimonial_sec_status == false):
  ?>

  <aside class="text-center bg-gradient-primary-to-secondary">
    <div class="container px-5">
      <div class="row gx-5 justify-content-center">
        <div class="col-xl-8">
          <div id="second_main_content" class="h2 fs-1 text-white mb-4">
            <?php echo $testimonialSection; ?>
            <!-- Quote/testimonial Section heading or content -->
          </div>
          <img src="<?php echo $twnlogo; ?>" alt="..." style="height: 3rem" />
          <!-- Quote/testimonial Section image or logo -->
        </div>
      </div>
    </div>
  </aside>
  <?php
endif;
?>


<!-- App features section-->
<!--  Checking if the featurepage_status is false.  -->
<?php
if ($app_feature_sec_status == false):
  ?>

  <section id="features">
    <div class="container px-5">
      <div class="row gx-5 align-items-center">
        <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
          <div class="container-fluid px-5">
            <div class="row gx-5">


              <?php

              $appfeaturee_repeater = get_theme_mod('app_feature_repeater', json_encode(array( /*The content from your default parameter or delete this argument if you don't want a default*/)));
              /*This returns a json so we have to decode it*/
              $appfeaturee_repeater_decoded = json_decode($appfeaturee_repeater);
              foreach ($appfeaturee_repeater_decoded as $repeater_item) {
                ?>

                <div class="col-md-4 mb-5">
                  <!--First Feature item -->
                  <div class="text-center">
                    <img class="app-badge" src="<?php echo $repeater_item->image_url; ?>" />
                    <!-- <i class="bi-phone icon-feature text-gradient d-block mb-3"></i> -->
                    <h3 id="first_feature_heading" class="font-alt">
                      <?php echo $repeater_item->title; ?> <!-- first feature heading -->

                    </h3>
                    <p id="first_features_content" class="text-muted mb-0">
                      <?php echo $repeater_item->text; ?>
                      <!-- first feature content -->
                  </div>
                </div>
                <?php
              }
              ?>



            </div>
          </div>
        </div>

        <div class="col-lg-4 order-lg-0">
          <!-- Features section device mockup-->
          <div class="features-device-mockup">
            <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                  <stop class="gradient-start-color" offset="0%"></stop>
                  <stop class="gradient-end-color" offset="100%"></stop>
                </linearGradient>
              </defs>
              <circle cx="50" cy="50" r="50"></circle>
            </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
              <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                transform="translate(120.42 -49.88) rotate(45)"></rect>
              <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                transform="translate(-49.88 120.42) rotate(-45)"></rect>
            </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
              <circle cx="50" cy="50" r="50"></circle>
            </svg>
            <div class="device-wrapper">
              <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black"
                style='background-image: url("<?php echo get_theme_mod('frame_logo_next'); ?>")'>
                <div class="screen bg-black">
                  <!-- PUT CONTENTS HERE:-->
                  <!-- * * This can be a video, image, or just about anything else.-->
                  <!-- * * Set the max width of your media to 100% and the height to-->
                  <!-- * * 100% like the demo example below.-->
                  <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%">
                    <!-- /* Getting the URL of the video that was uploaded in the customizer. */ -->
                    <source src=" <?php echo $featurevideo; ?>" type="video/mp4" />
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- Basic features section-->
<!--  Checking if the thirdpage_status is false.  -->
<?php
if ($basic_feature_sec_status == false):
  ?>
  <!-- Basic features section through customizer    -->
  <section class="bg-light">
    <div class="container px-5">
      <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
        <div class="col-12 col-lg-5">
          <h2 id="third_page_heading" class="display-4 lh-1 mb-4">
            <?php echo $basicfeatureSecheading ?>
            <!-- Basic features section heading -->
          </h2>
          <p id="third_page_content" class="lead fw-normal text-muted mb-5 mb-lg-0">
            <?php echo $basicfeaturecontent; ?>
            <!-- Basic features section -->
          </p>
        </div>
        <div class="col-sm-8 col-md-6">
          <div class="px-5 px-sm-0">
            <img class="img-fluid rounded-circle" src="<?php echo get_theme_mod('thirdlogo') ?>" alt="..." />
            <!-- round circle logo  -->
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<!-- customizer end  -->
<!-- -->
<!-- Basic features section through repeater  -->
<?php
$customizer_repeater_example = get_theme_mod('customizer_repeater_example', json_encode(array( /*The content from your default parameter or delete this argument if you don't want a default*/)));
/*This returns a json so we have to decode it*/
$customizer_repeater_example_decoded = json_decode($customizer_repeater_example);
foreach ($customizer_repeater_example_decoded as $repeater_item) { ?>

  <section class="bg-light">
    <div class="container px-5">
      <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
        <div class="col-12 col-lg-5">
          <h2 id="third_page_heading" class="display-4 lh-1 mb-4">
            <?php echo $repeater_item->title; ?>
            <!-- Basic features section heading -->
          </h2>
          <p id="third_page_content" class="lead fw-normal text-muted mb-5 mb-lg-0">
            <!-- Basic features section -->
            <?php echo $repeater_item->text; ?>
          </p>
        </div>
        <div class="col-sm-8 col-md-6">
          <div class="px-5 px-sm-0">
            <img class="img-fluid rounded-circle" src="<?php echo get_theme_mod('thirdlogo') ?>" alt="..." />
            <!-- round circle logo  -->
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>



<!-- Call to action section-->
<!--  Checking if the forthpage_status is false.  -->
<?php
if ($call_to_action_sec_status == false):
  ?>
  <section class="cta">
    <div class="cta-content">
      <div class="container px-5">
        <h2 class="text-white display-1 lh-1 mb-4">
          <div id="first_quotes">
            <?php echo $calltoactionpagequote ?> <!-- first line quotes -->
          </div>
          <div id="second_quotes">
            <?php echo get_theme_mod('second_quotes', 'Start building.'); ?> <!-- second line quotes -->
          </div>
        </h2>
        <!--  Creating a button that links to the URL that is set in the customizer.  -->
        <a id="download_button_content" class="btn btn-outline-light py-3 px-4 rounded-pill"
          href="<?php echo get_theme_mod('logo_url'); ?>" target="_blank">
          <?php echo $calltoactionbtn; ?> <!-- content inside download button -->
        </a>
      </div>
    </div>
  </section>
  <?php
endif;
?>

<!-- App badge section-->
<!--  Checking if the download page is set to display or not.  -->

<?php
if ($app_badge_sec_status == false):
  ?>

  <section class="bg-gradient-primary-to-secondary" id="download">
    <div class="container px-5">
      <h2 id="get_the_app" class="text-center text-white font-alt mb-4">
        <?php echo $appbadgeheading; ?>
        <!-- App badge section heading -->
      </h2>

      <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
        <?php

        $andriodlogo_repeater = get_theme_mod('logo_for_footer', json_encode(array( /*The content from your default parameter or delete this argument if you don't want a default*/)));
        /*This returns a json so we have to decode it*/
        $andriodlogo_repeater_decoded = json_decode($andriodlogo_repeater);
        foreach ($andriodlogo_repeater_decoded as $repeater_item) {
          ?>
          <?php echo $repeater_item->text2;
          echo $repeater_item->text5; 
         echo $repeater_item->text;?> 
          <a class="me-lg-3 mb-4 mb-lg-0" href="<?php echo $repeater_item->link; ?>">
            <img class="app-badge selectiverefresh-flogo" src="<?php echo $repeater_item->image_url; ?>" alt="..." /></a>
          <?php
        }
        ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- Footer-->
<!--  Checking if the footerpage_status is false.  -->
<?php
if ($footer_sec_status == false):
  ?>

  <footer class="bg-black text-center py-5">
    <div class="container px-5">
      <div class="text-white-50 small">
        <div id="footer_content" class="mb-2">
          <?php echo $footertitle; ?>
          <!-- footer copyright content -->
        </div>
        <!--  Calling the navbar-footer menu.  -->
        <?php wp_nav_menu(
          [
            'theme_location' => 'navbar-footer',

          ]
        )
          ?>
      </div>
    </div>
  </footer>
  <?php
endif;
?>

<!-- Feedback Modal-->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary-to-secondary p-4">
        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Send feedback</h5>
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-0 p-4">
        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * SB Forms Contact Form * *-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- This form is pre-integrated with SB Forms.-->
        <!-- To make this form functional, sign up at-->
        <!-- https://startbootstrap.com/solution/contact-forms-->
        <!-- to get an API token!-->
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
          <!-- Name input-->
          <div class="form-floating mb-3">
            <input class="form-control" id="name" type="text" placeholder="Enter your name..."
              data-sb-validations="required" />
            <label for="name">Full name</label>
            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
          </div>
          <!-- Email address input-->
          <div class="form-floating mb-3">
            <input class="form-control" id="email" type="email" placeholder="name@example.com"
              data-sb-validations="required,email" />
            <label for="email">Email address</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
          </div>
          <!-- Phone number input-->
          <div class="form-floating mb-3">
            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890"
              data-sb-validations="required" />
            <label for="phone">Phone number</label>
            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
          </div>
          <!-- Message input-->
          <div class="form-floating mb-3">
            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..."
              style="height: 10rem" data-sb-validations="required"></textarea>
            <label for="message">Message</label>
            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
          </div>
          <!-- Submit success message-->
          <!---->
          <!-- This is what your users will see when the form-->
          <!-- has successfully submitted-->
          <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
              <div class="fw-bolder">Form submission successful!</div>
              To activate this form, sign up at
              <br />
              <a
                href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
          </div>
          <!-- Submit error message-->
          <!---->
          <!-- This is what your users will see when there is-->
          <!-- an error submitting the form-->
          <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
          </div>
          <!-- Submit Button-->
          <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" id="submitButton"
              type="submit">Submit</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>