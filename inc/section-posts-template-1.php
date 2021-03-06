<?php 
	/* 
	** @package makzine
	** Homepage Category Posts One
	*/

class Makzine_Category_Post_Section_One extends WP_Widget {
	
	function __construct() {
		
		$options = array(
			'classname' => 'makzine-category-post-section-one',
			'description' => 'Makzine homepage category posts type one',
		);

		parent::__construct('makzine_category_post_section_one', 'Makzine Category Posts One', $options);

	}

	// back end
	public function form($instance) {
		
		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );
        $posts_per_page = ( !empty( $instance[ 'posts_per_page' ] ) ? absint($instance[ 'posts_per_page' ] ) : 4  );
        $post_category = ( !empty( $instance[ 'post_category' ] ) ? $instance[ 'post_category' ] : 'Select Category' );

		?>

		<p><span> <strong>Max 4 Posts (Recommended)</strong> </span></p>
		 <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'makzine' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ); ?>"><?php _e( 'Number of posts to show:', 'makzine' ); ?></label>
            <input id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="number" value="<?php echo $posts_per_page; ?>" />

        </p>

		<p>
            <label for="<?php echo $this->get_field_id('post_category'); ?>"><?php _e( 'Category:', 'makzine' )?></label>

            <select id="<?php echo $this->get_field_id('post_category'); ?>" name="<?php echo $this->get_field_name('post_category'); ?>">
                <?php 
                $slider_categories = get_terms('category', array('hide_empty' => false));
                foreach ( $slider_categories as $slider_category ) {
                    $selected = ( $slider_category->term_id == esc_attr( $post_category ) ) ? ' selected = "selected" ' : '';
                    $option = '<option '.$selected .'value="' . $slider_category->term_id;
                    $option = $option .'">';
                    $option = $option .$slider_category->name;
                    $option = $option .'</option>';
                    echo $option;
                }
            
                ?>
            </select>
        </p>

		<?php

	}

	//update widget
    public function update( $new_instance, $old_instance ) {
        
        $instance = array();
        $instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
        $instance[ 'posts_per_page' ] = ( !empty( $new_instance[ 'posts_per_page' ] ) ? absint( strip_tags( $new_instance[ 'posts_per_page' ] ) ): 0 );
        $instance[ 'post_category' ] = ( !empty( $new_instance[ 'post_category' ] ) ? strip_tags( $new_instance[ 'post_category' ] ) : '' );
        
        return $instance;
    }

	//front end
	public function widget($args, $instance) {

		$posts_per_page = absint( $instance[ 'posts_per_page' ] );
		$cat = $instance[ 'post_category' ];

		$cat_url = get_category_link($cat);

		// large thumb

        $cat_post_section_one_lg_args = array (
            'post_type'        => 'post',
            'posts_per_page'   => 1,
	        'cat'              => $cat
        );

		$cat_post_section_one_lg_query = new WP_Query($cat_post_section_one_lg_args);

		echo $args['before_widget']; 

		?>

		
				<div class="category-section-one border-btm">

					<?php
                        if( !empty( $instance[ 'title' ] ) ):

                            echo $args[ 'before_title' ];

                            ?>

                            <span class="full-title"><?php echo apply_filters( 'widget_title', $instance[ 'title' ], $instance, $this->id_base ); ?></span>

                            <span class="view-more">
                            <a href="javascript:void(0)" role="button" class="btn popovers" data-placement="left" data-toggle="popover" title="" data-content="<a href='<?php echo esc_url( $cat_url ); ?>' title='View all post from this category'>View All</a>">

                            	<i class="fa fa-ellipsis-v" aria-hidden="true"></i>

                            </a>

                            </span>
                            

                            <?php

                            echo $args[ 'after_title' ];
                                        
                        endif; 
                    ?>

					<div class="section-widget-content">

						<div class="row">

						<div class="col-sm-6 sc-o-lg-post">

							<?php 

							// large thumb

								if( $cat_post_section_one_lg_query->have_posts() ): 

									while ( $cat_post_section_one_lg_query->have_posts() ): 

										$cat_post_section_one_lg_query->the_post(); 

							?>

						
								<article class="cat-post">

									<?php if( has_post_thumbnail() ):
                          	
                          	 			$url = wp_get_attachment_url( get_post_thumbnail_id($cat_post_section_one_lg_query->ID) ); 
                          	 		?>

                          	 		

									<div class="cat-post-media">

										<figure class="post-thumb">
											<a href="<?php the_permalink(); ?>">
											<img class="img-res style-one-lg-thumb img-zoom" src="<?php echo $url; ?>">
											
											</a>

										</figure>

									</div>

									<?php endif; ?>

									<div class="cat-post-content sc-o-lg">

										<div class="post-content">
											<a href="<?php the_permalink(); ?>">
												<?php the_title( '<h2 class="entry-title sc-o-lg-title">', '</h2>' ); ?>
											</a>

										</div>

										<div class="post-meta">

											<span class="posted-on">

												<i class="fa fa-calendar" aria-hidden="true"></i> 
												<?php echo get_the_date(__('M d, Y', 'makzine')); ?>

											</span>

											<span>| </span>

											<span class="post-comments">

												<i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number('0', '1', '%'); ?>

											</span>

											<span>| </span>

											<span class="post-author">
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
												<i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?>
												</a>
											</span>

										</div>

									</div>

								</article>

								<?php

									endwhile;
									endif;

									wp_reset_postdata();

								?>

						</div>

						<?php 

							$per_page = number_format_i18n($posts_per_page - 1);

							 $cat_post_section_one_sm_args = array (
					            'post_type'        => 'post',
					            'posts_per_page'   => $per_page,
					            'offset'		   => 1,
						        'cat'              => $cat
						    );

							$cat_post_section_one_sm_query = new WP_Query($cat_post_section_one_sm_args);

						?>


						<div class="col-sm-6 sc-o-sm-post">

							<?php 

							// small thumb

								if( $cat_post_section_one_sm_query->have_posts() ): 

									while ( $cat_post_section_one_sm_query->have_posts() ): 

										$cat_post_section_one_sm_query->the_post();

							?>

								<article class="cat-post clearfix">

									<div class="cat-post-media sm-thumb">

										<?php if( has_post_thumbnail() ):
                          	
                          	 				$url = wp_get_attachment_url( get_post_thumbnail_id($cat_post_section_one_sm_query->ID) ); ?>

										<figure class="post-thumb">
											<a href="<?php the_permalink(); ?>">
											<img class="img-res style-one-sm-thumb img-zoom" src="<?php echo $url; ?>">
											
											</a>											
										</figure>

										<?php endif; ?>

									</div>


									<div class="cat-post-content sc-o-sm">

										<div class="post-content">
											<a href="<?php the_permalink(); ?>">
												<h2 class="entry-title sc-o-sm-title">
												<?php the_title( '<h2 class="entry-title sc-o-sm-title">', '</h2>' ); ?>
												</h2>
											</a>

										</div>

										<div class="post-meta">

											<span class="posted-on">

												<i class="fa fa-calendar" aria-hidden="true"></i> 
												<?php echo get_the_date(__('M d, Y', 'makzine')); ?>

											</span>

											<span>| </span>

											<span class="post-comments">

												<i class="fa fa-comments" aria-hidden="true"></i> <?php comments_number('0', '1', '%'); ?>

											</span>

											<span>| </span>

											<span class="post-author">
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
												<i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?>
												</a>
											</span>

										</div>

									</div>

								</article>

								<div class="clearfix"></div>

								<?php

									endwhile;
									endif;

								?>

						</div>

						</div>

					</div>

				</div>

				

		<?php

		 echo $args[ 'after_widget' ];


	}

}

add_action('widgets_init', function() {
	register_widget('Makzine_Category_Post_Section_One');
} );

