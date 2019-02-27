<?php

echo longestSubstring('fish', 'hish') . PHP_EOL; // 3
echo longestSubstring('vista', 'hish') . PHP_EOL; // 2

function longestSubstring($word1, $word2)
{
    $cell = [];

    $size1 = strlen($word1);
    $size2 = strlen($word2);
    $max = 0;

    for ($i = 0; $i < $size1; $i++) {
        for ($j = 0; $j < $size2; $j++) {
            if ($word1[$i] === $word2[$j]) {
                $upLeftVal = $cell[$i-1][$j-1] ?? 0;
                $cell[$i][$j] = $upLeftVal + 1;
                $max = $cell[$i][$j];
            } else {
                $cell[$i][$j] = 0;
            }
        }
    }

    return $max;
}
