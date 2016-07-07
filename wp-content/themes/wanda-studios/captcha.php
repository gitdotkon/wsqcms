<?php
include '../../../wp-load.php';
define ( 'DOCUMENT_ROOT', dirname ( __FILE__ ) );
define("img_dir", get_template_directory()."/images/captcha/");
function generate_code(){
    $chars = 'abdefhknrstyz23456789';
    $length = 4;
    $numChars = strlen($chars);
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $str .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    $array_mix = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
    srand ((float)microtime()*1000000);
    shuffle ($array_mix);
    return implode("", $array_mix);
}
$captcha = generate_code();

$cookie = md5($captcha);
$cookietime = time()+1200;
setcookie("captcha", $cookie, $cookietime);
$_SESSION['captcha'] = $cookie;
function img_code($code){
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s", 10000) . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Content-Type:image/png");
    $img_arr = array(
        "bg.png"
    );
    $font_arr = array();
    $font_arr[0]["fname"] = "captcha-font.ttf";
    $font_arr[0]["size"] = rand(20, 30);

    $n = 0;
    $img_fn = $img_arr[0];
    $im = imagecreatefrompng (img_dir . $img_fn);

    $color = imagecolorallocate($im, rand(0, 200), 0, rand(0, 200));

    $x = rand(0, 35);
    for($i = 0; $i < strlen($code); $i++) {
        $x+=15;
        $letter=substr($code, $i, 1);
        $color = imagecolorallocate($im, rand(0, 200), 0, rand(0, 200));
        imagettftext($im, $font_arr[0]["size"], rand(2, 4), $x, rand(40, 42), $color, img_dir . $font_arr[0]["fname"], $letter);
    }
    imagepng($im); //, img_dir . 'c.png'
    imagedestroy($im);
}
img_code($captcha);
