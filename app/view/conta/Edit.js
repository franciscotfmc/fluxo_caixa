Ext.require(['EIA.view.AbstractForm']);
Ext.require(['EIA.view.AbstractWindow']);
Ext.require(['EIA.view.conta.Combo']);

Ext.define('EIA.view.conta.Edit', {
    extend: 'EIA.view.AbstractWindow',
    alias : 'widget.contaEdit',
    title : 'Edição de Conta',

    initComponent: function() {
    	
        this.items = [{
            xtype: 'abstractform',
            items: [
			        {
                  xtype		: 'contaCombo',
                  allowBlank: true
              },
			        {
                  name 		: 'numero',
                  fieldLabel	: 'Numero',
          				allowBlank	: false				
              }
			        ,
			        {
                  name 		: 'flag_tipo',
                  fieldLabel	: 'Flag',
                	allowBlank	: false				
              }			
    			]}
        ];
        this.callParent(arguments);
    }
});
