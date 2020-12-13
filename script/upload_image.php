<?php

    $nomeImg = $_POST['txt_codigo_produto'];
    $extension = pathinfo( $_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION );
    $nomeNovo = $nomeImg . "." . $extension;
    $diretorio = '../img/produtos/';
    $source = $_FILES['fileToUpload']["tmp_name"];
    $arquivo = $diretorio . $nomeNovo;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($arquivo,PATHINFO_EXTENSION));
    
     
    //checar se é imagem
    $check = getimagesize($source);

    if(isset($_POST['fileToUpload']))
        $check = getimagesize($source);
        if($check !== false){
            $uploadOk = 1;
        }else{
            echo "Arquivo não é imagem";
            $uploadOk = 0;
        }
        //Checar se imagem já existe

        if(isset($_GET['id'])){
            unlink($arquivo);
            
        }else{
        }

        if (file_exists($arquivo)) {
            echo "Essa imagem já existe";
            $uploadOk = 0;
        }
    
      
      
        //Checar tamanho de imagem
        if ($_FILES['fileToUpload']['size'] > 500000){
            echo "Imagem grande de mais";
            $uploadOk = 0;
        }

        //Limitar tipos de imagem
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"){
            echo "Tipo de arquivo não permitido";
        }
        
        //Checar Upload
        if($uploadOk == 0){
            echo "Algo está errado, seu arquivo não foi enviado";
        }

        //Se estiver tudo ok
        else{
      
            if(move_uploaded_file($source, $arquivo)){
                echo "A imagem " . htmlspecialchars( basename($_FILES['fileToUpload']['name'])) . "foi enviada"; //Basename da apenas o nome do arquio
                echo $arquivo; 
            }else{
                echo "Desculpe, houve um erro no envio da imagem: ";
                echo htmlspecialchars( basename($_FILES['fileToUpload']['name'])); 
            }
        }


?>