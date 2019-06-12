<?php

namespace App\Http\Controllers;

use App\Palindrome;

class PalindromeController extends Controller
{
    public function getAllPalindromes($value) {
        return Palindrome::findPalindromeByManacker($value);
    }
}
