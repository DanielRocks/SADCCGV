<?php
include_once("../modelos/cabecalho_login.html");
?>

<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="funcoes.js"></script>
    <div class="container">

      <div>
        
        
		 <form role="form" method="post" enctype="multipart/form-data" action="./cadastroNovoUsuario.php" class="form-signin">
		 <h3 class="form-signin-heading">Yearbook<br> Cadastro de funcionário</h3>
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
				<option value="Gerência">Gerência</option>
				<option value="Recepção">Recepção</option>
				<option value="Faxina">Faxina</option>
				<option value="Dep. Financeiro">Dep. Financeiro</option>
				<option value="Dep. Pessoal">Dep. Pessoal</option>
				<option value="Dep. Fiscal">Dep. Fiscal</option>
				<option value="Dep. Contábil">Dep. Contábil</option>
				<option value="Arquivo">Arquivo</option>
				<option value="Administrativo">Administrativo</option>
				<option value="Office-Boy">Office-Boy</option>
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