jQuery(document)
	.ready(
		function($)
		{

			//Add Choice
			function getIndecisions()
			{
				var uri     = $('#indecisions').attr('data-uri');
				var post_id = $('#indecisions').attr('data-id');

				$('#choices').empty();

				$.post( uri, { ID: post_id } )
					.done(
						function( data )
						{
							if(data.length > 0 )
							{

								$.each(data,
									function( index, value )
									{
									  	$('#choices').append('<div class="indecision-row group"><div class="text">'+value.name+'</div><div class="delete"><button class="delete-this" data-id="'+value.id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></div></div>');
									}
								);

								$('.pick-form').show();

							}else{

								$('.pick-form').hide();

							}
				  		}
				  	);
			}

			getIndecisions();

			//Add Choice
			$('#add-form input[type="submit"]')
				.click(
					function(e)
					{
						e.preventDefault();
						var uri = $('#add-form').attr('action');
						var data = $('#add-form').serialize();

						$.post( uri, data )
							.done(
								function( data )
								{
									getIndecisions();
									$('#add-form input[type="text"]').val('');
						  		}
						  	);

					}
			);

			//Delete Choice
			$(document).on('click', '.delete-this',
				function(e)
				{
					e.preventDefault();
					var uri     = $('#choices').attr('data-uri');
					var post_id = $('#choices').attr('data-post-id');
					var ind_id  = $(this).attr('data-id');

					$.post( uri, { ID: post_id, ind_id: ind_id } )
						.done(
							function( data )
							{
								getIndecisions();
					  		}
					  	);

				}
			);

			//Select Choice
			$('#pick-form input[type="submit"]')
				.click(
					function(e)
					{
						e.preventDefault();
						var uri = $(this).parent().attr('action');
						var data = $(this).parent().serialize();

						console.log(data);

						$.post( uri, data )
							.done(
								function( data )
								{
						    		$('#decision-made').empty().append('<div class="result"><h2>You are going to</h2><h3>'+data.name+'</h3><p>'+data.information+'</p></div>');
						  		}
						  	);

					}
			);
		}
	);