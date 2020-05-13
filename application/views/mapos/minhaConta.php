<?php if($this->session->userdata('permissao') == 2){?>
<div class="main">
<div class="span10" style="margin-left: 10%">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Suas Informações</h3>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12" style=" background: #fff">
                        <ul class="site-stats">
                            <li class="bg_ls span12" style="margin-left: 0; background: #fff; color: #056bad"><strong style="font-size: 15px;"><?php echo $usuario->nome; ?></strong> <span style="color: #BEBEBE; background: none"> nome </span></li>

                            <li class="bg_lo span12" style="margin-left: 0; background: none; color: #056bad"><strong style="font-size: 15px;"><?php echo $usuario->cpf; ?></strong> <span style="color: #BEBEBE; background: none"> cpf </span></li>

                            <li class="bg ls span12" style="margin-left: 0; background: none; color: #056bad"><strong style="font-size: 15px;"><?php echo $usuario->telefone; ?></strong> <span style="color: #BEBEBE; background: none"> telefone </span></li>

                            <li class="bg_ls span12" style="margin-left: 0; background: none; color: #056bad"><strong style="font-size: 15px;"><?php echo $usuario->email; ?></strong> <span style="color: #BEBEBE; background: none"> email </span></li>

                            <li class="bg_lo span12" style="margin-left: 0; background: none; color: #056bad"><strong style="font-size: 15px;"><?php echo $usuario->permissao; ?></strong> <span style="color: #BEBEBE; background: none"> função </span></li> 

                            <li class="bg_ls span12" style="margin-left: 0; background: none;"><a href="<?php echo base_url()?>usuarios/editar/<?php echo $usuario->idUsuarios ;?>" class="btn btn-success" title="Editar as suas informações">Alterar os seus dados</a></li>                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else if($this->session->userdata('permissao') == 3){?>
<div class="main">
<div class="span10" style="margin-left: 10%">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Suas Informações</h3>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12" style=" background: #fff">
                        <ul class="site-stats">
                            <li class="bg_ls span12" style="margin-left: 0; background: #fff; color: #056bad"><strong style="font-size: 15px;"><?php echo $usuario->nome; ?></strong> <span style="color: #BEBEBE; background: none"> nome </span></li>

                            <li class="bg_lo span12" style="margin-left: 0; background: none; color: #056bad"><strong style="font-size: 15px;"><?php echo $usuario->cpf; ?></strong> <span style="color: #BEBEBE; background: none"> cpf </span></li>

                            <li class="bg ls span12" style="margin-left: 0; background: none; color: #056bad"><strong style="font-size: 15px;"><?php echo $usuario->telefone; ?></strong> <span style="color: #BEBEBE; background: none"> telefone </span></li>

                            <li class="bg_ls span12" style="margin-left: 0; background: none; color: #056bad"><strong style="font-size: 15px;"><?php echo $usuario->email; ?></strong> <span style="color: #BEBEBE; background: none"> email </span></li>

                            <li class="bg_lo span12" style="margin-left: 0; background: none; color: #056bad"><strong style="font-size: 15px;"><?php echo $usuario->permissao; ?></strong> <span style="color: #BEBEBE; background: none"> função </span></li> 

                            <li class="bg_ls span12" style="margin-left: 0; background: none;"><a href="<?php echo base_url()?>usuarios/editar/<?php echo $usuario->idUsuarios ;?>" class="btn btn-success" title="Editar as suas informações">Alterar os seus dados</a></li>                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#formUsuario').validate({
            rules :{  
                  oldSenha: { required: true},
                  senha: { required: true},
                  confirmarSenha: { equalTo: "#senha"}
            },
            messages:{ 
                  oldSenha: { required: 'Campo Requerido.'},
                  senha: { required: 'Campo Requerido.'},
                  confirmarSenha: {equalTo: 'As senhas não combinam.'}
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
           });
    });
</script>