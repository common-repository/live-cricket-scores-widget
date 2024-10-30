<?php

/*-----------------------------------------------------------------------------------*/
/*  Widget class
/*-----------------------------------------------------------------------------------*/
class scoreboard_widget extends WP_Widget {


	/*-----------------------------------------------------------------------------------*/
	/*	Widget Setup
	/*-----------------------------------------------------------------------------------*/
	function Scoreboard_Widget() {
	
		/* Widget settings --------------------------------------------------------------*/
		$widget_ops = array(
			'classname' => 'scoreboard_widget',
			'description' => __('A widget that displays live cricket scores on your website.', 'scoreboard')
		);
	
		/* Widget control settings ------------------------------------------------------*/
		$control_ops = array(
			'width' => 300,
			'height' => 250,
			'id_base' => 'scoreboard_widget'
		);
	
		/* Create the widget ------------------------------------------------------------*/
		$this->WP_Widget( 'scoreboard_widget', __('Scoreboard Widget', 'scoreboard'), $widget_ops, $control_ops );
		
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Display Widget
	/*-----------------------------------------------------------------------------------*/
	function widget( $args, $instance ) {
		extract( $args );
	
		/* Our variables from the widget settings ---------------------------------------*/
		$title = apply_filters('widget_title', $instance['title'] );
		$width = $instance['iframe_width'];
		$height = $instance['iframe_height'];
	
		/* Display widget ---------------------------------------------------------------*/
		echo $before_widget;
	
		if ( $title ) { echo $before_title . $title . $after_title; }
	
		echo '<div class="scoreboard_iframe">';
		echo '<iframe src="http://embed.cricscores1.com/live.php" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" width="'. ($width != "" ? $width : '100%') .'" height="'. ($height != "" ? $height : '250') .'"></iframe>';
		echo 'Powered by: <a href="http://www.cricscores.net" target="_new">CricScores</a>';
		echo '</div>';
		
		echo $after_widget;
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Update Widget
	/*-----------------------------------------------------------------------------------*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
	
		/* Strip tags to remove HTML (important for text inputs) ------------------------*/
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		$instance['width'] = $new_instance['width'];
		$instance['height'] = $new_instance['height'];
	
		return $instance;
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Widget Settings (Displays the widget settings controls on the widget panel)
	/*-----------------------------------------------------------------------------------*/
	function form( $instance ) {
	
		/* Set up some default widget settings ------------------------------------------*/
		$defaults = array(
			'title' => 'Live Cricket Score',
			'width' => '100%',
			'height' => '200',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		/* Build our form ---------------------------------------------------------------*/
		?>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'scoreboard') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Iframe Width (For making widget responsive, add percentage sign like this: 100%):', 'scoreboard') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>"value="<?php echo $instance['width']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Iframe Height:', 'scoreboard') ?></label>
			<input class="widefat" type="number" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" />
		</p>
			
		<?php
	}
}
?>