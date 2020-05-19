<?php
$config = array('eventos' => array(
                                array(
                                    'field'=>'nome',
                                    'label'=>'Nome do Evento',
                                    'rules'=>'trim|xss_clean|required'
                                ),
                                array(
                                    'field'=>'data',
                                    'label'=>'Data',
                                    'rules'=>'trim|xss_clean|required'
                                ),
                                array(
                                    'field'=>'hora',
                                    'label'=>'Hora',
                                    'rules'=>'trim|xss_clean|required'
                                ))
                ,
                'usuarios' => array(array(
                                    'field'=>'nome',
                                    'label'=>'Nome',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'email',
                                    'label'=>'Email',
                                    'rules'=>'required|trim|valid_email|xss_clean'
                                ),
                                array(
                                    'field'=>'ddd',
                                    'label'=>'DDD',
                                    'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'telefone',
                                	'label'=>'Telefone',
                                	'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'telefone2',
                                    'label'=>'Telefone2',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'sexo',
                                    'label'=>'Gênero',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'diabetes',
                                    'label'=>'Diabetes',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'hipertensao',
                                    'label'=>'hipertensao',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'alergia',
                                    'label'=>'alergia',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'listaAlergias',
                                    'label'=>'Lista de Alergias',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'rua',
                                    'label'=>'Rua',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'numero',
                                    'label'=>'Numero',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'bairro',
                                    'label'=>'Bairro',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'cidade',
                                    'label'=>'Cidade',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'estado',
                                    'label'=>'Estado',
                                    'rules'=>'trim|xss_clean'
                                )),
                                array(
                                    'field'=>'nascimento',
                                    'label'=>'Nascimento',
                                    'rules'=>'trim|xss_clean'
                                )
                ,      
                'os' => array(array(
                                    'field'=>'dataInicial',
                                    'label'=>'DataInicial',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'dataFinal',
                                    'label'=>'DataFinal',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'garantia',
                                    'label'=>'Garantia',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'descricaoProduto',
                                    'label'=>'DescricaoProduto',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'defeito',
                                    'label'=>'Defeito',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'status',
                                    'label'=>'Status',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'observacoes',
                                    'label'=>'Observacoes',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'clientes_id',
                                    'label'=>'clientes',
                                    'rules'=>'trim|xss_clean|required'
                                ),
                                array(
                                    'field'=>'usuarios_id',
                                    'label'=>'usuarios_id',
                                    'rules'=>'trim|xss_clean|required'
                                ),
                                array(
                                    'field'=>'laudoTecnico',
                                    'label'=>'Laudo Tecnico',
                                    'rules'=>'trim|xss_clean'
                                ))

                  ,
				'tiposUsuario' => array(array(
                                	'field'=>'nomeTipo',
                                	'label'=>'NomeTipo',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'situacao',
                                	'label'=>'Situacao',
                                	'rules'=>'required|trim|xss_clean'
                                ))

                ,
                'receita' => array(array(
                                    'field'=>'descricao',
                                    'label'=>'Descrição',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'valor',
                                    'label'=>'Valor',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'vencimento',
                                    'label'=>'Data Vencimento',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'tipo',
                                    'label'=>'Tipo',
                                    'rules'=>'required|trim|xss_clean'
                                ))
                ,
                'despesa' => array(array(
                                    'field'=>'descricao',
                                    'label'=>'Descrição',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'valor',
                                    'label'=>'Valor',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'vencimento',
                                    'label'=>'Data Vencimento',
                                    'rules'=>'trim|xss_clean'
                                ),
                                array(
                                    'field'=>'tipo',
                                    'label'=>'Tipo',
                                    'rules'=>'trim|xss_clean'
                                ))
                ,
                'medicos' => array(array(
                                    'field'=>'nome',
                                    'label'=>'Nome do Médico',
                                    'rules'=>'trim|xss_clean'
                                ),
								array(
                                    'field'=>'situacao',
                                    'label'=>'Situação do Médico',
                                ),
								array(
                                    'field'=>'email',
                                    'label'=>'Email',
                                ),
                                array(
                                    'field'=>'telefone',
                                    'label'=>'Telefone do Médico',
                                    'rules'=>'trim|xss_clean'
                                ))
				,
                'configuracao' => array(array(
                                    'field'=>'nomeConsultorio',
                                    'label'=>'Consultório',
                                    'rules'=>'trim|xss_clean|required'
                                ))
				,				
                'configTipo' => array(array(
                                    'field'=>'tipoConsulta',
                                    'label'=>'Tipo de Consulta',
                                    'rules'=>'trim|xss_clean|required'
                                ))
				,			
                'configHorario' => array(array(
                                    'field'=>'horarios',
                                    'label'=>'Horário',
                                    'rules'=>'trim|xss_clean|required'
                                ))
				,
				'consultas10' => array(array(
                                    'field'=>'situacaoConsulta',
                                    'label'=>'Situação da Consulta',
                                    'rules'=>'trim|xss_clean|required'
                                ))
		);
?>	   