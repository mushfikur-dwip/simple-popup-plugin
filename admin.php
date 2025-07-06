<div class="wrap">
    <h1>Simple Popup Settings</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('spp_settings_group');
        $options = get_option('spp_settings');
        ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Popup Text</th>
                <td><input type="text" name="spp_settings[popup_text]" value="<?php echo esc_attr($options['popup_text'] ?? ''); ?>" size="50" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">CTA Button Text</th>
                <td><input type="text" name="spp_settings[cta_text]" value="<?php echo esc_attr($options['cta_text'] ?? 'Click Here'); ?>" size="50" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">CTA Button Link</th>
                <td><input type="url" name="spp_settings[cta_link]" value="<?php echo esc_attr($options['cta_link'] ?? '#'); ?>" size="50" /></td>
            </tr>
            <tr valign="top">
            <th scope="row">Delay Time (seconds)</th>
            <td>
                <input type="number" name="spp_settings[popup_delay]" value="<?php echo esc_attr($options['popup_delay'] ?? 5); ?>" min="0" />
                <p class="description">Popup কত সেকেন্ড পরে দেখাবে (default: 5 সেকেন্ড)</p>
            </td>
            <tr valign="top">
            <th scope="row">Display Only on URL (Optional)</th>
            <td>
                <input type="text" name="spp_settings[display_url]" value="<?php echo esc_attr($options['display_url'] ?? ''); ?>" size="50" />
                <p class="description">উদাহরণ: <code>/about</code> বা <code>/</code> (শুধু Homepage)</p>
            </td>
        </tr>

    </table>
    <?php submit_button(); ?>
    </form>
</div>
