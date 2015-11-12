<?php
require_once("./authSession.php");
require_once("./conf/confBD.php");
if ($_SESSION['gerencia'] < 2){
include_once("./modelos/cabecalho_SAD.html");}
else
{include_once("./modelos/cabecalho_SAD_Gerencia.html");}

try
{
	// se não foram passados 4 parâmetros na requisição e não vier da página de cadastro
	//desvia para a mensagem de erro: 	// "previne" acesso direto à página
	$origem = basename($_SERVER['HTTP_REFERER']);
	if(count($_POST)!=1){
		header("Location:./acessoNegado.php");
		die();
	}
	//se existem os parâmetros...
	else{
		
		//$IDquestionario = $_GET["x"];
	
		if(!empty($_POST["OP"])){
		
			$conexao = conn_mysql();
		
			//captura valores do vetor POST
			//utf8_encode para manter consistência da codificação utf8 nas páginas e no banco
			$OP = $_POST["OP"];
			$IDfuncionario = utf8_decode($_SESSION['ID']);

			
			$SQLInsert = 'INSERT INTO escolha (IDpergunta, IDfuncionario, resposta)
			  		  VALUES (?,?,?)';
					  
			//prepara a execução
			$operacao = $conexao->prepare($SQLInsert);					  
		
			foreach($OP as $Opcao){
				$OP_explode=explode(",",$Opcao);
				$IDperg = $OP_explode[0];
				$escolha = $OP_explode[1];
				
				//executa a sentença SQL com os parâmetros passados por um vetor
				$inserir = $operacao->execute(array($IDperg, $IDfuncionario, $escolha));
			}
			// fecha a conexão ao banco
			$conexao = null;
		
		if ($inserir){
			 echo'<div class="starter-template">';
			 echo"\n<h3 class=\sub-header\>Respostas enviadas com sucesso!</h3>";
			 echo "<p class=\"lead\"><a href=\"./mainPage.php\">Página principal</a></p>\n";
			 echo'</div>';			 
		}
		else {
			echo "<h1>Erro na operação.</h1>\n";
				$arr = $operacao->errorInfo();		//mensagem de erro retornada pelo SGBD
				$erro = utf8_decode($arr[2]);
				echo "<p>$erro</p>";							//deve ser melhor tratado em um caso real
			    echo "<p><a href=\"./mainPage.php\">Retornar</a></p>\n";
		}
		
	}
		
		
    } //end ELSE
}
catch (PDOException $e)
{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}

include_once("./modelos/rodape_html.html");

?>
