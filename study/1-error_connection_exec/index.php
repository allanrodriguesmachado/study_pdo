<?php

/**
 * Error control
 */

try {
//    throw new Exception("Exception");
    throw new PDOException("PdoException");
} catch (PDOException $PDOException) {
    var_dump($PDOException);
} catch (ErrorException $PDOException) {
    var_dump($PDOException);
} catch (Exception $exception) {
    echo $exception->getMessage();
} finally {
    echo "Execução Terminou";
}

/**
 * Data Object
 */

try {
    $pdo = new PDO(
        'pgsql:host=localhost;dbname=client',
        'postgres',
        '830314',
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );

    $stmt = $pdo->query('SELECT * FROM users LIMIT 2');
    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        var_dump($user);
    }

} catch (PDOException $pdo_exception) {
    var_dump($pdo_exception);
}

/**
 * Connection singleton
 */