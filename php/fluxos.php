<?php

require_once 'conexao.php';
$arrDados   = $_REQUEST;
$arrMessage = array();

if($arrDados["acao"]=="insert")
{
  $data = json_decode($arrDados['data']);

    $conta_id = mysql_escape_string($data->{'conta_id'});
    $descricao = mysql_escape_string($data->{'descricao'});
    $dt_fluxo  = mysql_escape_string($data->{'dt_fluxo'});
    $valor = mysql_escape_string($data->{'valor'});

    $strSQL = "INSERT INTO fluxo (conta_id, descricao, dt_fluxo, valor) VALUES ('".$conta_id."','".$descricao."','".$dt_fluxo."','".$valor."')";

    if(mysql_query($strSQL))
    {
        $data->{'id'}   = mysql_insert_id();
        $data->dt_fluxo = substr($data->dt_fluxo, 0,10);

        $arrMessage['success']      = true;
        $arrMessage['message']      = "Registro salvo com sucesso!";
        $arrMessage['data']         = $data;
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
    $data   = json_decode($arrDados['data']);
    $id = mysql_escape_string($data->{'id'});
    $conta_id   = mysql_escape_string($data->{'conta_id'});
    $descricao = mysql_escape_string($data->{'descricao'});
    $dt_fluxo  = mysql_escape_string($data->{'dt_fluxo'});
    $valor = mysql_escape_string($data->{'valor'});

    $strSQL = "UPDATE fluxo SET conta_id = '".$conta_id."', descricao = '".$descricao."', dt_fluxo = '".$dt_fluxo."', valor = '".$valor."' WHERE id = '".$id."' ";

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
    $arrFluxos = json_decode($_POST['data']);

    if (is_array($arrFluxos))
    {
      foreach ($arrFluxos as $fluxo)
       {
                $id = mysql_real_escape_string($fluxo->id);
                $strSQL     = "DELETE FROM fluxo WHERE id = '".$id."'";
                if(!mysql_query($strSQL))
                {
                    break;
                }
       }
     }
     else
     {
            $id = $arrFluxos->id;
            $strSQL     = "DELETE FROM fluxo WHERE id = '".$id."'";
            mysql_query($strSQL);
     }

        echo json_encode(array(
            "success" => true,
            "message" => 'Registro(s) excluído(s) com sucesso'
        ));

}
else
{
        $sort   = $arrDados['sort'] ? $arrDados['sort'] : '1';
        $dir    = $arrDados['dir']  ? $arrDados['dir']  : 'ASC';
        $order  = $sort . ' ' . $dir;

        $strSQL = "SELECT id, conta_id, descricao, dt_fluxo, valor FROM fluxo ORDER BY ".mysql_real_escape_string($order);

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


        $strSQL     = "SELECT COUNT(*) AS total FROM fluxo";
        $total      = mysql_fetch_array(mysql_query($strSQL));

        echo json_encode(array(
            "data" => $arrBanco,
            "success" => true,
            "inicio" => $inicio,
            "total" => $total['total']

        ));
}

mysql_close();
