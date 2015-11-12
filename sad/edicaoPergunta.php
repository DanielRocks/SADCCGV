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
        <h2 class="sub-header">Editando perguntas</h2>    
      </div>

<?php	  
try
{	
	$IDquestionario = $_GET["x"];
	
	if(!empty($_POST['pergunta']) && !empty($_POST['opcao1']) && !empty($_POST['opcao2'])){
		
		$IDpergunta = ($_POST['ID']);
		$pergunta = $_POST['pergunta'];
		$opcao1 = $_POST['opcao1'];
		$opcao2 = $_POST['opcao2'];
		$opcao3 = $_POST['opcao3'];
		$opcao4 = $_POST['opcao4'];
		$opcao5 = $_POST['opcao5'];
		$gerencia = $_POST['gerencia'];
			
			$conexao3 = conn_mysql();
	        
			$SQLUpdate = 'UPDATE pergunta SET pergunta=?, OP1=?, OP2=?, OP3=?, OP4=?, OP5=? WHERE IDpergunta=?';
			
			$numUpdate = 0;
			$numCount = count($IDpergunta);
			
			while($numUpdate < $numCount)
			{
				$perg = utf8_encode(htmlspecialchars($pergunta[$numUpdate]));
				$OP1 = utf8_encode(htmlspecialchars($opcao1[$numUpdate]));
				$OP2 = utf8_encode(htmlspecialchars($opcao2[$numUpdate]));
				$OP3 = utf8_encode(htmlspecialchars($opcao3[$numUpdate]));
				$OP4 = utf8_encode(htmlspecialchars($opcao4[$numUpdate]));
				$OP5 = utf8_encode(htmlspecialchars($opcao5[$numUpdate]));
				$ID = $IDpergunta[$numUpdate];
				$numUpdate++;
				
				$operacao = $conexao3->prepare($SQLUpdate);
				$pergUpdate = $operacao->execute(array($perg, $OP1, $OP2, $OP3, $OP4, $OP5, $ID));
			}
		
			// fecha a conexão ao banco
			
			$SQLUpdateQuest = 'UPDATE questionario SET gerencia=? WHERE IDquestionario=?';
			$operacao = $conexao3->prepare($SQLUpdateQuest);
			$questUpdate = $operacao->execute(array($gerencia, $IDquestionario));
			
			$conexao3 = null;
		}

	
	
	$conexao = conn_mysql();
		
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM pergunta WHERE IDquestionario = ?';
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);

		$operacao->execute(array($IDquestionario));
		$resultados = $operacao->fetchAll();
		
		//captura TODOS os resultados obtidos
		
		$SQLSelect2 = 'SELECT * FROM questionario WHERE IDquestionario = ?';
		$operacao = $conexao->prepare($SQLSelect2);
		$operacao->execute(array($IDquestionario));
		$resultados2 = $operacao->fetchAll();
		
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;		
		
		// se há resultados, os escreve em uma tabela
		
		$numeroPergunta = 1;
		
		echo '<form role="form" method="post" action="./edicaoPergunta.php?x=' .$IDquestionario. '">';
		echo '<div class="panel-default panel">';
			
			
			foreach($resultados as $perguntasEncontradas)
			{
			echo '<div class="panel-heading">';
				
				echo '<h3 class="sub-header">Pergunta '.$numeroPergunta.': </h3>';
				
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
			
				echo '<input type="hidden" name="ID[]" value="'.$perguntasEncontradas['IDpergunta'].'">';
				echo '<textarea class="form-control" id="InputPergunta[]" name="pergunta[]" required>' .utf8_decode($perguntasEncontradas['pergunta']). '</textarea>';
			
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 1: </h4>';
				echo '<textarea class="form-control" id="InputOpcao1[]" name="opcao1[]" required>' .utf8_decode($perguntasEncontradas['OP1']). '</textarea>';
				
			echo '</div>';
			
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 2: </h4>';
				echo '<textarea class="form-control" id="InputOpcao2[]" name="opcao2[]" required>' .utf8_decode($perguntasEncontradas['OP2']). '</textarea>';
				
			echo '</div>';
			
			//if($perguntasEncontradas['OP3']){
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 3: </h4>';
				echo '<textarea class="form-control" id="InputOpcao3[]" name="opcao3[]">' .utf8_decode($perguntasEncontradas['OP3']). '</textarea>';
				
			echo '</div>';
			//}
			
			//if($perguntasEncontradas['OP4']){
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 4: </h4>';
				echo '<textarea class="form-control" id="InputOpcao4[]" name="opcao4[]">' .utf8_decode($perguntasEncontradas['OP4']). '</textarea>';
				
			echo '</div>';
			//}
			
			//if($perguntasEncontradas['OP5']){
			echo '<div class="row-fluid panel-body">';
				
				echo '<h4 class="sub-header">Opção 5: </h4>';
				echo '<textarea class="form-control" id="InputOpcao5[]" name="opcao5[]">' .utf8_decode($perguntasEncontradas['OP5']). '</textarea>';
				
			echo '</div>';
			//}
			
			$numeroPergunta++;
			
			}
		
		echo '</div>';//<div class="panel-default panel">
		
		echo '<div class="row-fluid panel-body">';
			echo '<h3 class="sub-header">Permissões</h3>';
			echo '<select class="form-control" id="gerencia" name="gerencia" required>';
				echo '<option value = 1';
					foreach($resultados2 as $geren)
					{
						if($geren['gerencia'] == 1)
						{echo ' selected';}
					}
				echo '>Todos podem responder</option>';
				echo '<option value = 2';
					foreach($resultados2 as $geren)
					{
						if($geren['gerencia'] == 2)
						{echo ' selected';}
					}
				echo '>Apenas gerentes podem responder</option>';
			echo '</select>';
		echo '</div>';
		
		echo '<button type="submit" class="btn btn-primary center-block">Editar</button>';
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