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
        <h2 class="sub-header">Resultados</h2>    
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

		echo '<div class="panel-default panel">';
			
			
			foreach($resultados as $perguntasEncontradas)
			{
			echo '<div class="panel-heading">';
				
				echo '<h3 class="sub-header">Pergunta '.$numeroPergunta.': </h3>';
				
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
			
				echo '<h3 class="sub-header">' .utf8_decode($perguntasEncontradas['pergunta']). '</h3>';
			
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Resposta mais frequente: ';
				
					$conexao2 = conn_mysql();
					// instrução SQL básica (sem restrição de nome)
					$SQLSelect2 = 'SELECT COUNT(resposta) AS resCount FROM escolha WHERE IDpergunta = ? GROUP BY resposta ORDER BY COUNT(resposta) DESC LIMIT 1';
			
					//prepara a execução da sentença
					$operacao2 = $conexao2->prepare($SQLSelect2);

					$operacao2->execute(array($perguntasEncontradas['IDpergunta']));
					$resultados2 = $operacao2->fetchAll();
		
					//captura TODOS os resultados obtidos
		
		
					// fecha a conexão (os resultados já estão capturados)
			
					$conexao2 = null;	
					
					foreach($resultados2 as $contagem){
				
						switch ($contagem['resCount']){
							case "1":
								echo utf8_decode($perguntasEncontradas['OP1']);
								break;
					
							case "2":
								echo utf8_decode($perguntasEncontradas['OP2']);
								break;
					
							case "3":
								echo utf8_decode($perguntasEncontradas['OP3']);
								break;
					
							case "4":
								echo utf8_decode($perguntasEncontradas['OP4']);
								break;
					
							case "5":
								echo utf8_decode($perguntasEncontradas['OP5']);
								break;
						}
						echo '</h4>';
					}
				$numeroPergunta++;
			echo '</div>';
			}
			

		
		echo '</div>';//<div class="panel-default panel">
		
		
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