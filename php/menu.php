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
