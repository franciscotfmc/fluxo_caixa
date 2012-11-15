Ext.define('EIA.view.agenda.ComboRenderer', {
    extend			: 'Ext.form.field.ComboBox',
    alias			: 'widget.agendaComboRenderer',
    name 			: 'teCategoria_idCategoria',    
    fieldLabel		: 'Categoria',
    store			: 'Categorias',
    displayField	: 'NmCategoria',
    valueField		: 'idCategoria',
    queryMode		: 'local',	//Server fazer a busca por que os dados nao estao carregados 		
	//local - os dados ja estão carregados 
    typeAhead   	: true,
    forceSelection	: true,
    initComponent	: function() {
        this.callParent(arguments);
        this.store.load();
    }
});