<?php
if (!function_exists('containsCaseInsensitive')) {
    function containsCaseInsensitive($haystack, $needle)
    {
        return stripos($haystack, $needle) !== false;
    }
}

if (!function_exists('extractAndParseDigits')) {
    function extractAndParseDigits($string)
    {
        // Use regular expression to extract digits from the string
        preg_match_all('/\d+/', $string, $matches);
        if (empty($matches[0])) {
            return null;
        }

        $parsedNumber = doubleval(implode('', $matches[0]));

        return $parsedNumber;
    }
}
