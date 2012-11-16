Ext.define('FM.view.fluxo.Combo', {
    extend          : 'Ext.form.field.ComboBox',
    alias           : 'widget.contaCombo',
    name            : 'conta_id',
    fieldLabel      : 'Conta',
    store           : 'Contas',
    displayField    : 'nome',
    valueField      : 'id',
    queryMode       : 'remote',
    typeAhead       : true,
    forceSelection  : true,
    initComponent   : function() {
        this.callParent(arguments);
    }
});
