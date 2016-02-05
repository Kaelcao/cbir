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

function random($length = 10, $char = FALSE)
{
    if ($char == FALSE) $s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwyz0123456789!@#$%^&*()';
    else $s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwyz0123456789';
    mt_srand((double)microtime() * 1000000);
    $salt = '';
    for ($i = 0; $i < $length; $i++) {
        $salt = $salt . substr($s, (mt_rand() % (strlen($s))), 1);
    }
    return $salt;
}

function get_current_time()
{
    return gmdate('Y-m-d H:i:s', time() + 7 * 3600);
}