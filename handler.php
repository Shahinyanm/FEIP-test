<?php
require("core/Validator.php");

$data = [
    "foo" => 6546,
    "bar" => "asd",
    "baz" => "8 (950) 288-56-23"
];

$rules = [
    "foo" => FILTER_VALIDATE_INT,
    "bar" => FILTER_SANITIZE_STRING,
    "baz" => [
        'ref' => '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/i'
    ]
];


$validator = new Validator($data, $rules);
$errors = $validator->validate();
print_r($errors);