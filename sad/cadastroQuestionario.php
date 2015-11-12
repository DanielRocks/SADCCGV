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
        <h2 class="sub-header">Questionários</h2>    
      </div>

<?php	  
try
{
	// instancia objeto PDO, conectando no mysql
	
	if(!empty($_POST['titulo'])){
		
		$titulo = utf8_encode(htmlspecialchars($_POST['titulo']));
		$gerencia = utf8_encode(htmlspecialchars($_POST['gerencia']));
			
			$conexao3 = conn_mysql();
	        
			
			
			$SQLInsert = 'INSERT INTO questionario (titulo, gerencia)
			  		  VALUES (?,?)';
					  
			//prepara a execução
			$operacao3 = $conexao3->prepare($SQLInsert);					  
		
			//executa a sentença SQL com os parâmetros passados por um vetor
			$inserir = $operacao3->execute(array($titulo, $gerencia));
		
			// fecha a conexão ao banco
			$conexao3 = null;
		}
	
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
		
		echo '<form role="form" method="post" action="./cadastroQuestionario.php">';
		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
				echo '<h2 class="sub-header">Escolha um questionário</h2>';
			echo '</div>';
		
				foreach($resultados as $questionariosEncontrados)
				{
					echo '<div class="row-fluid panel-body">';
						echo '<div class="col-md-4">';
							echo '<strong>' .$numeroQuestionario. ': ' .utf8_decode($questionariosEncontrados['titulo']). '</strong>';
						echo '</div>';
						$numeroQuestionario++;
						echo '<div class="col-md-2">';
							echo '<a href="cadastroPergunta.php?x='.$questionariosEncontrados['IDquestionario'].'">';
								echo '<strong>Inserir Perguntas</strong>';
							echo '</a>';
						echo '</div>';
						echo '<div class="col-md-2">';
							echo '<a href="edicaoPergunta.php?x='.$questionariosEncontrados['IDquestionario'].'">';
								echo '<strong>Modificar Perguntas</strong>';
							echo '</a>';
						echo '</div>';
						echo '<div class="col-md-2">';
							echo '<a href="verRespostas.php?x='.$questionariosEncontrados['IDquestionario'].'">';
								echo '<strong>Resultados</strong>';
							echo '</a>';
						echo '</div>';
						echo '<div class="col-md-2">';
							echo '<a href="verParticipantes.php?x='.$questionariosEncontrados['IDquestionario'].'">';
								echo '<strong>Participantes</strong>';
							echo '</a>';
						echo '</div>';
					echo '</div>';
				}
		
		echo '</div>';//<div class="panel-default panel">
		
		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
				echo '<h2 class="sub-header">Novo questionário</h2>';
				echo '<div class="row-fluid panel-body">';
					echo '<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" required>';
				echo '</div>';
			echo '</div>';
			
		echo '<div class="row-fluid panel-body">';
			echo '<select class="form-control" id="gerencia" name="gerencia" required>';
				echo '<option value = 1>Todos podem responder</option>';
				echo '<option value = 2>Apenas gerentes podem responder</option>';
			echo '</select>';
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