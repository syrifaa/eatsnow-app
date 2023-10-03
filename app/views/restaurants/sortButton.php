<?php

function echoSortButton()
{
    $sortButton = <<<EOT
        <div class="dropdown">
            <div class="select">
                <span class="selected">alphabet</span>
                <div class="caret"></div>
            </div>
            <ul class="menu-sort">
                <li class="active">alphabet</li>
                <li>rating</li>
                <li>review</li>
            </ul>
        </div>
    EOT;
    
    echo $sortButton;
}
?>
