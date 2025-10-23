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
);
