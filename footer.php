
<!-- site-footer -->
<footer>
    <nav>
        <?php wp_nav_menu(); ?>
    </nav>
    <p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>
</footer>

    <?php
        $args = array(
            'theme_location' => 'footer'
        );
    ?>

    <?php wp_nav_menu($args); ?>
</body>
</html>