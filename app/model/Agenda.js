Ext.define('EIA.model.Agenda', {
    extend		: 'Ext.data.Model',
	idProperty  : 'idAgenda',	
    fields: [
    {
        name: 'idAgenda'
    },
	{
        name: 'teCategoria_idCategoria'
    },	
    {
        name: 'NmContato',
        type: 'string'
    }
	,	
    {
        name: 'DsTelefone',
        type: 'string'
    }
	,
    {
        name: 'DtNiver',
        type: 'date', 
        dateFormat:'Y-m-d'
    }    
    ]
});