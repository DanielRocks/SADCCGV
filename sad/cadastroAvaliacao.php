<?php
require_once("./authSession.php");  
require_once("./authPermission.php");
require_once("./conf/confBD.php");
if ($_SESSION['gerencia'] < 2){
include_once("./modelos/cabecalho_SAD.html");}
else
{include_once("./modelos/cabecalho_SAD_Gerencia.html");}
?>

    <div class="container">

      <div class="starter-template">
        <h2 class="sub-header">Avaliações</h2>    
      </div>

<?php	  
try
{
	// instancia objeto PDO, conectando no mysql
	
	if(!empty($_POST['nomeAvaliacao'])){
		
		$nomeAvaliacao = utf8_encode(htmlspecialchars($_POST['nomeAvaliacao']));
			
			$conexao3 = conn_mysql();
	        
			
			
			$SQLInsert = 'INSERT INTO avaliacao (nomeAvaliacao)
			  		  VALUES (?)';
					  
			//prepara a execução
			$operacao3 = $conexao->prepare($SQLInsert);					  
		
			//executa a sentença SQL com os parâmetros passados por um vetor
			$inserir = $operacao->execute(array($nomeAvaliacao));
		
			// fecha a conexão ao banco
			$conexao3 = null;
		}
	
	$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM avaliacao';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);

		$operacao->execute();
		$resultados = $operacao->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
		
		
	$conexao2 = conn_mysql();
		
		$SQLSelect2 = 'SELECT * FROM funcionarios WHERE gerencia < 2';
			
		//prepara a execução da sentença
		$operacao2 = $conexao2->prepare($SQLSelect2);

		$operacao2->execute();
		$resultados2 = $operacao2->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao2 = null;
		
		
		
		
		// se há resultados, os escreve em uma tabela
		
		$numeroAvaliacao = 1;
		
		echo '<form role="form" method="post" action="./cadastroAvaliacao.php">';
		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
				echo '<h2 class="sub-header">Escolha uma avaliação</h2>';
			echo '</div>';
		
				foreach($resultados as $avaliacoesEncontradas)
				{
					echo '<div class="row-fluid panel-body">';
						echo '<div class="col-md-8">';
							echo '<strong>' .$numeroAvaliacao. ': ' .utf8_decode($avaliacoesEncontradas['nomeAvaliacao']). '</strong>';
						echo '</div>';
						$numeroAvaliacao++;
						echo '<div class="col-md-4">';
							echo '<a href="avaliacoes.php?x='.$avaliacoesEncontradas['IDavaliacao'].'">';
								echo '<strong>Modificar Avaliação</strong>';
							echo '</a>';
						echo '</div>';
					echo '</div>';
				}
		
		echo '</div>';//<div class="panel-default panel">
		
		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
				echo '<h2 class="sub-header">Nova avaliação</h2>';
				echo '<div class="row-fluid panel-body">';
					echo '<input type="text" class="form-control" id="nomeAvaliacao" name="nomeAvaliacao" placeholder="Título" required>';
				echo '</div>';
			echo '</div>';
			
		echo '</div>';//<div class="panel-default panel">
		
		
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