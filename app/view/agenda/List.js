Ext.require(['EIA.view.agenda.ComboRenderer']);
Ext.require(['EIA.view.AbstractList']);

Ext.define('EIA.view.agenda.List' ,{
    extend		: 'EIA.view.AbstractList',
    alias 		: 'widget.agendaList',
    store		: 'Agendas',
    title 		: 'Lista dos Contatos', 
	selModel 	: Ext.create('Ext.selection.CheckboxModel'),	
    initComponent: function(){

		this.columns = [
        Ext.create('Ext.grid.RowNumberer'),
		{header: 'Código',  dataIndex: 'idAgenda',  flex: 1}				
		, 
		{
            header		: 'Categoria',  
            dataIndex	: 'teCategoria_idCategoria',  
            flex		: 1,
            //field		: Ext.create('EIA.view.agenda.ComboRenderer'),
            renderer	: Ext.util.Format.comboRenderer(Ext.create('EIA.view.agenda.ComboRenderer'))
            //renderer: function (value, metadata, record, rowIndex, colIndex, store) 
			//{                    			                 
			//	var idx = this.columns[colIndex].field.store.find('idCategoria', value);
			//	return idx !== -1 ? this.columns[colIndex].field.store.getAt(idx).get('NmCategoria') : '';
           //}
        },        
		{header: 'Contato',  dataIndex: 'NmContato',  flex: 1}
		,         
		{header: 'Telefone',  dataIndex: 'DsTelefone',  flex: 1}
		,
		{	header		: 'Niver',  
            dataIndex	: 'DtNiver',  
            flex		: 1, 
            xtype		: 'datecolumn', 
            format		: 'd/m/Y'
        } 			
		]; 
		
		this.dockedItems = [{
            xtype: 'pagingtoolbar',
            store: 'Agendas',
            dock: 'bottom',
            displayInfo: true
        }];
		
        this.callParent();        
    }   
});