<?php

function walkDir(
    $basePath,
    $allowedExtensions = array()
){
    $dirs = array();
    $files = array();
    foreach( scandir($basePath) as $item ){
        if(
            is_dir($item)
        ){
            $dirs[] = $item;
        }else if(
            in_array(
                pathinfo($item,PATHINFO_EXTENSION),
                $allowedExtensions
            )
        ){
            $files[] = $item;
        };
    }
    $items = array_merge( $dirs, $files );
    $list = '<ul>';
    foreach( $items as $item ){
        if(
            '.' !== $item
            && '..' !== $item
        ){
            $text = htmlspecialchars($item);
            $m=pathinfo($item);
            $list .= '<li'. (
                is_dir($item)
                    ? ('>' . $text . walkDir($item,$allowedExtensions))
                    : (' class="ext-' . $m[PATHINFO_EXTENSION] . '"><a href="#' . urlencode($m[PATHINFO_FILENAME]) .'">'. $text .'</a>')
            ).'</li>';
        }
    };
    $list .= '</ul>';
    return $list;
}

// Recursive:
echo walkDir('.',['js']);

