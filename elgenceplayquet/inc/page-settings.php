<?php 
/**
 * @package WordPress
 * @subpackage Elegence_Playquet
 * @since 1.0.0
 */
 ?>
 <div class="wrap">
 	<h1><?php echo $title ?></h1>
 	<form method="post" action="options.php">
    <?php settings_fields( 'elegence-page-settings-group' ); ?>
    <?php do_settings_sections( 'elegence-page-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Product Page:</th>
        <td>
        	<select name="__product_page_template">
                <option value="-1"> -- Select Product Page -- </option>
        		<?php 
        			foreach ( get_pages() as $pages ) :  

        			$selected_page = esc_attr( get_option('__product_page_template') ) == $pages->ID ? 'selected' : '';
        		?>  
        			<option value="<?php echo $pages->ID; ?>" <?php echo $selected_page ?>><?php _e( $pages->post_title, 'elegenceplayquet' ); ?></option>
        		<?php endforeach; ?>
        	</select>
        	
        </td>
        </tr>
    </table>
    
    <?php submit_button( __('Save Settings', 'elegenceplayquet' ) ); ?>

</form>
 </div>