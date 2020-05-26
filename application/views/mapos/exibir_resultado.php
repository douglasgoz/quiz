<!doctype html>
<html lang="pt-br">
<head>
  <link href="<? echo base_url() ?>assets/graficos/circle.css" rel="stylesheet">

  <style>

    /*   Desktop   */
    @media only screen and (min-width: 768px) {
      .respostasCorretas { margin-bottom: 50px; background: #248008; color: white; padding: 10px 50px; width: 60%; font-weight: bold; border-radius: 5px; font-size: 15px }
      .numeroPergunta { width: 5%; font-size: 25px; font-weight: bold; background: #cecece; text-align: center; border-radius: 30% }
      .pergunta { width: 90%; margin-left: 2% }
      .num { position: relative; top: 5px }
    }


    /*   Mobile   */
    @media only screen and (max-width: 768px) {
      *{ font-size: 15px }
      .respostasCorretas { margin-bottom: 50px; background: #248008; color: white; padding: 10px 50px; width: 100%; font-weight: bold; border-radius: 5px; font-size: 15px }
      .numeroPergunta { width: 10%; font-weight: bold; background: #cecece; text-align: center; border-radius: 30% }
      .pergunta { width: 85%; margin-left: 3%; }
      .num { position: relative; top: 5px; font-size: 18px }
      .botao { margin: 0 15% }
    }

</style>
</head>

<body>
    <div class="container">
      <div class="row" style="margin: 20px 15%">
        <? 
        $certo = 0;
        $errado = 0;
        $total = 0;
        $resultado = explode(',', $resultados);

        foreach ($resultado as $r) {
          if($r == 'Certo'){
            $certo++;
          }else{
            $errado++;
          }
          $total++;
        }

        $resultadoFinal = (($certo / $total) * 100);

        $dados = array(
            'percentual' => substr($resultadoFinal, 0, 4),
            'log' => date('Y-m-d')
        );

        $this->mapos_model->finalizarResultado($dados, $idQuiz, $this->session->userdata('id'));

        if($resultadoFinal == 100){
          echo '<div class="c100 p'.substr($resultadoFinal, 0, 3).' big">';
        }else{
          echo '<div class="c100 p'.substr($resultadoFinal, 0, 2).' big">';
        }?>
            
                <span><? echo substr($resultadoFinal, 0, 4).'%' ?></span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>
      </div> 

      <div class="row justify-content-md-center" style="margin-bottom: 50px">
          <a href="<? echo base_url() ?>" class="btn btn-danger botao"> &nbsp; <i class="fa fa-arrow-left"></i> &nbsp; Voltar para a lista de quiz </a>
      </div>
      
    </div>

    <div class="container" style="margin-bottom: 100px">

      <center><div class="respostasCorretas">RESPOSTAS CORRETAS:</div></center>

      <? 
      $x = 1;

      foreach ($respostas as $r) { 
        $resp = explode('|', $r->alternativas);?>
        <div class="row" style="margin-bottom: 30px;">
          <div class="numeroPergunta"><span class="num"><? echo $x ?></span></div>
          <div class="pergunta">
            <div style="font-weight: bold;"> <? echo $r->pergunta ?> </div>
            <div style="color: green"> <? echo $resp[($r->resposta - 1)] ?> </div>
          </div>
        </div>
      <? 
      $x++;
      }?>

    </div>


</body>
<script src="<?= base_url() ?>assets/quiz/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</html>