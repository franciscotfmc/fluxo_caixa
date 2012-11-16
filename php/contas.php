<?php

require_once 'conexao.php';
$arrDados 	= $_REQUEST;
$arrMessage = array();

if($arrDados["acao"]=="insert")
{
  $data	= json_decode($arrDados['data']);

	$conta_id = mysql_escape_string($data->{'conta_id'});
	$nome	= mysql_escape_string($data->{'nome'});
	$flag_tipo = mysql_escape_string($data->{'flag_tipo'});

	$strSQL  = "INSERT INTO conta ";
	$strSQL .= " (conta_id, nome, flag_tipo) ";
	$strSQL .= "VALUES ('".$conta_id."', '".$nome."', '".$flag_tipo."')";

	if(mysql_query($strSQL))
	{
		$data->{'id'} 	   					= mysql_insert_id();
		$arrMessage['success'] 						= true;
		$arrMessage['message'] 						= "Registro salvo com sucesso!";
		$arrMessage['data']    						= $data;
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
	$id 		= mysql_escape_string($arrDados['id']);
	$conta_id	= mysql_escape_string($arrDados['conta_id']);
	$nome 		= mysql_escape_string($arrDados['nome']);
	$flag_tipo	= mysql_escape_string($arrDados['flag_tipo']);

	$strSQL  = "UPDATE conta SET ";
	$strSQL .= "  nome 				= '".$nome."' ";
	$strSQL .= ", conta_id 	= '".$conta_id."'";
	$strSQL .= ", flag_tipo 				= '".$flag_tipo."'";
	$strSQL .= " WHERE id 			= '".$id."' ";

	if(mysql_query($strSQL))
	{
		$arrMessage['success'] 						= true;
		$arrMessage['message'] 						= "Registro(s) salvo(s) com sucesso!";
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
    $arrContas = $arrDados["id"];

	for($i=0;$i<count($arrContas);$i++)
	{
       $id	= mysql_real_escape_string($arrContas[$i]);
	   $strSQL 	 	= "DELETE FROM conta WHERE id = '".$id."'";
                if(!mysql_query($strSQL))
				{
						echo json_encode(array(
							"success" => false,
							"message" => 'Erro na exclusão'
					));
					break;
				}
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

        $strSQL = "SELECT id, conta_id, nome, flag_tipo FROM conta ORDER BY ".mysql_real_escape_string($order);

        if($arrDados["start"] !== null && $arrDados["start"] !== 'start' && $arrDados["limit"] !== null && $arrDados["limit"] !== 'limit')
		{

			$inicio  = ($arrDados["page"]-1);
			$inicio *= $arrDados["limit"];

            $strSQL .= " LIMIT " . $inicio . " , " . $arrDados["limit"];
        }


		$objRs = mysql_query($strSQL);
		$arrBanco = array();

		while($objRow = mysql_fetch_assoc ($objRs))
		{
			$arrBanco[] = $objRow;
		}


        $strSQL 	= "SELECT COUNT(*) AS total FROM conta";
        $total 		= mysql_fetch_array(mysql_query($strSQL));

        echo json_encode(array(
            "data" => $arrBanco,
            "success" => true,
			"inicio" => $inicio,
            "total" => $total['total']
        ));


}
mysql_close();
