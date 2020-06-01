<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/quiz/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/quiz/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Quiz da Identidade Geek</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/quiz/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/quiz/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/quiz/css/demo.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        *{ font-family: 'Open Sans', sans-serif; }
        .tempo { background: red; color: white; font-size: 30px; text-align: center; font-weight: 800; z-index: 10 }
        .quiz-radio { font-size: 13px!important; text-align: left!important; font-weight: bold; white-space:nowrap!important; }
        .perguntaAtiva { display: inline; }
        .perguntaInativa { display: none; }
        .btn-fill { color: white!important }
        .wizard-container { top: -50px!important }
    </style>
</head>

<?

if(!$this->mapos_model->verificarDisponibilidadeDoQuiz($this->input->get('q'))){
  redirect(base_url());
}

if(!$this->mapos_model->verificarResposta($idQuiz, $this->session->userdata('id'))){
    $dados = array(
        'idUsuario' => $this->session->userdata('id'),
        'idQuiz' => $idQuiz,
        'percentual' => 'n',
        'log' => date('Y-m-d')
    );

    $this->mapos_model->add('quiz_respostas', $dados);
}else{
    redirect(base_url());
}
?>

<body id="body" onload="relogio()">
    <div class="container">
        <div class="row">          
        <div class="col-sm-10 col-sm-offset-1">
          <form id="formulario" action="<? base_url()?>resultado" method="POST">
              <input type="hidden" name="resultados" id="resultadosDoQuiz" value="" />
              <input type="hidden" name="idQuiz" id="idQuiz" value="<? echo $idQuiz ?>" />
          </form>
                  <?

                  $numeroPergunta = 1;
                  $respostas = array();
                  $respostasUsuario = array();
                  $duracao = explode(':', $quiz->tempo); ?>
                  <input type="hidden" id="minutos" value="<? echo $duracao[0] ?>" />
                  <input type="hidden" id="segundos" value="<? echo $duracao[1] ?>" />

                  <? foreach ($questions as $r) { ?>
                    
                    <input type="hidden" id="pAtual" value="<? echo $numeroPergunta ?>" />
                    <input type="hidden" id="pTotal" value="<? echo count($questions) ?>" />

                    <? echo '<input type="hidden" id="respostaCerta'.$numeroPergunta.'" value="'.$r->resposta.'" />';
                    array_push($respostas, $r->resposta);
                    if($numeroPergunta == 1){
                      echo '<div class="wizard-container col-md-12" id="per'.$numeroPergunta.'">';
                    }else{
                      echo '<div class="wizard-container col-md-12" id="per'.$numeroPergunta.'" style="display: none">';
                    }?>
                    <div class="card wizard-card" data-color="green" id="wizard">                   
                    <? echo '<div style="text-align: center;">Pergunta <b>'. $numeroPergunta. '</b> de <b>' .count($questions). '</b></div>'; ?>
                        <div class="wizard-header">
                            <h3 style="background: #fceab1; padding-top: 20px"> <? echo $r->pergunta ?> </h3><br><br>
                            <? if($r->imagem){ ?>
                                <img src="<? echo $r->imagem ?>" style="width: 100%; height: auto" />
                            <? } ?><br><br>
                        </div>

                        <center><div class="col-md-12 tempo" id="tempo<? echo $numeroPergunta ?>"> </div></center><br>

                        <fieldset id="pergunta<? echo $r->idPergunta ?>" style="margin-bottom: 30px">
                          <div class="quiz" id="quiz" data-toggle="buttons">
                              <? 
                              $alternativas = explode('|', $r->alternativas);
                              $y = 1;  // Controle da opção selecionada
                              foreach ($alternativas as $a) { ?>
                                <div class="col-md-10 col-sm-10 col-sm-offset-1 ttt btn-block" data-value="<? echo $y ?>">
                                    <label class="btn btn-primary btn-lg btn-block quiz-radio" style="width: 100%; ">
                                          <input type="radio" id="p<? echo $numeroPergunta ?>" name="p<? echo $numeroPergunta ?>" value="<? echo $y ?>" style="visibility: hidden;" /> <span style="white-space:normal;"><? echo $a ?></span>
                                    </label>
                                </div>
                              <?
                                 $y++;
                              } ?>
                          </div>
                        </fieldset>

                        <center>
                            <? 
                            if($numeroPergunta == 1){
                              echo '<div id="bot'.$numeroPergunta.'">';
                            }else{
                              echo '<div id="bot'.$numeroPergunta.'" style="display: none">';
                            }

                            if($numeroPergunta == count($questions)){                              
                              echo '<a onclick="mudarPergunta('.$numeroPergunta.')" class="btn btn-fill btn-primary" style="padding: 10px 50px">Finalizar &nbsp;<i class="fa fa-check"></i></a></div>';
                            }else{
                              echo '<a onclick="mudarPergunta('.$numeroPergunta.')" class="btn btn-fill btn-success" style="padding: 10px 50px">Confirmar &nbsp;<i class="fa fa-arrow-right"></i></a></div>';
                            }?>
                        </center>
                    </div>
                  </div>
                  <? 
                  $numeroPergunta++;
                  } ?>

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

      var respostas = [];
      var results = [];

        function resultado(total, pergunta){
          /*
              var perg = 'name="p' + pergunta + '"';
              resposta = document.querySelector('input['+ perg +']:checked');
              document.getElementById('p'+pergunta).value = resposta.value;
              for (var i = 1; i <= total; i++) {
                respostas.push(document.getElementById('p'+i).value);
                if(document.getElementById('p'+i).value == document.getElementById('respostaCerta'+i).value){                  
                  results.push('Certo');
                }else{
                  results.push('Errado');
                }
              }
              */
              alert(results);
        }


        var min = document.getElementById('minutos').value;
        var seg = document.getElementById('segundos').value;        

        function relogio(){                

              if((min > 0) || (seg > 0)){     
                  if(seg == 0){         
                        seg = 59;         
                        min = min - 1 
                  }       
                  else{         
                    seg = seg - 1;        
                  }       
                  if(min.toString().length == 1){         
                      min = "0" + min;        
                  }       
                  if(seg.toString().length == 1){         
                     seg = "0" + seg;        
                  }       
                  document.getElementById('tempo'+document.getElementById('pAtual').value).innerHTML = min + ":" + seg;       
                  setTimeout('relogio()', 1000);      
              }else{                  
                  document.getElementById('tempo'+document.getElementById('pAtual').value).innerHTML = "00:00";
                  var pAtual = document.getElementById('pAtual').value;
                  var pTotal = document.getElementById('pTotal').value;
                  alert('Ops... Tempo encerrado! Essa pergunta será marcada como "não respondida". :(');
                  var pergunta = ('p' + document.getElementById('pAtual').value);
                  document.getElementById(pergunta).value = "15";
                  document.getElementById(pergunta).checked = true;
                  if( parseInt(pAtual) <= parseInt(pTotal) ){
                      if(parseInt(pAtual) == parseInt(pTotal)){
                          alert('fim!');
                      }else{
                          min = document.getElementById('minutos').value;
                          seg = document.getElementById('segundos').value;
                          document.getElementById('tempo'+document.getElementById('pAtual').value).innerHTML = min + ":" + seg;
                          setTimeout('relogio()', 1000); 
                      }
                      mudarPergunta(parseInt(pAtual));                                                                             
                  }else{
                      alert(results);
                  }
              }   
        }


        function mudarPergunta(pergunta){
              var pTotal = document.getElementById('pTotal').value;
              var perg = 'name="p' + pergunta + '"';
              resposta = document.querySelector('input['+ perg +']:checked');
              document.getElementById('p'+pergunta).value = resposta.value;

              min = document.getElementById('minutos').value;
              seg = document.getElementById('segundos').value;
              document.getElementById('tempo'+document.getElementById('pAtual').value).innerHTML = min + ":" + seg;

              if(resposta.value){
                  if(resposta.value == document.getElementById('respostaCerta'+pergunta).value){                 
                    results.push('Certo');
                  }else{
                    results.push('Errado');
                  }
                  if(pergunta == pTotal){
                    document.getElementById('resultadosDoQuiz').value = results;
                    document.getElementById('formulario').submit();
                  }
                  var perguntaAtual = 'per' + pergunta;
                  var novaPergunta = 'per' + (pergunta + 1);
                  var botAtual = 'bot' + pergunta;
                  var novoBot = 'bot' + (pergunta + 1);
                  document.getElementById('p'+pergunta).value = resposta.value;
                  document.getElementById(perguntaAtual).style.display = "none";
                  document.getElementById(novaPergunta).style.display = "inline-block";
                  document.getElementById(botAtual).style.display = "none";
                  document.getElementById(novoBot).style.display = "inline-block";
                  document.getElementById('pAtual').value = parseInt(document.getElementById('pAtual').value)+1;
              }else{
                  alert('Selecione uma alternativa');
              }
        }

    </script>
</html>