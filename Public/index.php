<?php
require_once __DIR__ . '/../Controllers/BookController.php';

$action = $_GET['action'] ?? 'books';
$controller = new BookController();

switch ($action) {
    case 'books':
        $controller->index();
        break;

    case 'create':
        $controller->create();
        break;

    case 'store':
        $controller->store();
        break;

    case 'delete':
        $controller->delete();
        break;

    case 'archive':
        $controller->archive();
        break;

    case 'movies':
        $controller->movies();
        break;

    case 'create_movie':
        $controller->createMovie();
        break;

    case 'store_movie':
        $controller->storeMovie();
        break;

    case 'create_author':
        $controller->createAuthor();
        break;

    case 'store_author':
        $controller->storeAuthor();
        break;

    case 'dashboard':
        $controller->dashboard();
        break;

    default:
        $controller->index();
        break;
}