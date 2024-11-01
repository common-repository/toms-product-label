function TomSUpLoadImage($url_id){
    jQuery(function($){
        var toms_wpl_image_url = wp.media({
            //title: "Choose a Image",
            frame: "select",
            multiple: false,
            library: {
                type: [ 'image' ]
            }
        }).open().on("select", function(e){
            var uploadImg = toms_wpl_image_url.state().get("selection").first()
            var selectedImg = uploadImg.toJSON()
            $('#' + $url_id).val(selectedImg.url)
        })
    });
}

//初始化 显示位置的值
var toms_wpl_position = document.getElementById('toms_wpl_position')
var position_data = toms_wpl_position.getAttribute('data-index');
if( position_data ){
    toms_wpl_position.selectedIndex = position_data;
}

//初始化 1维码格式保存的值
var TomS1DbarcodeFormat = document.getElementById('toms_wpl_1dbarcode_format')
var formatValue = TomS1DbarcodeFormat.getAttribute('data-index');
if( formatValue ){
    TomS1DbarcodeFormat.selectedIndex = formatValue;
}
