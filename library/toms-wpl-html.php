<?php
    wp_enqueue_style( 'toms-wpl-editor', $this->plugin_url . 'assets/css/toms-wpl-frontend.css' );

    $heading = wc_get_product()->get_meta( 'toms_wpl_heading' );
    
    $bg_color   = wc_get_product()->get_meta( 'toms_wpl_bg_color' );
    $font_color = wc_get_product()->get_meta( 'toms_wpl_font_color' );

    if( empty($bg_color) ){
        $bg_color = '#009688';
    }

    if( empty($font_color) ){
        $font_color = '#ffffff';
    }

    $image0 = wc_get_product()->get_meta( 'toms_wpl_image_url_0' );
    $image1 = wc_get_product()->get_meta( 'toms_wpl_image_url_1' );
    $image2 = wc_get_product()->get_meta( 'toms_wpl_image_url_2' );

    $text0 = wc_get_product()->get_meta( 'toms_wpl_text_input_0' );
    $text1 = wc_get_product()->get_meta( 'toms_wpl_text_input_1' );
    $text2 = wc_get_product()->get_meta( 'toms_wpl_text_input_2' );
    $text3 = wc_get_product()->get_meta( 'toms_wpl_text_input_3' );

    $textvalue0 = wc_get_product()->get_meta( 'toms_wpl_text_value_0' );
    $textvalue1 = wc_get_product()->get_meta( 'toms_wpl_text_value_1' );
    $textvalue2 = wc_get_product()->get_meta( 'toms_wpl_text_value_2' );
    $textvalue3 = wc_get_product()->get_meta( 'toms_wpl_text_value_3' );
    
    $text4 = wc_get_product()->get_meta( 'toms_wpl_text_input_4' );
    $text5 = wc_get_product()->get_meta( 'toms_wpl_text_input_5' );

    $barcode = wc_get_product()->get_meta( 'toms_wpl_1dbarcode' );

    $qrcode = wc_get_product()->get_meta( 'toms_wpl_qrcode' );

?>
<!--TomS Product Label start-->
<div id="toms-wpl-contents">
    <div id="toms-wpl-container">
        <!--Header start-->
        <div class="toms-wpl-header" style="background-color: <?php echo esc_attr( $bg_color ); ?>; color: <?php echo esc_attr( $font_color ); ?>">
            <span class="toms-wpl-company-logo">
                <?php if( $image0 ) : ?>
                <span class="toms-wpl-company-logo-img"><img src="<?php echo esc_url( $image0 );?>" /></span>
                <?php endif; ?>
                <?php if( $heading ) : ?>
                <span class="toms-wpl-company-logo-text"><?php echo esc_textarea( $heading ); ?></span>
                <?php endif; ?>
            </span>
            <span class="toms-wpl-right-text">
                <?php if( $text4 ) : ?>
                <span class="toms-wpl-upmark"><?php echo esc_textarea( $text4 ); ?></span>
                <?php endif; ?>
                <?php if( $text5 ) : ?>
                <span class="toms-wpl-company-name"><?php echo esc_textarea( $text5 ); ?></span>
                <?php endif; ?>
            </span>
        </div>
        <!--Header end-->

        <!--Column0 start-->
        <div class="toms-wpl-column0">
            <span class="toms-wpl-section0">
                <?php if( $text0 ) : ?>
                <span class="toms-wpl-unit0-1"><?php echo esc_textarea( $text0 ); ?></span>
                <?php endif; ?>
                <?php if( $textvalue0 ) : ?>
                <span class="toms-wpl-unit0-2"><?php echo esc_textarea( $textvalue0 ); ?></span>
                <?php endif; ?>
            </span>
            <span class="toms-wpl-section0-1">
                <?php if( $text1 ) : ?>
                <span class="toms-wpl-unit0-1"><?php echo esc_textarea( $text1 ); ?></span>
                <?php endif; ?>
                <?php if( $textvalue1 ) : ?>
                <span class="toms-wpl-unit0-2"><?php echo esc_textarea( $textvalue1 ); ?></span>
                <?php endif; ?>
            </span>
        </div>
        <!--Column0 end-->

        <!--Column1 start-->
        <div class="toms-wpl-column1">
            <span class="toms-wpl-section1">
                <?php if( $text2 ) : ?>
                <span class="toms-wpl-unit0-3"><?php echo esc_textarea( $text2 ); ?></span>
                <?php endif; ?>
                <?php if( $textvalue2 ) : ?>
                <span class="toms-wpl-unit0-4"><?php echo esc_textarea( $textvalue2 ); ?></span>
                <?php endif; ?>
            </span>
            <span class="toms-wpl-section1-1">
                <?php if( $text3 ) : ?>
                <span class="toms-wpl-unit0-3"><?php echo esc_textarea( $text3 ); ?></span>
                <?php endif; ?>
                <?php if( $textvalue3 ) : ?>
                <span class="toms-wpl-unit0-4"><?php echo esc_textarea( $textvalue3 ); ?></span>
                <?php endif; ?>
            </span>
        </div>
        <!--Column1 end-->

        <!--Column2 start-->
        <div class="toms-wpl-column2">
            <div class="toms-wpl-section2-1">
                <?php if( $barcode ) : ?>
                <span class="toms-wpl-unit2-1">
                    <svg id="toms-wpl-1dcode"
                            jsbarcode-format="EAN13"
                            jsbarcode-value="<?php echo esc_textarea( $barcode ); ?>"
                            jsbarcode-height="36"
                            jsbarcode-textmargin="0"
                            jsbarcode-fontoptions="bold">
                    </svg>
                </span>
                <?php endif; ?>
            </div>
            <div class="toms-wpl-section2-2">
                <?php if( $image1 ) : ?>
                <span class="toms-wpl-unit2-3"><img src="<?php echo esc_url( $image1 );?>"></span>
                <?php endif; ?>
                <?php if( $image2 ) : ?>
                <span class="toms-wpl-unit2-3"><img src="<?php echo esc_url( $image2 );?>"></span>
                <?php endif; ?>
                <?php if( $qrcode ) : ?>
                <span class="toms-wpl-unit2-4"><span id="toms-wpl-qrcode"></span></span>
                <?php endif; ?>
            </div>
        </div>
        <!--Column2 end-->
    </div>
</div>

<!--QR Code start-->
<script type="text/javascript">
    <?php if( $barcode ) : ?>
    //JsBarcode v3.11.5 | (c) Johan Lindell | MIT license
    JsBarcode("#toms-wpl-1dcode").init();
    <?php endif; ?>

    <?php if( $qrcode ) : ?>
    //QR Code
    var TomSQrize = new Qrize({
        element: document.getElementById("toms-wpl-qrcode")
    });
    TomSQrize.createImg({ 
        url: "<?php echo esc_url( $qrcode ); ?>" 
    });
    <?php endif; ?>
</script>
<!--QR Code end-->

<!--TomS Product Label end-->
