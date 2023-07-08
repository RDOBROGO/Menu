<a class="return_arrow" href="?action=dishes_list">Powrót</a>
<?php

$dish = $render['dish'];
$skladniki = str_replace('</br>', '|', $dish['skladniki']);

echo <<<DISH
    <form action="index.php?action=dishes_list" method="post">
    <input type="text" name="id" value="{$dish['id']}" hidden>  
    <input type="text" name="nazwa" placeholder="Podaj nazwę" value="{$dish['danie']}">
    <input type="number" name="cena" placeholder="Podaj cenę" value="{$dish['cena']}">
    <input type="text" name="skladniki" placeholder="Podaj składniki rozdzielone znakiem '|'" value="{$skladniki}">

    <label for="kategoria">Wybierz kategorię</label>
    <select name="kategoria">
    DISH;
$menu = $render['menu'];

foreach($menu['dishesCategory'] as $dishCategory)
{   
    if($dishCategory['id'] == $dish['kategoria'])
    {
        echo '<option value="'.$dishCategory['id'].'" selected>'.$dishCategory['name'].'</option>';
    }
    else
    {
        echo '<option value="'.$dishCategory['id'].'">'.$dishCategory['name'].'</option>';
    }
}
?>
    </select>
    <input type="submit" name="action" value="Edytuj danie">
</form>