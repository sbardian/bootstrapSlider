<?php
/**
 * Created by PhpStorm.
 * User: sbardian
 * Date: 5/27/17
 * Time: 7:27 PM
 * 
 * Slider template
 * 
 */
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <!-- Indicators -->
                <?php
                $options = get_option('bsSlider-Settings');
                $index1 = 0;
                $args = array('post_type' => 'sliders', 'posts_per_page' => 10, 'order' => 'ASC', 'orderby'=>'menu_order' );
                $the_query = new WP_Query($args);
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <li data-target="#carousel" data-slide-to="<?php echo $index1; ?>" class="<?php echo ($index === 0) ? 'active' : '' ?>"></li>
                       <?php $index1++; ?>
                    <?php endwhile; ?>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php $index2 = 0; ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="item <?php echo ($index2 === 0) ? ' active' : '' ?>">
                            <?php
                                $thumb_id = get_post_thumbnail_id();
                                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
                                $thumb_url = $thumb_url_array[0];
                            ?>
                            <img src="<?php echo $thumb_url ?>" alt="image1" style="width:100%;">
                            <div class="carousel-caption">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_content(); ?></p>
                            </div>
                        </div>
                      <?php $index2++; ?>
                  <?php endwhile; ?>
                  <?php else : ?>
                      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                  <?php endif; ?>
                </div>
                <!-- Controls -->
                <?php
                    if ($options['arrows-radio']) { ?>
                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
