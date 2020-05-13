<title>Cadastro - uBand</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<style>
.divider-text { position: relative; text-align: center; margin-top: 15px; margin-bottom: 15px; }
.divider-text span { padding: 7px; font-size: 12px; position: relative; z-index: 2; }
.divider-text:after { content: ""; position: absolute; width: 100%; border-bottom: 1px solid #ddd; top: 55%; left: 0; z-index: 1; }
</style>

<div class="container">
<br> <center><a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/login/img/logo.png" style="max-height: 30px; width: auto" /></a></center> <br>

<div class="card bg-light">
<article class="card-body mx-auto" style="width: 550px;">  
  <h4 class="card-title mt-3 text-center">Cadastre-se</h4><br>
  <form action="<? echo base_url().'mapos/registro' ?>" method="POST">
    <div class="form-group input-group">
      <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-user"></i> </span></div>    
      <input name="nome" class="form-control" placeholder="Nome completo" type="text" required>
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-envelope"></i> </span></div>
        <input name="email" class="form-control" placeholder="Email" type="text" required>
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend"><span class="input-group-text"> <i class="fa fa-lock"></i> </span></div>
        <input name="senha" class="form-control" placeholder="Senha" type="password" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Criar conta </button>
    </div><br>

    <p class="text-center">Já é cadastrado? <a href="<?php echo base_url() ?>">Faça o login</a> </p>                                                                 
</form>
</article>
</div>

</div> 

<br><br>