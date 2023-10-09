<?php

function echoSortButton()
{
    $sortButton = <<<EOT
        <div class="dropdown">
            <div class="select">
                <span class="selected">sort</span>
                <div class="caret"></div>
            </div>
            <ul class="menu-sort">
                <li category="none" data-sort="none">none</li>
                <li category="alphabet" data-sort="desc">alphabet desc</li>
                <li category="alphabet" data-sort="asc">alphabet asc</li>
                <li category="rating" data-sort="desc">rating desc</li>
                <li category="rating" data-sort="asc">rating asc</li>
            </ul>
        </div>
    EOT;
    
    echo $sortButton;
}
?>