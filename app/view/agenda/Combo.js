Ext.define('EIA.view.agenda.Combo', {
    extend			: 'Ext.form.field.ComboBox',
    alias			: 'widget.categoriaCombo',
    name 			: 'teCategoria_idCategoria',
    fieldLabel		: 'Categoria',
    store			: 'Categorias',
    displayField	: 'NmCategoria',
    valueField		: 'idCategoria',
    queryMode		: 'local',
    typeAhead		: true,
    forceSelection	: true,
    initComponent	: function() {
        this.callParent(arguments);
    }
});