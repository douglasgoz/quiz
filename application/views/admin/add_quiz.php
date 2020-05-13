<!doctype html>
<html lang="pt-br">
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <h4 style="font-weight: bold; text-transform: uppercase; color: red; text-align: center;"> Novo Quiz </h4> <br>
    <div class="container" style="margin-top: 3%; text-align: center; margin-left: 15%">      
        <div class="row justify-content-md-center">          
        <div class="col-md-8"> 

                <form class="form-horizontal" action="<? echo base_url().'admin/addQuiz' ?>" method="POST">
                  <fieldset>
                     <div class="form-group">
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon">Descrição: </span><input name="descricao" class="form-control" required="true" value="" type="text"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon">Data: </span><input name="data" class="form-control" required="true" value="" type="date"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon">Hora: </span><input name="hora" class="form-control" required="true" value="" type="text"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-5 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon">Tempo de resposta: </span><input name="tempo" placeholder="00:00" class="form-control" required="true" value="" type="text"></div>
                        </div>
                      </div>
                  </fieldset>
                  <br><br>
                  <div class="col-md-6" style="margin-left: 10%">
                      <button class="btn btn-success" type="submit" style="width: 100%; padding: 10px 0"> Cadastrar </button>
                  </div>
               </form>

        </div>
        </div> 
    </div>


</body>

<script src="<?= base_url() ?>assets/quiz/js/jquery-2.2.4.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function(){
      
  });
</script>
</html>