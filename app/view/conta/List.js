Ext.require(['EIA.view.conta.ComboRenderer']);
Ext.require(['EIA.view.AbstractList']);

Ext.define('EIA.view.conta.List' ,{
    extend		: 'EIA.view.AbstractList',
    alias 		: 'widget.contaList',
    store		: 'Contas',
    title 		: 'Lista de Contas', 
	selModel 	: Ext.create('Ext.selection.CheckboxModel'),	
    initComponent: function(){

		this.columns = [
        Ext.create('Ext.grid.RowNumberer'),
		{header: 'Código',  dataIndex: 'id',  flex: 1}				
		, 
		{
            header		: 'Conta Associada',  
            dataIndex	: 'conta_id',  
            flex		: 1,
        },        
		{header: 'Número',  dataIndex: 'numero',  flex: 1}
		,         
		{header: 'Tipo',  dataIndex: 'flag_tipo',  flex: 1}
		
		]; 
		
		this.dockedItems = [{
            xtype: 'pagingtoolbar',
            store: 'Contas',
            dock: 'bottom',
            displayInfo: true
        }];
		
        this.callParent();        
    }   
});
