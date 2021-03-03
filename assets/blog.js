//create data
CKupdate();
function createBlog(){
  CKclaer();
  kosong();
	$('#createForm')[0].reset();
	$("#submit").attr("disabled", false);
	$('.text-danger').remove();
   $('#tags').tagsInput({width:'auto'});
	$(".form-group").removeClass('has-error').removeClass('has-success');

       $.ajax({
          url: 'category/list_a',
          type: 'post',
          dataType: 'json',
          success: function (data) {
          $.each(data, function (key, value) {
          //show complate seaerch
          $('.kategori').append(       
          
    '<option value="'+value.id_category+'" >'+value.nama_category+'</option>'
  
          );

          });

          }
          })

 $('#id_categori').change(function(){
  var id_categori = $('#id_categori').val();
  if(id_categori != '')
  {
   $.ajax({
    url:'blog/subCategori',
    method:"POST",
    data:{id_categori:id_categori},
    success:function(data)
    {
     $('#id_sub_categori').html(data);
    
    }
   });
  }
  else
  {
   $('#id_sub_categori').html('<option value="">Select sub</option>');
  
  }
 });


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
          CKclaer();
					$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
					'<button type="button" class="close btn-sm" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>'+
					'<strong><span class="glyphicon glyphicon-exlamation-sign"></span></strong>'+response.messages+
					'</div>');
						 setTimeout(function(){
                               $(".messages").empty();
                                $(".tag").remove();
                            },3000);
						$("#submit").attr("disabled", true);
					$("#exampleModalLong").modal('toggle');
					tblog.ajax.reload(null,false);

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
var tblog;
$(document).ready(function(){
tblog=$("#tblog").DataTable({
	'ajax':'blog/list_all',
	'orders':[]
});
});


   function CKclaer(){
    for ( instance in CKEDITOR.instances ){
        CKEDITOR.instances[instance].updateElement();
        CKEDITOR.instances[instance].setData('');
    }
} 


function kosong(){
        $('[type=text]').val('');     
        $('[name=title]').focus();
    }

function updateBlog(id = null) 
{

    if(id) {
        $(".tag").remove();
        $("#updateForm")[0].reset();
        $('.form-group').removeClass('has-error').removeClass('has-success');
        $('.text-danger').remove();

        $.ajax({
            url: 'blog/get_id/'+id,
            type: 'post',
            dataType: 'json',
            success:function(response) {
               $("#etitle").val(response.title);
                $("#emeta").val(response.meta);
               $("#edescription").val(response.description);

                CKupdate();
                     CKEDITOR.instances['edescription'].setData(edescription);

                     

  $(".all_cat").html('<select class="form-control ekategori" name="eid_categori" id="eid_categori" value=""  aria-label="Default select example">'+
  
  '<option value="'+response.id_category+'" >'+response.nama_category+'</option>'+
 
  '</select>');

   $(".tes").html('<select class="form-control " name="eid_sub_categori" id="eid_sub_categori" value=""  aria-label="Default select example">'+
  
  '<option value="'+response.id_sub_category+'" >'+response.nama_sub+'</option>'+
 
  '</select>');
                             
         $("#etags").val(response.tags); 
             $('#etags').tagsInput({width:'auto'});                 
                
$.ajax({
          url: 'category/list_a',
          type: 'post',
          dataType: 'json',
          success: function (data) {
          $.each(data, function (key, value) {
          //show complate seaerch
          $('.ekategori').append(       
          
    '<option value="'+value.id_category+'" >'+value.nama_category+'</option>'
  
          );

          });

          }
          })

 $('#eid_categori').change(function(){
  var eid_categori = $('#eid_categori').val();
  
  if(eid_categori != '')
  {
   $.ajax({
    url:'blog/esubCategori',
    method:"POST",
    data:{eid_categori:eid_categori},
    success:function(data)
    {
     $('#eid_sub_categori').html(data);
    //alert(data);
    }
   });
  }
  else
  {
   $('#eid_sub_categori').html('<option value="">---</option>');
  
  }
 });

   


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
                                $(".tagsinput").remove();

                            },3000);
              $("#updateModal").modal('toggle');
              tblog.ajax.reload(null,false);
              
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


  function CKclaer(){
    for ( instance in CKEDITOR.instances ){
        CKEDITOR.instances[instance].updateElement();
        CKEDITOR.instances[instance].setData('');
    }
} 

 function CKupdate(){
        for (instance in CKEDITOR.instances){
            CKEDITOR.instances['description'].updateElement();
            

        }
        
    }




    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }
    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input,tag) {
      alert("Changed a tag: " + tag);
    }

   
  