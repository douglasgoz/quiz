<!doctype html>
<html lang="pt-br">
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="container" style="margin-top: 3%; text-align: center;">
  <div class="row justify-content-md-center">          
        <div class="col-md-12">

              Adicionando pergunta ao quiz: <h4 style="font-weight: bold;  color: red"> <? echo $quiz->descricao ?> </h4> <br><br>

                <form class="form-horizontal" action="<? echo base_url().'admin/addPergunta' ?>" method="POST">
                  <input type="hidden" name="idQuiz" value="<?echo $quiz->idQuiz ?>" />
                  <fieldset style="margin-left: 20%">
                      <div class="form-group">
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon">Pergunta: </span><input name="pergunta" class="form-control" required="true" value="" type="text"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon">Link da Imagem: </span><input name="imagem" class="form-control" placeholder="Deixar vazio caso não tenha imagem" type="text"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon">Alternativa <b style="color: red">1</b>: </span><input name="a1" class="form-control" required="true" value="" type="text"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon">Alternativa <b style="color: red">2</b>: </span><input name="a2" class="form-control" required="true" value="" type="text"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon">Alternativa <b style="color: red">3</b>: </span><input name="a3" class="form-control" required="true" value="" type="text"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon">Alternativa <b style="color: red">4</b>: </span><input name="a4" class="form-control" required="true" value="" type="text"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-5 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon">Resposta correta: </span><input name="resposta" placeholder="Número da alternativa correta" class="form-control" maxlength="1" required="true" value="" type="text"></div>
                        </div>
                      </div>
                  </fieldset>
                  <br><br>
                  <div class="col-md-6" style="margin-left: 20%">
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