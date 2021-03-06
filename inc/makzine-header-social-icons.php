<?php 
	/* 
	** @package makzine
	** Featured Post Widget
	*/

class Makzine_Header_Social_Widget extends WP_Widget {
	
	function __construct() {
		
		$options = array(
			'classname' => 'makzine-header-social-widget',
			'description' => 'Makzine Header Social Widget',
		);

		parent::__construct('makzine_header_social_widget', 'Makzine Header Social Icons', $options);

	}

	// back end
	public function form($instance) {
		

		$facebook = ( !empty( $instance[ 'facebook' ] ) ? $instance[ 'facebook' ] : '' );

		$twitter = ( !empty( $instance[ 'twitter' ] ) ? $instance[ 'twitter' ] : '' );

		$instagram = ( !empty( $instance[ 'instagram' ] ) ? $instance[ 'instagram' ] : '' );

		$pinterest = ( !empty( $instance[ 'pinterest' ] ) ? $instance[ 'pinterest' ] : '' );

		$googleplus = ( !empty( $instance[ 'googleplus' ] ) ? $instance[ 'googleplus' ] : '' );

		$youtube = ( !empty( $instance[ 'youtube' ] ) ? $instance[ 'youtube' ] : '' );




		?>

        <p><b>Enter Your Social Profile Usernames</b></p>
          <p style="margin-top: -10px; font-size: 12px;"> Leave field blank to disable certain social icons </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:', 'makzine' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo $facebook; ?>" />
        </p>

         <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:', 'makzine' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo $twitter; ?>" />
          <em style="font-size: 10px;">No need to include <b>@</b> for twitter.</em>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram:', 'makzine' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo $instagram; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest:', 'makzine' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo $pinterest; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e( 'Google Plus:', 'makzine' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" type="text" value="<?php echo $googleplus; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube:', 'makzine' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo $youtube; ?>" />
        </p>

		<?php

	}

	//update widget
    public function update( $new_instance, $old_instance ) {
        
        $instance = array();

        $instance[ 'facebook' ] = ( !empty( $new_instance[ 'facebook' ] ) ? strip_tags( $new_instance[ 'facebook' ] ) : '' );
        $instance[ 'twitter' ] = ( !empty( $new_instance[ 'twitter' ] ) ? strip_tags( $new_instance[ 'twitter' ] ) : '' ); 
        $instance[ 'instagram' ] = ( !empty( $new_instance[ 'instagram' ] ) ? strip_tags( $new_instance[ 'instagram' ] ) : '' ); 
        $instance[ 'pinterest' ] = ( !empty( $new_instance[ 'pinterest' ] ) ? strip_tags( $new_instance[ 'pinterest' ] ) : '' );   
        $instance[ 'googleplus' ] = ( !empty( $new_instance[ 'googleplus' ] ) ? strip_tags( $new_instance[ 'googleplus' ] ) : '' );
        $instance[ 'youtube' ] = ( !empty( $new_instance[ 'youtube' ] ) ? strip_tags( $new_instance[ 'youtube' ] ) : '' ); 

        return $instance;
    }

	//front end
	public function widget($args, $instance) {

		echo $args['before_widget']; 

            ?>

			
							
				<ul class="header-socials">

			<?php

            if( !empty( $instance[ 'facebook' ] ) ):
                    
            ?>

            <li class="header-socials-item">
				
				<a href="https://www.facebook.com/<?php echo $instance[ 'facebook' ]; ?> " target="_blank">
					
					<i class="fa fa-facebook" aria-hidden="true"></i>
				
				</a>
			
			</li>

			<?php

			endif;

			?>

			<?php

            if( !empty( $instance[ 'twitter' ] ) ):
                    
            ?>

            <li class="header-socials-item">
				
				<a href="https://www.twitter.com/<?php echo $instance[ 'twitter' ]; ?> " target="_blank">
					
					<i class="fa fa-twitter" aria-hidden="true"></i>
				
				</a>
			
			</li>

			<?php

			endif;

			?>

			<?php

            if( !empty( $instance[ 'instagram' ] ) ):
                    
            ?>

            <li class="header-socials-item">
				
				<a href="https://www.instagram.com/<?php echo $instance[ 'instagram' ]; ?> " target="_blank">
					
					<i class="fa fa-instagram" aria-hidden="true"></i>
				
				</a>
			
			</li>

			<?php

			endif;

			?>

			<?php

            if( !empty( $instance[ 'pinterest' ] ) ):
                    
            ?>

            <li class="header-socials-item">
				
				<a href="https://www.pinterest.com/<?php echo $instance[ 'pinterest' ]; ?> " target="_blank">
					
					<i class="fa fa-pinterest" aria-hidden="true"></i>
				
				</a>
			
			</li>

			<?php

			endif;

			?>

			<?php

            if( !empty( $instance[ 'googleplus' ] ) ):
                    
            ?>

            <li class="header-socials-item">
				
				<a href="https://plus.google.com/<?php echo $instance[ 'googleplus' ]; ?> " target="_blank">
					
					<i class="fa fa-google-plus" aria-hidden="true"></i>
				
				</a>
			
			</li>

			<?php

			endif;

			?>

			<?php

            if( !empty( $instance[ 'youtube' ] ) ):
                    
            ?>

            <li class="header-socials-item">
				
				<a href="https://www.youtube.com/<?php echo $instance[ 'youtube' ]; ?> " target="_blank">
					
					<i class="fa fa-youtube" aria-hidden="true"></i>
				
				</a>
			
			</li>

			<?php

			endif;

			?>

            	</ul>

        

		<?php

		 echo $args[ 'after_widget' ];


	}

}

add_action('widgets_init', function() {
	register_widget('Makzine_Header_Social_Widget');
} );

