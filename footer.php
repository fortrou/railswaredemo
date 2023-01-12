<?php
/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_template_part( 'template-parts/footer', 'main' );
?>

<?php wp_footer(); ?>

</body>
</html>
