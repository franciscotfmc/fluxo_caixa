Ext.require(['EIA.view.AbstractForm']);
Ext.require(['EIA.view.AbstractWindow']);

Ext.define('EIA.view.categoria.Edit', {
    extend: 'EIA.view.AbstractWindow',
    alias : 'widget.categoriaEdit',
    title : 'Edição de Categoria',

    initComponent: function() {
    	
        this.items = [{
            xtype: 'abstractform',
            items: [{
                name : 'NmCategoria',
                fieldLabel: 'Categoria'				
					}			
			]}
        ];
        this.callParent(arguments);
    }
});