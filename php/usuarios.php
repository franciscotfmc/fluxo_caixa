<?php

require_once 'conexao.php';
$arrDados 	= $_REQUEST;
$arrMessage = array();

if($arrDados["acao"]=="insert")
{
  $data	= json_decode($arrDados['data']);

	$nome = mysql_escape_string($data->{'nome'});
	$email = mysql_escape_string($data->{'email'});
	$senha	= mysql_escape_string($data->{'senha'});

	$strSQL = "INSERT INTO usuario (nome, email, senha) VALUES ('".$nome."','".$email."','".$senha."')";

	if(mysql_query($strSQL))
	{

		$data->{'id'}	= mysql_insert_id();

		$arrMessage['success'] 		= true;
		$arrMessage['message'] 		= "Registro salvo com sucesso!";
		$arrMessage['data']    		= $data;
	}
	else
	{
		$arrMessage['success'] = false;
		$arrMessage['message'] = "Erro ao salvar no banco de dados!";
	}

	echo json_encode($arrMessage);

}
else if($arrDados["acao"]=="update")
{
	$data	= json_decode($arrDados['data']);
	$id	= mysql_escape_string($data->{'id'});
	$nome	= mysql_escape_string($data->{'nome'});
	$email = mysql_escape_string($data->{'email'});
	$senha	= mysql_escape_string($data->{'senha'});

	$strSQL = "UPDATE usuario SET nome = '".$nome."', email = '".$email."', senha = '".$senha."' WHERE id = '".$id."' ";

	if(mysql_query($strSQL))
	{
		$arrMessage['success'] = true;
		$arrMessage['message'] = "Registro(s) salvo(s) com sucesso!";
	}
	else
	{
		$arrMessage['success'] = false;
		$arrMessage['message'] = "Erro ao salvar no banco de dados!";
	}

	 echo json_encode($arrMessage);
}
else if($arrDados["acao"]=="delete")
{
    $arrUsuarios = json_decode($_POST['data']);

	if (is_array($arrUsuarios))
	{
      foreach ($arrUsuarios as $usuario)
	   {
                $id	= mysql_real_escape_string($usuario->id);
				$strSQL 	= "DELETE FROM usuario WHERE id = '".$id."'";
                if(!mysql_query($strSQL))
				{
					break;
				}
	   }
     }
	 else
	 {
            $id = $arrUsuarios->id;
           	$strSQL 	= "DELETE FROM usuario WHERE id = '".$id."'";
            mysql_query($strSQL);
     }

        echo json_encode(array(
            "success" => true,
            "message" => 'Registro(s) excluído(s) com sucesso'
        ));

}
else
{
		$sort 	= $arrDados['sort'] ? $arrDados['sort'] : '1';
        $dir 	= $arrDados['dir']  ? $arrDados['dir']  : 'ASC';
        $order 	= $sort . ' ' . $dir;

        $strSQL = "SELECT id, nome, email, senha FROM usuario ORDER BY ".mysql_real_escape_string($order);

        if($arrDados["start"] !== null && $arrDados["start"] !== 'start' && $arrDados["limit"] !== null && $arrDados["limit"] !== 'limit')
		{

			$inicio  = ($arrDados["page"]-1);
			$inicio *= $arrDados["limit"];

            $strSQL .= " LIMIT " . $inicio . " , " . $arrDados["limit"];
        }
        else {
            $inicio = 0;
        }


		$objRs = mysql_query($strSQL);
		$arrBanco = array();

		while($objRow = mysql_fetch_assoc ($objRs))
		{
			$arrBanco[] = $objRow;
		}


        $strSQL 	= "SELECT COUNT(*) AS total FROM usuario";
        $total 		= mysql_fetch_array(mysql_query($strSQL));

        echo json_encode(array(
            "data" => $arrBanco,
            "success" => true,
			"inicio" => $inicio,
            "total" => $total['total']

        ));
}

mysql_close();
