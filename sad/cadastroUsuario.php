<?php
include_once("../modelos/cabecalho_login.html");
require_once("./conf/confBD.php");
?>

<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="funcoes.js"></script>
    <div class="container">

      <div>
        
        
		 <form role="form" method="post" enctype="multipart/form-data" action="./cadastroNovoUsuario.php" class="form-signin">
		 <h3 class="form-signin-heading">Cadastro de funcionário</h3>
			  <div class="form-group">
				<label for="InputNome">Nome Completo:</label>
				<input type="text" class="form-control" id="InputNome" name="nomeCompleto" placeholder="Nome completo" required autofocus>
			  </div>
			  			  
			  <div>
				<label for "InputEmail">E-Mail:</label>
				<input type="text" class="form-control" id="InputEmail" name="email" placeholder="E-mail" required>
			  </div>
				
			  <div>
				<label for "InputFoto">Foto:</label>
				<input type="file" name="arquivoFoto" id="fileName" placeholder="Escolha um arquivo" size="40">
			  </div>
			  
			  <div>
				<label for "InputDepartamento">Departamento:</label>
				<select name="departamento" id="departamento" class="form-control">
					<?php
					
					try{
					// instancia objeto PDO, conectando no mysql
					$conexao = conn_mysql();
		
				
						// instrução SQL básica (sem restrição de nome)
						$SQLSelect = 'SELECT * FROM departamento ORDER BY nomeDepartamento';
	
			
						//prepara a execução da sentença
						$operacao = $conexao->prepare($SQLSelect);
						$operacao->execute();
					

					//captura TODOS os resultados obtidos
					$resultados = $operacao->fetchAll();
		
					// fecha a conexão (os resultados já estão capturados)
					$conexao = null;
					
					echo '';
					echo '';
						foreach($resultados as $contatosEncontrados)
						{
							echo '<option value='.$contatosEncontrados['IDdepartamento'].'>'.utf8_decode($contatosEncontrados['nomeDepartamento']).'</option>';
						}
					echo '';
						
					} //try
					catch (PDOException $e)
					{
						// caso ocorra uma exceção, exibe na tela
						echo "Erro!: " . $e->getMessage() . "<br>";
						die();
					}
					?>
				</select>
			  </div>
			  
			  <div class="form-group">
			  <label for="InputResponsavel">Responsável</label>
			  <select name="responsavel" id="responsavel" class="form-control">
				<option value=null>---------</option>
				<?php
				try{
					// instancia objeto PDO, conectando no mysql
					$conexao = conn_mysql();
		
				
						// instrução SQL básica (sem restrição de nome)
						$SQLSelect = 'SELECT * FROM funcionarios WHERE gerencia < 2';
	
			
						//prepara a execução da sentença
						$operacao = $conexao->prepare($SQLSelect);
						$operacao->execute();
					

					//captura TODOS os resultados obtidos
					$resultados = $operacao->fetchAll();
		
					// fecha a conexão (os resultados já estão capturados)
					$conexao = null;
					
					echo '';
					echo '';
						foreach($resultados as $contatosEncontrados)
						{
							echo '<option value='.$contatosEncontrados['IDfuncionario'].'>'.utf8_decode($contatosEncontrados['nomeCompleto']).'</option>';
						}
					echo '';
					
				} //try
				catch (PDOException $e)
				{
					// caso ocorra uma exceção, exibe na tela
					echo "Erro!: " . $e->getMessage() . "<br>";
					die();
				}
				?>
			  </select>
			  </div>
			  
			  <div class="form-group">
			  <label for="InputLogin">Login:</label>
				<input type="text" class="form-control" id="InputLogin" name="login" placeholder="Login desejado" required>
			  </div>
			  <div class="form-group">
				<label for="InputSenha">Senha:</label>
				<input type="password" class="form-control" id="InputSenha" name="passwd" placeholder="Senha (4 a 8 caracteres)">
			  </div>
			  <div class="form-group">
				<label for="InputSenhaConf">Confirmação de Senha:</label>
				<input type="password" class="form-control" id="InputSenhaConf" name="passwd2" placeholder="Confirme a senha">
			  </div>

			  <button type="submit" class="btn btn-primary center-block">Cadastrar</button>
			  
			  <a class="btn btn-large center-block" href="../sad"><h3>Voltar</h3></a>
		 </form>

	 </div>

	  
	  
    </div><!-- /.container -->

<?php
include_once("modelos/rodape_html.html");
?>