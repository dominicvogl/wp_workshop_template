<div class="module module-footer">

   <div class="row">

      <div class="column small-12 medium-6">
         <p>&copy; 2015 Design & Umsetzung: <a href="http://www.cat-ia.de" target="_blank">Dominic Vogl</a></p>

         <ul class="socials">
            <li>
               <a href="https://www.facebook.com/dominic.vogl/">
                  <span class="fa fa-facebook-square"></span>
               </a>
            </li>
            <li>
               <a href="https://www.twitter.com/arynsworld">
                  <span class="fa fa-twitter-square"></span>
               </a>
            </li>
            <li>
               <a href="https://instagram.com/vogl_photography/">
                  <span class="fa fa-instagram"></span>
               </a>
            </li>
            <li>
               <a href="https://github.com/dvcccc/">
                  <span class="fa fa-github-square"></span>
               </a>
            </li>
         </ul>

      </div>

      <div class="column small-12 medium-6">

         <?php
         // Funktion um ein Wordpress Menü auszugeben
         wp_nav_menu(
            array(
               'container' => '',
               'menu_class' => 'footer-menu',
               'link_before' => '<span class="button">',
               'link_after' => '</span>'
            )
         );
         ?>

      </div> <!-- column small-12 -->

   </div> <!-- row -->

</div> <!-- module module-footer -->

<?php

wp_footer();