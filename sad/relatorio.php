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
	
	$IDFuncionario = $_GET["x"];
	
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM funcionarios WHERE IDfuncionario = ?';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);
		
		$pesquisar = $operacao->execute(array($IDFuncionario));
		
		$operacao->execute();

		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
		
		
		$conexao2 = conn_mysql();
		
		$SQLSelect2 = 'SELECT * FROM funcionarios f INNER JOIN avafunc a ON f.IDfuncionario = a.IDfuncionario WHERE f.IDFuncionario = ?';
			
		//prepara a execução da sentença
		$operacao2 = $conexao2->prepare($SQLSelect2);

		$operacao2->execute(array(utf8_decode($IDFuncionario)));
		$resultados2 = $operacao2->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao2 = null;
		
		
		$conexao3 = conn_mysql();
		
		$SQLSelect3 = 'SELECT * FROM avaliacao a INNER JOIN avafunc af ON a.IDavaliacao = a.IDavaliacao WHERE af.IDfuncionario = ?';
			
		//prepara a execução da sentença
		$operacao3 = $conexao3->prepare($SQLSelect3);

		$operacao3->execute(array($_SESSION['ID']));
		$resultados3 = $operacao3->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao3 = null;
		
		
		
		
		
		// se há resultados, os escreve em uma tabela
		if (count($SQLSelect)>0){		
			echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
			foreach ($resultados as $funcionariosEncontrados)
			{
				echo '<h2 class="sub-header">Relatórios de ' .$funcionariosEncontrados['nomeCompleto']. '</h3>';
			}

			echo '</div>';
			foreach($resultados2 as $contatosEncontrados){		//para cada elemento do vetor de resultados...
				
				foreach($resultados3 as $avaliacoesEncontradas){
					
					if($contatosEncontrados['IDavaliacao'] == $avaliacoesEncontradas['IDavaliacao']){
					
						//em cada 'linha' do vetor de resultados existem elementos com os mesmos nomes dos campos recuperados do SGBD
						
						$conexao = conn_mysql();
						$SQLSelect = 'SELECT * FROM questionario WHERE IDquestionario = ?';
						$operacao = $conexao->prepare($SQLSelect);
						$operacao->execute(array($avaliacoesEncontradas['IDquestionario']));
						$resultados4 = $operacao->fetchAll();
						
						$conexao = null;
						
						echo '<div class="row-fluid panel-body">';
						echo '<div class="col-md-3"><strong>'. utf8_decode($avaliacoesEncontradas['nomeAvaliacao']) .'</strong></div>';
						foreach($resultados4 as $quest){
							if($quest['gerencia'] == 1)
							{
								echo '<div class="col-md-3"><strong>Avaliado por funcionários</strong><br></div>';
								echo '<div class="col-md-3"><strong>Questionário:</strong><br>'. utf8_decode($quest['titulo']) .'</div>';
							}
							else
							{
								if($quest['gerencia'] == 2)
								{
									echo '<div class="col-md-4"><strong>Avaliado apenas por gerentes</strong><br></div>';
								}
							}
						}
						echo '<div class="col-md-3"><strong>Conclusão:</strong><br>'. utf8_decode($avaliacoesEncontradas['conclusao']) .'</strong></div>';
						echo '</div>';
					}
				}

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