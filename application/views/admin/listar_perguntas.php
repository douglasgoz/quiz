<!doctype html>
<html lang="pt-br">
<body>

    <div class="container" style="margin-top: 3%; text-align: center;">
        <div class="row justify-content-md-center">          
        <div class="col-md-8">          

            Perguntas do quiz: <h4 style="font-weight: bold;  color: red"> <? echo $quiz->descricao ?> </h4> <br><br>

            <a href="<? echo base_url().'admin' ?>" class="btn btn-secondary" style="float: left;"><i class="fa fa-arrow-left"></i> &nbsp;Voltar</a>
            <a href="<? echo base_url().'admin/novaPergunta/'.$quiz->idQuiz ?>" class="btn btn-success" style="float: left; margin-left: 10px"> <i class="fa fa-plus"></i> &nbsp;Nova pergunta</a>
            <a href="<? echo base_url().'admin/verRespostas/'.$quiz->idQuiz ?>" class="btn btn-primary" style="float: left; margin-left: 10px"> <i class="fa fa-check"></i> &nbsp;<? echo @$respostas ?> Respostas</a><br><br><br>

            <? if($perguntas){?>

                <ul class="list-group">
                  <? foreach ($perguntas as $q) { ?>
                      <form action="<? echo base_url()?>mapos/inicio" method="POST">
                        <input type="hidden" name="idPergunta" value="<? echo $q->idPergunta ?>" />
                        <li class="list-group-item"> <? echo $q->pergunta ?> 
                        <span class="badge float-right" style="position: relative; bottom: 10px">
                            <a class="btn btn-danger excluirPergunta" idPergunta="<? echo $q->idPergunta ?>" style="padding: 5px 20px; color: white"><i class="fa fa-trash"></i></a>
                        </span>
                        </li>
                      </form>
                  <? }
                echo '</ul>';
              }else{ ?>

                <ul class="list-group">
                  <li class="list-group-item">
                      Nenhuma pergunta lançada neste quiz até o momento...
                  </li>
                </ul>

              <?} ?>

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
    
    $(document).on('click', '.excluirPergunta', function(event) {
        var id = $(this).attr('idPergunta');
    
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>admin/excluirPergunta",
          data: "id="+id,
          dataType: 'json',
          success: function(data)
          {
          }
        });
        Swal.fire({
          icon: 'success',
          title: 'Pergunta excluída!',
          showConfirmButton: false,
          timer: 1500
        });
        
        setTimeout(function() {
          location.reload();
        }, 1500);        
    }); 
  });
</script>
</html>