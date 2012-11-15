<?php session_start(); 

require_once "conexao.php";
//Get como POST
$arrDados 						= $_REQUEST; 
$arrRetorno						= array(); 
$arrRetorno["success"]			= false;
$arrRetorno["erro"]["motivo"] 	= "Erro no usuario ou senha";
$_SESSION["id"]			= ""; 
$_SESSION["nome"]			= ""; 

if($arrDados["acao"]=="login")
{
	$strSQL = "SELECT id, nome FROM usuario WHERE 
			   email = '" . mysql_real_escape_string($arrDados["email"]) . "' 
			   AND 
			   senha = '" . mysql_real_escape_string($arrDados["senha"]) . "' 	
			   ";    	
	$objRow = mysql_fetch_array(mysql_query($strSQL));

	if($objRow["id"]<>"")	
	{
		$arrRetorno["success"] = true; 
		$_SESSION["id"]			= $objRow["id"]; 
		$_SESSION["nome"]			= $objRow["nome"]; 
		unset($arrRetorno["erro"]);
	}
}

echo json_encode($arrRetorno); 
mysql_close(); 
