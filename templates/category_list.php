<?php

$menu = $render['menu'];
echo '<a class="return_arrow" href="?action=admin">Powrót</a>';
foreach($menu['dishesCategory'] as $dishCategory)
{
    echo <<<DISH
    <div>
        <div class="category-admin-box">
            <p>{$dishCategory['name']}</p>
            <a class="edit" href="?action=edit_category&category={$dishCategory['id']}">edytuj</a>
        </div>
        <form method="POST" action="index.php?action=category_list" >
            <input type="text" value="{$dishCategory['id']}" name="id" hidden>
            <input name="action" type="submit" value="Usuń kategorię">
        </form>
    </div>
DISH;    
} 