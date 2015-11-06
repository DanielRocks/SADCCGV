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
        <h2 class="sub-header">Questionários</h2>    
      </div>

<?php	  
try
{
	// instancia objeto PDO, conectando no mysql
	
	$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM questionario';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);

		$operacao->execute();
		$resultados = $operacao->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
		
		// se há resultados, os escreve em uma tabela
		
		$numeroQuestionario = 1;
		

		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
				echo '<h2 class="sub-header">Escolha um questionário</h2>';
			echo '</div>';
		
				foreach($resultados as $questionariosEncontrados)
				{
							$conexao2 = conn_mysql();
							// instrução SQL básica (sem restrição de nome)
							$SQLSelect2 = 'SELECT * FROM `escolha` e INNER JOIN `pergunta` p ON e.IDpergunta = p.IDpergunta INNER JOIN `questionario` q ON p.IDquestionario = q.IDquestionario WHERE q.IDquestionario = ? AND e.login = ?';
								
							//prepara a execução da sentença
							$operacao2 = $conexao2->prepare($SQLSelect2);

							$operacao2->execute(array($questionariosEncontrados['IDquestionario'], $_SESSION['login']));
							$resultados2 = $operacao2->fetchAll();
							
							//captura TODOS os resultados obtidos
							
							
							// fecha a conexão (os resultados já estão capturados)
							$conexao2 = null;
					

								if($resultados2)
								{
									echo '<div class="row-fluid panel-body">';

										echo '<div class="col-md-12">';
											echo '<strong>' .$numeroQuestionario. ': ' .utf8_decode($questionariosEncontrados['titulo']). '</strong>';
										echo '</div>';
										$numeroQuestionario++;
									echo '</div>';
								}
								
								else
								{
									echo '<div class="row-fluid panel-body">';
									echo '<a href="responderPergunta.php?x='.$questionariosEncontrados['IDquestionario'].'">';
									echo '<div class="col-md-12">';
										echo '<strong>' .$numeroQuestionario. ': ' .utf8_decode($questionariosEncontrados['titulo']). '</strong>';
									echo '</div>';
									$numeroQuestionario++;
										echo '</a>';
								echo '</div>';
								}
							

				}
				echo '</div>';
		
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