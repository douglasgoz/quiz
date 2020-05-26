<!doctype html>
<html lang="pt-br">
<body>

    <div class="container" style="margin-top: 3%; text-align: center;">
        <div class="row justify-content-md-center">          
        <div class="col-md-8">          

            <h4 style="font-weight: bold; text-transform: uppercase;"> Quiz disponíveis: </h4> <br>

            <? if($quiz){?>

                <ul class="list-group">
                  <? foreach ($quiz as $q) { ?>
                      <!-- <form action="<? echo base_url()?>mapos/inicio" method="POST">
                        <input type="hidden" name="idQuiz" value="<? echo $q->idQuiz ?>" /> -->
                        <li class="list-group-item"> <? echo $q->descricao ?>                           
                            <? if(!$this->mapos_model->buscarRespostas($q->idQuiz)){ ?>
                                <span class="badge badge-success float-right">
                                <!-- <button class="btn btn-success" type="submit" style="padding: 0 20px"> Iniciar &nbsp; <i class="fa fa-arrow-right"></i></button> -->
                                <a href="<? echo base_url().'mapos/inicio?q='.$q->idQuiz ?>" class="btn btn-success" style="padding: 0 20px"> Iniciar &nbsp; <i class="fa fa-arrow-right"></i></a>
                                </span>
                            <? }else { ?>                                
                                <span class="badge badge-success float-right" style="padding: 5px 10px; font-size: 15px"><? echo $this->mapos_model->buscarRespostas($q->idQuiz)->percentual ?> %</span>
                                <span class="badge badge-danger float-right" style="padding: 5px 10px; margin: 0 10px; font-size: 12px">Você já respondeu este quiz</span>
                            <? } ?>                          
                        </li>
                      <!-- </form> -->
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
</html>