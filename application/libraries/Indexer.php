<?php

class Indexer
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function get_histogram_by_name($name)
    {
        $query = $this->CI->db->get_where('cbir_index', array('name' => $name));
        $row = $query->result();
        $histogram = json_decode($row[0]->histogram);
    }

    public function normalize_array(&$array)
    {
        $max = max($array);
        $min = min($array);
        $var = $max - $min;
        foreach ($array as &$value) {
            $value = ($value - $min)/$var;
        }
    }

    public function convert_grayscale($name = '301.jpg'){
        $grayscale = [];
        for ($i = 0; $i < 256; $i++) {
            $grayscale[$i] = 0;
        }
//        $filename = base_url() . '/images/' . $name;
        $filename_grayscale = base_url() . '/images/grayscale/' . $name;

        $this->CI->converter->convert_to_grayscale($name);
        $image = imagecreatefromjpeg($filename_grayscale);

        list($width, $height) = getimagesize($filename_grayscale);
        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $rgb = imagecolorat($image, $x, $y);
                $colors = imagecolorsforindex($image, $rgb);
                $grayscale[$colors['red']] += 1;
                //var_dump($colors);
            }
        }
        $this->normalize_array($grayscale);
        return $grayscale;
    }
    public function convert_all_grayscale($map)
    {
        $total = count($map);
        $current = 0;
        $percent = round($current / $total * 100);
        $alert = "$current is $percent% of $total";
        foreach ($map as &$name) {

            $histogram = json_encode($this->convert($name));

            $grayscale = json_encode($this->convert_grayscale($name));

            $url = base_url('images/' . $name);
            $url_grayscale = base_url('images/grayscale/'.$name);


            $data = array(
                'name' => $name,
                'histogram' => $histogram,
                'url' => $url,
                'url_grayscale' => $url_grayscale,
                'grayscale' => $grayscale
            );
            $this->CI->db->insert('cbir_index', $data);
            $current++;
            if ($percent < round($current / $total * 100)) {
                $percent = round($current / $total * 100);

                echo "<span style='position: absolute;z-index:$current;background:#FFF;'>Indexing:" . $percent . "% </span>";
                echo(str_repeat(' ', 256));
                if (@ob_get_contents()) {
                    @ob_end_flush();
                }
                flush();
            }
        }

    }

    public function convert($name = '301.jpg')
    {

        $red = [];
        $green = [];
        $blue = [];
        for ($i = 0; $i < 256; $i++) {
            $red[$i] = 0;
            $green[$i] = 0;
            $blue[$i] = 0;
        }

        //echo '<img src="../../images/300.jpg" width="300" height="300">';
        $filename = base_url() . '/images/' . $name;
//        $filename = './images/301.jpg';
        //echo $filename;
        $image = imagecreatefromjpeg($filename);

        //Get the new dimentsion
        list($width, $height) = getimagesize($filename);
        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $rgb = imagecolorat($image, $x, $y);
                $colors = imagecolorsforindex($image, $rgb);
                $red[$colors['red']] += 1;
                $green[$colors['green']] += 1;
                $blue[$colors['blue']] += 1;
                //var_dump($colors);
            }
        }

        $this->normalize_array($red);
        $this->normalize_array($green);
        $this->normalize_array($blue);

        $data['red'] = $red;
        $data['blue'] = $blue;
        $data['green'] = $green;

        return $data;
    }

    public function get_all_image($dir)
    {
        $map = directory_map($dir);
        return $map;
    }

    public function convert_all($map)
    {
        $total = count($map);
        $current = 0;
        $percent = round($current / $total * 100);
        $alert = "$current is $percent% of $total";
        foreach ($map as &$name) {
            $histogram = json_encode($this->convert($name));
            $url = base_url('images/' . $name);
            $data = array(
                'name' => $name,
                'histogram' => $histogram,
                'url' => $url
            );
            $this->CI->db->insert('cbir_index', $data);
            $current++;
            if ($percent < round($current / $total * 100)) {
                $percent = round($current / $total * 100);

                echo "<span style='position: absolute;z-index:$current;background:#FFF;'>Indexing:" . $percent . "% </span>";
                echo(str_repeat(' ', 256));
                if (@ob_get_contents()) {
                    @ob_end_flush();
                }
                flush();
            }
        }

    }
}