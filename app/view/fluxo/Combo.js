Ext.define('EIA.view.fluxo.Combo', {
    extend          : 'Ext.form.field.ComboBox',
    alias           : 'widget.contaCombo',
    name            : 'conta_id',
    fieldLabel      : 'Conta',
    store           : 'Contas',
    displayField    : 'numero',
    valueField      : 'id',
    queryMode       : 'local',
    typeAhead       : true,
    forceSelection  : true,
    initComponent   : function() {
        this.callParent(arguments);
    }
});
