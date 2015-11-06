<?php
require_once("./conf/confBD.php");
include_once("../modelos/cabecalho_login.html");

try
{
	// se não foram passados 4 parâmetros na requisição e não vier da página de cadastro
	//desvia para a mensagem de erro: 	// "previne" acesso direto à página
	$origem = basename($_SERVER['HTTP_REFERER']);
	if((count($_POST)!=4)&&($origem!='cadastroUsuario.php')){
		header("Location:./acessoNegado.php");
		die();
	}
	//se existem os parâmetros...
	else{
		//instancia objeto PDO, conectando-se ao mysql
		$conexao = conn_mysql();
		
		//captura valores do vetor POST
		//utf8_encode para manter consistência da codificação utf8 nas páginas e no banco
		$nome = utf8_encode(htmlspecialchars($_POST['nomeCompleto']));
		$login = utf8_encode(htmlspecialchars($_POST['login']));
		$email = utf8_encode(htmlspecialchars($_POST['email']));
		$foto = ($_FILES['arquivoFoto']);
		$login = utf8_encode(htmlspecialchars($_POST['login']));
		$senha = utf8_encode(htmlspecialchars($_POST['passwd']));
		$senhaConf = utf8_encode(htmlspecialchars($_POST['passwd2']));
		$departamento = utf8_encode(htmlspecialchars($_POST['departamento']));
		$departamento = utf8_encode(htmlspecialchars($_POST['responsavel']));
		
		if(($senha!=$senhaConf)||(strlen($senha)<4)||(strlen($senha)>8)){
		header("Location:./erroCadastro.php");
		die();
		}
		
		// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
		
		/*// Largura máxima em pixels
		$largura = 150;
		// Altura máxima em pixels
		$altura = 180;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 1000;*/
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
		/*// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}*/
 
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
			
			$caminho = "fotos/";
			
			if(!file_exists ( $caminho ))
				mkdir($caminho, 0700);  //permissoes de escrita, leitura e execucao
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = $caminho . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		
		
		
		
		// cria instrução SQL parametrizada
		$SQLInsert = 'INSERT INTO funcionarios (login, nomeCompleto, email, arquivoFoto, departamento, responsavel, senha)
			  		  VALUES (?,?,?,?,?,?,MD5(?))';
					  
		//prepara a execução
		$operacao = $conexao->prepare($SQLInsert);					  
		
		//executa a sentença SQL com os parâmetros passados por um vetor
		$inserir = $operacao->execute(array($login, $nome, $email, $nome_imagem, $departamento, $responsavel, $senha));
		
		// fecha a conexão ao banco
		$conexao = null;
		
		//verifica se o retorno da execução foi verdadeiro ou falso,
		//imprimindo mensagens ao cliente
		if ($inserir){
			 echo'<div class="starter-template">';
			 echo"\n<h3 class=\sub-header\>Cadastro efetuado com sucesso!</h3>";
			 echo "<p class=\"lead\"><a href=\"./index.php\">Página principal</a></p>\n";
			 echo'</div>';			 
		}
		else {
			echo "<h1>Erro na operação.</h1>\n";
				$arr = $operacao->errorInfo();		//mensagem de erro retornada pelo SGBD
				$erro = utf8_decode($arr[2]);
				echo "<p>$erro</p>";							//deve ser melhor tratado em um caso real
			    echo "<p><a href=\"./cadastroUsuario.php\">Retornar</a></p>\n";
		}
    }
}
}
catch (PDOException $e)
{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
}

include_once("./modelos/rodape_html.html");

?>
