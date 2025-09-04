<?php
    function heapify(array &$list, int $n, int $i)
    {
        $largest = $i;
        $leftChild = 2 * $i + 1;
        $rightChild = 2 * $i + 2;

        if ($leftChild < $n && $list[$leftChild] > $list[$largest]) {
            $largest = $leftChild;
        }

        if ($rightChild < $n && $list[$rightChild] > $list[$largest]) {
            $largest = $rightChild;
        }

        if ($largest !== $i) {
            [$list[$i], $list[$largest]] = [$list[$largest], $list[$i]];
            heapify($list, $n, $largest);
        }
    }

    function execHeapSort(array $list): array
    {
        $n = count($list);

        for ($i = floor($n / 2) - 1; $i >= 0; $i--) {
            heapify($list, $n, $i);
        }

        for ($i = $n - 1; $i > 0; $i--) {
            [$list[0], $list[$i]] = [$list[$i], $list[0]];
            heapify($list, $i, 0);
        }

        return $list;
    }

    // ソートを検証する際には$numbersを書き換えてね
    $numbers = [9, 2, 7, 5, 1, 8, 3, 6, 4];
    $timeStart = microtime(true);

    $result = execHeapSort($numbers);
    $timeEnd = microtime(true);

    print_r("ソート実行前\n");
    print_r($numbers);

    print_r("ソート実行後\n");
    print_r($result);

    // numbersの数が少ないと0秒表示になる
    $time = $timeEnd - $timeStart;
    printf("処理時間: %.4f 秒", $time);
?>
