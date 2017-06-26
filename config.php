<?php

return [
  "database" => [
      "dsn" => "mysql",
      "host" => "localhost",
      "username" => "root",
      "password" => "",
      "dbname" => "mytodos",
      "options" => [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]
  ]
];