<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'evyr2014'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/assets/img/glyphs/';

	$options = array();

	$options[] = array(
		'name' => __('Very Basic Settings', 'evyr2014'),
		'type' => 'heading');
		$options[] = array(
			'name' => __('Notice', 'evyr2014'),
			'desc' => __("As theme development continues, more options will become available in future versions...Plus we'll make this a bit more attractive. Have suggestions? Send em to us at support@endlyss.us ", 'evyr2014'),
			'type' => 'info');
		$options[] = array(
			'name' => __('Show the main slider?', 'options_framework_theme'),
			'desc' => __('Show the large slider on the home page?', 'options_framework_theme'),
			'id' => 'evyr_main_cata_hide',
			'std'=> 0,
			'type' => 'checkbox');
		$options[] = array(
			'name' => __('Category ID for Main Featured Slider', 'evyr2014'),
			'desc' => __('(Posts -> Categories -> Click on the Category of choice -> Look in the URL after "tag_ID=" towards the end.)', 'evyr2014'),
			'id' => 'evyr_maincata',
			'std' => '##',
			'class' => 'mini',
			'type' => 'text');

		$options[] = array(
			'name' => __('Show the sub-featured posts?', 'options_framework_theme'),
			'desc' => __('Show the two horizontal posts below the main slider?', 'options_framework_theme'),
			'id' => 'evyr_secondary_cata_hide',
			'std'=> 0,
			'type' => 'checkbox');
		$options[] = array(
			'name' => __('Category ID for Secondary Featured set of posts', 'evyr2014'),
			'desc' => __('(Posts -> Categories -> Click on the Category of choice -> Look in the URL after "tag_ID=" towards the end.)', 'evyr2014'),
			'id' => 'evyr_secondarycata',
			'std' => '##',
			'class' => 'mini',
			'type' => 'text');

		$options[] = array(
			'name' => __('Title above main post feed', 'evyr2014'),
			'desc' => __('', 'evyr2014'),
			'id' => 'evyr_mainfeedtitle',
			'std' => 'Most Recent Stories',
			'type' => 'text');
		$options[] = array(
			'name' => __('Primary Color', 'evyr2014'),
			'desc' => __('', 'evyr2014'),
			'id' => 'evyr_primary_color_picker',
			'std' => '#000000',
			'type' => 'color' );
		$options[] = array(
			'name' => __('Favicon', 'evyr2014'),
			'desc' => __('', 'evyr2014'),
			'id' => 'evyr_favicon_uploader',
			'type' => 'upload');

		$options[] = array(
			'name' => __('Display Post Author Info', 'evyr2014'),
			'desc' => __('At the bottom of each singular post there is a blurb about the author.', 'evyr2014'),
			'id' => 'authorinfo_checkbox',
			'std' => '1',
			'type' => 'checkbox');
		$options[] = array(
			'name' => __('Meta Under Post Title', 'evyr2014'),
			'desc' => __("Author/Category/Tag", 'evyr2014'),
			'id' => 'evyr_meta_checkbox',
			'std' => '1',
			'type' => 'checkbox');
		$options[] = array(
			'name' => __('Side Load-in Fade Effects', 'evyr2014'),
			'desc' => __("In case it is causing problems or you simply don't like it", 'evyr2014'),
			'id' => 'evyr_loadin_effects_checkbox',
			'std' => '1',
			'type' => 'checkbox');

		
	$options[] = array(
		'name' => __('Footer', 'evyr2014'),
		'type' => 'heading'
		);

		$options[] = array(
			'name' => "Number of Upper Footer Columns",
			'id' => "evyr_footer_cols",
			'std' => "evyr_4col",
			'type' => "images",
			'options' => array(
				'evyr_1col' => $imagepath . 'one-column-radio.png',
				'evyr_2col' => $imagepath . 'two-column-radio.png',
				'evyr_4col' => $imagepath . 'four-column-radio.png',
				'evyr_turnoff' => $imagepath . 'turn-off-radio.png',
				)
		);
		$options[] = array(
			'name' => __('Google Analytics Script', 'evyr2014'),
			'desc' => __('Your Unique Script for analytics tracking through google. (Optional)', 'evyr2014'),
			'id' => 'evyr_footer_google_ana',
			'std' => '',
			'type' => 'textarea');

	return $options;
}