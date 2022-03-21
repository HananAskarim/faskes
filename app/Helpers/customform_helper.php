<?php

function input_text($a, $b, $c = '', $d = '')
{
    if (!is_array($c)) {

        if ($c != '') {
            $c = ' ' . $c;
        }
        if ($d != '') {
            $d = ' ' . $d;
        }
        return '<input type="text" name="' . $a . '" value="' . $b . '" class="form-control' . $c . '"' . $d . '>' . "\n";
    } else {
        $set = '';
        foreach ($c as $key => $value) {
            $set .= ' ' . $key . '="' . $value . '" ';
        }
        $c = $set;
        return '<input type="text" name="' . $a . '" value="' . $b . '" ' . $c . '>' . "\n";
    }
}
