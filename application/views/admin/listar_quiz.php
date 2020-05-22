<!doctype html>
<html lang="pt-br">
<body>

    <div class="container" style="margin-top: 3%; text-align: center;">
        <div class="row justify-content-md-center">          
        <div class="col-md-8">          

            <h4 style="font-weight: bold; text-transform: uppercase;"> Quiz cadastrados </h4> <br>

            <a href="<? echo base_url().'admin/novo' ?>" class="btn btn-success" style="float: left;"> <i class="fa fa-plus"></i> &nbsp;Novo quiz</a><br><br>

            <? if($quiz){?>

                <ul class="list-group">
                  <? foreach ($quiz as $q) { ?>
                        <input type="hidden" name="idQuiz" value="<? echo $q->idQuiz ?>" />
                        <li class="list-group-item"> <? echo $q->descricao ?> 
                          <? if (($q->dataInicio <= date('Y-m-d H:i')) && ($q->dataFim >= date('Y-m-d H:i'))) {?>
                              <span class="badge badge-success float-left"> Ativo </span>                              
                          <? }else{ ?>
                              <span class="badge badge-danger float-left"> Inativo </span>
                          <? } ?> 
                              <span class="badge float-right" style="position: relative; bottom: 10px">
                                  <a href="<? echo base_url().'admin/quiz/'.$q->idQuiz ?>" class="btn btn-primary" style="padding: 5px 20px"><i class="fa fa-arrow-right"></i></a>
                                  <a href="<? echo base_url().'admin/editarQuiz/'.$q->idQuiz ?>" class="btn btn-success" style="padding: 5px 20px"><i class="fa fa-pencil"></i></a>
                                  <a class="btn btn-danger excluirQuiz" idQuiz="<? echo $q->idQuiz ?>" style="padding: 5px 20px; color: white"><i class="fa fa-trash"></i></a>
                              </span>
                        </li>
                  <? }
                echo '</ul>';
              }else{ ?>

                <ul class="list-group">
                  <li class="list-group-item">
                      Não há nenhum quiz disponível no momento... :(
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
    
    $(document).on('click', '.excluirQuiz', function(event) {
        var id = $(this).attr('idQuiz');
    
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>admin/excluirQuiz",
          data: "id="+id,
          dataType: 'json',
          success: function(data)
          {
          }
        });
        Swal.fire({
          icon: 'success',
          title: 'Quiz excluído!',
          showConfirmButton: false,
          timer: 1500
        });
        
        setTimeout(function() {
          location.reload();
        }, 1500); 
    }); 
  });
</script>

<script type="text/javascript">
  <? if (@$_GET['status'] == 'editado'){ ?>
    Swal.fire({
      icon: 'success',
      title: 'Quiz editado!',
      showConfirmButton: false,
      timer: 1500
    });
  <? } ?>
</script>
</html>