<?php

declare(strict_types=1);

namespace App;

use PDO;

class Database
{
    private PDO $conn;

    public function __construct(array $config)
    {
            $this->createConnection($config);
    }

    public function login($pass): void
    {
            $query = "SELECT haslo FROM user";
            $result = $this->conn->query($query);
            $users = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($users ?? [] as $data):
                if($pass == $data['haslo']) {
                    $_SESSION['user'] = 'admin';
                }
            endforeach;
    }

    public function getMenu(): array
    {
        $menu =[];

        $query1 = "SELECT * FROM dishes";
        $query2 = "SELECT * FROM dishes_category";

        $result1 = $this->conn->query($query1);
        $result2 = $this->conn->query($query2);

        $dishes = $result1->fetchAll(PDO::FETCH_ASSOC);
        $dishesCategory = $result2->fetchAll(PDO::FETCH_ASSOC);

        $menu = array(
            'dishes' => $dishes,
            'dishesCategory' => $dishesCategory,
        );

        return $menu;
    }

    public function getDish($id): array
    {
        $dish =[];
        $query = "SELECT * FROM dishes WHERE id=$id";
        $result = $this->conn->query($query);
        $dish = $result->fetchAll(PDO::FETCH_ASSOC);

        return $dish[0];
    }

    public function getCategory($id): array
    {
        $category =[];
        $query = "SELECT * FROM dishes_category WHERE id=$id";
        $result = $this->conn->query($query);
        $category = $result->fetchAll(PDO::FETCH_ASSOC);

        return $category[0];
    }

    public function editDish($id, $name, $cena, $skladniki, $kategoria): void
    {
        $skladniki = str_replace('|', '</br>', $skladniki);
        $query = "UPDATE `dishes` SET `danie` = '$name', `cena` = '$cena', `skladniki` = '$skladniki', `kategoria` = '$kategoria' WHERE `dishes`.`id` = $id;";
        $result = $this->conn->query($query);
        $dish = $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editCategory($id, $name): void
    {
        $query = "UPDATE `dishes_category` SET `name` = '$name' WHERE `dishes_category`.`id` = $id;";
        $result = $this->conn->query($query);
        $dish = $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCategory($name): void
    {
        $query = "INSERT INTO `dishes_category` (`id`, `name`) VALUES (NULL, '$name');";
        $result = $this->conn->query($query);
    }

    public function addDish($name, $cena, $skladniki, $kategoria): void
    {
        $skladniki = str_replace('|', '<br>', $skladniki);
        $query = "INSERT INTO `dishes` (`id`, `danie`, `kategoria`, `cena`, `skladniki`) VALUES (NULL, '$name', '$kategoria', '$cena', '$skladniki');";
        $result = $this->conn->query($query);
    }

    public function deleteCategory($id): void
    {
        $query = "DELETE FROM `dishes_category` WHERE `dishes_category`.`id` = $id;";
        $result = $this->conn->query($query);
    }

    public function deleteDish($id): void
    {
        $query = "DELETE FROM `dishes` WHERE `dishes`.`id` = $id;";
        $result = $this->conn->query($query);
    }

    private function createConnection(array $config): void
    {
        $dsn = "mysql:dbname={$config['database']};host={$config['host']}";
        $this->conn = new PDO(
            $dsn,
            $config['user'],
            $config['password']
        );
    }
    
}