<?php
//画像が出力できるか判定　画像ない場合は「No Image」出力
function img_judge($img){

    $extension_list = array(".jpg", ".jpeg", ".JPG", ".JPEG", ".jpe", ".jfif", ".pjpeg", ".pjp", ".png", ".gif");//画像拡張子

    foreach ($extension_list as $extension){
        //当確の拡張子があればそのままブラウザに出力
        if (strpos($img, $extension) !== false){
            return $img;
        }
    }

    return 'img/noimage.png';


}

//画像のサイズを変更
function img_size($img){
    //「No image」の場合
    if($img == 'img/noimage.png'){
        return "width='640' height='360'";
    }
    
    //画像のサイズ情報を取得
    $image = getimagesize($img);
    if($image){
        $width = floor(360 * $image[0] / $image[1]);//heightのサイズを360pxに固定し、それに合わせた比率のwidthのサイズを設定(height：width=360:X)
        //widthのサイズが640pxを超えていたら640pxに固定
        if($width > 640){
            $width = 640;
        }
    }else{
        return "width='640' height='360'";
    }

    return "width='".$width."' height='360'";
}
?>