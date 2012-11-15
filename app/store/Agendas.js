Ext.define('EIA.store.Agendas', {
    extend: 'Ext.data.Store',
    model: 'EIA.model.Agenda',    
    remoteSort: false,    
	autoLoad: false,
    pageSize: 10,
   autoLoad: {start: 0, limit: 10},
    proxy: {
        simpleSortMode: true,
        type: 'ajax',			
			api            : {
				read    : 'php/agendas.php?acao=list',
				create  : 'php/agendas.php?acao=insert',		
				update  : 'php/agendas.php?acao=update',						
				destroy : 'php/agendas.php?acao=delete'			
			},
		actionMethods : {
				read	: 'POST',
				create	: 'POST',
				update	: 'POST',
				destroy : 'POST'		
		},  
        reader: {
				type		: 'json',
				root		: 'data',
            successProperty	: 'success'
        },
		writer: {
            type			: 'json',
            writeAllFields	: true,
            encode			: true,
            root			: 'data'
        },
		extraParams: {             
            sort 	: 'NmContato',    
            dir 	: 'ASC'
            
        }, 
        listeners: {
            exception: function(proxy, response, operation){
                Ext.MessageBox.show({
                    title: 'REMOTE EXCEPTION',
                    msg: operation.getError(),
                    icon: Ext.MessageBox.ERROR,
                    buttons: Ext.Msg.OK
                });
            }
        }
    },
    listeners: {
        
        write: function(proxy, operation){
            
            var obj = Ext.decode(operation.response.responseText);
            
            if(obj.success){
                Ext.ux.Msg.flash({
                    msg: obj.message,
                    type: 'success'
                });
            }else{
                Ext.ux.Msg.flash({
                    msg: obj.message,
                    type: 'error'
                });
            }
        }
        
    }
    
});