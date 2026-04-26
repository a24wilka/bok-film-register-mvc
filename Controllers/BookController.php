<?php
require_once __DIR__ . '/../Models/BookModel.php';

class BookController
{
    public function index()
    {
        $model = new BookModel();
        $books = $model->getAllBooks();

        require_once __DIR__ . '/../Views/layout/header.php';
        require_once __DIR__ . '/../Views/book/index.php';
        require_once __DIR__ . '/../Views/layout/footer.php';
    }

    public function create()
{
    $model = new BookModel();

    $forfattare = $model->getForfattare();
    $forlag = $model->getForlag();
    $kategorier = $model->getKategorier();

    require_once __DIR__ . '/../Views/layout/header.php';
    require_once __DIR__ . '/../Views/book/create.php';
    require_once __DIR__ . '/../Views/layout/footer.php';
}

    public function store()
    {
        $model = new BookModel();

        $model->addBook(
            $_POST['titel'],
            $_POST['isbn'],
            $_POST['pris'],
            $_POST['lagersaldo'],
            $_POST['utgivningsar'],
            $_POST['forfattar_id'],
            $_POST['forlag_id'],
            $_POST['kategori_id']
        );

        header("Location: index.php?action=books");
        exit;
    }
// Tar bort en bok baserat på bok_id från URL och skickar tillbaka till listan
    public function delete()
{
    if (isset($_GET['id'])) {
        $model = new BookModel();
        $model->deleteBook($_GET['id']);
    }

    header("Location: index.php?action=books");
    exit;
}
// Arkiverar en bok genom att anropa modellens metod som kör proceduren FlyttaTillArkiv
public function archive()
{
    if (isset($_GET['id'])) {
        $model = new BookModel();
        $model->archiveBook($_GET['id']);
    }

    header("Location: index.php?action=books");
    exit;
}

public function dashboard()
{
    $model = new BookModel();
    $books = $model->getBooksWithMovies();

    require_once __DIR__ . '/../Views/layout/header.php';
    require_once __DIR__ . '/../Views/book/dashboard.php';
    require_once __DIR__ . '/../Views/layout/footer.php';
}

public function movies()
{
    $model = new BookModel();
    $movies = $model->getAllMovies();

    require_once __DIR__ . '/../Views/layout/header.php';
    require_once __DIR__ . '/../Views/book/movies.php';
    require_once __DIR__ . '/../Views/layout/footer.php';
}

public function createMovie()
{
    $model = new BookModel();
    $books = $model->getBooksWithoutMovies();

    require_once __DIR__ . '/../Views/layout/header.php';
    require_once __DIR__ . '/../Views/book/movies_create.php';
    require_once __DIR__ . '/../Views/layout/footer.php';
}

public function storeMovie()
{
    $model = new BookModel();

    $model->addMovie(
        $_POST['titel'],
        $_POST['releasedatum'],
        $_POST['regissor'],
        $_POST['speltid_min'],
        $_POST['betyg'],
        $_POST['bok_id']
    );

    header("Location: index.php?action=movies");
    exit;
}

public function createAuthor()
{
    require_once __DIR__ . '/../Views/layout/header.php';
    require_once __DIR__ . '/../Views/book/authors_create.php';
    require_once __DIR__ . '/../Views/layout/footer.php';
}

public function storeAuthor()
{
    $model = new BookModel();

    $model->addAuthor(
        $_POST['namn'],
        $_POST['biografi']
    );

    header("Location: index.php?action=create");
    exit;
}

public function archived()
{
    $model = new BookModel();
    $books = $model->getArchivedBooks();

    require_once __DIR__ . '/../Views/layout/header.php';
    require_once __DIR__ . '/../Views/book/archived.php';
    require_once __DIR__ . '/../Views/layout/footer.php';
}

public function deleteArchived()
{
    if (isset($_GET['id'])) {
        $model = new BookModel();
        $model->deleteArchived($_GET['id']);
    }

    header("Location: index.php?action=archived");
    exit;
}

public function restore()
{
    if (isset($_GET['id'])) {
        $model = new BookModel();
        $model->restoreBook($_GET['id']);
    }

    header("Location: index.php?action=archived");
    exit;
}

}