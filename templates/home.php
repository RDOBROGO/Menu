<?php

$menu = $render['menu'];

foreach($menu['dishesCategory'] as $dishCategory)
{
    echo '<h2 class="dish-category">'.$dishCategory['name'].'</h2>';
    foreach($menu['dishes'] as $dish)
    {
        if($dish['kategoria'] == $dishCategory['id'])
        {
            echo <<<DISH
                <div class="dish-box">
                     <div class="dish-box-name">
                        <h2>{$dish['danie']}</h2>
                        <p>{$dish['cena']} zł</p>
                    </div>
            DISH;
            if($dish['skladniki']){
                echo <<<DISH
                    <h3>Składniki:</h3>
                    <p>{$dish['skladniki']}</p>
                DISH;
            }
            echo '</div>';
        }
    }
} 

