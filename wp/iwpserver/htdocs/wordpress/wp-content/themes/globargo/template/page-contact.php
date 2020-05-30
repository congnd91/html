<?php
/*
* Template Name: Page Contact
*
*
*
* @package greeky
*/

get_header(); ?>

  <section class="contact">
    <div class="container">
      <div class="contact-inner">

        <div class="row">

          <div class="col-lg-4 col-md-12">
            <div class="contact-left">
              <!-- <div class="box">
                  <h3>Florence Devleeschauwer </h3>
                  <p>Chairwoman and Board Member</p>
                  <p><a href="#">devleeschauwer@belsipa.be</a></p>
                </div>
                -->


              <?php if(is_active_sidebar('belsipa_contact_left'))
        {
            dynamic_sidebar("belsipa_contact_left"); 
        }
        ?>


            </div>
          </div>
          <div class="col-lg-8 col-md-12">
            <div class="contact-right">


              <?php if(is_active_sidebar('belsipa_contact_right'))
        {
            dynamic_sidebar("belsipa_contact_right"); 
        }
        ?>
              <!-- <h2>Get In Touch
              </h2>
              <p>We take great pride in everything that we do, complete control over products allows us to ensure our customers receive the best quality service.

              </p>
              <p>Please fill in the form below or send an email to <a href="#">info@belsipa.be</a>

              </p>

              <div class="contact-form">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="c-field">
                      <input type="text" placeholder="Name" class="input">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="c-field">
                      <input type="text" placeholder="Email" class="input">
                    </div>
                  </div>
                </div>

                <div class="c-field">
                  <input type="text" placeholder="Subject" class="input">
                </div>
                <div class="c-field">
                  <textarea placeholder="Content" class="textarea">
                    </textarea>
                </div>
                <div class="c-field">
                  <input type="submit" value="submit" class="button">
                </div>
              </div>-->

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


  <?php
get_footer(); ?>
