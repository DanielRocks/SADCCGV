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
        <h3 class="sub-header">Sistema de Avaliação de Desempenho - <?PHP echo utf8_decode($_SESSION['nomeCompleto']);?></h3>    
      </div>
	  
<?php
try{
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
	$nomeBusca = utf8_decode($_SESSION['login']);
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM funcionarios WHERE login =?';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);
		
		$pesquisar = $operacao->execute(array($nomeBusca));
		
		$operacao->execute();

		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
		// se há resultados, os escreve em uma tabela
		if (count($SQLSelect)>0){		
			foreach($resultados as $contatosEncontrados){
			echo '<form role="form" method="post" enctype="multipart/form-data" action="./cadastroAvaliacaoSistema.php" class="form-signin">';
				echo '<div class="panel-default panel">';
					echo '<div class="panel-heading">';	
					echo '<h3>Avalie o sistema</h3>';
				echo '</div>';
				echo '<div class="form-group">';
					echo '<textarea class="form-control" id="InputAvaliacao" rows="4" name="opiniao">'. utf8_decode($contatosEncontrados['opiniao']) .'</textarea>';
				echo '</div>';
				echo '</div>';
			
				echo '<button type="submit" class="btn btn-primary">Salvar</button>';
			
			echo '</form>';
			echo '</div>';
			}
		}
		else{
			echo'<div class="starter-template">';
			echo"\n<h3 class=\sub-header\>Nenhum aluno encontrado.</h3>";
			echo'</div>';
		}
	} //try
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