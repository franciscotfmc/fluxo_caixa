Ext.require(['EIA.view.AbstractList']);

Ext.define('EIA.view.categoria.List' ,{
    extend			: 'EIA.view.AbstractList',
    alias 			: 'widget.categoriaList',
    store			: 'Categorias',
    title 			: 'Lista das Categorias',         
	selModel 		: Ext.create('Ext.selection.CheckboxModel'),
    initComponent	: function(){

		this.columns = [
        Ext.create('Ext.grid.RowNumberer'),
        {header: 'Código',  dataIndex: 'idCategoria',  flex: 1},
        {header: 'Nome',  dataIndex: 'NmCategoria',  flex: 1}        
		]; 
		
		this.dockedItems = [{
            xtype: 'pagingtoolbar',
            store: 'Categorias',
            dock: 'bottom',
            displayInfo: true
        }];
		
        this.callParent();        
    }   
});