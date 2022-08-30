<footer class="bg-light border-top py-3">
    <div class="container">
        <div class="row">
            <div class="footer-menu">
                <?php
                wp_nav_menu(array(
                    'menu' => 'footer',
                    'theme_location' => 'footer',
                    'link_class' => 'link-secondary text-decoration-none'
                ));
                ?>
            </div>
            <div class="social-icons">
                <ul>
                    <li><a href="#" class="text-decoration-none" aria-label="Facebook" target="_blank" rel="noreferrer" title="حورية على Facebook"><span class="fa-brands fa-facebook"></span></a></li>
                    <li><a href="#" class="text-decoration-none" aria-label="Twitter" target="_blank" rel="noreferrer" title="حورية على twitter"><span class="fa-brands fa-twitter"></span></a></li>
                    <li><a href="#" class="text-decoration-none" aria-label="Instagram" target="_blank" rel="noreferrer" title="حورية على instagram"><span class="fa-brands fa-instagram"></span></a></li>
                    <li><a href="#" class="text-decoration-none" aria-label="Youtube" target="_blank" rel="noreferrer" title="حورية على Youtube"><span class="fa-brands fa-youtube"></span></a></li>
                </ul>
            </div>
            <div class="text-center">
                <p>جميع الحقوق محفوظة ©</p>
            </div>
        </div>
        <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
            <img src="<?php echo esc_url(get_template_directory_uri() . "/assets/img/up.svg"); ?>" alt="اعلى الصفحة" title="اعلى الصفحة">
        </button>
    </div>
</footer>
</body>

</html>
<?php

wp_footer();
