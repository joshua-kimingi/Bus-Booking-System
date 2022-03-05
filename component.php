<?php

function buttonElement($btnid,$text,$name,$attr){
    $btn="
    <button name='$name''$attr'id='$btnid'>$text</button>
    ";
    echo $btn;
}

?>
