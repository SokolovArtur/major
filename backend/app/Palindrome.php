<?php

namespace App;

class Palindrome
{
    public static function findPalindromeByManacker($str) {
        $ans = [];
        $leftBorder = 0;
        $rightBorder = -1;
        $foundPalindrome = [];

        for ($i = 0; $i < strlen($str); ++$i) {
            $tempMirror = ($i > $rightBorder ? 0 : min($ans[$leftBorder + $rightBorder - $i], $rightBorder - $i)) + 1;
            while($i + $tempMirror < strlen($str) && $i - $tempMirror >= 0 && $str[$i - $tempMirror] == $str[$i + $tempMirror]) {
                ++$tempMirror;
            }
            $ans[$i] = --$tempMirror;

            if ($ans[$i] > 0) {
                $foundPalindrome[] = substr($str, $i - $ans[$i], $ans[$i] * 2 + 1);
            }

            if($i + $tempMirror > $rightBorder) {
                $leftBorder = $i - $tempMirror;
                $rightBorder = $i + $tempMirror;
            }
        }
        return $foundPalindrome;
    }
}
