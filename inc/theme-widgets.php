<?php
// Adds widget: Social Icons
class Socialicons_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'socialicons_widget',
			esc_html__( 'Social Icons', 'horya' )
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Facebook',
			'id' => 'facebook_url',
			'type' => 'url',
		),
		array(
			'label' => 'Instagram',
			'id' => 'instagram_url',
			'type' => 'url',
		),
		array(
			'label' => 'Twitter',
			'id' => 'twitter_url',
			'type' => 'url',
		),
		array(
			'label' => 'Snapchat',
			'id' => 'snapchat_url',
			'type' => 'url',
		),
		array(
			'label' => 'TikTok',
			'id' => 'tiktok_url',
			'type' => 'url',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		// Output generated fields
		echo '<p>'.$instance['facebook_url'].'</p>';
		echo '<p>'.$instance['instagram_url'].'</p>';
		echo '<p>'.$instance['twitter_url'].'</p>';
		echo '<p>'.$instance['snapchat_url'].'</p>';
		echo '<p>'.$instance['tiktok_url'].'</p>';
		
		echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'horya' );
			switch ( $widget_field['type'] ) {
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'horya' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_socialicons_widget() {
	register_widget( 'Socialicons_Widget' );
}
add_action( 'widgets_init', 'register_socialicons_widget' );