<?php
session_start();


if ( !isset($_SESSION['email']) and !isset($_SESSION['email']) ) {
  //Destrói
  session_destroy();

  //Limpa
  unset ($_SESSION['email']);
  unset ($_SESSION['senha']);
  
  //Redireciona para a página de autenticação
  header('location:../login.php');
}

require'../db/config.php';

if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
$dados=array(
addslashes($_POST["nome"]),
addslashes($_POST["login"]),
addslashes($_POST["email"]),
MD5(addslashes($_POST["senha"]))
);

}

$data		= date('Y-m-d');

$sql = "INSERT INTO usuarios (nome,login,email,senha,dataCaptura) VALUES('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$data')";
$sql = $pdo->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if ($sql->rowCount() > 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../view/tela_cad_usuario.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário cadastrado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../view/tela_cad_usuario.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário não foi cadastrado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>
