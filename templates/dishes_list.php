<?php

$menu = $render['menu'];
echo '<a class="return_arrow" href="?action=admin">Powrót</a>';
foreach($menu['dishesCategory'] as $dishCategory)
{

    echo '<h2 class="dish-category">'.$dishCategory['name'].'</h2>';
    foreach($menu['dishes'] as $dish)
    {
        if($dish['kategoria'] == $dishCategory['id'])
        {
            echo <<<DISH
                <div class="dish-box">
                     <div class="dish-box-name-admin">
                        <h2>{$dish['danie']}</h2>
                        <a class="edit" href="?action=edit_dish&dish={$dish['id']}">Edytuj</a>
                        <form method="POST" action="index.php?action=dishes_list" >
                        <input type="text" value="{$dish['id']}" name="id" hidden>
                        <input name="action" type="submit" value="Usuń danie">
                    </form>
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