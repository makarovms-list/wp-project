<footer style="margin-top: 0px;">
  <div class="f-contacts-line">
    <div class="content-area">
      <div class='f-contacts-data-wrapper'>
        <div class="f-c-title">Connect with us</div>
        <div class="fc-data">
          <a class="fc-phone" href="tel:4123060640"><svg class="i-svg icon-phone"><use xlink:href="#icon-phone"></use></svg><span>412 306 0640</span></a>
          <a href="mailto:info@petrosoftinc.com?subject=Subject"><svg class="i-svg icon-mail-2"><use xlink:href="#icon-mail-2"></use></svg><span>Contact via Email</span></a>
          <a href="/contact-us#map-block"><svg class="i-svg icon-direction"><use xlink:href="#icon-direction"></use></svg><span>Get Directions</span></a>
        </div>
        <div class="f-social-networks">
          <div class="f-s-links">
            <a target="_blank" href="http://www.linkedin.com/company/petrosoft-llc"><svg class="i-svg icon-linkedin"><use xlink:href="#icon-linkedin"></use></svg></a>
            <a target="_blank" href="http://www.facebook.com/PetrosoftLLC"><svg class="i-svg icon-facebook"><use xlink:href="#icon-facebook"></use></svg></a>
            <a target="_blank" href="https://twitter.com/petrosoft_inc"><svg class="i-svg icon-twitter"><use xlink:href="#icon-twitter"></use></svg></a>
            <a target="_blank" href="http://www.youtube.com/petrosoftus"><svg class="i-svg icon-youtube"><use xlink:href="#icon-youtube"></use></svg></a>
            <a target="_blank" href="https://www.instagram.com/petrosoftinc/"><svg class="i-svg icon-instagram"><use xlink:href="#icon-instagram"></use></svg></a>
          </div>
        </div> 
      </div>
      <div class='f-subscribe-contacts-form'>
        <div class="s-f-text-wrapper">
          <div class="s-f-title">Subscribe to our Newsletter</div>
          <div class="s-f-subtitle">Stay up-to-date with what's going on with Petrosoft</div>
        </div>
        <div class="s-f-form">
          <?php print do_shortcode('[cf7form cf7key="footer-subscribe"]');?>
        </div>
      </div>
    </div>
  </div>  
  <div class="f-menu-line">
    <div class="content-area">
      <?php $footer_menu = wp_get_nav_sorted_menu_items(2); ?>
      <div class="f-menu">
          <?php foreach ($footer_menu as $menu): ?>
            <ul class="f-menu-block">
              <li class="f-m-submenu <?php print in_array('opened', $menu->classes) ? 'opened' : '' ?>">
                <div class="f-m-main-link <?php print in_array('active', $menu->classes) ? 'active' : '' ?>"><a href="<?php print $menu->url ?>"><?php print $menu->title ?></a><div class="f-m-open-menu"><svg class="i-svg icon-arrow-3"><use xlink:href="#icon-arrow-3"></use></svg></div></div>
                <ul class="f-m-children">
                  <?php foreach ($menu->children as $link): ?>
                     <li class="f-m-link <?php print in_array('active', $link->classes) ? 'active' : '' ?>"><a href="<?php print $link->url ?>"><?php print $link->title ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </li>
            </ul>
          <?php endforeach;  ?>
          <ul class="f-menu-block">
            <li class="f-m-submenu">
            <div class="f-m-main-link right-panel"><a href="#">Log In</a><div class="f-m-open-menu"><svg class="i-svg icon-arrow-3"><use xlink:href="#icon-arrow-3"></use></svg></div></div>
            <?php $footer_customer_menu = wp_get_nav_sorted_menu_items('customer-menu'); ?>
              <ul class="f-m-children">
                <?php foreach ($footer_customer_menu as $link): ?>
                  <li class="f-m-link"><a target="_blank" href="<?php print $link->url ?>"><?php print $link->title ?></a></li>
                <?php endforeach; ?>
              </ul>
            </li>
          </ul>
      </div>
    </div>
  </div>
  <div class="f-second-menu-line">
    <div class="content-area">
      <?php $footer_second_menu = wp_get_nav_sorted_menu_items('footer-second-menu');?>
      <ul class="f-second-menu">
        <?php foreach ($footer_second_menu as $link): ?>
          <li><a href="<?php print $link->url; ?>" 
              <?php if(isset($link->target) && $link->target != ''): ?>
                target="<?php print $link->target;?>"
              <?php endif; ?>>
              <?php print $link->title;?>
            </a></li>
        <?php endforeach; ?>
      </ul>
      <div class="f-images">
        <div class="iso"></div>
        <div class="soc"></div>
      </div>
    </div>
  </div>
  <div class="f-copyright-line">
    <div class="copyright-wrapper">
      <div class="copyright"><span>Copyright <sup> © </sup> <?=date("Y");?> All Rights Reserved.</span> <span class="all-rights-reserved">Petrosoft LLC, 290 Bilmar Drive, Pittsburgh, PA</span></div>
    </div>
  </div>
</footer>
<?php if (is_active_sidebar('screen-bottom')):?>
  <div class="fixed-screen-bottom">
    <?php dynamic_sidebar('screen-bottom'); ?>
  </div>
<?php endif; ?>
<?php
  get_template_part( 'template-parts/single', 'ie' );
?>
<?php wp_footer(); ?>
  <script>
    if (typeof AOS !== 'undefined') {
      AOS.init({ disable: 'mobile', once: true });
    }
  </script>
</body>
</html>
