
 $(document).ready(function(){
 	$("a#delete_image").on("click",function(){
 		var url =  "http://localhost/booksonline5.0/admin/product/delimg/";				
 		var _token = $("form[name='from-editproduct']").find("input[name='_token']").val();
 		var idHinh = $(this).parent().find("img").attr("data-id");
 		var img = $(this).parent().find("img").attr("src");
 		var rid = $(this).parent().find("img").attr("id");
 		$.ajax({
 			url: url + idHinh,
 			type: 'GET',
 			cacha: false,
 			data:{"_token":_token,"idHinh":idHinh,"urlHinh":img},
 			success: function(data){
 				if(data == "Oke"){
 					$("#"+rid).remove();
 				}else{
 					alert("Error! Vui lòng kiểm tra lại")
 				}
 			}
 		});
 	});
 	$(".alert").delay(3000).slideUp();
 	$(".hide_listcthd").hide();
 	$(".list_show").click(function(){
 		var id = $(this).attr('data-id');
 		$(".show_listcthd_"+id).toggle("fast");
 	});

 	$(".update_orders").click(function(){
 		var id = $(this).attr('data-id');
 		$.ajax({
 			url: 'http://localhost/booksonline5.0/admin/cart/update/'+id,
 			type: 'GET',
 			dataType:'html',
 			success: function(data){
 				if(data == "oke"){
 					$(".hide_id_"+id).hide();
 					$(".show_id_"+id).html('Đã hoàn thành');
 				}else{
 					alert("Error! Vui lòng kiểm tra lại")
 				}
 			}
 		});
 	});
 });