<? date_default_timezone_set("America/Sao_Paulo"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Identidade Quiz</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="all,follow">
<link href="<?php echo base_url();?>assets/css/alerta.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

<style>
  .panel-collapse>.list-group .list-group-item:first-child {border-top-right-radius: 0;border-top-left-radius: 0;}
  .panel-collapse>.list-group .list-group-item {border-width: 1px 0;}
  .panel-collapse>.list-group {margin-bottom: 0;}
  .panel-collapse .list-group-item {border-radius:0;}
  .panel-collapse .list-group .list-group {margin: 0;margin-top: 10px;}
  .panel-collapse .list-group-item li.list-group-item {margin: 0 -15px;border-top: 1px solid #ddd !important;border-bottom: 0;padding-left: 30px;}
  .panel-collapse .list-group-item li.list-group-item:last-child {padding-bottom: 0;}
  .panel-collapse div.list-group div.list-group{margin: 0;}
  .panel-collapse div.list-group .list-group a.list-group-item {border-top: 1px solid #ddd !important;border-bottom: 0;padding-left: 30px;}
  .panel-collapse .list-group-item li.list-group-item {border-top: 1px solid #DDD !important;}
 
  .navbar-toggle { z-index:3; }
  .main{ margin-top: 10px; padding-top: 0; }
  .widget-header{ background: #0d0d0d; }
  .container-fluid{ height: auto;  background: none!important; }
  #menuMobile:focus{ background: none }
  .navbar li{ list-style-type: none; }
  .navbar li a{ color: white; text-decoration: none; text-transform: uppercase; font-size: 14px }
  .dropdown-item { color: #212121!important; }

      @media screen and (max-width: 767px){
            *{ font-size: 12px }
            .w-100{ max-width: 98%; margin: 0 2%; }
            .notificoes-mobile{ position: absolute; color: white; float: right; right: 10%; margin-top: 2%; }
            .navbar-header{ color: white; }
            .main{ padding-left: 0; margin-left: 0; left: 0; }
            .container-fluid{ position: relative; width: 100%!important; padding: 0!important; }
            #men{ margin: 0!important; }
            #men li{ margin: 5px; text-align: center;}
            #men li a{margin: 0; padding: 0; text-align: center; color: white}
            .no-mobile{display: none}
            .so-mobile{ height: 10px; display: inline; }
            .dropdown-menu{ background: white }
            .navbar-brand{ font-size: 12px }
            .icones-mobile { font-size: 30px }
      }

      @media screen and (min-width: 767px){
            .so-mobile{ display: none }
            .container-fluid{ padding-bottom: 20px; }
      }
</style>
</head>
<body>


  <? if($this->session->userdata('id') == 39){ ?>

      <nav class="navbar navbar-default so-mobile" role="navigation" style="margin: 0; padding: 0">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow" style="background: #212121!important; color: white!important;">
          <li style="margin-left: 10px"><a href="<? echo base_url() ?>admin"><i class="icones-mobile fa fa-home"></i></li><br>
          <li style="margin-left: 10px"><a href="<? echo base_url() ?>admin/novo"><i class="icones-mobile fa fa-plus"></i></li><br>
          <li style="margin-left: 10px"><a href="<? echo base_url() ?>admin/ranking"><i class="icones-mobile fa fa-trophy"></i></li><br>
          <li style="margin-left: 10px"><a href="<? echo base_url() ?>admin/usuarios"><i class="icones-mobile fa fa-group"></i></li><br>
            <li style="margin-left: 10px"><a href="<? echo base_url() ?>mapos/sair"><i class="icones-mobile fa fa-power-off"></i></li><br>
        </nav>
      </nav>

      <header class="header no-mobile">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow" style="background: #212121!important; color: white!important;">
          <li style="margin-left: 50px"><a href="<? echo base_url() ?>admin"><i class="fa fa-home"></i> &nbsp;Início</a></li>
          <li style="margin-left: 50px"><a href="<? echo base_url() ?>admin/novo"><i class="fa fa-plus"></i> &nbsp;Novo quiz</a></li>
          <li style="margin-left: 50px"><a href="<? echo base_url() ?>admin/ranking"><i class="fa fa-trophy"></i> &nbsp;Ver ranking</a></li>
          <li style="margin-left: 50px"><a href="<? echo base_url() ?>admin/usuarios"><i class="fa fa-group"></i> &nbsp;Usuário cadastrados</a></li>
          <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">

            <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle" style="color: white"><?php echo $this->mapos_model->getUsuario($this->session->userdata('id'))->nome ?> </a>
              <div aria-labelledby="userInfo" class="dropdown-menu">
                <a href="<?php echo base_url() ?>configuracao" class="dropdown-item"> <i class="fa fa-pencil" style="color: #c4c2c2"></i> &nbsp; Editar Perfil </a>
                <a href="<?php echo base_url() ?>configuracao" class="dropdown-item"> <i class="fa fa-cogs" style="color: #c4c2c2"></i> &nbsp; Ajustes </a> 
                <a href="<?php echo base_url() ?>mapos/sair" class="dropdown-item"> <i class="fa fa-power-off" style="color: #c4c2c2"></i> &nbsp; Sair </a>
              </div>
            </li>
          </ul>
        </nav>
      </header>


  <? }else{ 

    if(@$naoExibirMenu != 1){?>

      <nav class="navbar navbar-default so-mobile" role="navigation" style="margin: 0; padding: 0">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow" style="background: #212121!important; color: white!important;">
          <li style="margin-left: 10px"><a data-toggle="modal" data-target="#como-jogar"><i class="icones-mobile fa fa-question-circle"></i></a></li><br>
          <li style="margin-left: 10px"><a href="<? echo base_url() ?>mapos"><i class="icones-mobile fa fa-home"></i></li><br>
          <li style="margin-left: 10px"><a href="<? echo base_url() ?>admin/ranking"><i class="icones-mobile fa fa-trophy"></i></li><br>
            <li style="margin-left: 10px"><a href="<? echo base_url() ?>mapos/sair"><i class="icones-mobile fa fa-power-off"></i></li><br>
        </nav>
      </nav>

      <header class="header no-mobile">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow" style="background: #212121!important; color: white!important"><a href="<?php echo base_url()?>" class="navbar-brand font-weight-bold text-uppercase text-base" style="color: white">Identidade Quiz</a>
          <li style="margin-left: 50px"><a href="<? echo base_url() ?>admin/ranking"><i class="fa fa-trophy"></i> &nbsp;Ver ranking</a></li>
          <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
            <li class="nav-item dropdown ml-auto no-mobile"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle" style="color: white"><?php echo $this->mapos_model->getUsuario($this->session->userdata('id'))->nome ?> </a>
              <div aria-labelledby="userInfo" class="dropdown-menu">
                <a href="<?php echo base_url() ?>configuracao" class="dropdown-item"> <i class="fa fa-pencil" style="color: #c4c2c2"></i> &nbsp; Editar Perfil </a>
                <a href="<?php echo base_url() ?>configuracao" class="dropdown-item"> <i class="fa fa-cogs" style="color: #c4c2c2"></i> &nbsp; Ajustes </a> 
                <a href="<?php echo base_url() ?>mapos/sair" class="dropdown-item"> <i class="fa fa-power-off" style="color: #c4c2c2"></i> &nbsp; Sair </a>
              </div>
            </li>
          </ul>
        </nav>
      </header>

  <? }
} ?>


<div class="d-flex align-items-stretch">
    <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5" style="background: none"><br>
          <?php if(isset($view)){echo $this->load->view($view);}?> 
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="como-jogar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLong" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center><b style="color: red">Como Jogar:</b> <br><br></center>
        <ol>
          <li>O quiz só poderá ser feito uma única vez</li><br>
          <li>Você terá  20 segundos por questão para responder</li><br>
          <li>Em média serão 15 perguntas de múltipla escolha por quiz, cabendo aos administradores aumentarem ou reduzirem a quantidade de questões quando acharem necessário</li><br>
          <li>Caso o tempo estoure e não haja marcação de alternativa, será considerado como pontuação 0;</li><br>
          <li>A plataforma adota a velocidade de resposta, portanto quem responder mais rápido ganha uma pontuação maior, porém é necessário acertar a questão</li><br>
          <li>Os quizes possuem temas variados (animes, desenhos, games, filmes, séries...)</li><br>
          <li>Algumas rodadas poderão ter temas específicos</li><br>
          <li>Os dias de quiz ativo serão (inicialmente) terças-feiras, quintas-feiras e domingos, às 21:00h de acordo com o horário de onde se origina o quiz</li><br>
          <li>Uma campanha dura 1 mês</li><br>
          <li>Os pontos são acumulativos, sempre há chance de ganhar e ultrapassar quem estiver na frente. Portanto não se ausente durante os dias que tiverem o quiz</li><br>
          <li>A plataforma possui um sistema anti-fraude, portanto, evite atualizar a página, usar o botão voltar/avançar do navegador ou entrar através do histórico do navegador. Caso isso aconteça, o quiz irá ZERAR (pontuação 0)</li><br>
          <li>A conseqüência de ZERAR o quiz, também ocorrerá caso você desconecte. Se sua internet “falhar”, também irá acontecer o mesmo. Portanto avalie antes como está a sua internet</li>
        </ol> 
        <br>
        <center><b style="color: red">BOA SORTE!!!</b></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</body>
</html>
