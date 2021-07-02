<?php

require('../config.php');
$method = strtolower($_SERVER['REQUEST_METHOD']);
if($method === 'get'){
    //Criação da query para capturar os itens
    $sql = $pdo->query("SELECT * FROM notes");
    //Condição para que o DB não esteja vazio, se estiver não retorna nada
    if ($sql->rowCount() > 0){
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        //Foreach para capturar os itens de dentro do DB
        foreach ($data as $item){
            $array['result'][] = [
                'id' => $item['id'],
                'title' => $item['title'],
            ];
        }
    }


}else{
    $array['error'] = 'Método não permitido (Apenas GET)';
}

require('../return.php');