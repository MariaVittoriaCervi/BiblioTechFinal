<?php
require_once 'ClassDB.php';
class BooksDB extends DB
{

    public function getAllBooks()
    {
        $sql = "SELECT b.id_book, b.title, a.name, b.original_language, b.genre, b.comment, a.id_author
                    FROM books b INNER JOIN authors a
                    ON b.id_author = a.id_author;";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function getOneBook($id_book)
    {
        $sql = "SELECT * FROM books AS b
                    INNER JOIN authors AS a ON b.id_author = a.id_author
                    WHERE id_book = '{$id_book}';";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function getAllAuthors()
    {
        $sql = "SELECT * FROM authors;";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function getOneAuthor($id_author)
    {
        $sql = "SELECT * FROM authors
                    WHERE id_author = '{$id_author}';";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function getBooksFromAuthor($id_author)
    {
        $sql = "SELECT * FROM books b
                    INNER JOIN authors a ON b.id_author = a.id_author
                    WHERE a.id_author = '{$id_author}';";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function getAllLocations()
    {
        $sql = "SELECT * FROM locations;";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function getOneLocation($id_location)
    {
        $sql = "SELECT * FROM locations
                    WHERE id_location = '{$id_location}';";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function getBooksInLocation($id_location)
    {
        $sql = "SELECT * FROM books b
                    INNER JOIN is_stored s ON b.id_book = s.id_book
                    INNER JOIN locations l ON s.id_location = l.id_location
                    INNER JOIN authors a ON b.id_author = a.id_author
                    WHERE l.id_location = '{$id_location}';";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function editBook($title, $original_language, $genre, $plot, $comment, $cover, $id_author, $id_book)
    {
        $sql = "UPDATE books
                    SET title = '{$title}',
                        original_language = '{$original_language}',
                        genre = '{$genre}',
                        plot = '{$plot}',
                        comment = '{$comment}',
                        cover = '{$cover}',
                        id_author = '{$id_author}'
                    WHERE id_book = '{$id_book}';";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function addBook($title, $original_language, $genre, $plot, $comment, $cover, $id_author)
    {
        $sql = "INSERT INTO books (title, original_language, genre, plot, comment, cover, id_author)
                    VALUES ('{$title}', '{$original_language}', '{$genre}', '{$plot}', '{$comment}', '{$cover}', '{$id_author}');";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function addAuthor($name, $nationality, $sex, $picture)
    {
        $sql = "INSERT INTO authors (name, nationality, sex, picture)
                    VALUES ('$name', '$nationality', '$sex', '$picture');";
        return $this->connect()->query($sql);
    }

    public function borrowBook($id_book, $id_customer, $date_start, $date_end)
    {

        $sql = "INSERT INTO borrows (id_book, id_customer, date_start, date_end)
                    VALUES ('{$id_book}', '{$id_customer}', '{$date_start}', $date_end);";

        $result = $this->connect()->query($sql);

        return true;
    }

    public function getCustomer($name, $email)
    {
        $sql = "SELECT * FROM customers AS c WHERE c.name = '{$name}' AND c.email_address = '{$email}';";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return [
                'status' => true,
                'id' => $row['id_customer']  // oppure 'id_customer', dipende dal tuo DB
            ];
        }

        return [
            'status' => false,
            'id' => null
        ];
    }

    public function getCustomerBorrows($id_customer)
    {
        $sql = "SELECT bk.title, br.date_start, br.date_end FROM books AS bk
                INNER JOIN borrows AS br ON bk.id_book = br.id_book
                INNER JOIN customers AS c ON c.id_customer = br.id_customer
                WHERE c.id_customer = '{$id_customer}';";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function getLocationsFromBook($id_book)
    {
        $sql = "SELECT l.address FROM books AS b 
                INNER JOIN is_stored AS i ON b.id_book = i.id_book
                INNER JOIN locations as l ON l.id_location = i.id_location
                WHERE i.id_book = '{$id_book}';";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function getLocationsFromAuthor($id_author)
    {
        $sql = "SELECT l.address FROM authors AS a 
                INNER JOIN books AS b ON b.id_author = a.id_author
                INNER JOIN is_stored AS i ON b.id_book = i.id_book
                INNER JOIN locations AS l on l.id_location = i.id_location
                WHERE a.id_author = '{$id_author}';";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }

    public function getAuthorsFromlocation($id_location)
    {
        $sql = "SELECT DISTINCT a.name FROM authors AS a 
                INNER JOIN books AS b ON b.id_author = a.id_author
                INNER JOIN is_stored AS i ON b.id_book = i.id_book
                INNER JOIN locations AS l on l.id_location = i.id_location
                WHERE l.id_location = '{$id_location}';";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }
            return $dati;
        }
        return null;
    }
}