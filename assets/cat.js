//create data
function createCategory(){
	$('#createForm')[0].reset();
	$("#submit").attr("disabled", false);
	$('.text-danger').remove();
	$(".form-group").removeClass('has-error').removeClass('has-success');
	$("#createForm").unbind('submit').bind('submit',function(){
		var form = $(this);
		$(".text-danger").remove();
			
		$.ajax({
			url:form.attr('action'),
			type:form.attr('method'),
			data:form.serialize(),
			dataType:'json',
			success:function(response){
				if (response.success===true) {
					$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
					'<button type="button" class="close btn-sm" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>'+
					'<strong><span class="glyphicon glyphicon-exlamation-sign"></span></strong>'+response.messages+
					'</div>');
						 setTimeout(function(){
                               $(".messages").empty();
                            },3000);
						$("#submit").attr("disabled", true);
					$("#exampleModal").modal('toggle');
					tbcategory.ajax.reload(null,false);

				}else{
					if (response.messages instanceof Object) {
						$.each(response.messages, function(index,value){
							var id = $("#"+index);
							id
							.closest('.form-group')
							.removeClass('has-error')
							.removeClass('has-success')
							.addClass(value.lenght>0?'has-error':'has-success')
							.after(value);
						});
					}else{
						$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
					'<button type="button" class="close btn-sm" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>'+
					'<strong><span class="glyphicon glyphicon-exlamation-sign"></span></strong>'+response.messages+
					'</div>');
					}
				}

			}
		});
		return false;
	});
}

//view list data
var tbcategory;
$(document).ready(function(){
tbcategory=$("#tbcategory").DataTable({
	'ajax':'category/list_all',
	'orders':[]
});
});

function updateCategory(id = null) 
{

    if(id) {

        $("#updateForm")[0].reset();
        $('.form-group').removeClass('has-error').removeClass('has-success');
        $('.text-danger').remove();

        $.ajax({
            url: 'category/get_id/'+id,
            type: 'post',
            dataType: 'json',
            success:function(response) {
                $("#enama_category").val(response.nama_category);
                 $("#estatus_category").val(response.status_category);
                             
                
                $("#updateForm").unbind('submit').bind('submit', function() {
                   
                    var form = $(this);

                    $.ajax({
                        url: form.attr('action') + '/' + id,
                        type: 'post',
                        data: form.serialize(),
                        dataType: 'json',
                        success:function(response) {
                            if(response.success === true) {
                               $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                                '</div>');                             
							  setTimeout(function(){
                               $(".messages").empty();
                            },3000);
							$("#updateModal").modal('toggle');
							tbcategory.ajax.reload(null,false);
							
                            } else {
                                $('.text-danger').remove()
                                if(response.messages instanceof Object) {
                                    $.each(response.messages, function(index, value) {
                                        var id = $("#"+index);

                                        id
                                        .closest('.form-group')
                                        .removeClass('has-error')
                                        .removeClass('has-success')
                                        .addClass(value.length > 0 ? 'has-error' : 'has-success')                                       
                                        .after(value);                                      

                                    });
                                } else {
                                    $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                      '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                                    '</div>');
                                }
                            }
                        } // /succes


                    }); // /ajax

                    return false;
                });
                
            }
        });
    }
    else {
        alert('error');
    }
}

