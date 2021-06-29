<?php

class database
{

    private $host;
    private $username;
    private $password;
    private $database;
    private $dbh;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'flowerpowerdatabase';

        try {

            $dsn = "mysql:host=$this->host;dbname=$this->database";
            $this->dbh = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $exception) {
            die("Connection failed!-> " . $exception->getMessage());
        }
    }

    public function select($statement, $named_placeholder)
    {

        // prepared statement (send statement to server  + checks syntax)
        $stmt = $this->dbh->prepare($statement);
        // $statement->execute(['uname'=>$username]);
        $stmt->execute($named_placeholder);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function update($statement, $named_placeholder, $locatie)
    {

        // prepared statement
        $stmnt = $this->dbh->prepare($statement);

        // print_r($statement)
        // execute prepared statement
        $stmnt->execute($named_placeholder);

        // redirecten naar overzicht_artikel
        header("location: $locatie");
        exit();
    }

    public function delete($statement, $named_placeholder, $locatie)
    {
        $stmt = $this->dbh->prepare($statement);

        // execute prepared statement
        $stmt->execute($named_placeholder);

        // redirecten naar overzicht_artikel
        header("location: $locatie");
        exit();
    }


    public function insert($sql, $named_placeholder_array, $locatie)
    {
        // om data integrity te behouden, werken we met transacties.
        // je begint een transactie, en commit deze. als de insert mislukt (transactie mislukt), dan wordt half bijgeschreven data gerevert.
        // op deze manier heb je geen halve data in je database. Meer over transacties en PDO: https://phpdelusions.net/pdo#transactions

        try {
            // start je transactie
            $this->dbh->beginTransaction();

            $statement = $this->dbh->prepare($sql);
            $statement->execute($named_placeholder_array);

            // schrijf data definitief naar db
            $this->dbh->commit();
            header("location: $locatie");
        } catch (Exception $e) {
            // dit stukje wordt alleen bereikt als in de try-clause een error heeft plaatsgevonden.
            // eventuele "data changes" worden gerollbacked, denk aan ctrl+z in een word document.
            $this->dbh->rollback();
            echo $e->getMessage();
        }
    }


    // login -> login + error_log()
    public function login($uname, $psw)
    {

        $sql = "SELECT id, username, password FROM users WHERE username = :username";

        $stmt = $this->dbh->prepare($sql);

        $stmt->execute([
            'username' => $uname,
        ]);

        // haal database op uit de database
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (is_array($result) && count($result) > 0) {


            if ($uname && password_verify($psw, $result['password'])) {
                session_start();

                $_SESSION['ID'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['is_logged_in'] = true;

                $date = date("Y-m-d H:i:s");
                $msg = "User " . $result['username'] . " logged in at $date";

                // schrijven van informatie naar een log bestand (user informatie en errors bijhouden)
                error_log($msg, 3, "log_bestand.log");

                header("location: welcome.php"); // gaan we later mee verder


            } else {
                echo 'Username and/or password is incorrect. Please fix your input errors and try again';
            }
        } else {
            // nooit vermelden dat username of wachtwoord incorrect is. als een van de twee klopt, dan hoeft de hacker slechts 1 te raden.
            echo 'Username and/or password is incorrect. Please fix your input errors and try again.';
        }
    }
}
