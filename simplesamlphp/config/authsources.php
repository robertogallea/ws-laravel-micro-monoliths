<?php

$config = array(
    // This is a authentication source which handles admin authentication.
    'admin' => [
        // The default is to use core:AdminPassword, but it can be replaced with
        // any authentication source.

        'core:AdminPassword',
    ],

    'example-userpass' => array(
        'exampleauth:UserPass',
        'user1@example.com:password' => array(
            'email' => 'user1@example.com',
            'givenName' => 'User',
            'sn' => 'One',
            'id' => "1",
        ),
        'user2@example.com:password' => array(
            'email' => 'user2@example.com',
            'givenName' => 'User',
            'sn' => 'Two',
            'id' => "2",
        ),
    ),

    'default-sql' => [
        'sqlauth:PasswordVerify',

        // DSN per la connessione al database
        'dsn' => 'mysql:host=mysql;dbname=users',

        // Username del database
        'username' => 'laravel',

        // Password del database
        'password' => 'laravel_password',


        'passwordhashcolumn' =>  'password',

        // Query per recuperare l'utente
        // :username verrà sostituito con il nome utente inserito
        'query' => 'SELECT id, email, name, password FROM users WHERE email = :username',


    ],
);
