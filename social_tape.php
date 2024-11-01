<?php 
/*
Plugin Name: Social Tape
Plugin URL: http://www.isabel-schmiedel.com/
Description: Adds social symbols to the left or right side of your page.
Author: Kjeld Schmidt
Version: 1.0
Author URL: http://www.isabel-schmiedel.com/
*/
function add_tape(){
	$path = WP_PLUGIN_URL . "/social-tape/img/";
	$tape_orientation = get_option('tape_orientation');  
	$offset = 0;
	if ($tape_orientation == 'left') $offset = -10;
	echo "<div id='socialtape' style='" . $tape_orientation . ": $offset" . "px;'>";
	if ($tape_fb = get_option('tape_fb')){ echo "<a href='$tape_fb' target='_blank'><img src='$path" . "fb.png' /></a><br>";}
	if ($tape_tb = get_option('tape_tb')){ echo "<a href='$tape_tb' target='_blank'><img src='$path" . "tb.png' /></a><br>";}
	if ($tape_gp = get_option('tape_gp')){ echo "<a href='$tape_gp' target='_blank'><img src='$path" . "gp.png' /></a><br>";}
	if ($tape_da = get_option('tape_da')){ echo "<a href='$tape_da' target='_blank'><img src='$path" . "da.png' /></a><br>";}
	if ($tape_tw = get_option('tape_tw')){ echo "<a href='$tape_tw' target='_blank'><img src='$path" . "tw.png' /></a><br>";}
	
	
	// IF there is a video link.
	if ($link = get_option('tape_ytlink')){
		// Shows Youtube button, adds the 'ytbutton'-id so it can be called by jQuery.
		?>
        <img src="<?php echo $path . "yt.png"; ?>" id="ytbutton"/><br>
        <!-- Adds he video box div and positions it according to left/right , shows the actual video-->
	    <div id='videobox' style=' <?php echo $tape_orientation; ?>: -560px;'>
       	<iframe width='560' height='315' src='//www.youtube.com/embed/<?php echo $link; ?>' frameborder='0' allowfullscreen></iframe>
		<?php //Adds a link to the channel, if it exists
		if ($tape_yt = get_option('tape_yt')) { ?>
			<a href='<?php echo $tape_yt ?>' target="_blank"><p><?php _e("Visit the Channel!"); ?></p></a> 
        <?php } ?>
	    </div>
    	<?php //Shows the linked YT-Button if no video is linked.
	} else if ($tape_yt = get_option('tape_yt')){  
		echo "<a href='$tape_yt' target='_blank'><img src='$path" . "yt.png' /></a><br>"; 
	}
	//Ends the tape.	
	echo "</div>";	
}

function tape_admin_actions() {
	add_options_page('Social Tape', 'Social Tape', 'manage_options', __FILE__, 'tape_admin');
}

function tape_admin(){
    include('socialtape_import_admin.php');  
}

function tape_styles() {
	wp_register_style('tapestyle', plugins_url('style.css', __FILE__));
	wp_enqueue_style('tapestyle');
	wp_register_script('videobox', plugins_url('js/videobox.js',  __FILE__));
	wp_enqueue_script('videobox');
}


add_action('admin_menu', 'tape_admin_actions');
add_action('wp_footer', 'add_tape');
add_action( 'wp_enqueue_scripts', 'tape_styles' );


?>