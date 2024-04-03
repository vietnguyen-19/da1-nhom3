<?php

//tương tác với database của users

function getAllUser()
{
    try {
        $sql = "SELECT * FROM users";

        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}

if (!function_exists('getAdminByEmailAndPassword')) {
    function getAdminByEmailAndPassword($email, $password)
    {
        try {
            $sql = "SELECT * FROM `users` WHERE email = :email AND password = :password AND type = 1 LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\PDOException $e) {
            debug($e);
        }
    }
}

if (!function_exists('getCilentByEmailAndPassword')) {
    function getCilentByEmailAndPassword($email, $password)
    {
        try {
            $sql = "SELECT * FROM `users` WHERE email = :email AND password = :password AND type = 0 LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\PDOException $e) {
            debug($e);
        }
    }
}
