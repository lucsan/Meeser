<?php

function htmlize($data)
{
    $style = include 'tools/styles.php';
    $data = htmlizeData($data);
    $html = '';
    $html .= '<html>' . PHP_EOL;
    $html .= '<head>' . PHP_EOL;
    $html .= $style . PHP_EOL;
    $html .= '</head>' . PHP_EOL;
    $html .= $data;

    $html .= '</html>';

    return $html;
}

function htmlizeData($data, $class = '')
{
    $html = '';
    if (is_string($data)) {
        $subject = paragraphize($data);
    }

    if (is_array($data)) {
        $subject = listize($data);
    }

    $html .= '<div class="' . $class . '">' . PHP_EOL . $subject . '</div>' . PHP_EOL;
    return $html;
}

function listize($data)
{
    $html = '';
    $html .= '<ul>' . PHP_EOL;
    foreach ($data as $title => $item) {
        $html .= '<li>';
        if (is_string($title)) {
            $html .= '<span class="title">' . $title . '</span> - ';
        }
        $html .= '<span class="item">' . $item . '</span>' . PHP_EOL;
    }
    $html .= '</ul>' . PHP_EOL;
    return $html;
}

function paragraphize($data)
{
    $lines = explode("\n", $data);
    $paras = '';
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line != null) {
            $paras .= "<p>{$line}</p>" .PHP_EOL;
        }
    }
    return $paras;
}

function formize()
{

}

function wraphtml()
{

}

function formizeData($data, $class = '')
{
    $html = '';
    if (is_string($data)) {
        $html .= "<textarea>{$data}</textarea>";
    }
    return $html;
}
