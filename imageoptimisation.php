<?php
function imageOptimizeMagick ($SrcImage){
    $imgInfo = getimagesize($SrcImage);
    $imagegif = 1;
    $imagejpeg = 2;
    $imagepng = 3;
    try {
        switch($imgInfo[2]){
            case ($imagegif):
                $im = new Imagick($SrcImage);
                $im->optimizeImageLayers();
                $im->writeImages($SrcImage,true);
                return true;
                break;
            case ($imagejpeg):
                $im = new Imagick($SrcImage);
                $im->setImageCompression(\Imagick::COMPRESSION_UNDEFINED);
                $im->setImageCompressionQuality(85);
                $im->optimizeImageLayers();
                $im->writeImage($SrcImage);
                return true;
                break;
            case ($imagepng):
                $im = new Imagick($SrcImage);
                $im->setImageCompression(\Imagick::COMPRESSION_UNDEFINED);
                $im->optimizeImageLayers();
                $im->writeImage($SrcImage);
                return true;
                break;
            default:
                return false;
        }
    }
    catch(Exception $e) {
        return false;
    }
}