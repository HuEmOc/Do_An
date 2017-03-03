$(document).ready(function() {
	$(".send_danh_gia").on("click",function(){
		var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var name = $(".txtname").val();
		var email =$(".txtemail").val();
		var content = $(".txtcontent").val();
		var sao = $('[name="danhgia"]:radio:checked').val();
		var id = $('.ip_product').val();
		if(name == ""){
			alert("Vui lòng nhập tên của bạn");
			$(".txtname").focus();
			return false;
		}
		if(email == ""){
			alert("Vui lòng nhập email của bạn");
			$(".txtemail").focus();
			return false;
		}
		if(!regex.test(email)){
			alert("Email không đúng định dạng");
			$(".txtemail").focus();
			return false;
		}
		if(content == ""){
			alert("Vui lòng nhập nội dung đánh giá");
			$(".txtcontent").focus();
			return false;
		}
		//alert(name+email+content+sao+id);
		$.ajax({
			url:'http://localhost/booksonline5.0/danh-gia',
			type:'GET',
			dataType:"html",
			beforeSend: function(){
				$(".guidulieu").text("Đang xủ lý dủ liệu...");
			},
			data:{
				'name':name,
				'email':email,
				'content':content,
				'danhgia':sao,
				'id':id
				},
			success: function(result){
				$("#contact").remove();
				$(".guidulieu").text("Nỗi dung đã được gửi đi.Cảm ơn bạn").delay(3000).hide();
			}
		});
	}); 
});