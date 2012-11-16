Ext.define('FM.view.conta.ComboRenderer', {
    extend			: 'Ext.form.field.ComboBox',
    alias			: 'widget.contaComboRenderer',
    name 			: 'conta_id',
    fieldLabel		: 'Conta Associada',
    store			: 'Contas',
    displayField	: 'numero',
    valueField		: 'id',
    queryMode		: 'local',	//Server fazer a busca por que os dados nao estao carregados
	//local - os dados ja estão carregados
    typeAhead   	: true,
    forceSelection	: true,
    initComponent	: function() {
        this.callParent(arguments);
        this.store.load();
    }
});
