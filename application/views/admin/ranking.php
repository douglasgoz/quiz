<!doctype html>
<html lang="pt-br">
<body>

    <div class="container" style="margin-top: 3%; text-align: center;">
        <div class="row justify-content-md-center">          
        <div class="col-md-8">          

            <h4 style="font-weight: bold; text-transform: uppercase;"> Ranking </h4> <br>

            <? if($ranking){?>

                <ul class="list-group">
                  <? 
                  $controle = 1;
                  foreach ($ranking as $q) { ?>
                        <li class="list-group-item"> <? echo $this->admin_model->getNomeUsuario($q->idUsuario)->nome ?>
                            <span class="badge badge-primary float-right" style="position: relative; right: 15%">
                              <? echo $controle ?> °
                            </span>     
                            <span class="badge badge-success float-right" style="position: relative;">
                                <? 
                                $resultado = explode('.', $this->admin_model->getPontosUsuario($q->idUsuario));
                                echo $resultado[0]?>
                            </span>          
                        </li>
                  <? 
                  $controle++;
                  }

                echo '</ul>';
              }else{ ?>

                <ul class="list-group">
                  <li class="list-group-item">
                      Ranking indisponível no momento...
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