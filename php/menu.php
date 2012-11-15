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
                                text:'Categoria',
                                leaf:true,
                                itemMenu: 'categoriaList'
                            },{
                                text:'Agenda',
                                leaf:true,
                                itemMenu: 'agendaList'
                            }
                        ]
                    }
                    ,
                    {
                        text:'Relatórios',
                        expanded: true,
                        children:[
                            {
                                text:'Gráfico de Agenda',
                                leaf:true,
                                itemMenu: 'graficoAgenda'
                            }
                        ]
                    }
                ]
            }";
echo $menu;
