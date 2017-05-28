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
                $index1 = 0;
                $args = array('post_type' => 'sliders', 'posts_per_page' => 10 );
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
                            <img src="<?php echo plugins_url('/images/default-slider.gif', __FILE__); ?>" alt="image1" style="width:100%;">
                            <div class="carousel-caption">
                                <?php the_title(); ?>
                                <br/>
                                <?php the_content(); ?>
                            </div>
                        </div>
                      <?php $index2++; ?>
                  <?php endwhile; ?>
                  <?php else : ?>
                      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                  <?php endif; ?>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>


<hr style="width: 100%;"/>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel" data-slide-to="0" class="active"></li>
          <li data-target="#carousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="<?php echo plugins_url('/images/default-slider.gif', __FILE__); ?>" alt="image1" style="width:100%;">
            <div class="carousel-caption">
              slider 1
            </div>
          </div>
          <div class="item">
            <img src="<?php echo plugins_url('/images/default-slider.gif', __FILE__); ?>" alt="image2" style="width:100%;">
            <div class="carousel-caption">
              slider 2
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>
