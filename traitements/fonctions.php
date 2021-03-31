<?php

function CoupePhrase($txt, $long = 20){
    if(strlen($txt) <= $long)
     return $txt;
    $txt = substr($txt, 0, $long);
    return substr($txt, 0, strrpos($txt, ' ')).'...';
   }