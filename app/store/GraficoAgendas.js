Ext.define('EIA.store.GraficoAgendas', {
    extend		: 'Ext.data.Store',
    autoLoad	: false,
    fields		: ['total', 'categoria'],
    remoteSort	: false,
    proxy: {
        type: 'ajax',
        url: 'php/graficoAgendas.php?acao=grafico',
        reader: {
            type			: 'json',
            root			: 'data',
            successProperty	: 'success'
        }
    }
});