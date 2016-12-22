<?php
/**
 * Created by PhpStorm.
 * User: Dpp
 * Date: 22/08/2015
 * Time: 19:28
 */

namespace Dpp\Cbe\MainBundle;


class CommonFunctionManager {


    function strToUrl( $str) {

        $unWantedChars = array(
            'Ă'=>'A', 'À'=>'A', 'Ã'=>'A', 'Á'=>'A', 'Æ'=>'AE', 'Â'=>'A', 'Å'=>'A', 'Ä'=>'A',
            'â'=>'a', 'ǎ'=>'a', 'á'=>'a', 'ă'=>'a', 'ã'=>'a', 'Ǎ'=>'A', 'А'=>'A', 'å'=>'a', 'à'=>'a', 'Ǻ'=>'A', 'Ā'=>'A',
            'é'=>'e', 'Е'=>'E', 'ĕ'=>'e', 'ē'=>'e', 'Ē'=>'E', 'Ė'=>'E', 'ė'=>'e', 'ě'=>'e', 'Ě'=>'E',
            'î'=>'i', 'ï'=>'i', 'í'=>'i', 'ì'=>'i', 'Ĭ'=>'I', 'ĩ'=>'i', 'ǐ'=>'i', 'Ĩ'=>'I', 'Ǐ'=>'I',
            'о'=>'o', 'О'=>'O', 'ő'=>'o', 'õ'=>'o', 'ô'=>'o', 'Ő'=>'O', 'ŏ'=>'o', 'Ŏ'=>'O', 'Ō'=>'O', 'ō'=>'o', 'ǒ'=>'o', 'ò'=>'o',
            'ū'=>'u', 'Ũ'=>'U', 'ũ'=>'u', 'Ū'=>'U', 'Ǔ'=>'U', 'ų'=>'u', 'Ų'=>'U', 'ŭ'=>'u', 'Ŭ'=>'U', 'Ů'=>'U', 'ů'=>'u', 'ű'=>'u', 'Ű'=>'U', 'Ǖ'=>'U', 'ǔ'=>'u', 'Ǜ'=>'U', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ǚ'=>'u', 'ǜ'=>'u', 'Ǚ'=>'u', 'Ǘ'=>'u', 'ǖ'=>'u', 'ǘ'=>'u', 'ü'=>'u',
            'ŷ'=>'y', 'ý'=>'y', 'ÿ'=>'y', 'Ÿ'=>'y', 'Ŷ'=>'y',
        );

        $pattern = array( '/[^a-zA-Z0-9]+/', '/_$/', '/^_/');
        $replacement = array( '_');
        $subject = strtolower(  strtr( $str, $unWantedChars));
        $pathurl = preg_replace( $pattern, $replacement, $subject);

        return $pathurl;
    }
}