<?php 
      require_once "../db/config.php";

      $sql = "SELECT * FROM usuarios";
      $sql = $pdo->query($sql);
	 
?>
<?php require_once'header.php';?>
<br><br>		
<div class="container">	
    
<h1>Controle de Usuário</h1><br>

<hr style="border:1px solid #008000;">
<div class="table-responsive-sm">

<form id="frmRegistro" action="../procedimentos/cadastrar_usuario.php"  method="POST"style="border:1px solid #008000;margin-top:10px;padding:10px;margin-right:0px;background-color:#FF4500;"> 

	<div class="form-row">
			<div class="form-group col-md-6">			     
			      <input type="text" class="form-control" id="nome_user" placeholder="Nome" name="nome">
			</div>
		    <div class="form-group col-md-6">			      
			      <input type="text" class="form-control" id="login" placeholder="Login"name="login">
		    </div>
	</div>
  
    <div class="form-row">
            <div class="form-group col-md-6">               
                <input type="email" class="form-control" id="email"placeholder="Email"name="email">
             </div>

		    <div class="form-group col-md-6">		       	      
                <input type="password" class="form-control" id="senha"placeholder="Senha"name="senha">
		    </div>
		    
    </div>
		  
          <button type="submit" class="btn btn-secondary">Gravar</button>
</div>
</form>

<div class="table-responsive" style="overflow: auto;border:solid 1px #FF4500;margin-top:10px;">
<table class="table table-hover">
  <thead>
    <tr>      
      <th>Id</th>
      <th>Nome</th>
      <th>Login</th>
      <th>Email</th>      
      <th>Último Acesso</th>
      <th>Ação</th>
    </tr>
  </thead>
  <?php 
  
  if($sql->rowCount() > 0) {
      foreach($sql->fetchAll() as $linhas){   
  ?>
  <tbody>
    <tr>
      
      <td><?php echo $linhas['id'];?></td>
      <td><?php echo $linhas['nome'];?></td>
      <td><?php echo $linhas['login'];?></td>
      <td><?php echo $linhas['email'];?></td>      
      <td><?php echo $linhas['dataCaptura'];?></td>
      <td><a href="../procedimentos/excluir_usuario.php?&id=<?php echo $linhas['id'];?>"><img class="card-img-top" src="../imagens/diversas_imagens/excluir.png"
       width="25" height="20" style="margin-right:-125px;"></a></td>
    
    </tr>
   
  </tbody>
  <?php 
       }
      } 
    ?>
</table>

</div>
<br>
<a href="../index.php">
    <img src="../imagens/diversas_imagens/voltar.png" alt="" width="50" height="50" title="Voltar"></a>			
</div>

<footer style="background-color:">
	
</footer>
<?php require_once'footer.php';?>
 