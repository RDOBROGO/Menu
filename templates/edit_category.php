<a class="return_arrow" href="?action=category_list">Powrót</a>
<?php
$category = $render['category'];
echo <<<DISH
    <form action="index.php?action=category_list" method="post">
    <input type="text" name="id" value="{$category['id']}" hidden>  
    <input type="text" name="nazwa" placeholder="Podaj nazwę" value="{$category['name']}">
    DISH;
?>
    </select>
    <input type="submit" name="action" value="Edytuj kategorię">
</form>