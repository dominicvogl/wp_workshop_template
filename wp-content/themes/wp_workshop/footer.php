<footer class="module module-footer">

   <div class="row">

      <div class="column small-12 medium-6">
         <p>&copy; 2015 Design & Umsetzung: <a href="http://www.cat-ia.de" target="_blank">Dominic Vogl</a></p>

         <ul class="socials">

            <li>
               <a href="https://www.facebook.com/dominic.vogl/" target="_blank">
                  <span class="fa fa-facebook-square"></span>
               </a>
            </li>

            <li>
               <a href="https://www.twitter.com/arynsworld" target="_blank">
                  <span class="fa fa-twitter-square"></span>
               </a>
            </li>

            <li>
               <a href="https://instagram.com/vogl_photography/" target="_blank">
                  <span class="fa fa-instagram"></span>
               </a>
            </li>

            <li>
               <a href="https://github.com/dvcccc/" target="_blank">
                  <span class="fa fa-github-square"></span>
               </a>
            </li>

            <li>
               <a href="https://wordpress.org/" target="_blank">
                  <span class="fa fa-wordpress"></span>
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

      </div>
      <!-- /.column -->

   </div>
   <!-- row -->

</footer>
<!-- /.module.module-footer -->

<?php
echo TEMPLATE_URI;
?>
<!-- Lade externe Javascript Dateien -->
<script src="<?php echo TEMPLATE_URI ?>/js/lib/less.min.js"></script>
<script src="<?php echo TEMPLATE_URI; ?>/js/lib/jquery.js"></script>
<script src="<?php echo TEMPLATE_URI; ?>/js/lib/slick.js"></script>
<script src="<?php echo TEMPLATE_URI; ?>/js/custom/custom.js"></script>

<?php

wp_footer();