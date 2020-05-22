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

            <h4 style="font-weight: bold; text-transform: uppercase;"> Editando o quiz: </h4> 
            <span style="color: red"><? echo $result->descricao ?></span><br><br>

            <div class="container" style="margin-top: 3%; text-align: center; margin-left: 15%">      
              <div class="row justify-content-md-center">          
                <div class="col-md-8"> 

                   <form class="form-horizontal" action="<? echo base_url().'admin/editarInfoQuiz' ?>" method="POST">
                    <input type="hidden" name="idQuiz" value="<? echo $result->idQuiz ?>" />
                      <fieldset>
                         <div class="form-group">
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon">Descrição: </span><input name="descricao" class="form-control" required="true" value="<? echo $result->descricao ?>" type="text"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon">Data: </span><input name="data" class="form-control" required="true" value="<? echo date('d-m-Y', strtotime($result->dataInicio)) ?>" type="text"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon">Hora: </span><input name="hora" class="form-control" required="true" value="<? echo date('H:i', strtotime($result->dataInicio)) ?>" type="text"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-5 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon">Tempo de resposta: </span><input name="tempo" placeholder="00:00" class="form-control" required="true" value="<? echo $result->tempo ?>" type="text"></div>
                            </div>
                          </div>
                      </fieldset>
                      <br><br>
                      <div class="col-md-6" style="margin-left: 10%">
                          <button class="btn btn-success" type="submit" style="width: 100%; padding: 10px 0"> Salvar </button>
                      </div>
                   </form>
                </div>
              </div>
            </div>

        </div>
        </div> 
    </div>


</body>

<script src="<?= base_url() ?>assets/quiz/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/quiz/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/quiz/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/quiz/js/gsdk-bootstrap-wizard.js"></script>
<script src="<?= base_url() ?>assets/quiz/js/jquery.validate.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    
    $(document).on('click', '.excluirQuiz', function(event) {
        var id = $(this).attr('idQuiz');
    
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>admin/excluir",
          data: "id="+id,
          dataType: 'json',
          success: function(data)
          {
          }
        });
        location.reload();
    }); 
  });
</script>
</html>