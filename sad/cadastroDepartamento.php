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
        <h2 class="sub-header">Departamentos</h2>    
      </div>

<?php	  
try
{
	// instancia objeto PDO, conectando no mysql
	
	if(!empty($_POST['nomeDepartamento'])){
		
		$nomeDepartamento = utf8_encode(htmlspecialchars($_POST['nomeDepartamento']));
			
			$conexao3 = conn_mysql();
	        
			
			
			$SQLInsert = 'INSERT INTO departamento (nomeDepartamento)
			  		  VALUES (?)';
					  
			//prepara a execução
			$operacao3 = $conexao3->prepare($SQLInsert);					  
		
			//executa a sentença SQL com os parâmetros passados por um vetor
			$inserir = $operacao3->execute(array($nomeDepartamento));
		
			// fecha a conexão ao banco
			$conexao3 = null;
		}
	
	$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM departamento ORDER BY nomeDepartamento';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);

		$operacao->execute();
		$resultados = $operacao->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
		
		
		
		// se há resultados, os escreve em uma tabela
		
		$numeroDepartamento = 1;
		
		echo '<form role="form" method="post" action="./cadastroDepartamento.php">';
		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
				//echo '<h2 class="sub-header">Departamentos</h2>';
			echo '</div>';
		
				foreach($resultados as $departamentosEncontradas)
				{
					echo '<div class="row-fluid panel-body">';
						echo '<div class="col-md-12">';
							echo '<strong>' .$numeroDepartamento. ': ' .utf8_decode($departamentosEncontradas['nomeDepartamento']). '</strong>';
						echo '</div>';
						$numeroDepartamento++;
						
					echo '</div>';
				}
		
		echo '</div>';//<div class="panel-default panel">
		
		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
				echo '<h2 class="sub-header">Novo departamento</h2>';
				echo '<div class="row-fluid panel-body">';
					echo '<input type="text" class="form-control" id="nomeDepartamento" name="nomeDepartamento" placeholder="Nome" required>';
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