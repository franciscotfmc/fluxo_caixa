Ext.require(['EIA.view.AbstractForm']);
Ext.require(['EIA.view.AbstractWindow']);
Ext.require(['EIA.view.agenda.Combo']);

Ext.define('EIA.view.agenda.Edit', {
    extend: 'EIA.view.AbstractWindow',
    alias : 'widget.agendaEdit',
    title : 'Edição de Contato',

    initComponent: function() {
    	
        this.items = [{
            xtype: 'abstractform',
            items: [
			{
                xtype		: 'categoriaCombo'
            },
			{
                name 		: 'NmContato',
                fieldLabel	: 'Contato',
				allowBlank	: false				
            }
			,
			{
                name 		: 'DsTelefone',
                fieldLabel	: 'Telefone',
				allowBlank	: false				
            }			
			,
            {
                xtype		: 'datefield',
                name 		: 'DtNiver',
                ref			: 'DtNiver',
                fieldLabel	: 'Niver',
                maxValue	: new Date(),
                format		: 'd/m/Y',
                submitFormat: 'Y-m-d',
                allowBlank	: false
            }            			
			]}
        ];
        this.callParent(arguments);
    }
});