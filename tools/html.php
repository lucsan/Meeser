<?php

function htmlize($data)
{
    $data = htmlizeData($data);
    $html = '';
    $html .= '<html>' . PHP_EOL;

    $html .= $data;

    $html .= '</html>';

    return $html;
}

function formize()
{

}

function wraphtml()
{

}

function htmlizeData($data, $class = '')
{
    $html = '';
    if (is_string($data)) {
        $html .= "<div class=\"{$class}\">{$data}</div>" . PHP_EOL;
    }
    return $html;
}

function formizeData($data, $class = '')
{
    $html = '';
    if (is_string($data)) {
        $html .= "<textarea>{$data}</textarea>";
    }
    return $html;
}
