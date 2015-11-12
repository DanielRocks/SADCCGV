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
        <h3 class="sub-header">Perfil</h3>    
      </div>

<?php	  
try
{
	if(isset($_POST['gerencia']))
	{
		$conexao = conn_mysql();
		$SQLUpdate = 'UPDATE funcionarios SET gerencia=? WHERE IDfuncionario=?';
		$operacao = $conexao->prepare($SQLUpdate);
		$operacao->execute(array($_POST['gerencia'], $_GET["x"]));
		
		$conexao = null;
	}
	
	
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM funcionarios';
	
	   if(!empty($_GET["x"])){
	         $Busca = $_GET["x"];
			 $SQLSelect .= ' WHERE IDfuncionario = ?';
		}
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);

		if(!empty($_GET["x"])){
			$operacao->execute(array($Busca));
			$resultados = $operacao->fetchAll();
		}
		else{
			$operacao->execute();
			$resultados = $operacao->fetchAll();
		}
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		
		
		
		
		
		
		$conexao = null;
		
		// se há resultados, os escreve em uma tabela
		if(!empty($_GET["x"])){
			foreach($resultados as $contatosEncontrados){		//para cada elemento do vetor de resultados...
				
				echo '<div class="row-fluid panel-body">';
				echo '<div class="col-md-1"><strong>'. utf8_decode($contatosEncontrados['nomeCompleto']) .'</strong></div>';
				echo '<div class="col-md-3"><img height="320" width="240" class="img-rounded" src="fotos/'. utf8_decode($contatosEncontrados['arquivoFoto']) .'"></img></div>';
				echo '<div class="col-md-2"><strong>E-Mail:</strong><br> '. utf8_decode($contatosEncontrados['email']) .'</div>';
				
				$conexao = conn_mysql();
				
				$SQLResponsavel = 'SELECT nomeDepartamento FROM departamento where IDdepartamento = ?';
				$operacao = $conexao->prepare($SQLResponsavel);
				$operacao->execute(array($contatosEncontrados['IDdepartamento']));
				$departamento = $operacao->fetchAll();
				$conexao = null;
				
				foreach($departamento as $departamentoEncontrado){
					echo '<div class="col-md-2"><strong>Departamento:</strong><br>'. utf8_decode($departamentoEncontrado['nomeDepartamento']) .'</div>';
				}
				
				$conexao = conn_mysql();
				
				$SQLResponsavel = 'SELECT nomeCompleto FROM funcionarios where IDfuncionario = ?';
				$operacao = $conexao->prepare($SQLResponsavel);
				$operacao->execute(array($contatosEncontrados['responsavel']));
				$resResponsavel = $operacao->fetchAll();
				$conexao = null;
				
				foreach($resResponsavel as $responsavelEncontrado){
					echo '<div class="col-md-4"><strong>Responsável:</strong><br>'. utf8_decode($responsavelEncontrado['nomeCompleto']) .'</div>';
				}
				
				
				echo '</div>';
				
			if($_SESSION['gerencia'] > 0)
			{
				echo '<form role="form" method="post" action="./perfil.php?x=' .$_GET["x"]. '">';
				echo '<div class="panel-default panel">';
					echo '<div class="panel-heading">';	
						echo '<h2 class="sub-header">Nível de gerência</h2>';
					echo '</div>';
					echo '<div class="row-fluid panel-body">';
						echo '<select class="form-control" id="gerencia" name="gerencia" required>';
							echo '<option value = 0';
								foreach($resultados as $geren)
								{
									if($geren['gerencia'] == 0)
									{echo ' selected';}
								}
							echo '>Funcionário</option>';
							echo '<option value = 1';
								foreach($resultados as $geren)
								{
									if($geren['gerencia'] == 1)
									{echo ' selected';}
								}
							echo '>Gerente</option>';
							
						echo '</select>';
					echo '</div>';
				echo '</div>';
				
				
					echo '<button type="submit" class="btn btn-primary center-block">Atualizar nível de gerência</button>';
				echo '</form>';
			}
			
			}
		}
		
		if(!empty($_GET["x"])){
		echo '<div class="sub-header"><a class="btn btn-large" href="../SAD/mainPage.php"><h3>Voltar</h3></a></div>';
		}
}	
		catch (PDOException $e)
		{
			// caso ocorra uma exceção, exibe na tela
			echo "Erro!: " . $e->getMessage() . "<br>";
			die();
		}

?>

    </div><!-- /.container -->

<?php
include_once("./modelos/rodape_html.html");
?>