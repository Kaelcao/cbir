<?php

/**
 * Created by PhpStorm.
 * User: caoan
 * Date: 11/22/2015
 * Time: 3:05 PM
 */
class Converter
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    /**
     * Return the img tag of grayscale image
     * and put the grayscale image under images/grayscale
     * @param $filename
     * @return string
     */
    public function convert_to_grayscale($filename)
    {
        $destination = 'images/grayscale/'.$filename;
        $filename = base_url() . '/images/' . $filename;
        $image = imagecreatefromjpeg($filename);
        if (imageistruecolor($image)) {
            imagetruecolortopalette($image, true, 256);
        }

        for ($c = 0; $c < imagecolorstotal($image); $c++) {
            $col = imagecolorsforindex($image, $c);
            var_dump($col);
            $gray = ($col['red'] + $col['green'] +$col['blue'])/3;
            imagecolorset($image, $c, $gray, $gray, $gray);
        }
//        imagefilter($image, IMG_FILTER_GRAYSCALE);
        imagejpeg($image,$destination);
//        $rgb = imagecolorat($image, 10, 15);
//        $r = ($rgb >> 16) & 0xFF;
//        $g = ($rgb >> 8) & 0xFF;
//        $b = $rgb & 0xFF;
//
//        var_dump($r, $g, $b);
        return "<img src='".base_url()."/".$destination."'/>";

    }

}