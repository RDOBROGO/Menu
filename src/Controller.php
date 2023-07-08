<?php

declare(strict_types=1);

namespace App;

session_start();

require_once("View.php");
require_once("Database.php");

use App\Request;

class Controller
{
    private const DEFAULT_ACTION = 'list';

    private static array $configuration = [];

    private Database $database;
    private Request $request;
    private View $view;

    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;
    }

    public function __construct(Request $request)
    {
        $this->database = new Database(self::$configuration['db']);

        $this->request = $request;
        $this->view = new View();
    }

    public function run(): void
    {
        $render = [];
        
        switch ($this->postaction()) {
            case 'zaloguj się':
                $this->database->login($this->password());
                break;
            case 'Dodaj kategorię':
                $this->database->addCategory($this->category());
            break;
            case 'Usuń kategorię':
                $this->database->deleteCategory($this->id());
            break;
            case 'Usuń danie':
                $this->database->deleteDish($this->id());
            break;
            case 'Dodaj danie':
                $this->database->addDish($this->nazwa(), $this->cena(), $this->skladniki(), $this->kategoria());
            break;
            case 'Edytuj danie':
                $this->database->editDish($this->id(), $this->nazwa(), $this->cena(), $this->skladniki(), $this->kategoria());
            break;
            case 'Edytuj kategorię':
                $this->database->editCategory($this->id(), $this->nazwa());
            break;
            }

        switch ($this->getaction()) {
            case 'add_dish':
                $render = array(
                    'page' => 'add_dish',
                    'menu' => $this->database->getMenu()
                );
            break;
            case 'edit_dish':
                $render = array(
                    'page' => 'edit_dish',
                    'dish' => $this->database->getDish($this->getdish()),
                    'menu' => $this->database->getMenu()
                );
            break;
            case 'login':
                $render = array(
                    'page' => 'login',
                );
            break;
            case 'add_category':
                $render = array(
                    'page' => $this->isLoggedIn('add_category'),
                );
            break;
            case 'edit_category':
                $render = array(
                    'page' => $this->isLoggedIn('edit_category'),
                    'category' => $this->database->getCategory($this->getcategory()),
                );
            break;
            case 'category_list':
                $render = array(
                    'page' => $this->isLoggedIn('category_list'),
                    'menu' => $this->database->getMenu()
                );
            break;
            case 'dishes_list':
                $render = array(
                    'page' => $this->isLoggedIn('dishes_list'),
                    'menu' => $this->database->getMenu()
                );
            break;
            case 'logout':
                unset($_SESSION['user']);
                $render = array(
                    'page' => 'home',
                    'menu' => $this->database->getMenu()
                );
            break;
            default:
            $render = array(
                'page' => $this->isLoggedIn('admin'),
                'menu' => $this->database->getMenu()
            );
        }

        $this->view->render($render);

    }

    private function getaction(): string
    {
        return $this->request->getParam('action', self::DEFAULT_ACTION);
    }

    private function postaction(): string
    {
        return $this->request->postParam('action', self::DEFAULT_ACTION);
    }

    private function getdish(): string
    {
        return $this->request->getParam('dish', self::DEFAULT_ACTION);
    }

    private function getcategory(): string
    {
        return $this->request->getParam('category', self::DEFAULT_ACTION);
    }

    private function password(): string
    {
        return $this->request->postParam('password', self::DEFAULT_ACTION);
    }

    private function category(): string
    {
        return $this->request->postParam('name', self::DEFAULT_ACTION);
    }

    private function nazwa(): string
    {
        return $this->request->postParam('nazwa', self::DEFAULT_ACTION);
    }

    private function cena(): string
    {
        return $this->request->postParam('cena', self::DEFAULT_ACTION);
    }

    private function skladniki(): string
    {
        return $this->request->postParam('skladniki', self::DEFAULT_ACTION);
    }

    private function kategoria(): string
    {
        return $this->request->postParam('kategoria', self::DEFAULT_ACTION);
    }

    private function id(): string
    {
        return $this->request->postParam('id', self::DEFAULT_ACTION);
    }

    private function isLoggedIn($page): string
    {
        if (empty($_SESSION['user']))
        {
            $page = 'home';
        }
        return $page;
    }

}