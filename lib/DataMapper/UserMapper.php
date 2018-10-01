<?php

class UserMapper
{
    private $storageAdapter;

    public function __construct($storage)
    {
        $this->storageAdapter = $storage;
    }

    public function findByLogin($login)
    {
        $sql['sql'] = "select id_user, login, password from users where login = :login";
        $sql['param'] =
            [
                'login' => $login,
            ];
        $result = $this->storageAdapter->Select($sql['sql'], $sql['param']);
        if ($result === null) {
            return $result;
        } else {
            return $this->mapRowToUser($result[0]);
        }
    }

    private function mapRowToUser($row)
    {
        return new User(
            $row['id_user'],
            $row['login'],
            $row['email'],
            $row['password'],
            $row['comment'],
            $row['status_id'],
        );
    }
}