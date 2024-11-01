<?php
if($_POST['oscimp_hidden'] == 'Y') {  
	//Form data sent  
    update_option('tape_fb', $_POST['tape_fb']);  
    update_option('tape_tb', $_POST['tape_tb']);  
    update_option('tape_gp', $_POST['tape_gp']);  
	update_option('tape_da', $_POST['tape_da']);  
	update_option('tape_tw', $_POST['tape_tw']);  
	update_option('tape_yt', $_POST['tape_yt']); 
	update_option('tape_ytlink', $_POST['tape_ytlink']);  
	update_option('tape_orientation', $_POST['tape_orientation']);  
	?><div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div><?php
    
} 
	$tape_fb = get_option('tape_fb');  
	$tape_tb = get_option('tape_tb');  
	$tape_gp = get_option('tape_gp');  
	$tape_da = get_option('tape_da');  
	$tape_tw = get_option('tape_tw');  
	$tape_yt = get_option('tape_yt');  
	$tape_ytlink = get_option('tape_ytlink');
	$tape_orientation = get_option('tape_orientation');  
?>
<div class="wrap">  
	<?php    echo "<h2>" . __( 'Social Links', 'tape_trdom' ) . "</h2>"; ?>  
    <form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
       	<input type="hidden" name="oscimp_hidden" value="Y">  
		<?php    echo "<h4>" . __( 'Social Tape Links', 'oscimp_trdom' ) . "</h4>"; ?> 
        <table>
	        <tr> 
				<td><?php _e("Facebook: " ); ?></td><td><input type="text" name="tape_fb" value="<?php echo $tape_fb; ?>" size="50"></td>
   	        </tr><tr>
				<td><?php _e("Tumblr: " ); ?></td><td><input type="text" name="tape_tb" value="<?php echo $tape_tb; ?>" size="50"></td>
            </tr><tr>
				<td><?php _e("Google+: " ); ?></td><td><input type="text" name="tape_gp" value="<?php echo $tape_gp; ?>" size="50"></td>
			</tr><tr>
				<td><?php _e("Deviantart: " ); ?></td><td><input type="text" name="tape_da" value="<?php echo $tape_da; ?>" size="50"></td>
			</tr><tr>
				<td><?php _e("Twitter: " ); ?></td><td><input type="text" name="tape_tw" value="<?php echo $tape_tw; ?>" size="50"></td>
			</tr><tr>
				<td><?php _e("Youtube: " ); ?></td><td><input type="text" name="tape_yt" value="<?php echo $tape_yt; ?>" size="50"></td>
			</tr><tr>
				<td><?php _e("Youtube Video Link: " ); ?></td><td><input type="text" name="tape_ytlink" value="<?php echo $tape_ytlink; ?>" size="50"></td><td>Use only the video id - if the link is "http://www.youtube.com/watch?v=zr6B9AbmdVo", enter "zr6B9AbmdVo".</td>
			</tr>            
         </table>
		<p>You can use a youtube video by itself, a link to youtube or both. The video does not work if the uploader disabled embedding.</p>
		<hr />  
		<?php    echo "<h4>" . __( 'Optical Settings', 'tape_trdom' ) . "</h4>"; ?>  
		<input type="radio" name="tape_orientation" value="left" <?php if($tape_orientation == 'left') echo "checked"; ?>>Left<br>
		<input type="radio" name="tape_orientation" value="right" <?php if($tape_orientation == 'right') echo "checked"; ?>>Right
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options', 'tape_trdom' ) ?>" /></p>  
	</form>  
</div> 