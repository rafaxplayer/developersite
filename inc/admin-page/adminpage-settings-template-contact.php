<div class="wrap">
    <h1><?php _e('Contact Template Settings','developersite')?></h1>
    <h2><?php _e('Address Settings','developersite')?></h2>
    <form action="options.php" method="post">
        <?php settings_fields( 'theme_optionsgroup2' );?>
        <?php do_settings_sections( 'theme_optionsgroup2' );?>
        <p class="description"><?php _e('Enter your address data','developersite'); ?></p>
        <table class="form-table">
            <tr valing="top">
                <legend class="screen-reader-text"><span>Address</span></legend>
                <th scope="row">Address</th>
                <td><input type="text" name="developersite_contact_address" class="regular-text ltr" value="<?php echo get_option('developersite_contact_address'); ?>"/></td>
            </tr>
            <tr valing="top">
                <legend class="screen-reader-text"><span>Phone</span></legend>
                <th scope="row">Phone</th>
                <td><input type="tel" name="developersite_contact_phone" class="regular-text ltr" value="<?php echo get_option('developersite_contact_phone'); ?>" /></td>
            </tr>
            <tr valing="top">
                <legend class="screen-reader-text"><span>WhatsApp</span></legend>
                <th scope="row">WhatsApp</th>
                <td><input type="tel" name="developersite_contact_whatsapp" class="regular-text ltr" value="<?php echo get_option('developersite_contact_whatsapp'); ?>" /></td>
            </tr>
            <tr valing="top">
                <legend class="screen-reader-text"><span>Email</span></legend>
                <th scope="row">Email</th>
                <td><input type="email" name="developersite_contact_email" class="regular-text ltr" value="<?php echo get_option('developersite_contact_email'); ?>" />
                <p class="description"><?php _e('Set email for contact form, by default the administrator email will be used','developersite'); ?></p></td>
            </tr>
        </table>

        <h2><?php _e('Maps Settings','developersite') ?></h2>
        <p class="description"><?php  _e('Enter your Google Maps data','developersite'); ?></p>
        <table class="form-table">
            <tr valing="top">
                <legend class="screen-reader-text"><span>Map Lattitude</span></legend>
                <th scope="row">Map Show</th>
                <td><input type="checkbox" name="developersite_maps_show" class="" value="1" <?php checked(true, get_option('developersite_maps_show')); ?>/>
                <p style="display: inline-block;vertical-align: middle;" class="description"><?php _e('Show/Hidde map on template contact','developersite'); ?></p></td>
            </tr>
            <tr valing="top">
                <legend class="screen-reader-text"><span>Map Lattitude</span></legend>
                <th scope="row">Lattitude</th>
                <td><input type="text" name="developersite_maps_lat" class="regular-text ltr" value="<?php echo get_option('developersite_maps_lat');?>"/></td>
            </tr>
            <tr valing="top">
                <legend class="screen-reader-text"><span>Map Longitude</span></legend>
                <th scope="row">Longitude</th>
                <td><input type="text" name="developersite_maps_long" class="regular-text ltr" value="<?php echo get_option('developersite_maps_long');?>"/></td>
            </tr>
            <tr valing="top">
                <legend class="screen-reader-text"><span>Map Zoom</span></legend>
                <th scope="row">Zoom</th>
                <td><input type="text" name="developersite_maps_zoom" class="regular-text ltr" value="<?php echo get_option('developersite_maps_zoom');?>"/></td>
            </tr>
            <tr valing="top">
                <legend class="screen-reader-text"><span>Map Api key</span></legend>
                <th scope="row">Api Key</th>
                <td><input type="text" name="developersite_maps_apikey" class="regular-text ltr" value="<?php echo get_option('developersite_maps_apikey');?>"/></td>
            </tr>
        </table>
        <?php submit_button('Guardar');?>

    </form>
</div>