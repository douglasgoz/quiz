<!doctype html>
<html lang="pt-br">
<body>

    <div class="container" style="margin-top: 3%; text-align: center;">
        <div class="row justify-content-md-center">          
        <div class="col-md-8">          

            <h4 style="font-weight: bold; text-transform: uppercase;"> Usuários cadastrados </h4> <br>

            <? if($usuarios){?>

                <ul class="list-group">
                  <? foreach ($usuarios as $q) { ?>
                        <li class="list-group-item"> <? echo $q->nome ?> 
                          <span class="badge badge-success float-right"> <? echo $q->email ?> </span>
                        </li>
                  <? }
                echo '</ul>';
              }else{ ?>

                <ul class="list-group">
                  <li class="list-group-item">
                      Não há nenhum usuário cadastrado até o momento... :(
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
        setTimeout(function() {
          location.reload();
        }, 1000); 
    }); 
  });
</script>
</html>