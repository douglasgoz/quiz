
<!doctype html>
<html lang="pt-br" class="fullscreen-bg">
<head>
  <title>Quiz IDGeek</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/vendor/linearicons/style.css">
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
                  <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
                </div>
                <div class="form-group">
                  <label for="senha" class="control-label sr-only">Password</label>
                  <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button><br><br>
                <div class="bottom text-center">
                  <span class="helper-text"><i class="fa fa-plus" style="top: 1px; position: relative;"></i> &nbsp; <a href="<?php echo base_url() ?>mapos/cadastro">Crie uma conta</a></span>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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