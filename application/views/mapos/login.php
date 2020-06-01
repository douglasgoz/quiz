
<!doctype html>
<html lang="pt-br" class="fullscreen-bg">
<head>
  <title>Quiz IDGeek</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <style type="text/css">
      .logo-img { height: 80px; width: auto; top: -30px; position: relative; }
      @media only screen and (min-width: 768px) {  /* Desktop */
        .caixa { width: 40% }
        .caixa-content { padding: 0 50px }
      }

      
      @media only screen and (max-width: 768px) {  /* Mobile */
        .caixa { width: 75% }
        .caixa-content { padding: 0 20px }
        .logo-img { height: 55px }
      }
  </style>
</head>
<body>


  <div id="wrapper">
    <div class="vertical-align-wrap">
      <div class="vertical-align-middle">
        <div class="auth-box caixa">
            <div class="content caixa-content">
              <div class="header">
                <div class="logo text-center"><img class="logo-img" src="<?php echo base_url() ?>assets/login/img/logo.png" alt="uBand Logo"></div>
              </div>
              <form class="form-vertical" id="formLogin" method="post" action="<?php echo base_url()?>mapos/verificarLogin" role="login">
                <div class="form-group">
                  <label for="nome" class="control-label sr-only">Nome</label>
                  <input type="text" class="form-control" name="nome" id="nome" placeholder="@instagram" required>
                </div>
                <div class="form-group">
                  <label for="senha" class="control-label sr-only">Senha</label>
                  <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" style="background: #000; border-color: #000">LOGIN</button><br><br>
                <div class="bottom text-center">
                  <span class="helper-text"><a href="<?php echo base_url() ?>mapos/cadastro" style="font-size: 18px"> <i class="fa fa-plus-circle"></i> &nbsp; Crie uma conta</a></span><br><br>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrar" style="font-size: 12px; color: white"> Como se cadastrar</button>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade bd-example-modal-lg" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center><b style="color: red">Para efetuar o cadastro é super fácil:</b> <br><br></center>
        <ol>
          <li>Acesse o botão CRIE UMA CONTA</li>
          <li>Você será direcionado para página de casdastro</li>
          <li>Insira seu usuário do Instagram (<span style="color: red">Ex: @paulo</span>) (<span style="color: red">Não esquecer de colocar o @</span>)</span></li>
          <li>Insira seu email (<span style="color: red">Ex: Paulo@paulo.com.br</span>)</li>
          <li>Crie uma senha e pronto!!</li>
        </ol> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<? if(@$_GET['acao'] == 'cadastro'){ ?>
    <script type="text/javascript">
        Swal.fire({
          icon: 'success',
          title: 'Conta cadastrada! Por favor, faça o login para continuar...'
        });
    </script>
<? } ?>

<script type="text/javascript">
      $(document).ready(function(){
        var modal = document.getElementById('myModal');

var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
var fechar = document.getElementById('close');

btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

fechar.onclick = function(){
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

          $('#email').focus();
          $("#formLogin").validate({
             submitHandler: function( form ){       
                  var dados = $( form ).serialize();
                  $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>mapos/verificarLogin?ajax=true",
                    data: dados,
                    dataType: 'json',
                    success: function(data)
                    {
                      if(data.result == true){
                            window.location.href = "<?php echo base_url();?>mapos";
                      }
                      else{
                          $('#myBtn').trigger('click');
                      }
                    }
                    });
                    return false;
              },
          });
      });
</script>  

<button id="myBtn" style="display: none">Conta inválida</button>

        <div id="myModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <br>
            <h5>Os dados de acesso estão incorretos. Por favor, tente novamente.</h5>
            <br>
            <br>
            <button id="close" class="btn btn-danger" style="width: 30%">Fechar</button>
          </div>
        </div>

</body>
</html>