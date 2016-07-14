<?php
/**
 * Map for Contact us
 */
$latitude = get_field('latitude');
$longitude = get_field('longitude');
?>
<div id="map"></div>
<script>
    var lat = <?php echo $latitude; ?>;// 120.381916;
    var lng = <?php echo $longitude; ?>;//36.067874;
    var map;
    function include(url) {
        console.log(url);
        var script = document.createElement('script');
        script.src = url;
        document.getElementsByTagName('head')[0].appendChild(script);
    }
    function baidumap() {

        // 百度地图API功能
        var map = new BMap.Map("map");    // 创建Map实例
        map.centerAndZoom(new BMap.Point(lat, lng), 14);  // 初始化地图,设置中心点坐标和地图级别
        window.onresize = function () {
            map.centerAndZoom(new BMap.Point(lat, lng), 14);
        }
        //map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
        map.setCurrentCity("青岛");          // 设置地图显示的城市 此项是必须设置的
        map.setMapStyle({style: 'grayscale'});
        //map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
        var pt = new BMap.Point(lat, lng);
        var icon = new BMap.Icon("<?php echo get_template_directory_uri(); ?>/images/marker.png", new BMap.Size(88, 96));
        var marker = new BMap.Marker(pt, {icon: icon});  // 创建标注
        map.addOverlay(marker);              // 将标注添加到地图中


    }
    function startGoogle(){
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: lng, lng: lat},
            zoom: 14,
            disableDefaultUI: true
        });
        var marker = new google.maps.Marker({
            position: {lat: lng, lng: lat},
            map: map,
            icon: "<?php echo get_template_directory_uri(); ?>/images/marker.png"
        });
    }

    (function($){
        var ln_code = '<?php echo ICL_LANGUAGE_CODE; ?>';
        var google_code = '<?php echo get_field('google_key', 'options'); ?>';
        var baidu_code = '<?php echo get_field('baidu_key', 'options'); ?>';
        $(document).ready(function(){
            var lastI = window.location.href.lastIndexOf('/');
            var url = window.location.href.substr(0, lastI) + '/';
            //include("http://api.map.baidu.com/api?v=2.0&ak=TB3D2e9o1VG3a3W3vtY2Gpvy&callback=baidumap");
            if(ln_code == 'zh-hans' || ln_code == 'zh-hant'){
                include("http://api.map.baidu.com/api?v=2.0&ak="+baidu_code+"&callback=baidumap");
            }else{
                include("https://maps.googleapis.com/maps/api/js?key="+google_code+"&callback=startGoogle");
            }

//            $.post(url+'map-handler.php', {}, function(response){
//
////                if(response == '"CN"'){
////                    include("http://api.map.baidu.com/api?v=2.0&ak=sX1DeOVEBoEkLxPYeVHsOE5TyWjRL6EX&callback=baidumap");
////                }else{
////                    include("https://maps.googleapis.com/maps/api/js?key=AIzaSyCDmCazLvO0xY8eFPd_6uOPYqCEm8090Xg&callback=startGoogle");
////                }
//            });
        });
    })(jQuery);
</script>
