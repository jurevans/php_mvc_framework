/*
 * BASE Common Application Methods
 */

var BASE = {};

BASE.Ajax = {
	update : function()
	{
		var args = Array.prototype.slice.call(arguments);

		var $this        = args[0];
		var $form        = $this.closest('form');
		var callback     = args[1] || null;
		var url          = args[2] || $form.attr('action');

		$.ajax({
			url : url,
			type : $form.attr('method'),
			data : new FormData($form[0]),
			cache : false,
			contentType : false,
			processData : false,
			success : function( data ) 
			{
				if(typeof callback === 'function')
					callback.call(this, data);
			},
			error : function( jqXHR, textStatus, errorThrown )
			{
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			},
			complete : function () { }
		});
	},

	remove : function()
	{
		var $form = $('.form');
		var id = $( 'input[name=\'id\']' ).val();
		var args = Array.prototype.slice.call(arguments);
		
		var callback     = args[0] || null;
		var url          = args[1] || $form.attr('action').split('/set/')[0] + '/delete/' + id + '/';
		var redirect_url = args[2] || $form.attr('action').split('/set/')[0] + '/';

		$.ajax({
                        url : url,
                        type : $form.attr('method'),
                        dataType : 'json',
                        success : function( data ) 
			{
				if(typeof callback === 'function')
					callback.call(this, data);
                        },
                        error : function( jqXHR, textStatus, errorThrown )
                        {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                        },
                        complete : function () { }
                });
	}
};
