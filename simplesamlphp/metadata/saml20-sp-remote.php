<?php

/**
 * SAML 2.0 remote SP metadata for SimpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-sp-remote
 */

/*
 * Example SimpleSAMLphp SAML 2.0 SP
 */
$metadata['users'] = array(
    'AssertionConsumerService' => [
        [
            'Location' => 'http://app.local:8000/users/saml2/test/acs',
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
        ],
    ],
    'SingleLogoutService' => [
        [
            'Location' => 'http://app.local:8000/users/saml2/test/sls',
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ],
    ],
);

$metadata['products'] = array(
    'AssertionConsumerService' => [
        [
            'Location' => 'http://app.local:8000/products/saml2/test/acs',
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
        ],
    ],
    'SingleLogoutService' => [
        [
            'Location' => 'http://app.local:8000/products/saml2/test/sls',
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ],
    ],
);

$metadata['orders'] = array(
    'AssertionConsumerService' => [
        [
            'Location' => 'http://app.local:8000/orders/saml2/test/acs',
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
        ],
    ],
    'SingleLogoutService' => [
        [
            'Location' => 'http://app.local:8000/orders/saml2/test/sls',
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ],
    ],
);