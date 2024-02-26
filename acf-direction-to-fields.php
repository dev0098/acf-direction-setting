
add_action('acf/render_field_settings', 'kanishop_direction_field_settings');
if ( ! function_exists('kanishop_direction_field_settings')) {
	function kanishop_direction_field_settings($field) {
		acf_render_field_setting($field, array(
			'label' => __('Direction') ,
			'instructions' => '',
			'name' => 'direction',
			'type' => 'radio',
			'choices' => array(
				'both' => __('both', 'acf') ,
				'rtl' => __('rtl', 'acf') ,
				'ltr' => __('ltr', 'acf')
			) ,
			'ui' => 1
		) , true);
	}
}


add_action('admin_init', 'kanishop_check_field_direction');
if ( ! function_exists('kanishop_check_field_direction')) {
	function kanishop_check_field_direction()
	{
		add_filter('acf/prepare_field', 'kani_direction_checker_prepare_field');
		if ( ! function_exists('kani_direction_checker_prepare_field')) {
			function kani_direction_checker_prepare_field($field) {

				if ( is_rtl() ) {
					if ( !empty($field['direction']) ) {
						if ( $field['direction'] == 'rtl' || $field['direction'] == 'both' ) {
							return $field;
						} else {
							return '';
						}
					} else {
						return $field;
					}
				} else {
					if ( !empty($field['direction']) ) {
						if ( $field['direction'] == 'ltr' || $field['direction'] == 'both' ) {
							return $field;
						} else {
							return '';
						}
					} else {
						return $field;
					}
				}
	
			}
		}
	}
}
