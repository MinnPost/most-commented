<?php
/*
Plugin Name: Most Commented
Plugin URI: http://mtdewvirus.com/wp-hacks/
Description: Retrieves a list of the posts with the most comments.
Version: 1.01
Author: Nick Momrik
Author URI: http://mtdewvirus.com/
*/

function get_most_commented($no_posts = 5, $before = '<li>', $after = '</li>', $show_pass_post = false) {
    global $wpdb;
	$request = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'comment_count' FROM $wpdb->posts, $wpdb->comments";
	$request .= " WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish'";
	if(!$show_pass_post) $request .= " AND post_password =''";
	$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
    $posts = $wpdb->get_results($request);
    $output = '';
	if ($posts) {
		foreach ($posts as $post) {
			$post_title = stripslashes($post->post_title);
			$comment_count = $post->comment_count;
			$permalink = get_permalink($post->ID);
			$output .= $before . '<a href="' . $permalink . '" title="' . $post_title.'">' . $post_title . '</a> (' . $comment_count.')' . $after;
		}
	} else {
		$output .= $before . "None found" . $after;
	}
    echo $output;
}
?>