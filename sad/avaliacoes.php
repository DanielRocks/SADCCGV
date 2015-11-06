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
      </div>
	  
<?php
try{
	// instancia objeto PDO, conectando no mysql
	
	$IDavaliacao = $_GET["x"];
	
	if(!empty($_POST['conclusao']))
	{
		
		$conclusao = utf8_encode(htmlspecialchars($_POST['conclusao']));
			
		$conexao6 = conn_mysql();
	        
		$SQLBusca = 'SELECT * FROM funcionarios';
			
		$SQLUpdate = 'UPDATE avaliacao SET conclusao=? WHERE IDavaliacao=?';
		
		$SQLDeleteFunc = 'DELETE FROM avafunc WHERE IDavaliacao=?';
		
		$SQLDeleteQuest = 'DELETE FROM avaquest WHERE IDavaliacao=?';
		
		$SQLInsertFunc = 'INSERT INTO avafunc (IDavaliacao, IDfuncionario) VALUES (?,?)';
		
		$SQLInsertQuest = 'INSERT INTO avaquest (IDavaliacao, IDquestionario) VALUES (?,?)';
					  
		//prepara a execução
		$operacao6 = $conexao6->prepare($SQLUpdate);					  
		
		//executa a sentença SQL com os parâmetros passados por um vetor
		$atualizacao = $operacao6->execute(array($conclusao, $IDavaliacao));
		
		
		$operacao6 = $conexao6->prepare($SQLBusca);
		$atualizacao = $operacao6->execute();
		
		
		$operacao6 = $conexao6->prepare($SQLDeleteFunc);
		$funcDelete = $operacao6->execute(array($IDavaliacao));
		
		$operacao6 = $conexao6->prepare($SQLDeleteQuest);
		$questDelete = $operacao6->execute(array($IDavaliacao));
		
		if(isset($_POST['funcionarios']))
		{
			foreach($_POST['funcionarios'] as $check)
			{
				$operacao6 = $conexao6->prepare($SQLInsertFunc);
				$funcInsert = $operacao6->execute(array($IDavaliacao, $check));			
			}
		}
		
		if(isset($_POST['questionarios']))
		{
			foreach($_POST['questionarios'] as $check)
			{
				$operacao6 = $conexao6->prepare($SQLInsertQuest);
				$questInsert = $operacao6->execute(array($IDavaliacao, $check));
			}
		}
		
		
		
		
		// fecha a conexão ao banco
		$conexao6 = null;
		
	}
	
	
	$conexao = conn_mysql();
		
				
		$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM avaliacao WHERE IDavaliacao = ?';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);

		$operacao->execute(array($IDavaliacao));
		$resultados = $operacao->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
		
		$conexao2 = conn_mysql();
		
		$SQLSelect2 = 'SELECT * FROM funcionarios f INNER JOIN avaFunc a ON f.IDfuncionario = a.IDfuncionario WHERE a.IDavaliacao = ?';
			
		//prepara a execução da sentença
		$operacao2 = $conexao2->prepare($SQLSelect2);

		$operacao2->execute(array($IDavaliacao));
		$resultados2 = $operacao2->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao2 = null;
		
		
		$conexao3 = conn_mysql();
		
		$SQLSelect3 = 'SELECT * FROM questionario q INNER JOIN avaQuest a ON q.IDquestionario = a.IDquestionario WHERE a.IDavaliacao = ?';
			
		//prepara a execução da sentença
		$operacao3 = $conexao3->prepare($SQLSelect3);

		$operacao3->execute(array($IDavaliacao));
		$resultados3 = $operacao3->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao3 = null;
		
		
		
		$conexao4 = conn_mysql();
							
		$SQLSelect4 = 'SELECT * FROM funcionarios';
			
		//prepara a execução da sentença
		$operacao4 = $conexao4->prepare($SQLSelect4);

		$operacao4->execute();
		$resultados4 = $operacao4->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao4 = null;
		
		
		
		$conexao5 = conn_mysql();
							
		$SQLSelect5 = 'SELECT * FROM questionario';
			
		//prepara a execução da sentença
		$operacao5 = $conexao5->prepare($SQLSelect5);

		$operacao5->execute();
		$resultados5 = $operacao5->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao5 = null;
		
		
		
		$conexao7 = conn_mysql();
		
		$SQLSelect7 = 'SELECT f.IDfuncionario FROM funcionarios f INNER JOIN avaFunc a ON f.IDfuncionario = a.IDfuncionario WHERE a.IDavaliacao = ?';
			
		//prepara a execução da sentença
		$operacao7 = $conexao7->prepare($SQLSelect7);

		$operacao7->execute(array($IDavaliacao));
		$resultados7 = $operacao7->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao7 = null;
		
		
		$conexao8 = conn_mysql();
		
		$SQLSelect8 = 'SELECT q.IDquestionario FROM questionario q INNER JOIN avaQuest a ON q.IDquestionario = a.IDquestionario WHERE a.IDavaliacao = ?';
			
		//prepara a execução da sentença
		$operacao8 = $conexao8->prepare($SQLSelect8);

		$operacao8->execute(array($IDavaliacao));
		$resultados8 = $operacao8->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao3 = null;
		
		
		
		
		echo '<form role="form" method="post" action="./avaliacoes.php?x=' .$IDavaliacao. '">';
		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
				echo '<h2 class="sub-header">Avaliação</h2>';
			echo '</div>';
		
				foreach($resultados as $avaliacoesEncontradas)
				{
					echo '<div class="row-fluid panel-body">';
						echo '<div class="col-md-8">';			
							
							foreach($resultados2 as $contatosEncontrados)
							{
								echo '<img height="80" width="60" class="img-rounded" src="fotos/'. utf8_decode($contatosEncontrados['arquivoFoto']) .'"></img> <strong>'.$contatosEncontrados['nomeCompleto'].'</strong> <br>';
							}
							
						echo '</div>';

						echo '<div class="col-md-4">';
							echo '<strong>' .$avaliacoesEncontradas['conclusao']. '</strong>';
						echo '</div>';
					echo '</div>';
				}
		
		echo '</div>';//<div class="panel-default panel">
		
		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';
				echo '<h2 class="sub-header">Escolha quem deve ser avaliado</h2>';
				$checked = 0;
				$contagem = count($resultados7);
				foreach($resultados4 as $contatosEncontrados)
						{
							echo '<div class="row-fluid panel-body">';
							echo '<input type="checkbox" name="funcionarios[]" value="'.$contatosEncontrados['IDfuncionario'].'" ';
									
							if($resultados7)
							{
								if($contagem > 0)
								{
									if($contatosEncontrados['IDfuncionario'] == $resultados7[$checked]['IDfuncionario'])
									{
										echo 'checked';
										$checked++;
										$contagem--;
									}
								}
							}
									
							echo '> <img height="80" width="60" class="img-rounded" src="fotos/'. utf8_decode($contatosEncontrados['arquivoFoto']) .'"></img> <strong>'.$contatosEncontrados['nomeCompleto'].'</strong> <br>';
							echo '</div>';;
									
							
								
									/*if($checked == 1)
									{
										echo '<div class="row-fluid panel-body">';
										echo '<input type="checkbox" name="funcionarios[]" value="'.$contatosEncontrados['IDfuncionario'].'" checked> <img height="80" width="60" class="img-rounded" src="fotos/'. utf8_decode($contatosEncontrados['arquivoFoto']) .'"></img> <strong>'.$contatosEncontrados['nomeCompleto'].'</strong> <br>';
										echo '</div>';
									}
									
									if($checked == 0)
									{
										echo '<div class="row-fluid panel-body">';
										echo '<input type="checkbox" name="funcionarios[]" value="'.$contatosEncontrados['IDfuncionario'].'"> <img height="80" width="60" class="img-rounded" src="fotos/'. utf8_decode($contatosEncontrados['arquivoFoto']) .'"></img> <strong>'.$contatosEncontrados['nomeCompleto'].'</strong> <br>';
										echo '</div>';
									}
									
									$checked = 0;*/ //trecho antigo de código
								
						}
			echo '</div>';
		echo '</div>';//<div class="panel-default panel">
		
		
		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';
				echo '<h2 class="sub-header">Escolha quais questionários usar</h2>';
				echo '</div>';
				$numeroQuestionario = 1;
				$checked = 0;
				$contagem = count($resultados8);
				foreach($resultados5 as $questionariosEncontrados)
						{
							echo '<div class="row-fluid panel-body">';
							echo '<input type="checkbox" name="questionarios[]" value="'.$questionariosEncontrados['IDquestionario'].'" ';
							
							if($resultados8)
							{
								if($contagem > 0)
								{
									if($questionariosEncontrados['IDquestionario'] == $resultados8[$checked]['IDquestionario'])
									{
										echo 'checked';
										$checked++;	
										$contagem--;
									}
								}
							}
							
							echo '><strong>' .$numeroQuestionario. ': ' .utf8_decode($questionariosEncontrados['titulo']). '</strong>';
							$numeroQuestionario++;
							echo '</div>';

								/*foreach($resultados8 as $questionariosEncontrados2)
								{
									if($questionariosEncontrados['IDquestionario'] == $questionariosEncontrados2['IDquestionario'])
									{
										$checked = 1;
									}
									if($checked == 1)
									{
										echo '<div class="row-fluid panel-body">';
										echo '<input type="checkbox" name="questionarios[]" value="'.$questionariosEncontrados['IDquestionario'].'" checked><strong>' .$numeroQuestionario. ': ' .utf8_decode($questionariosEncontrados['titulo']). '</strong>';
										$numeroQuestionario++;;
										echo '</div>';
									}
									else
									{
										echo '<div class="row-fluid panel-body">';
										echo '<input type="checkbox" name="questionarios[]" value="'.$questionariosEncontrados['IDquestionario'].'"><strong>' .$numeroQuestionario. ': ' .utf8_decode($questionariosEncontrados['titulo']). '</strong>';
										$numeroQuestionario++;
										echo '</div>';
									}
										
									$checked = 0;
									}/* // trecho antigo de código
							
							
							/*if($resultados3 == null)
							{
								echo '<div class="row-fluid panel-body">';
								echo '<input type="checkbox" name="questionarios[]" value="'.$questionariosEncontrados['IDquestionario'].'"><strong>' .$numeroQuestionario. ': ' .utf8_decode($questionariosEncontrados['titulo']). '</strong>';
								$numeroQuestionario++;;
								echo '</div>';
							}*/
						}
		echo '</div>';//<div class="panel-default panel">
		
		
		echo '<div class="panel-default panel">';
			echo '<div class="panel-heading">';	
				echo '<h2 class="sub-header">Modifique sua Conclusão</h2>';
				echo '<div class="row-fluid panel-body">';
					foreach($resultados as $avaliacoesEncontradas){
					echo '<textarea class="form-control" id="InputConclusao" rows="4" name="conclusao">'. utf8_decode($avaliacoesEncontradas['conclusao']) .'</textarea>';}
				echo '</div>';
			echo '</div>';
			
		echo '</div>';//<div class="panel-default panel">
		echo '<button type="submit" class="btn btn-primary center-block">Confirmar</button>';
		
		echo '</form>';
		
		
		
		
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