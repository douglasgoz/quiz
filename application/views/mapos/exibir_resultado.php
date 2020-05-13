<!doctype html>
<html lang="pt-br">
<head>
  <link href="<? echo base_url() ?>assets/graficos/circle.css" rel="stylesheet">
</head>

<body>
    <div class="container">
      <div class="row justify-content-md-center" style="margin-top: 50px">
        <? 
        $certo = 0;
        $errado = 0;
        $total = 0;
        $resultado = explode(',', $_POST['resultados']);

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
            'idUsuario' => $this->session->userdata('id'),
            'idQuiz' => $idQuiz,
            'percentual' => substr($resultadoFinal, 0, 4),
            'log' => date('Y-m-d')
        );

        $this->mapos_model->add('quiz_respostas', $dados);

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

      <div class="row justify-content-md-center" style="margin-top: 50px">
          <a href="<? echo base_url() ?>" class="btn btn-success"> &nbsp; <i class="fa fa-arrow-left"></i> &nbsp; Voltar para a lista de quiz </a>
      </div>
    </div>


</body>
<script src="<?= base_url() ?>assets/quiz/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</html>