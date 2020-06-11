<?php
/*
* Template Name: Page Contact
*
*
*
* @package belsip
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
            

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


  <?php
get_footer(); ?>
