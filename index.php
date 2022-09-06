<?php
// -- PD0 -- 
// -- CONEXÃO --

try {
    $connection = new PDO('mysql:host=localhost;port=3306;dbname=cadastro','root','');
     //code ...
}   catch (Exception $error) {
    //throw $th;
    echo "Ocorreu o seguinte erro: {$erro ->getMessage()}";
}

// -- EXCLUIR --
$sql = "delete from clientes where nome = :nome";
$result = $connection->prepare($sql);
$result ->bindValue(':nome', 'Lucas Cardoso Lopes');
$result->execute();



// -- ATUALIZAR --
$sql = "update clientes set email = 'GamerfixG@hotmail.com' where id = :id";
$result = $connection->prepare($sql);
$result ->bindValue(':id', '2');
$result->execute();

// -- INSERIR --
$sql = 'insert into clientes (nome, email, cidade, estado)
                       values(:nome, :email, :cidade, :estado)';
$result = $connection->prepare($sql);
$result->bindParam(':nome','Lucas Cardoso Lopes');                     
$result->bindParam(':email','GamerfixG@hotmail.com');                     
$result->bindParam(':cidade','Niteroi');                     
$result->bindParam(':estado','RJ'); 
$result->execute();                 

// -- LER --
$sql = 'select * from clientes';
$result = $connection->prepare($sql);
$result->execute();
var_dump($result->fetchAll(PDO::FETCH_ASSOC));