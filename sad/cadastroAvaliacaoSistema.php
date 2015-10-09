<?php
require_once("./authSession.php");
require_once("./conf/confBD.php");
include_once("../modelos/cabecalho_login.html");

try
{
	// se não foram passados 4 parâmetros na requisição e não vier da página de cadastro
	//desvia para a mensagem de erro: 	// "previne" acesso direto à página
	$origem = basename($_SERVER['HTTP_REFERER']);
	if((count($_POST)!=1)&&($origem!='avaliacaoSistema.php')){
		header("Location:./acessoNegado.php");
		die();
	}
	//se existem os parâmetros...
	else{
		//instancia objeto PDO, conectando-se ao mysql
		$conexao = conn_mysql();
		
		//captura valores do vetor POST
		//utf8_encode para manter consistência da codificação utf8 nas páginas e no banco
		$opiniao = utf8_encode(htmlspecialchars($_POST['opiniao']));
		$nomeCompleto = utf8_decode($_SESSION['nomeCompleto']);
		
		
		
		// cria instrução SQL parametrizada
		$SQLUpdate = 'UPDATE funcionarios SET opiniao=? WHERE nomeCompleto=?';
					  
		//prepara a execução
		$operacao = $conexao->prepare($SQLUpdate);					  
		
		//executa a sentença SQL com os parâmetros passados por um vetor
		$atualizacao = $operacao->execute(array($opiniao, $nomeCompleto));
		
		// fecha a conexão ao banco
		$conexao = null;
		
		//verifica se o retorno da execução foi verdadeiro ou falso,
		//imprimindo mensagens ao cliente
		if ($atualizacao){
			 echo'<div class="starter-template">';
			 echo"\n<h3 class=\sub-header\>Avaliação do sistema enviada com sucesso!</h3>";
			 echo "<p class=\"lead\"><a href=\"./mainPage.php\">Página principal</a></p>\n";
			 echo'</div>';			 
		}
		else {
			echo "<h1>Erro na operação.</h1>\n";
				$arr = $operacao->errorInfo();		//mensagem de erro retornada pelo SGBD
				$erro = utf8_decode($arr[2]);
				echo "<p>$erro</p>";							//deve ser melhor tratado em um caso real
			    echo "<p><a href=\"./cadastroUsuario.php\">Retornar</a></p>\n";
		}
    }
}
catch (PDOException $e)
{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}

include_once("./modelos/rodape_html.html");

?>
