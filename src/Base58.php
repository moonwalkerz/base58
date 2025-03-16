<?php
namespace MoonWalkerz\Base58;
/*
 * Class Base58
 * @package MoonWalkerz\Base58
 * @version 1.0.0
 */

class Base58
{
    private static $alphabet = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
    private static $base = 58;

    public static function encode($input)
    {
        if (strlen($input) === 0) {
            return '';
        }

        $bytes = array_values(unpack('C*', $input));
        $decimal = $bytes[0];

        for ($i = 1, $l = count($bytes); $i < $l; $i++) {
            $decimal = bcmul($decimal, 256);
            $decimal = bcadd($decimal, $bytes[$i]);
        }

        $output = '';
        while ($decimal >= self::$base) {
            $div = bcdiv($decimal, self::$base, 0);
            $mod = bcmod($decimal, self::$base);
            $output .= self::$alphabet[$mod];
            $decimal = $div;
        }

        if ($decimal > 0) {
            $output .= self::$alphabet[$decimal];
        }

        $output = strrev($output);

        foreach ($bytes as $byte) {
            if ($byte === 0) {
                $output = self::$alphabet[0] . $output;
            } else {
                break;
            }
        }

        return $output;
    }

    public static function decode($input)
    {
        if (strlen($input) === 0) {
            return '';
        }

        $indexes = array_flip(str_split(self::$alphabet));
        $chars = str_split($input);

        $decimal = $indexes[$chars[0]];

        for ($i = 1, $l = count($chars); $i < $l; $i++) {
            $decimal = bcmul($decimal, self::$base);
            $decimal = bcadd($decimal, $indexes[$chars[$i]]);
        }

        $output = '';
        while ($decimal > 0) {
            $byte = bcmod($decimal, 256);
            $output = pack('C', $byte) . $output;
            $decimal = bcdiv($decimal, 256, 0);
        }

        foreach ($chars as $char) {
            if ($char === self::$alphabet[0]) {
                $output = "\x00" . $output;
            } else {
                break;
            }
        }

        return $output;
    }
}
