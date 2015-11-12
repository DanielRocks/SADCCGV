<?php
require_once("./authSession.php");  
require_once("./conf/confBD.php");
if ($_SESSION['gerencia'] < 2){
include_once("./modelos/cabecalho_SAD.html");}
else
{include_once("./modelos/cabecalho_SAD_Gerencia.html");}
?>

<?php	  
try
{	
	$IDquestionario = $_GET["x"];
	
	$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM pergunta WHERE IDquestionario = ?';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);

		$operacao->execute(array($IDquestionario));
		$resultados = $operacao->fetchAll();
		
		$SQLSelect = 'SELECT titulo FROM questionario WHERE IDquestionario = ?';
		
		$operacao = $conexao->prepare($SQLSelect);

		$operacao->execute(array($IDquestionario));
		$resultados2 = $operacao->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;		
		
		// se há resultados, os escreve em uma tabela
		
		$numeroPergunta = 1;
		
		echo '<div class="container">';

		echo '<div class="starter-template">';
			echo '<h2 class="sub-header">';
				foreach ($resultados2 as $titulos)
				{echo utf8_decode($titulos['titulo']);}
			echo '</h2>';   
		echo '</div>';
		
		echo '<form role="form" method="post" action="./cadastroRespostas.php">';
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
				echo '<input type="radio" name="OP[' .$numeroPergunta. ']" value="' .$perguntasEncontradas['IDpergunta']. ',1"> ' .utf8_decode($perguntasEncontradas['OP1']). '';
				
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
				echo '<input type="radio" name="OP[' .$numeroPergunta. ']" value="' .$perguntasEncontradas['IDpergunta']. ',2"> ' .utf8_decode($perguntasEncontradas['OP2']). '';
				
			echo '</div>';
			
			if($perguntasEncontradas['OP3']){
			
				echo '<div class="row-fluid panel-body">';
					echo '<input type="radio" name="OP[' .$numeroPergunta. ']" value="' .$perguntasEncontradas['IDpergunta']. ',3"> ' .utf8_decode($perguntasEncontradas['OP3']). '';
				
				echo '</div>';
				
			}
			
			if($perguntasEncontradas['OP4']){
			
				echo '<div class="row-fluid panel-body">';
					echo '<input type="radio" name="OP[' .$numeroPergunta. ']" value="' .$perguntasEncontradas['IDpergunta']. ',4"> ' .utf8_decode($perguntasEncontradas['OP4']). '';
				
				echo '</div>';
				
			}
			
			if($perguntasEncontradas['OP5']){
				
				echo '<div class="row-fluid panel-body">';
					echo '<input type="radio" name="OP[' .$numeroPergunta. ']" value="' .$perguntasEncontradas['IDpergunta']. ',5"> ' .utf8_decode($perguntasEncontradas['OP5']). '';
				
				echo '</div>';
				
			}
			
			$numeroPergunta++;
			
			}
		
		echo '</div>';//<div class="panel-default panel">
		
		
		echo '<button type="submit" class="btn btn-primary center-block">Responder</button>';
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