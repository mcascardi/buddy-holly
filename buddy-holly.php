<?php
/**
 * @package Buddy_Holly
 * @version 1.6
 */
/*
Plugin Name: Buddy Holly
Plugin URI: 
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Rivers Cumono: Buddy Holly. When activated you will randomly see a lyric from <cite>Buddy Holly</cite> in the upper right of your admin screen on every page.
Author: Matt Cascardi
Version: 1.6
Author URI: http://mattcascardi.com/
*/

/**
 * Get the Buddy Holly lyrics
 */
function get_lyrics() {
	/** These are the lyrics to Buddy Holly */
	$lyrics = "What's with these homies
Dissin' my girl?
Why do they gotta front?
What did we ever
Do to these guys
That made them so violent?
Woo-hoo
But you know I'm yours
Woo-hoo
And I know you're mine
Woo-hoo
And that's for all time
Oo-ee-oo
I look just like Buddy Holly
Oh-oh
And you're Mary Tyler Moore
I don't care what they say
About us anyway
I don't care 'bout that
Don't you ever fear
I'm always near
I know that you need help
Your tongue is twisted
Your eyes are slit
You need a guardian
Woo-hoo
And you know I'm yours
Woo-hoo
And I know you're mine
Woo-hoo
And that's for all time
Oo-ee-oo
I look just like Buddy Holly
Oh-oh
And you're Mary Tyler Moore
I don't care what they say
About us anyway
I don't care 'bout that
I don't care 'bout that
Bang, bang
A knock on the door
Another big bang
And you're down
On the floor
Oh, no
What do we do?
Don't look now
But I lost my shoe
I can't run
And I can't kick
What's a matter babe
Are you feelin' sick?
What's a matter
What's a matter
What's a matter you?
What's a matter babe
Are you feelin' blue?
And oh-oh-oh-oh
And that's for all time
Oo-ee-oo
I look just like Buddy Holly
Oh-oh
And you're Mary Tyler Moore
I don't care what they say
About us anyway
I don't care 'bout that
I don't care 'bout that
I don't care 'bout that
I don't care 'bout that";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function buddy_holly() {
	$chosen = get_lyrics();
	echo "<p id='holly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'buddy_holly' );

// We need some CSS to position the paragraph
function holly_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#holly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'holly_css' );

// EOF
