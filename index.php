<?php

/***************************************************/
// Assignment 1: Subsequence
// Solution provided by: Nikolche Vishinoski
/***************************************************/

class Subsequence
{
    protected int $start;
    protected int $end;
    protected int $subsequence;

    // Setter methods
    public function set_start(int $start):void{
        $this->start = $start;
    }
    public function set_end(int $end):void{
        $this->end = $end;
    }
    public function set_subsequence(int $subsequence):void{
        $this->subsequence = $subsequence;
    }

    // Getter methods
    public function get_start():int{
        return $this->start;
    }
    public function get_end():int{
        return $this->end;
    }
    public function get_subsequence():int{
        return $this->subsequence;
    }

    protected function is_inclusive(int $subseq, int $num): bool
    {
        $subseqstr = (string)$subseq;
        $numstr = (string)$num;

        $subseqlen = strlen($subseqstr);
        $numlen = strlen($numstr);

        $j = 0;

        for ($i = 0; $i < $numlen; $i++) {
            if ($subseqstr[$j] == $numstr[$i]) {
                $j++;
            }
            if ($subseqlen == $j) {
                return true;
            }
        }

        return false;
    }

    public static function count(int $a, int $b, int $c): int
    {
        $subsequence = new self();
        $subsequence->set_start($a);
        $subsequence->set_end($b);
        $subsequence->set_subsequence($c);

        $inclusive_numbers = [];

        for ($i = $a; $i <= $b; $i++) {
            if ($subsequence->is_inclusive($c, $i)) {
                $inclusive_numbers[] = $i;
            }
        }


        return count($inclusive_numbers);
    }
}

// Running tests

function run_tests(): void
{
    echo Subsequence::count(26, 69, 3);
    echo "<br/>";
    echo Subsequence::count(11, 100, 4);
    echo "<br/>";
    echo Subsequence::count(77, 78, 4);
    echo "<br/>";
    echo Subsequence::count(13834, 26066, 1380);
    echo "<br/>";
    echo Subsequence::count(1, 1000000, 1);
    echo "<br/>";
    echo Subsequence::count(25272, 31576, 757);
    echo "<br/>";
    echo Subsequence::count(23051, 27967, 62);
    echo "<br/>";
    echo Subsequence::count(6122, 30043, 8);
    echo "<br/>";
    echo Subsequence::count(10, 999999, 46);
    echo "<br/>";
    echo Subsequence::count(9, 6405, 95);
}

run_tests();
