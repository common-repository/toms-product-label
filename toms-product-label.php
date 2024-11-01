<?php
/**
 * Plugin Name:       TomS Product Label
 * Description:       The label tag for woocommerce products.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            Tom Sneddon
 * Author URI:        https://TomS-Caprice.org
 * License:           GPLv3 or later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       toms-product-label
 * Domain Path:		  /languages
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( !class_exists( 'TomSProductLabel' && in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) ) ){
    class TomSProductLabel{
        function __construct(){
            $this->text_array = array( 0, 1, 2, 3, 4, 5 );
            $this->plugin_url = plugin_dir_url( __FILE__ );

            add_action( 'wp_enqueue_scripts', array($this, 'TomS_WPL_Scripts') );
            add_filter( 'woocommerce_product_data_tabs', array($this, 'TomS_WPL_Tab'), 10, 1 );
            add_action( 'woocommerce_product_data_panels', array($this, 'TomS_Edit_WPL') );
            add_action( 'woocommerce_admin_process_product_object', array($this, 'TomS_Save_WPL') );

            add_action( 'woocommerce_product_meta_start', array($this, 'show_on_after_add_cart') );
            add_action( 'woocommerce_after_single_product_summary', array($this, 'show_on_before_product_tabs') );
            add_action( 'woocommerce_product_after_tabs', array($this, 'show_on_description_field'), 10 );
        }
        function TomS_WPL_Scripts(){
            wp_enqueue_script( 'toms-wpl-1dcode', plugin_dir_url( __FILE__ ) . 'assets/js/JsBarcode.all.min.js' );
            wp_enqueue_script( 'toms-wpl-qrize', plugin_dir_url( __FILE__ ) . 'assets/js/qrize.umd.js' );
            //wp_enqueue_script( 'toms-wpl-qrcode', plugin_dir_url( __FILE__ ) . 'assets/js/qrcode.min.js' );
        }

        function show_on_after_add_cart(){
            $position = esc_textarea( wc_get_product()->get_meta('toms_wpl_position') );
            if( $position == "0" || empty( $position ) ){
                //TomS Product Label HTML start
                require_once( plugin_dir_path( __FILE__ ) . 'library/toms-wpl-html.php' );
                //TomS Product Label HTML end
            }
        }
        function show_on_before_product_tabs(){
            $position = esc_textarea( wc_get_product()->get_meta('toms_wpl_position') );
            if( $position == "1" ){
                ?>
                <style>
                    #toms-wpl-contents{
                        clear: both;
                        justify-content: center;
                    }
                </style>
                <?php
                //TomS Product Label HTML start
                require_once( plugin_dir_path( __FILE__ ) . 'library/toms-wpl-html.php' );
                //TomS Product Label HTML end
            }
        }
        function show_on_description_field(){
            $position = esc_textarea( wc_get_product()->get_meta('toms_wpl_position') );
            if( $position == "2" ){
                ?>
                <style>
                    #toms-wpl-contents{
                        justify-content: center;
                    }
                </style>
                <?php
                //TomS Product Label HTML start
                require_once( plugin_dir_path( __FILE__ ) . 'library/toms-wpl-html.php' );
                //TomS Product Label HTML end
            }
        }

        function TomS_WPL_Tab( $default_tabs ){
            $default_tabs['toms_wpl_tab'] = array(
                'label'   =>  __( 'Product Label', 'toms-product-label' ),
                'target'  =>  'toms_wpl_tab_data',
                'priority' => 16,
                'class'   => array("toms-wpl-tab")
            );
            return $default_tabs;
        }

        function TomS_Edit_WPL(){
            //TomS WPL CSS
            wp_enqueue_style( 'toms-wpl-editor', plugin_dir_url( __FILE__ ) . 'assets/css/toms-wpl-editor.css' );
            ?>
            <!-- TomS Woocommerce Framework start -->
            <div id="toms_wpl_tab_data" class="panel woocommerce_options_panel">
                <div class="toms-wpl-editor">
                    <!--TomS Product Label header start-->
                    <div class="toms-wpl-heading">
                        <div class="toms-wpl-heading-content">
                            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/img/toms-product-label.png';?>" />
                            <h2><?php _e( 'Product Label', 'toms-product-label' ); ?></h2>
                        </div>
                        <a class="toms-wpl-review" href="https://wordpress.org/support/plugin/toms-product-label/reviews/#new-post" >
                            <div class="toms-wpl-stars">
                                <i class="toms-wpl-star"></i>
                                <i class="toms-wpl-star"></i>
                                <i class="toms-wpl-star"></i>
                                <i class="toms-wpl-star"></i>
                                <i class="toms-wpl-star"></i>
                            </div>
                            <div class="toms-wpl-review-notice"><?php _e('Give 5-Star for us', 'toms-product-label' ); ?></div>
                        </a>
                    </div>
                    <!--TomS Product Label header end-->

                    <!-- Template image start -->
                    <div id="toms-wpl-template-image">
                        <img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/img/toms-product-label-template.png'; ?>" />
                    </div>
                    <!-- Template image end -->
            
                    <?php
                        //TomS Product Label start
                        require_once( plugin_dir_path( __FILE__ ) . 'library/toms-wpl-editor.php' );
                        //TomS Product Label end
                    ?>

                    <!--TomS Product Label Copyright start-->
                    <div class="toms-wpl-copyright"><?php _e( 'Powered by', 'toms-product-label' ); ?> <a href="https://toms-caprice.org" target="_blank"><?php _e('TomS Caprice', 'toms-product-label' ); ?></a></div>
                    <!--TomS Product Label Copyright end-->
                </div>
            </div>
            <!-- TomS Woocommerce Framework end -->
            <?php
                //TomS WPL JS
                wp_enqueue_script( 'toms-wpl-editor', plugin_dir_url( __FILE__ ) . 'assets/js/toms-wpl-editor.js' );
        }

        function TomS_Save_WPL( $product ){
            //Save Postion
            $toms_wpl_position  = isset( $_POST['toms_wpl_position'] ) ? sanitize_text_field( $_POST['toms_wpl_position'] ) : '';
            $product->update_meta_data( 'toms_wpl_position', $toms_wpl_position );

            //Save Heading 
            $toms_wpl_heading  = isset( $_POST['toms_wpl_heading'] ) ? sanitize_text_field( $_POST['toms_wpl_heading'] ) : '';
            $product->update_meta_data( 'toms_wpl_heading', $toms_wpl_heading );

            //Save Heading bg color
            $toms_wpl_bg_color  = isset( $_POST['toms_wpl_bg_color'] ) ? sanitize_text_field( $_POST['toms_wpl_bg_color'] ) : '';
            $product->update_meta_data( 'toms_wpl_bg_color', $toms_wpl_bg_color );

            //Save Heading font color
            $toms_wpl_font_color  = isset( $_POST['toms_wpl_font_color'] ) ? sanitize_text_field( $_POST['toms_wpl_font_color'] ) : '';
            $product->update_meta_data( 'toms_wpl_font_color', $toms_wpl_font_color );

            //Save 1D Barcode
            $toms_wpl_1dbarcode  = isset( $_POST['toms_wpl_1dbarcode'] ) ? sanitize_text_field( $_POST['toms_wpl_1dbarcode'] ) : '';
            $product->update_meta_data( 'toms_wpl_1dbarcode', $toms_wpl_1dbarcode );

            //Save QR Code 
            $toms_wpl_qrcode  = isset( $_POST['toms_wpl_qrcode'] ) ? sanitize_url( $_POST['toms_wpl_qrcode'] ) : '';
            $product->update_meta_data( 'toms_wpl_qrcode', $toms_wpl_qrcode );

            //Save Image URL 0 ~ 2
            foreach( $this->text_array as $key => $value) { 
                if( $key <= 2 ){
                    $toms_wpl_image_url  = isset( $_POST[ 'toms_wpl_image_url_' . $key ] ) ? sanitize_url( $_POST[ 'toms_wpl_image_url_' . $key ] ) : '';
                    $product->update_meta_data( 'toms_wpl_image_url_' . $key, $toms_wpl_image_url );
                }
            }

            //Save Text 0 ~ 3
            foreach( $this->text_array as $key => $value) {
                if( $key <= 3 ){
                    $toms_wpl_text_input  = isset( $_POST[ 'toms_wpl_text_input_' . $key ] ) ? sanitize_text_field( $_POST[ 'toms_wpl_text_input_' . $key ] ) : '';
                    $product->update_meta_data( 'toms_wpl_text_input_' . $key, $toms_wpl_text_input );
                    $toms_wpl_text_value  = isset( $_POST[ 'toms_wpl_text_value_' . $key ] ) ? sanitize_text_field( $_POST[ 'toms_wpl_text_value_' . $key ] ) : '';
                    $product->update_meta_data( 'toms_wpl_text_value_' . $key, $toms_wpl_text_value );
                }
            }

            //Save Text 4
            $toms_wpl_text_input_4  = isset( $_POST['toms_wpl_text_input_4'] ) ? sanitize_text_field( $_POST['toms_wpl_text_input_4'] ) : '';
            $product->update_meta_data( 'toms_wpl_text_input_4', $toms_wpl_text_input_4 );

            //Save Text 5 
            $toms_wpl_text_input_5  = isset( $_POST['toms_wpl_text_input_5'] ) ? sanitize_text_field( $_POST['toms_wpl_text_input_5'] ) : '';
            $product->update_meta_data( 'toms_wpl_text_input_5', $toms_wpl_text_input_5 );

            $product->save_meta_data();
        }
    }

    new TomSProductLabel();
}
