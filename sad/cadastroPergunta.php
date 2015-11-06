<?php
require_once("./authSession.php");  
require_once("./conf/confBD.php");
if ($_SESSION['gerencia'] < 2){
include_once("./modelos/cabecalho_SAD.html");}
else
{include_once("./modelos/cabecalho_SAD_Gerencia.html");}
?>

    <div class="container">

      <div class="starter-template">
        <h2 class="sub-header"></h2>    
      </div>

<?php	  
try
{	
	$IDquestionario = $_GET["x"];
	
	if(!empty($_POST['pergunta']) && !empty($_POST['opcao1']) && !empty($_POST['opcao2'])){
		
		$pergunta = utf8_encode(htmlspecialchars($_POST['pergunta']));
		$opcao1 = utf8_encode(htmlspecialchars($_POST['opcao1']));
		$opcao2 = utf8_encode(htmlspecialchars($_POST['opcao2']));
		$opcao3 = utf8_encode(htmlspecialchars($_POST['opcao3']));
		$opcao4 = utf8_encode(htmlspecialchars($_POST['opcao4']));
		$opcao5 = utf8_encode(htmlspecialchars($_POST['opcao5']));
			
			$conexao3 = conn_mysql();
	        
			
			
			$SQLInsert = 'INSERT INTO pergunta (IDquestionario, pergunta, OP1, OP2, OP3, OP4, OP5)
			  		  VALUES (?,?,?,?,?,?,?)';
					  
			//prepara a execução
			$operacao3 = $conexao3->prepare($SQLInsert);					  
		
			//executa a sentença SQL com os parâmetros passados por um vetor
			$inserir = $operacao3->execute(array($IDquestionario, $pergunta, $opcao1, $opcao2, $opcao3, $opcao4, $opcao5));
		
			// fecha a conexão ao banco
			$conexao3 = null;
		}

	
	
	$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM pergunta WHERE IDquestionario = ?';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);

		$operacao->execute(array($IDquestionario));
		$resultados = $operacao->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;		
		
		// se há resultados, os escreve em uma tabela
		
		$numeroPergunta = 1;
		
		echo '<form role="form" method="post" action="./cadastroPergunta.php?x=' .$IDquestionario. '">';
		echo '<div class="panel-default panel">';
			
			
			foreach($resultados as $perguntasEncontradas)
			{
			echo '<div class="row-fluid panel-body">';
				
				echo '<h3 class="sub-header">Pergunta '.$numeroPergunta.': </h3>';
				
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
			
				echo '<h3 class="sub-header">' .utf8_decode($perguntasEncontradas['pergunta']). '</h3>';
			
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 1: </h4>';
				echo '<strong>' .utf8_decode($perguntasEncontradas['OP1']). '</strong>';
				
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 2: </h4>';
				echo '<strong>' .utf8_decode($perguntasEncontradas['OP2']). '</strong>';
				
			echo '</div>';
			
			if($perguntasEncontradas['OP3']){
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 3: </h4>';
				echo '<strong>' .utf8_decode($perguntasEncontradas['OP3']). '</strong>';
				
			echo '</div>';
			}
			
			if($perguntasEncontradas['OP4']){
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 4: </h4>';
				echo '<strong>' .utf8_decode($perguntasEncontradas['OP4']). '</strong>';
				
			echo '</div>';
			}
			
			if($perguntasEncontradas['OP5']){
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 5: </h4>';
				echo '<strong>' .utf8_decode($perguntasEncontradas['OP5']). '</strong>';
				
			echo '</div>';
			}
			
			$numeroPergunta++;
			
			}
		
		echo '</div>';//<div class="panel-default panel">
		
		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';			
				echo '<h3 class="sub-header"> Cadastre uma nova pergunta:</h3>';
				
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
			
				echo '<input type="text" class="form-control" id="pergunta" name="pergunta" placeholder="Escreva sua pergunta" required>';
			
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 1: </h4>';
				echo '<input type="text" class="form-control" id="opcao1" name="opcao1" placeholder="Opção 1" required>';
				
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 2: </h4>';
				echo '<input type="text" class="form-control" id="opcao2" name="opcao2" placeholder="Opção 2" required>';
				
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 3: </h4>';
				echo '<input type="text" class="form-control" id="opcao3" name="opcao3" placeholder="Opção 3">';
				
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 4: </h4>';
				echo '<input type="text" class="form-control" id="opcao4" name="opcao4" placeholder="Opção 4">';
				
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 5: </h4>';
				echo '<input type="text" class="form-control" id="opcao5" name="opcao5" placeholder="Opção 5">';
				
			echo '</div>';
		
		
		echo '<button type="submit" class="btn btn-primary center-block">Cadastrar</button>';
		echo '</form>';
		
		
}	
		catch (PDOException $e)
		{
			// caso ocorra uma exceção, exibe na tela
			echo "Erro!: " . $e->getMessage() . "<br>";
			die();
		}

?>

    </div><!-- /.container -->
	
	<div class="sub-header"><a class="btn btn-large" href="../SAD/mainPage.php"><h3>Voltar</h3></a></div>

<?php
include_once("./modelos/rodape_html.html");
?>