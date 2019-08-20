<?php 

require_once("config.php");

$usuarios = Usuario::getList(); // puxa a lista de usuários

$headers = array();

foreach ($usuarios[0] as $key => $value) { // percorre o array listando a linha e atribuindo as chaves da linha
	array_push($headers, ucfirst($key));
}

$file = fopen("usuarios.csv", "w+"); // cria o arquivo e inicia a escrita

fwrite($file, implode(";",$headers). "\r\n"); // escreve os valores do array separado por ;

foreach ($usuarios as $row) { //percorre a lista de usuarios em cada linha
	
	$data = array();

	foreach ($row as $key => $value) { //em cada linha salva o valor das colunas
	
		array_push($data, $value);	

	}//acaba foreach de coluna

	fwrite($file, implode(";", $data) ."\r\n"); // escreve os valores do array separado por ;

}// acaba foreach de linha

fclose($file);

 ?>

