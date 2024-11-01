<?php
    //Image upload dependence
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
?>
<!--TomS Product Label start-->
<div id="toms-wpl-editor">
    <!--Position start-->
    <p class="form-field toms-wpl-text-field toms-wpl-position-field">
        <span class="toms-wpl-position-select toms-wpl-text-field-unit">
            <label class="toms-wpl-position-label" for="toms_wpl_position">
                <?php _e( 'Label Position', 'toms-product-label' ); ?>
                <?php echo wc_help_tip( __('Select a position to show the label.', 'toms-product-label') ); ?>
            </label>
            <select 
                id="toms_wpl_position"
                name="toms_wpl_position"
                class="toms-wpl-position"
                data-index="<?php echo esc_textarea( wc_get_product()->get_meta( 'toms_wpl_position' ) ); ?>"
                style="" >
                <option value="0"><?php _e('After Add to card button', 'toms-product-label' ); ?></option>
                <option value="1"><?php _e('Before Product Tabs', 'toms-product-label' ); ?></option>
                <option value="2"><?php _e('After the Description content', 'toms-product-label' ); ?></option>
            </select>
        </span>
    </p>
    <!--Position end-->

    <!-- Heading start -->
    <p class="form-field toms-wpl-text-field toms-wpl-heading-field">
        <span class="toms-wpl-text-field-unit">
            <label for="toms_wpl_heading">
                <span class="toms-wpl-text-label-unit-heading"><?php _e( 'Heading', 'toms-product-label' ); ?></span>
                <?php echo wc_help_tip( __('Enter the Title of the label.', 'toms-product-label') ); ?>
            </label>
            <input type="text" id="toms_wpl_heading" name="toms_wpl_heading" value="<?php echo esc_textarea( wc_get_product()->get_meta( 'toms_wpl_heading' ) ); ?>" />
        </span>
    </p>
    <p class="form-field toms-wpl-text-field">
        <span class="toms-wpl-text-field-unit toms-wpl-bg-color">
            <label for="toms_wpl_font_color">
                <span class="toms-wpl-text-label-unit-heading"><?php _e( 'Heading Font Color', 'toms-product-label' ); ?></span>
                <?php echo wc_help_tip( __('Enter the background color value for the heading.', 'toms-product-label') ); ?>
            </label>
            <input type="text" id="toms_wpl_font_color" name="toms_wpl_font_color" value="<?php echo esc_textarea( wc_get_product()->get_meta( 'toms_wpl_font_color' ) ); ?>" />
        </span>
        <span class="toms-wpl-text-field-unit toms-wpl-bg-color">
            <label for="toms_wpl_bg_color">
                <span class="toms-wpl-text-label-unit-heading"><?php _e( 'Heading Background Color', 'toms-product-label' ); ?></span>
                <?php echo wc_help_tip( __('Enter the background color value for the heading.', 'toms-product-label') ); ?>
            </label>
            <input type="text" id="toms_wpl_bg_color" name="toms_wpl_bg_color" value="<?php echo esc_textarea( wc_get_product()->get_meta( 'toms_wpl_bg_color' ) ); ?>" />
        </span>
    </p>
    <!-- Heading end -->

    <!-- 1D Barcode start -->
    <p class="form-field toms-wpl-text-field toms-wpl-1dbarcode-field">
        <span class="toms-wpl-text-field-unit toms-wpl-text-field-unit-span">
            <label for="toms_wpl_1dbarcode">
                <span class="toms-wpl-text-label-unit-1dbarcode"><?php _e( '1D Barcode', 'toms-product-label' ); ?></span>
                <?php echo wc_help_tip( __('Enter your 1D Barcode.', 'toms-product-label') ); ?>
            </label>
            <input type="text" id="toms_wpl_1dbarcode" name="toms_wpl_1dbarcode" value="<?php echo esc_textarea( wc_get_product()->get_meta( 'toms_wpl_1dbarcode' ) ); ?>" />
        </span>
        <span class="toms-wpl-1dbarcode-format-select">
            <label class="toms-wpl-1dbarcode-format-label" for="toms_wpl_1dbarcode_format">
                <?php _e( 'Format', 'toms-product-label' ); ?>
            </label>
            <select 
                id="toms_wpl_1dbarcode_format"
                name="toms_wpl_1dbarcode_format"
                class="toms-wpl-1dbarcode-format"
                data-index="<?php echo esc_textarea( wc_get_product()->get_meta( 'toms_wpl_1dbarcode_format' ) ); ?>"
                style="" >
                <option value="0">EAN13</option>
            </select>
        </span>
    </p>
    <!-- 1D Barcode end -->

    <!-- QR code start -->
    <p class="form-field toms-wpl-text-field toms-wpl-qrcode-field">
        <span class="toms-wpl-text-field-unit">
            <label for="toms_wpl_qrcode">
                <span class="toms-wpl-text-label-unit-qrcode"><?php _e( 'QR Code URL', 'toms-product-label' ); ?></span>
                <?php echo wc_help_tip( __('Enter an url to generate a QR code.', 'toms-product-label' ) ); ?>
            </label>
            <input type="text" id="toms_wpl_qrcode" name="toms_wpl_qrcode" value="<?php echo esc_textarea( wc_get_product()->get_meta( 'toms_wpl_qrcode' ) ); ?>" />
        </span>
    </p>
    <!-- QR code end -->

    <!-- Image 0 ~ 2 start -->
    <?php foreach( $this->text_array as $key => $value) : 
        if( $key <= 2 ){
        ?>
        <p class="form-field toms-wpl-text-field toms-wpl-img-field">
            <span class="toms-wpl-text-field-unit">
                <label for="toms_wpl_image_url_<?php echo esc_attr( $key ); ?>">
                    <span class="toms-wpl-text-label-unit-<?php echo esc_attr( $key ); ?>"><?php _e( 'Image', 'toms-product-label' ); ?> <?php echo esc_textarea( $key ); ?> <span class="toms-wpl-text-label-unit-name toms-wpl-text-label-unit-name-<?php echo esc_attr( $key ); ?>"><?php _e( 'URL', 'toms-product-label' ); ?></span></span>
                </label>
                <input type="text" id="toms_wpl_image_url_<?php echo esc_attr( $key ); ?>" name="toms_wpl_image_url_<?php echo esc_attr( $key ); ?>" value="<?php echo esc_url( wc_get_product()->get_meta( 'toms_wpl_image_url_' . $key ) ); ?>" />
            </span>
            <span class="toms-wpl-image-upload-button">
                <input type="button" class="short button-primary button-large toms-wpl-image-url-button-<?php echo esc_attr( $key ); ?>" style="" name="toms_wpl_image_url_upload_button_<?php echo esc_attr( $key ); ?>" id="toms_wpl_image_url_upload_button_<?php echo esc_attr( $key ); ?>" value="<?php _e( 'Choose an image', 'toms-product-label' ); ?>" placeholder="" onclick="TomSUpLoadImage(&quot;toms_wpl_image_url_<?php echo esc_attr( $key ); ?>&quot;)">
            </span>
        </p>
    <?php } endforeach; ?>
    <!-- Image 0 ~ 2 end -->

    <!-- Text 0 ~ 5 start -->
    <?php foreach( $this->text_array as $key => $value) : 
            $name = '';
            if( $key <= 3 ){
                $name = ' ' . __('Label', 'toms-product-label');
        ?>
        <p class="form-field toms-wpl-text-field">
            <span class="toms-wpl-text-field-unit">
                <label for="toms_wpl_text_input_<?php echo esc_attr( $key ); ?>">
                    <span class="toms-wpl-text-label-unit-<?php echo esc_attr( $key ); ?>"><?php _e( 'Text', 'toms-product-label' ); ?> <?php echo esc_textarea( $key ); ?> <span class="toms-wpl-text-label-unit-name toms-wpl-text-label-unit-name-<?php echo esc_attr( $key ); ?>"><?php echo esc_textarea( $name ); ?></span></span>
                </label>
                <input type="text" id="toms_wpl_text_input_<?php echo esc_attr( $key ); ?>" name="toms_wpl_text_input_<?php echo esc_attr( $key ); ?>" value="<?php echo esc_textarea( wc_get_product()->get_meta( 'toms_wpl_text_input_' . $key ) ); ?>" />
            </span>
            <span class="toms-wpl-text-field-unit">
                <label for="toms_wpl_text_value_<?php echo esc_attr( $key ); ?>">
                    <span class="toms-wpl-text-label-value-unit-<?php echo esc_attr( $key ); ?>"><?php _e( 'Text', 'toms-product-label' ); ?> <?php echo esc_textarea( $key ); ?> <span class="toms-wpl-text-label-value-unit-value toms-wpl-text-label-value-unit-value-<?php echo esc_attr( $key ); ?>"><?php _e( 'Value', 'toms-product-label' ); ?></span></span>
                </label>
                <input type="text" id="toms_wpl_text_value_<?php echo esc_attr( $key ); ?>" name="toms_wpl_text_value_<?php echo esc_attr( $key ); ?>" value="<?php echo esc_textarea( wc_get_product()->get_meta( 'toms_wpl_text_value_' . $key ) ); ?>" />
            </span>
        </p>
    <?php } endforeach; ?>
    <!-- Text 0 ~ 5 end -->

    <!-- Text 4 ~ 5 start -->
    <p class="form-field toms-wpl-text-field">
        <span class="toms-wpl-text-field-unit">
            <label for="toms_wpl_text_input_4">
                <span class="toms-wpl-text-label-unit-4"><?php _e( 'Text 4', 'toms-product-label' ); ?></span>
            </label>
            <input type="text" id="toms_wpl_text_input_4" name="toms_wpl_text_input_4" value="<?php echo esc_textarea( wc_get_product()->get_meta( 'toms_wpl_text_input_4' ) ); ?>" />
        </span>
        <span class="toms-wpl-text-field-unit">
            <label for="toms_wpl_text_input_5">
                <span class="toms-wpl-text-label-unit-5"><?php _e( 'Text 5', 'toms-product-label' ); ?></span>
            </label>
            <input type="text" id="toms_wpl_text_input_5" name="toms_wpl_text_input_5" value="<?php echo esc_textarea( wc_get_product()->get_meta( 'toms_wpl_text_input_5' ) ); ?>" />
        </span>
    </p>
    <!-- Text 4 ~ 5 end -->
</div>
<!--TomS Product Label end-->
