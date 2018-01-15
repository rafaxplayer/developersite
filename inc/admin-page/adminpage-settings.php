<div class="wrap">
    <h1><?php _e('Dev&Site Theme Options','developersite'); ?></h1>
    </br>
    <form action="options.php" method="post">
        <?php settings_fields( 'theme_optionsgroup1' );?>
        <?php do_settings_sections( 'theme_optionsgroup1' );?>
        <h2><?php _e('Footer Settings','developersite')?></h2>
        <p class="description"><?php  _e('Enter your copiright text for footer data','developersite'); ?></p>
        <table class="form-table">
            <tr valing="top">
                <legend class="screen-reader-text"><span><?php _e('Footer text','developersite') ?></span></legend>
                <th scope="row"><?php _e('Footer text','developersite') ?></th>
                <td><input type="text" name="developersite_footer_text" class="regular-text ltr" value="<?php echo get_option('developersite_footer_text');?>"/></td>
            </tr>
            
        </table>
        <?php submit_button('Guardar');?>
    </form>
</div>