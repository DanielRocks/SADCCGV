<?php
require_once("./authSession.php");
require_once("./conf/confBD.php");
include_once("./modelos/cabecalho_SAD.html");
?>

    <div class="container">

      <div class="starter-template">
        <h3 class="sub-header">Sistema de Avaliação de Desempenho - <?PHP echo utf8_decode($_SESSION['nomeCompleto']);?></h3>    
      </div>
	  
<?php
try{
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM funcionarios';
	
	         $nomeBusca = utf8_decode($_SESSION['login']);
			 $nomeBusca = "%".$nomeBusca."%";
			 $SQLSelect .= ' WHERE login LIKE ?';
			
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
			echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
			echo '<h3>Relatório</h3>';
			echo '</div>';
			foreach($resultados as $contatosEncontrados){		//para cada elemento do vetor de resultados...
				
				//em cada 'linha' do vetor de resultados existem elementos com os mesmos nomes dos campos recuperados do SGBD
				echo '<div class="row-fluid panel-body">';
				echo '<div class="col-md-4"><strong>'. utf8_decode($contatosEncontrados['nomeCompleto']) .'</strong></div>';
				echo '<div class="col-md-4"><img height="80" width="60" class="img-rounded" src="fotos/'. utf8_decode($contatosEncontrados['arquivoFoto']) .'"></img></div>';
				echo '<div class="col-md-4"><strong>Relatório:</strong><br>'. utf8_decode($contatosEncontrados['opiniao']) .'</strong></div>';
				echo '</div>';

			}
			echo '</div>';
		}
		else{
			echo'<div class="starter-template">';
			echo"\n<h3 class=\sub-header\>Nenhum funcioário encontrado.</h3>";
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