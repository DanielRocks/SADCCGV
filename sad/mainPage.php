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
	  
	   <form class="navbar-form " role="form" method="post" action="./mainPage.php">
            <div class="form-group">
              <input type="text" placeholder="Nome" name="filtro" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-sm btn-default">Filtrar</button>
	   </form>
	  
<?php
try{
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM funcionarios';
	
	   if(!empty($_POST['filtro'])){
	         $nomeBusca = utf8_encode(htmlspecialchars($_POST['filtro']));
			 $nomeBusca = "%".$nomeBusca."%";
			 $SQLSelect .= ' WHERE nomeCompleto like ?';
		}
		
		$SQLSelect .= ' ORDER by nomeCompleto';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);

		if(!empty($_POST['filtro'])){				
			//executa a sentença SQL com o valor passado por parâmetro
			$pesquisar = $operacao->execute(array($nomeBusca));
		}
		else{		
		$operacao->execute();
		}

		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
		// se há resultados, os escreve em uma tabela
		if (count($SQLSelect)>0){		
			echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
			echo '<h3 class="sub-header">Funcionários</h3>';
			echo '</div>';
			foreach($resultados as $contatosEncontrados){		//para cada elemento do vetor de resultados...
				
				//em cada 'linha' do vetor de resultados existem elementos com os mesmos nomes dos campos recuperados do SGBD
				if($contatosEncontrados['gerencia'] < 2)
				{
					echo '<div class="row-fluid panel-body"><a href="perfil.php?x='. $contatosEncontrados['IDfuncionario'] .'">';
					echo '<div class="col-md-4"><strong>'. utf8_decode($contatosEncontrados['nomeCompleto']) .'</strong></div>';
					
					if($_SESSION['gerencia'] > 0)
					{					
						echo '<div class="col-md-4"><img height="80" width="60" class="img-rounded" src="fotos/'. utf8_decode($contatosEncontrados['arquivoFoto']) .'"></img></div>';
						echo '</a>';
						echo '<a href="relatorio.php?x='. $contatosEncontrados['IDfuncionario'] .'">';
						echo '<div class="col-md-4"><strong>Ver Relatórios</strong></div>';
						echo '</div></a>';
						
						
					}
					else
					{
						echo '<div class="col-md-8"><img height="80" width="60" class="img-rounded" src="fotos/'. utf8_decode($contatosEncontrados['arquivoFoto']) .'"></img></div>';
						echo '</div></a>';
					}
				}

			}
			echo '</div>';
		}
		else{
			echo'<div class="starter-template">';
			echo"\n<h3 class=\sub-header\>Nenhum funcionário encontrado.</h3>";
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