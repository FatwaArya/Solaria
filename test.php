<?php
function str_after($str, $search)
{
    return $search === '' ? $str : array_reverse(explode($search, $str, 3))[0];
}

echo str_after('product_img/fatwa@admin/saturn.png', '/');
