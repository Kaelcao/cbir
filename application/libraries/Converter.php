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
        $imgw = imagesx($image);
        $imgh = imagesy($image);

        for ($i=0; $i<$imgw; $i++)
        {
            for ($j=0; $j<$imgh; $j++)
            {

                // get the rgb value for current pixel

                $rgb = ImageColorAt($image, $i, $j);

                // extract each value for r, g, b

                $rr = ($rgb >> 16) & 0xFF;
                $gg = ($rgb >> 8) & 0xFF;
                $bb = $rgb & 0xFF;

                // get the Value from the RGB value

                $g = round(($rr + $gg + $bb) / 3);

                // grayscale values have r=g=b=g

                $val = imagecolorallocate($image, $g, $g, $g);

                // set the gray value

                imagesetpixel ($image, $i, $j, $val);
            }
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