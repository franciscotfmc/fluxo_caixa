Ext.define('EIA.model.Usuario', {
		extend		: 'Ext.data.Model',
		idProperty  : 'idUsuario',				
		fields :[{
			name : 'idUsuario',
			type : 'int'		
		},
		{
			name : 'NmUsuario',
			type : 'string'
		},
		{
			name : 'DsEmail',
			type : 'string'
		},
		{
			name : 'DsSenha',
			type : 'string'
		}		
		]
}); 