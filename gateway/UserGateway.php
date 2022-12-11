<?php


class UserGateway
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // public function getById(int $id): ?Utilisateur
    // {
    //     $req = $this->pdo->prepare('SELECT * FROM Utilisateur WHERE id = :id');
    //     $req->execute(['id' => $id]);
    //     $req->setFetchMode(PDO::FETCH_CLASS, Utilisateur::class);
    //     $user = $req->fetch();
    //     return $user === false ? null : $user;
    // }

    public function getByLogin(string $login): ?Utilisateur
    {
        $req = $this->pdo->prepare('SELECT * FROM registered_user WHERE login = :login;');
        $req->execute(['login' => $login]);
        $req->setFetchMode(PDO::FETCH_CLASS, Utilisateur::class);
        $user = $req->fetch();
        return $user === false ? null : $user;
    }

    // public function insert(Utilisateur $user): bool
    // {
    //     $req = $this->pdo->prepare("INSERT INTO registered_user (login, password, permissions) Values(:login, :password, :permissions)");
    //     try {
    //         $req->execute(['login' => $user->getLogin(), 'password' => $user->getPassword(), 'permissions' => $user->getPermissions()]);
    //     } catch (\PDOException $ex) {
    //         if ($this->config->isUniqueConstraintViolation($ex)) {
    //             return false;
    //         }
    //         throw $ex;
    //     }
    //     $user->setId(intval($this->pdo->lastInsertId()));
    //     return true;
    // }
}

?>