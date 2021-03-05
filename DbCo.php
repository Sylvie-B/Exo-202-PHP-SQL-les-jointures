<?php


class DbCo
{
    private string $server;
    private string $database;
    private string $user;
    private string $pass;

    public function __construct()
    {
        $this->server = 'localhost';
        $this->database = 'exo202';
        $this->user = 'root';
        $this->pass = '';
    }

    public function connect(): ?PDO
    {
        try {
            $conn = new PDO("mysql:host=$this->server;dbname=$this->database;charset=utf8", $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            echo "data base connexion error : " . $exception->getMessage();
            return null;
        }
        return $conn;
    }
}