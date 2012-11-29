Ext.define('FM.model.Fluxo', {
        extend      : 'Ext.data.Model',
        idProperty  : 'id',
        fields :[{
            name : 'id',
            type : 'int'
        },
        {
            name : 'conta_id',
            type : 'int'
        },
        {
            name : 'descricao',
            type : 'string'
        },
        {
            name : 'dt_fluxo',
            type : 'date',
            dateFormat:'c'
        },
        {
            name : 'valor',
            type : 'float'
        }]
});
