Ext.define('EIA.store.GraficoFluxoContas', {
    extend		: 'Ext.data.Store',
    autoLoad	: false,
    fields		: ['total', 'contas'],
    remoteSort	: false,
    proxy: {
        type: 'ajax',
        url: 'php/graficoContas.php?acao=grafico',
        reader: {
            type			: 'json',
            root			: 'data',
            successProperty	: 'success'
        }
    }
});
