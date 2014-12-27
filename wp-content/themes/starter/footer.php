<div class="footer-wrapper">
  <footer class="page-footer  block-group">
    <div class="page-footer__left  page-footer__left--logo  block"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo2.png" height="75" width="75" alt="Form MCR" class="logo"></div>
    <div class="page-footer__left  page-footer__left--nav  block">
      <ul class="nav  block  block-group">
          <li class="block"><a href="#">About</a></li>
          <li class="active  block"><a href="#">Services</a></li>
          <li class="block"><a href="#">Blog</a></li>
          <li class="block"><a href="#">Contact</a></li>
      </ul>
      <!--<?php wp_nav_menu( array('menu' => 'Footer Navigation' )); ?>-->
    </div>
    <div class="page-footer__left  page-footer__left--contact  block">
      <h6>Contact Information</h6>
      <div class="vcard smallprint">
        <address>
          <div class="org">Company Name</div>
          <div class="adr">
            <div class="street-address">Building Name <br> 151 Example St.</div>
            <span class="locality">Locality</span> 
            <span class="postal-code">P18 1AB</span>
          </div>
          <div class="tel">0161 000 000</div>
          <a class="email" href="mailto:info@example.dev">info@example.dev</a>
        </address>
      </div>
    </div>
    <div class="page-footer__right  smallprint  block">
      <div class="social">
        <span class="social-button"><a href="" class="facebook"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/faceyb.png" height="24" width="24" alt="Facebook"></a></span>
        <span class="social-button"><a href="" class="twitter"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitty.png" height="24" width="24" alt="Twitter"></a></span>
        <span class="social-button"><a href="" class="linked-in"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/instaG.png" height="24" width="24" alt="Linked In"></a></span>
      </div>
      <p class="copyright">&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
      <p>Registered in England NO. 01234567</p>
      <p>VAT Registration NO. 012 34 56 78</p>
      <p>Registered Office: Example St, City, P18 1AB</p>
    </div>
  </footer>
</div>

<script src="<?php bloginfo('template_url'); ?>/assets/js/owl.carousel.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>