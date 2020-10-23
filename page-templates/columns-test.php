<?php
/**
 * Template Name: Page 3 Columns
 *
 * Template for displaying a page with 3 columns.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}

?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

					<?php
          while ( have_posts() ) : the_post();
            // Check rows exists.
            if( have_rows('content_repeater') ):

                // Loop through rows.
                while( have_rows('content_repeater') ) : the_row();

                    // Load sub field value.
                    $columns = get_sub_field('column_content');
                    $buttons = get_sub_field('btn_content');

                    ?>

                    <section class="columns-container col-sm">
                      <div>

                        <?php echo $columns; ?>
                        <button type="button" class="btn btn-primary"><?php echo $buttons; ?></button>

                      </div>
                    </section>

                <?php

                // End loop.
                endwhile;

            // No value.
            else :
                echo 'No data to Display';
            endif;

          endwhile;
					?>

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
