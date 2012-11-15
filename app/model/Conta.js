Ext.define('EIA.model.Conta', {
    extend		: 'Ext.data.Model',
	idProperty  : 'id',	
    fields: [
      {
          name: 'id'
      },
	    {
          name: 'conta_id'
      },	
      {
          name: 'numero',
          type: 'string'
      },	
      {
          name: 'flag_tipo',
      }
    ]
});
