<?php
/**
 * Created by PhpStorm.
 * User: caoanhquan
 * Date: 2/5/16
 * Time: 11:43
 */

function php_redirect($url = '')
{
    header('Location: ' . base_url($url));
    die;
}

function get_current_time()
{
    return gmdate('Y-m-d H:i:s', time() + 7 * 3600);
}