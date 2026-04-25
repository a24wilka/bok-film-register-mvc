<?php
require_once __DIR__ . '/../Config/db.php';

class BookModel
{
    private $db;

    public function __construct()
    {
        $this->db = Db::connect();
    }

    public function getAllBooks()
    {
        $sql = "SELECT * FROM Vy_BokInfo ORDER BY titel";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
public function getForfattare()
{
    return $this->db->query("SELECT * FROM Forfattare")->fetchAll(PDO::FETCH_ASSOC);
}

public function getForlag()
{
    return $this->db->query("SELECT * FROM Forlag")->fetchAll(PDO::FETCH_ASSOC);
}

public function getKategorier()
{
    return $this->db->query("SELECT * FROM Kategorier")->fetchAll(PDO::FETCH_ASSOC);
}


    public function addBook($titel, $isbn, $pris, $lagersaldo, $utgivningsar, $forfattar_id, $forlag_id, $kategori_id)
    {
        $sql = "CALL LaggTillBok(:titel, :isbn, :pris, :lagersaldo, :utgivningsar, :forfattar_id, :forlag_id, :kategori_id)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':titel' => $titel,
            ':isbn' => $isbn,
            ':pris' => $pris,
            ':lagersaldo' => $lagersaldo,
            ':utgivningsar' => $utgivningsar,
            ':forfattar_id' => $forfattar_id,
            ':forlag_id' => $forlag_id,
            ':kategori_id' => $kategori_id
        ]);
    }

 //  Tar bort en bok från tabellen Bocker baserat på bok_id
    public function deleteBook($id)
{
    $sql = "DELETE FROM Bocker WHERE bok_id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id' => $id]);
}
// Arkiverar en bok genom att anropa proceduren FlyttaTillArkiv
public function archiveBook($id)
{
    $sql = "CALL FlyttaTillArkiv(:id)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id' => $id]);
}

public function getBooksWithMovies()
{
    $sql = "SELECT * FROM Vy_BokFilmInfo ORDER BY bok_id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function getAllMovies()
{
    $sql = "SELECT
                f.film_id,
                f.titel,
                f.releasedatum,
                f.regissor,
                f.speltid_min,
                f.betyg,
                f.bok_id,
                b.titel AS boktitel
            FROM Filmer f
            LEFT JOIN Bocker b ON f.bok_id = b.bok_id
            ORDER BY f.titel";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function addMovie($titel, $releasedatum, $regissor, $speltid_min, $betyg, $bok_id)
{
    $sql = "CALL LaggTillFilm(:titel, :releasedatum, :regissor, :speltid_min, :betyg, :bok_id)";

    $stmt = $this->db->prepare($sql);

    $stmt->execute([
        ':titel' => $titel,
        ':releasedatum' => $releasedatum,
        ':regissor' => $regissor,
        ':speltid_min' => $speltid_min,
        ':betyg' => $betyg,
        ':bok_id' => $bok_id
    ]);
}

public function addAuthor($namn, $biografi)
{
    $sql = "INSERT INTO Forfattare (namn, biografi)
            VALUES (:namn, :biografi)";

    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        ':namn' => $namn,
        ':biografi' => $biografi
    ]);
}

public function getBooksWithoutMovies()
{
    $sql = "SELECT b.bok_id, b.titel
            FROM Bocker b
            LEFT JOIN Filmer f ON b.bok_id = f.bok_id
            WHERE f.bok_id IS NULL
            ORDER BY b.titel";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getArchivedBooks()
{
    $sql = "SELECT a.*, f.namn AS forfattare
            FROM ArkiveradeBocker a
            LEFT JOIN Forfattare f ON a.forfattar_id = f.forfattar_id
            ORDER BY a.bok_id DESC";

    return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

public function deleteArchived($id)
{
    $sql = "DELETE FROM ArkiveradeBocker WHERE bok_id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id' => $id]);
}


}
