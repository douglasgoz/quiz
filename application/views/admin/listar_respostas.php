<!doctype html>
<html lang="pt-br">
<body>

    <div class="container" style="margin-top: 3%; text-align: center;">
        <div class="row justify-content-md-center">          
        <div class="col-md-8">          

            Perguntas do quiz: <h4 style="font-weight: bold;  color: red"> <? echo $quiz->descricao ?> </h4> <br>

            <a href="<? echo base_url().'admin/quiz/'.$this->uri->segment(3) ?>" class="btn btn-primary" style="float: left;"><i class="fa fa-arrow-left"></i> &nbsp;Voltar</a><br><br><br>

            <table class="table" style="border: 1px #cecece solid">

            <? if($respostas){?>

                  <thead>
                    <tr>
                      <th scope="col" style="color: red">Nome</th>
                      <th scope="col" style="color: red">Pontuação</th>
                      <th scope="col" style="color: red">Ação</th>
                    </tr>
                  </thead>
                  <tbody>

                  <? foreach ($respostas as $q) { ?>
                    <tr>
                      <td><? echo $this->admin_model->getNomeUsuario($q->idUsuario)->nome ?></td>
                      <? if($q->percentual == 'n'){
                        echo '<td>Não finalizado</td>';
                      }else{
                        echo '<td>'.$q->percentual.' pontos</td>';
                      }
                      ?>
                      <td><a class="btn btn-danger excluirQuiz" idQuiz="<? echo $q->idResposta ?>" style="padding: 5px 20px; color: white"><i class="fa fa-trash"></i></a></td>
                    </tr>
                  <? }
              }else{ ?>

                <ul class="list-group">
                  <li class="list-group-item">
                      Não há nenhuma resposta neste quiz até o momento
                  </li>
                </ul>

              <?} ?>
              </tbody>
          </table>

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

    <? if(@$_GET['status'] == 'excluido'){ ?>
      Swal.fire(
        'Excluído com sucesso!',
        'Os dados do usuário foram removidos.',
        'success'
      );
    <? } ?>
    
    $(document).on('click', '.excluirQuiz', function(event) {
        var id = $(this).attr('idQuiz');
    
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>admin/excluirRespostaIndividual",
          data: "id="+id,
          dataType: 'json',
          success: function(data)
          {
          }
        });

        Swal.fire({
          icon: 'success',
          title: 'Resposta excluída!',
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