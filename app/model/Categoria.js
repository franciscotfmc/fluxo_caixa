Ext.define('EIA.model.Categoria', {
    extend		: 'Ext.data.Model',
	idProperty  : 'idCategoria',		
    fields: [
    {
       name : 'idCategoria',
    }, 
    {
        name : 'NmCategoria',
		type : 'string'
    }
    ]
});