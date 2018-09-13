<?php

class Game
{
    private $width;
    private $height;
    private $start;
    private $finish;
    private $path;
    private $steps;
    private $stepInversion;
    private $stepView;
    private $lengthPath;

    public function __construct($width, $height, $lengthPath)
    {
        $this->width = $width;
        $this->height = $height;
        $this->lengthPath = $lengthPath;
        $this->steps = [1 => ['i' => -1, 'j' => 0], 2 => ['i' => 0, 'j' => 1], 3 => ['i' => 1, 'j' => 0], 4 => ['i' => 0, 'j' => -1]];
        $this->stepInversion = [1 => 3, 3 => 1, 2 => 4, 4 => 2];
        $this->stepView = [1 => '&uArr;', 2 => '&rArr;', 3 => '&dArr;', 4 => '&lArr;'];
        $this->start = ['i'=>rand(1, $height),'j'=>rand(1, $width)];
        $this->pathGenerate($this->start['i'], $this->start['j']);
    }

    private function pathGenerate($i, $j)
    {
        $index = 0;
        $step = 0;
        while ($index < $this->lengthPath) {
            $possible = [];
            foreach ($this->steps as $key => $item) {
                if ($key != $step) {
                    $new_i = $i + $item['i'];
                    $new_j = $j + $item['j'];
                    if ($new_i >= 1 && $new_i <= $this->height && $new_j >= 1 && $new_j <= $this->width)
                        $possible[] = [$key => ['i' => $new_i, 'j' => $new_j]];
                }
            }
            $new_step = $possible[rand(0, Count($possible) - 1)];
            $this->path[] = $new_step;
            $i = $new_step[key($new_step)]['i'];
            $j = $new_step[key($new_step)]['j'];
            $step = $this->stepInversion[key($new_step)];
            $index++;
        }
        $this->finish = ['i' => $i, 'j' => $j];
        return true;
    }

    private function field()
    {
        $field = '';
        for ($i = 1; $i <= $this->height; $i++) {
            $field .= '<tr>';
            for ($j = 1; $j <= $this->width; $j++) {
                $field .= '<td class="' . (['i' => $i, 'j' => $j] == $this->start ? 's ' : '') . (['i' => $i, 'j' => $j] == $this->finish ? 'f' : '') . '">';
                //$field .= $i . ':' . $j;
                $field .= '</td>';
            }
            $field .= '</tr>';
        }
        return $field;
    }

    private function path()
    {
        $index = 0;
        $path = '<tr>';
        foreach ($this->path as $item) {
            $path .= '<td>' . $this->stepView[key($item)] . '</td>';
            $index++;
            if ($index == 5) {
                $path .= '</tr><tr>';
                $index = 0;
            }

        }
        $path .= '</tr>';
        return $path;
    }

    public function show()
    {
        $tpl = file_get_contents("./tpl/game.tpl");
        $tpl = preg_replace("/{field}/", $this->field(), $tpl);
        $tpl = preg_replace("/{path}/", $this->path(), $tpl);
        return $tpl;
    }
}

$width = 3;
$height = 3;
if (isset($_GET['width']) && isset($_GET['height']) && (int)$_GET['width'] > 0 && (int)$_GET['height'] > 0) {
    $width = (int)$_GET['width'];
    $height = (int)$_GET['height'];
}

echo (new Game($width, $height, 10))->show();
