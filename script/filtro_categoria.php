<?php
    $pdo = new PDO('mysql:host=localhost;dbname=appdb', 'root', 'Silvio10.');
    $select = 'SELECT *';
    $from = ' FROM produto';
    $where = ' WHERE ativo = TRUE ';
    $opts = isset($_POST['filterOpts'])? $_POST['filterOpts'] : array('');



    if (in_array('ouro', $opts)){
        $where .= " AND samsung = 1 ";
    }

    if (in_array('iphone', $opts)){
        $where .= " AND iphone = 1 ";
    }

        if (in_array('htc', $opts)){
        $where .= " AND htc = 1 ";
    }
        if (in_array('lg', $opts)){
        $where .= " AND lg = 1 ";
    }
        if (in_array('nokia', $opts)){
        $where .= " AND nokia = 1 ";
    }


    $sql = $select . $from . $where;
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    echo($json);
?>