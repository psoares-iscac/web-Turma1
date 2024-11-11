<?php
$users = [
    [
        "id" => 1, 
        "nome" =>  "Maria Albertina",
        "email" => "maria.albertina@example.com",
        "descricao" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
        "foto" => "avatar1.png"
    ],
    [
        "id" => 2,
        "nome" => "João Lucas",
        "email" => "joao.lucas@example.com",
        "descricao" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum",
        "foto" => "avatar2.png"
   ]
];
    
header('Content-Type:application/json');
echo json_encode($users);

exit();

