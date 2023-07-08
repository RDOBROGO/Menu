<a class="return_arrow" href="?action=admin">Powrót</a>
<form action="index.php?action=dishes_list" method="post">
    <input type="text" name="nazwa" placeholder="Podaj nazwę" >
    <input type="number" name="cena" placeholder="Podaj cenę" >
    <input type="text" name="skladniki" placeholder="Podaj składniki rozdzielone znakiem '|'" >

    <label for="kategoria">Wybierz kategorię</label>
    <select name="kategoria">
<?php
$menu = $render['menu'];

foreach($menu['dishesCategory'] as $dishCategory)
{
    echo '<option value="'.$dishCategory['id'].'">'.$dishCategory['name'].'</option>';
}
?>
    </select>
    <input type="submit" name="action" value="Dodaj danie">
</form>