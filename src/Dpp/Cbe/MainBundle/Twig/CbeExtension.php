<?php
namespace Dpp\Cbe\MainBundle\Twig;

class CbeExtension extends \Twig_Extension
{
    public function getFilters() {

        return array(
            new \Twig_SimpleFilter( 'cbe_menuLink', array( $this, 'menuLinkFilter')),
        );
    }

    public function menuLinkFilter( $linkText, $wordsPerLine = 2) {

        $returnVal = $linkText;

        if( is_string( $linkText)) {

            $words = str_word_count( $linkText, 2, '0123456789&;éà\'è?!.');
            $wordTab = array();
            $weight = 0.0;

            foreach( $words as $position => $word){

                $wLen = strlen( $word);
                $weight += $wLen <= 3 ? ( $wLen == 1 ? 0 : 0.5) : 1; //less than 3 characters is like half a word.
                $wordTab[] = array( 'weight' => $weight, 'word' => $word, 'position' => $position);
            }

            $finalWordTab = array();
            $breakNum = 1;
            $startPos = 0;
            $nbWords = count( $wordTab);

            if( $weight <= $wordsPerLine){

                $indBreak = floor( 2 * $nbWords / 3);

                foreach( $wordTab as $ind => $wordData){

                    $wordStr = $wordData['word'];
                    $wordPos = $wordData['position'];

                    $wordSize = strlen( $wordStr);
                    $betweenSize = $wordPos - $startPos;
                    $subStrSize = $betweenSize  + $wordSize;

                    $finalWordTab[] = ( $str = substr( $linkText, $startPos, $betweenSize)) == false  ? '' : $str;

                    if( $ind == $indBreak) $finalWordTab[] = ''.PHP_EOL;

                    $finalWordTab[] = substr( $linkText, $wordPos, $wordSize);

                    $startPos += $subStrSize;
                }
            }
            else{

                foreach( $wordTab as $ind => $wordData){

                    $wordWeight = $wordData['weight'];
                    $wordStr = $wordData['word'];
                    $wordPos = $wordData['position'];

                    $wordSize = strlen( $wordStr);
                    $subStrSize = $wordPos - $startPos  + $wordSize;
                    $seuil = $breakNum * $wordsPerLine;

                    if( $wordWeight < $seuil){

                        $finalWordTab[] = substr( $linkText, $startPos, $subStrSize);
                        $startPos += $subStrSize;
                        continue;
                    }

                    $addBefore = ( $wordWeight > $seuil);

                    $breakPos = $addBefore ? $wordPos - 1 : $wordPos + $wordSize - 1;
                    $breakDistance = $breakPos - $startPos + 1;

                    $finalWordTab[] = substr( $linkText, $startPos, $breakDistance);

                    if( $ind != ( $nbWords - 1) || $addBefore) $finalWordTab[] = ''.PHP_EOL;

                    $startPos += $breakDistance;

                    if( $addBefore){

                        $finalWordTab[] = substr( $linkText, $wordPos, $wordSize);
                        $startPos = $wordPos + $wordSize;
                    }

                    $breakNum++;
                }
            }

            $returnVal = implode( $finalWordTab);
        }

        return $returnVal;
    }

    public function getName() {

        return 'cbe_extension';
    }
}
