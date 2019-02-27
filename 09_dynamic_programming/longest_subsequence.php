<?php

echo longestSubsequence('fosh', 'fish') . PHP_EOL; // 3
echo longestSubsequence('fosh', 'fort') . PHP_EOL; // 2
echo longestSubsequence('', 'fort') . PHP_EOL; // 0

function longestSubsequence($word1, $word2)
{
    $cell = [];

    $size1 = strlen($word1);
    $size2 = strlen($word2);

    $j = 0;
    for ($i = 0; $i < $size1; $i++) {
        for ($j = 0; $j < $size2; $j++) {
            if ($word1[$i] === $word2[$j]) {
                $upLeftVal = $cell[$i-1][$j-1] ?? 0;
                $cell[$i][$j] = $upLeftVal + 1;
            } else {
                $previousVal = $cell[$i][$j-1] ?? 0;
                $upVal = $cell[$i-1][$j] ?? 0;
                $cell[$i][$j] = max($upVal, $previousVal);
            }
        }
    }

    return $cell[$i-1][$j-1] ?? 0;
}
