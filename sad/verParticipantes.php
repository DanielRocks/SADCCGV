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
        <h2 class="sub-header">Participantes</h2>    
      </div>

<?php	  
try
{	
	$IDquestionario = $_GET["x"];

	$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT DISTINCT arquivoFoto, nomeCompleto FROM `funcionarios` f INNER JOIN `escolha` e ON f.IDfuncionario = e.IDfuncionario INNER JOIN `pergunta` p ON e.IDpergunta = p.IDpergunta INNER JOIN `questionario` q ON p.IDquestionario = q.IDquestionario WHERE q.IDquestionario = ?';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);

		$operacao->execute(array($IDquestionario));
		$resultados = $operacao->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		$SQLSelect = 'SELECT titulo FROM `questionario` WHERE IDquestionario = ?';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);

		$operacao->execute(array($IDquestionario));
		$resultados2 = $operacao->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;		
		
		// se há resultados, os escreve em uma tabela
		
		$numeroPergunta = 1;

		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';
				echo '<h3 class="sub-header">'.utf8_decode($resultados2[0]['titulo']).'</h3>';
			echo '</div>';	
			
			echo '<div class="row-fluid panel-body">';
				
				foreach($resultados as $funcionariosEncontrados)
				{
					echo '<div class="col-md-9"><img height="160" width="120" class="img-rounded" src="fotos/'. utf8_decode($funcionariosEncontrados['arquivoFoto']) .'"></img></div>';
					echo '<div class="col-md-3"><strong>' .utf8_decode($funcionariosEncontrados['nomeCompleto']). '</strong></div>';
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