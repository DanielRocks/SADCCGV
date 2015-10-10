<?php
require_once("./authSession.php");  
require_once("./conf/confBD.php");
include_once("./modelos/cabecalho_SAD.html");
?>

    <div class="container">

      <div class="starter-template">
        <h2 class="sub-header">Cadastro de Questionário</h2>    
      </div>

<?php	  
try
{
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM funcionarios';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);

		$operacao->execute();
		$resultados = $operacao->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
		// se há resultados, os escreve em uma tabela
		
		$numeroPergunta = 1;
		
		echo '<form role="form" method="post" enctype="multipart/form-data" action="./cadastroNovoUsuario.php" class="form-signin">';
		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
				echo '<h2 class="sub-header">Escolha quem avaliar</h2>';
		
				foreach($resultados as $contatosEncontrados)
				{
					echo '<div class="row-fluid panel-body">';
					echo '<input type="checkbox" name="funcionarios" value="'.$contatosEncontrados['login'].'"> <img height="80" width="60" class="img-rounded" src="fotos/'. utf8_decode($contatosEncontrados['arquivoFoto']) .'"></img> <strong>'.$contatosEncontrados['nomeCompleto'].'</strong> <br>';
					echo '</div>';
				}
			echo '</div>';

			echo '<div class="row-fluid panel-body">';
				
				echo '<h3 class="sub-header">Pergunta '.$numeroPergunta.'</h3>';
				
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
			
				echo '<input type="text" class="form-control" id="Pergunta['.$numeroPergunta.']" name="pergunta['.$numeroPergunta.']" placeholder="Escreva sua pergunta" required>';
			
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