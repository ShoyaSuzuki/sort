<?php
    function execQuickSort(array $list): array
    {
        if (count($list) <= 1) {
            return $list;
        }
        $pivot = $list[0];
        $left = [];
        $right = [];
        for ($i = 1; $i < count($list); $i++) {
            if ($list[$i] < $pivot) {
                $left[] = $list[$i];
            } else {
                $right[] = $list[$i];
            }
        }
        return array_merge(execQuickSort($left), [$pivot], execQuickSort($right));
    }

    // ソートを検証する際には$numbersを書き換えてね
    $numbers = [9, 2, 7, 5, 1, 8, 3, 6, 4];
    $timeStart = microtime(true);

    $result = execQuickSort($numbers);
    $timeEnd = microtime(true);

    print_r("ソート実行前\n");
    print_r($numbers);

    print_r("ソート実行後\n");
    print_r($result);

    // numbersの数が少ないと0秒表示になる
    $time = $timeEnd - $timeStart;
    printf("処理時間: %.4f 秒", $time);
?>
