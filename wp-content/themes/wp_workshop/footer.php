<div class="module module-footer">

   <div class="row">
      <div class="column small-12">
         <div class="inner-content">
            <?php

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
      </div>
   </div>

</div>

<?php

wp_footer();