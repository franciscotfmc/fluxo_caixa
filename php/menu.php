<?php

$menu = "{ 
            children: [
                    {
                        text:'Cadastros',
                        expanded: true,
                        children:[
                            {
                                text:'Usuários',
                                leaf: true,
                                itemMenu: 'usuarioList'
                            },
                            {
                                text:'Contas',
                                leaf: true,
                                itemMenu: 'contaList'
                            },
                            {
                                text:'Fluxos',
                                leaf: true,
                                itemMenu: 'fluxoList'
                            },
                        ]
                    }
                    ,
                    {
                        text:'Relatórios',
                        expanded: true,
                        children:[
                            {
                                text:'Gráfico Fluxo de Caixa',
                                leaf:true,
                                itemMenu: ''
                            }
                        ]
                    }
                ]
            }";
echo $menu;
