<?php

// Check If Local Host
if( ! function_exists( 'devon_if_local' ) ) {
	function devon_if_local() {	
		$site_type = get_bloginfo( 'url' ); 
		$name_with_http = substr( $site_type, 0, 16 );
		$name_begining = substr( $site_type, 7, 9 );
		if($name_with_http == 'http://localhost' or $name_begining == 'localhost' ) 
			return true;
		else 
			return false;
	}
}

if( ! function_exists( 'devon_in_array_r' ) ) {
	function devon_in_array_r($needle, $haystack, $strict = false) {
		foreach ($haystack as $item) {
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && devon_in_array_r($needle, $item, $strict))) {
				return true;
			}
		}

		return false;
	}
}

function devon_ordinal($number) {
	
	if(!is_numeric($number)) $number = intval($number); 
	
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}

function devon_validate_phone($phone) {	
    return preg_match('/[0-9\s\+]{10,}/s', $phone);
    return preg_match('/[0-9\s\+]{10}/s', $phone);
	// with two digits for country codes 
	//return preg_match('/\+[0-9]{2}+[0-9]{10}/s', $phone);    
}

function devon_ucwords($string) {	
    return ucwords(str_replace('_', ' ', $string));
}

function devon_validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function devon_get_post_param($param='') {    
	$value = ''; 
	switch($param) {
		case 'post': $value = isset($_POST) ? $_POST : false;  break; 		
		default: if(isset($_POST[$param])) $value = sanitize_text_field($_POST[$param]); 		
	}
	
	return $value; 
}

function devon_is_expired($date, $date_now='') {    
	if(empty($date_now)) {
		$current_time = current_time('U');	
		$date_now = DateTime::createFromFormat('U', $current_time);		
	}	
	$date = DateTime::createFromFormat('Y-m-d H:i:s', $date);			
	return ($date_now>$date); 	
}

function devon_moment_js($date='', $id='') {    
	if(empty($date)) return; 
}

function devon_dater($date, $output='', $input='') {    
	
	$date_format = $date;
	$output = empty($output) ? 'default' : $output; 
	$input = empty($input) ? 'Y-m-d H:i:s' : $input; 
	
	$date_object =  DateTime::createFromFormat($input, $date);		
	
	if(is_a($date_object, 'DateTime')) {
		switch($output) {			
			case 'default': 
				$date_format = '<span title="'.$date_object->format('j M, Y - H:i:s a').'">'.$date_object->format('j M, Y - H:i').'</span>'; 
				break;
			case 'get_the_date': 
				$date_format = '<span title="'.$date_object->format('j M, Y').'">'.$date_object->format('j M, Y').'</span>'; 
				break;
			default: 
				$date_format = $date_object->format($output); 
				break;
		}
	}
	
	return $date_format; 
}

function devon_modify_date($op, $val, $dimension='hours', $time='') {    	
	if(empty($time)) $time = current_time('U');	
	$date_object = DateTime::createFromFormat('U', $time);	
	$date_object->modify($op . $val . ' ' . $dimension);
	//$date_object = $date_object->format('Y-m-d H:i:s'); 
	return $date_object; 
}
 
/**
 * devon_update_meta 
 * @param - all as update meta
 * $operator - for the append operation
 * default - string concatenate operation
 */
function devon_update_meta( $post_id='', $meta_key='', $meta_value='', $operator=',', $prev_value = '' ) {
	
	if( empty($post_id) OR empty($meta_key) OR empty($meta_value) )
		return; 
	
	// get already key value if already existing
	$meta_existing = get_post_meta($post_id, $meta_key, true); 
	
	// append, add if needed
	if( isset($meta_existing) and !empty($meta_existing) ) {
		
		switch($operator) {
			case '+': 
				$meta_value = intval($meta_existing) + intval($meta_value); 
				break; 
			case '-': 
				$meta_value = intval($meta_existing) - intval($meta_value); 
				break; 
			case '*': 
				$meta_value = intval($meta_existing) * intval($meta_value); 
				break; 
			case 'array': 
				$meta_existing = maybe_unserialize($meta_existing);
				if(is_array($meta_existing)) {					
					$meta_existing[] = $meta_value;					
				}
				else $meta_existing = array($meta_value);				
				
				// re-create meta_value as we udpate the value in the end
				$meta_value = $meta_existing; 
				break; 
			default : // string concatenate operation default
				$meta_value = $meta_existing . $operator . $meta_value; 
		}
	}
	elseif($operator=='array') {
		$meta_value = array($meta_value);
	}

	// tjp_ajaxy_die($meta_value); 
		
	return update_post_meta($post_id, $meta_key, $meta_value);	
	
}


function devon_ajaxy_die($array=array(), $type='error') {
	
	if(is_array($array))
		$ajaxy = $array; 
	else 
		$ajaxy = array('reason' => print_r($array,true)); 	
	
	if($type=='error') wp_send_json_error($ajaxy); 
	else wp_send_json_success($ajaxy); 				
	wp_die();
}

function devon_var_dump($data) {
	print_r($data); echo '<hr>'; 
}

/**
 * devon_increment_counter($string)
 * $param: string.
 * return: string
 * Generates next string in counter
 */
function devon_increment_counter($starting_label) {

	$tailing_number_digits =  0;
	$i = 0;
	$from_end = -1;
	while ( $i < strlen($starting_label) ) {
		if ( is_numeric( substr( $starting_label,$from_end - $i, 1 ) ) ) {
			$tailing_number_digits++;
		}
		else {
			// End our while if we don't find a number anymore
			break;
		}
		$i++;
	}
	//return $tailing_number_digits;
	
	if ($tailing_number_digits > 0) {
		$base_portion = substr( $starting_label, 0, -$tailing_number_digits );
		$digits_portion = substr( $starting_label, -$tailing_number_digits );	
	}
	else {
		$base_portion = $starting_label;
		$digits_portion = '';
	}
	
	$formatted_number = sprintf("%05d", intval($digits_portion+1));
	
	$next_label = $base_portion . $formatted_number;
	
	return $next_label; 

}


function devon_cookie_creator($name, $value, $time='') {
	
	$time = !empty($time) ? $time : current_time('Y-m-d H:i:s');
	
	if(is_array($value)) $value = json_encode($value);

	$time = DateTime::createFromFormat('Y-m-d H:i:s', $time);
	$time->modify('+ 30 days');
	
	setcookie($name, $value, $time->format('U'), '/'); 
	if(!isset($_COOKIE[$name])) {
		setcookie($name, $value, $time->format('U'));
	}
	
	return $_COOKIE[$name];
}

function devon_cookie_reader($name) {
	$cookie = array('good'); 
	if(isset($_COOKIE[$name])) {
		$cookie = explode(',', (stripslashes($_COOKIE[$name])));
		if($cookie AND is_array($cookie)) {
		
		}
	}
	return $cookie; 
}


/**
 * Retrieve adjacent post link.
 *
 * Can either be next or previous post link.
 *
 * Based on get_adjacent_post() from wp-includes/link-template.php
 *
 * @param array $r Arguments.
 * @param bool $previous Optional. Whether to retrieve previous post.
 * @return array of post objects.
 */
function get_adjacent_post_plus($r, $previous = true ) {
	global $post, $wpdb;

	extract( $r, EXTR_SKIP );

	if ( empty( $post ) )
		return null;

//	Sanitize $order_by, since we are going to use it in the SQL query. Default to 'post_date'.
	if ( in_array($order_by, array('post_date', 'post_title', 'post_excerpt', 'post_name', 'post_modified')) ) {
		$order_format = '%s';
	} elseif ( in_array($order_by, array('ID', 'post_author', 'post_parent', 'menu_order', 'comment_count')) ) {
		$order_format = '%d';
	} elseif ( $order_by == 'custom' && !empty($meta_key) ) { // Don't allow a custom sort if meta_key is empty.
		$order_format = '%s';
	} elseif ( $order_by == 'numeric' && !empty($meta_key) ) {
		$order_format = '%d';
	} else {
		$order_by = 'post_date';
		$order_format = '%s';
	}
	
//	Sanitize $order_2nd. Only columns containing unique values are allowed here. Default to 'post_date'.
	if ( in_array($order_2nd, array('post_date', 'post_title', 'post_modified')) ) {
		$order_format2 = '%s';
	} elseif ( in_array($order_2nd, array('ID')) ) {
		$order_format2 = '%d';
	} else {
		$order_2nd = 'post_date';
		$order_format2 = '%s';
	}
	
//	Sanitize num_results (non-integer or negative values trigger SQL errors)
	$num_results = intval($num_results) < 2 ? 1 : intval($num_results);

//	Queries involving custom fields require an extra table join
	if ( $order_by == 'custom' || $order_by == 'numeric' ) {
		$current_post = get_post_meta($post->ID, $meta_key, TRUE);
		$order_by = ($order_by === 'numeric') ? 'm.meta_value+0' : 'm.meta_value';
		$meta_join = $wpdb->prepare(" INNER JOIN $wpdb->postmeta AS m ON p.ID = m.post_id AND m.meta_key = %s", $meta_key );
	} elseif ( $in_same_meta ) {
		$current_post = $post->$order_by;
		$order_by = 'p.' . $order_by;
		$meta_join = $wpdb->prepare(" INNER JOIN $wpdb->postmeta AS m ON p.ID = m.post_id AND m.meta_key = %s", $in_same_meta );
	} else {
		$current_post = $post->$order_by;
		$order_by = 'p.' . $order_by;
		$meta_join = '';
	}

//	Get the current post value for the second sort column
	$current_post2 = $post->$order_2nd;
	$order_2nd = 'p.' . $order_2nd;
	
//	Get the list of post types. Default to current post type
	if ( empty($post_type) )
		$post_type = "'$post->post_type'";

//	Put this section in a do-while loop to enable the loop-to-first-post option
	do {
		$join = $meta_join;
		$excluded_categories = $ex_cats;
		$included_categories = $in_cats;
		$excluded_posts = $ex_posts;
		$included_posts = $in_posts;
		$in_same_term_sql = $in_same_author_sql = $in_same_meta_sql = $ex_cats_sql = $in_cats_sql = $ex_posts_sql = $in_posts_sql = '';

//		Get the list of hierarchical taxonomies, including customs (don't assume taxonomy = 'category')
		$taxonomies = array_filter( get_post_taxonomies($post->ID), "is_taxonomy_hierarchical" );

		if ( ($in_same_cat || $in_same_tax || $in_same_format || !empty($excluded_categories) || !empty($included_categories)) && !empty($taxonomies) ) {
			$cat_array = $tax_array = $format_array = array();

			if ( $in_same_cat ) {
				$cat_array = wp_get_object_terms($post->ID, $taxonomies, array('fields' => 'ids'));
			}
			if ( $in_same_tax && !$in_same_cat ) {
				if ( $in_same_tax === true ) {
					if ( $taxonomies != array('category') )
						$taxonomies = array_diff($taxonomies, array('category'));
				} else
					$taxonomies = (array) $in_same_tax;
				$tax_array = wp_get_object_terms($post->ID, $taxonomies, array('fields' => 'ids'));
			}
			if ( $in_same_format ) {
				$taxonomies[] = 'post_format';
				$format_array = wp_get_object_terms($post->ID, 'post_format', array('fields' => 'ids'));
			}

			$join .= " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy IN (\"" . implode('", "', $taxonomies) . "\")";

			$term_array = array_unique( array_merge( $cat_array, $tax_array, $format_array ) );
			if ( !empty($term_array) )
				$in_same_term_sql = "AND tt.term_id IN (" . implode(',', $term_array) . ")";

			if ( !empty($excluded_categories) ) {
//				Support for both (1 and 5 and 15) and (1, 5, 15) delimiter styles
				$delimiter = ( strpos($excluded_categories, ',') !== false ) ? ',' : 'and';
				$excluded_categories = array_map( 'intval', explode($delimiter, $excluded_categories) );
//				Three category exclusion methods are supported: 'strong', 'diff', and 'weak'.
//				Default is 'weak'. See the plugin documentation for more information.
				if ( $ex_cats_method === 'strong' ) {
					$taxonomies = array_filter( get_post_taxonomies($post->ID), "is_taxonomy_hierarchical" );
					if ( function_exists('get_post_format') )
						$taxonomies[] = 'post_format';
					$ex_cats_posts = get_objects_in_term( $excluded_categories, $taxonomies );
					if ( !empty($ex_cats_posts) )
						$ex_cats_sql = "AND p.ID NOT IN (" . implode($ex_cats_posts, ',') . ")";
				} else {
					if ( !empty($term_array) && !in_array($ex_cats_method, array('diff', 'differential')) )
						$excluded_categories = array_diff($excluded_categories, $term_array);
					if ( !empty($excluded_categories) )
						$ex_cats_sql = "AND tt.term_id NOT IN (" . implode($excluded_categories, ',') . ')';
				}
			}

			if ( !empty($included_categories) ) {
				$in_same_term_sql = ''; // in_cats overrides in_same_cat
				$delimiter = ( strpos($included_categories, ',') !== false ) ? ',' : 'and';
				$included_categories = array_map( 'intval', explode($delimiter, $included_categories) );
				$in_cats_sql = "AND tt.term_id IN (" . implode(',', $included_categories) . ")";
			}
		}

//		Optionally restrict next/previous links to same author		
		if ( $in_same_author )
			$in_same_author_sql = $wpdb->prepare("AND p.post_author = %d", $post->post_author );

//		Optionally restrict next/previous links to same meta value
		if ( $in_same_meta && $r['order_by'] != 'custom' && $r['order_by'] != 'numeric' )
			$in_same_meta_sql = $wpdb->prepare("AND m.meta_value = %s", get_post_meta($post->ID, $in_same_meta, TRUE) );

//		Optionally exclude individual post IDs
		if ( !empty($excluded_posts) ) {
			$excluded_posts = array_map( 'intval', explode(',', $excluded_posts) );
			$ex_posts_sql = " AND p.ID NOT IN (" . implode(',', $excluded_posts) . ")";
		}
		
//		Optionally include individual post IDs
		if ( !empty($included_posts) ) {
			$included_posts = array_map( 'intval', explode(',', $included_posts) );
			$in_posts_sql = " AND p.ID IN (" . implode(',', $included_posts) . ")";
		}

		$adjacent = $previous ? 'previous' : 'next';
		$order = $previous ? 'DESC' : 'ASC';
		$op = $previous ? '<' : '>';

//		Optionally get the first/last post. Disable looping and return only one result.
		if ( $end_post ) {
			$order = $previous ? 'ASC' : 'DESC';
			$num_results = 1;
			$loop = false;
			if ( $end_post === 'fixed' ) // display the end post link even when it is the current post
				$op = $previous ? '<=' : '>=';
		}

//		If there is no next/previous post, loop back around to the first/last post.		
		if ( $loop && isset($result) ) {
			$op = $previous ? '>=' : '<=';
			$loop = false; // prevent an infinite loop if no first/last post is found
		}
		
		$join  = apply_filters( "get_{$adjacent}_post_plus_join", $join, $r );

//		In case the value in the $order_by column is not unique, select posts based on the $order_2nd column as well.
//		This prevents posts from being skipped when they have, for example, the same menu_order.
		$where = apply_filters( "get_{$adjacent}_post_plus_where", $wpdb->prepare("WHERE ( $order_by $op $order_format OR $order_2nd $op $order_format2 AND $order_by = $order_format ) AND p.post_type IN ($post_type) AND p.post_status = 'publish' $in_same_term_sql $in_same_author_sql $in_same_meta_sql $ex_cats_sql $in_cats_sql $ex_posts_sql $in_posts_sql", $current_post, $current_post2, $current_post), $r );

		$sort  = apply_filters( "get_{$adjacent}_post_plus_sort", "ORDER BY $order_by $order, $order_2nd $order LIMIT $num_results", $r );

		$query = "SELECT DISTINCT p.* FROM $wpdb->posts AS p $join $where $sort";
		$query_key = 'adjacent_post_' . md5($query);
		$result = wp_cache_get($query_key);
		if ( false !== $result )
			return $result;

//		echo $query . '<br />';

//		Use get_results instead of get_row, in order to retrieve multiple adjacent posts (when $num_results > 1)
//		Add DISTINCT keyword to prevent posts in multiple categories from appearing more than once
		$result = $wpdb->get_results("SELECT DISTINCT p.* FROM $wpdb->posts AS p $join $where $sort");
		if ( null === $result )
			$result = '';

	} while ( !$result && $loop );

	wp_cache_set($query_key, $result);
	return $result;
}

/**
 * Display previous post link that is adjacent to the current post.
 *
 * Based on previous_post_link() from wp-includes/link-template.php
 *
 * @param array|string $args Optional. Override default arguments.
 * @return bool True if previous post link is found, otherwise false.
 */
function previous_post_link_plus($args = '') {
	return adjacent_post_link_plus($args, '&laquo; %link', true);
}

/**
 * Display next post link that is adjacent to the current post.
 *
 * Based on next_post_link() from wp-includes/link-template.php
 *
 * @param array|string $args Optional. Override default arguments.
 * @return bool True if next post link is found, otherwise false.
 */
function next_post_link_plus($args = '') {
	return adjacent_post_link_plus($args, '%link &raquo;', false);
}

/**
 * Display adjacent post link.
 *
 * Can be either next post link or previous.
 *
 * Based on adjacent_post_link() from wp-includes/link-template.php
 *
 * @param array|string $args Optional. Override default arguments.
 * @param bool $previous Optional, default is true. Whether display link to previous post.
 * @return bool True if next/previous post is found, otherwise false.
 */
function adjacent_post_link_plus($args = '', $format = '%link &raquo;', $previous = true) {
	$defaults = array(
		'order_by' => 'post_date', 'order_2nd' => 'post_date', 'meta_key' => '', 'post_type' => '',
		'loop' => false, 'end_post' => false, 'thumb' => false, 'max_length' => 0,
		'format' => '', 'link' => '%title', 'date_format' => '', 'tooltip' => '%title',
		'in_same_cat' => false, 'in_same_tax' => false, 'in_same_format' => false,
		'in_same_author' => false, 'in_same_meta' => false,
		'ex_cats' => '', 'ex_cats_method' => 'weak', 'in_cats' => '', 'ex_posts' => '', 'in_posts' => '',
		'before' => '', 'after' => '', 'num_results' => 1, 'return' => false, 'echo' => true
	);

//	If Post Types Order plugin is installed, default to sorting on menu_order
	if ( function_exists('CPTOrderPosts') )
		$defaults['order_by'] = 'menu_order';
	
	$r = wp_parse_args( $args, $defaults );
	if ( empty($r['format']) )
		$r['format'] = $format;
	if ( empty($r['date_format']) )
		$r['date_format'] = get_option('date_format');
	if ( !function_exists('get_post_format') )
		$r['in_same_format'] = false;

	if ( $previous && is_attachment() ) {
		$posts = array();
		$posts[] = & get_post($GLOBALS['post']->post_parent);
	} else
		$posts = get_adjacent_post_plus($r, $previous);

//	If there is no next/previous post, return false so themes may conditionally display inactive link text.
	if ( !$posts )
		return false;

//	If sorting by date, display posts in reverse chronological order. Otherwise display in alpha/numeric order.
	if ( ($previous && $r['order_by'] != 'post_date') || (!$previous && $r['order_by'] == 'post_date') )
		$posts = array_reverse( $posts, true );
		
//	Option to return something other than the formatted link		
	if ( $r['return'] ) {
		if ( $r['num_results'] == 1 ) {
			reset($posts);
			$post = current($posts);
			if ( $r['return'] === 'id')
				return $post->ID;
			if ( $r['return'] === 'href')
				return get_permalink($post);
			if ( $r['return'] === 'object')
				return $post;
			if ( $r['return'] === 'title')
				return $post->post_title;
			if ( $r['return'] === 'date')
				return mysql2date($r['date_format'], $post->post_date);
		} elseif ( $r['return'] === 'object')
			return $posts;
	}

	$output = $r['before'];

//	When num_results > 1, multiple adjacent posts may be returned. Use foreach to display each adjacent post.
	foreach ( $posts as $post ) {
		$title = $post->post_title;
		if ( empty($post->post_title) )
			$title = $previous ? __('Previous Post') : __('Next Post');

		$title = apply_filters('the_title', $title, $post->ID);
		$date = mysql2date($r['date_format'], $post->post_date);
		$author = get_the_author_meta('display_name', $post->post_author);
	
//		Set anchor title attribute to long post title or custom tooltip text. Supports variable replacement in custom tooltip.
		if ( $r['tooltip'] ) {
			$tooltip = str_replace('%title', $title, $r['tooltip']);
			$tooltip = str_replace('%date', $date, $tooltip);
			$tooltip = str_replace('%author', $author, $tooltip);
			$tooltip = ' title="' . esc_attr($tooltip) . '"';
		} else
			$tooltip = '';

//		Truncate the link title to nearest whole word under the length specified.
		$max_length = intval($r['max_length']) < 1 ? 9999 : intval($r['max_length']);
		if ( strlen($title) > $max_length )
			$title = substr( $title, 0, strrpos(substr($title, 0, $max_length), ' ') ) . '...';
	
		$rel = $previous ? 'prev' : 'next';

		$anchor = '<a href="'.get_permalink($post).'" rel="'.$rel.'"'.$tooltip.'>';
		$link = str_replace('%title', $title, $r['link']);
		$link = str_replace('%date', $date, $link);
		$link = $anchor . $link . '</a>';
	
		$format = str_replace('%link', $link, $r['format']);
		$format = str_replace('%title', $title, $format);
		$format = str_replace('%date', $date, $format);
		$format = str_replace('%author', $author, $format);
		if ( ($r['order_by'] == 'custom' || $r['order_by'] == 'numeric') && !empty($r['meta_key']) ) {
			$meta = get_post_meta($post->ID, $r['meta_key'], true);
			$format = str_replace('%meta', $meta, $format);
		} elseif ( $r['in_same_meta'] ) {
			$meta = get_post_meta($post->ID, $r['in_same_meta'], true);
			$format = str_replace('%meta', $meta, $format);
		}

//		Get the category list, including custom taxonomies (only if the %category variable has been used).
		if ( (strpos($format, '%category') !== false) && version_compare(PHP_VERSION, '5.0.0', '>=') ) {
			$term_list = '';
			$taxonomies = array_filter( get_post_taxonomies($post->ID), "is_taxonomy_hierarchical" );
			if ( $r['in_same_format'] && get_post_format($post->ID) )
				$taxonomies[] = 'post_format';
			foreach ( $taxonomies as &$taxonomy ) {
//				No, this is not a mistake. Yes, we are testing the result of the assignment ( = ).
//				We are doing it this way to stop it from appending a comma when there is no next term.
				if ( $next_term = get_the_term_list($post->ID, $taxonomy, '', ', ', '') ) {
					$term_list .= $next_term;
					if ( current($taxonomies) ) $term_list .= ', ';
				}
			}
			$format = str_replace('%category', $term_list, $format);
		}

//		Optionally add the post thumbnail to the link. Wrap the link in a span to aid CSS styling.
		if ( $r['thumb'] && has_post_thumbnail($post->ID) ) {
			if ( $r['thumb'] === true ) // use 'post-thumbnail' as the default size
				$r['thumb'] = 'post-thumbnail';
			$thumbnail = '<a class="post-thumbnail" href="'.get_permalink($post).'" rel="'.$rel.'"'.$tooltip.'>' . get_the_post_thumbnail( $post->ID, $r['thumb'] ) . '</a>';
			$format = $thumbnail . '<span class="post-link">' . $format . '</span>';
		}

//		If more than one link is returned, wrap them in <li> tags		
		if ( intval($r['num_results']) > 1 )
			$format = '<li>' . $format . '</li>';
		
		$output .= $format;
	}

	$output .= $r['after'];

	//	If echo is false, don't display anything. Return the link as a PHP string.
	if ( !$r['echo'] || $r['return'] === 'output' )
		return $output;

	$adjacent = $previous ? 'previous' : 'next';
	echo apply_filters( "{$adjacent}_post_link_plus", $output, $r );

	return true;
}
