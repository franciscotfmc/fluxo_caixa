<?php
require_once 'conexao.php';
$arrDados 	= $_REQUEST;
$arrMessage = array();

if($arrDados["acao"]=="grafico")
{
        $strSQL  = "SELECT 	  COUNT( f.id ) AS total
							, c.numero AS conta
						   FROM
								conta c
					 INNER JOIN
								fluxo f
							 ON
								f.conta_id = c.id
                    GROUP BY
                                c.numero
                    ORDER BY
                                c.numero DESC
					   ";

		$objRs = mysql_query($strSQL);
		$arrBanco = array();

		while($objRow = mysql_fetch_assoc ($objRs))
		{
			$arrBanco[] = $objRow;
		}

        echo json_encode(array(
            "data" => $arrBanco,
            "success" => true
        ));


}
mysql_close();
