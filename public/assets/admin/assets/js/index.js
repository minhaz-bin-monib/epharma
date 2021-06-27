$('body').on('change','#brandStatus',function(){

var id=$(this).attr('data-id');
if (this.checked){
    var status ='active';
}else {
    status = 'inactive';
}
$('.loader__').show();
$.ajax({
url:"brand/update-status/" + id + '/' + status,
method:'get',
success:function (result) {
    $('.loader__').hide();
}
});

});
//dashboard Logo
$('body').on('change','#adminLogoStatus',function(){

  var id=$(this).attr('data-id');
  if (this.checked){
      var status ='active';
  }else {
      status = 'inactive';
  }
  $('.loader__').show();
  $.ajax({
  url:"dashboardlogo/update-status/" + id + '/' + status,
  method:'get',
  success:function (result) {
      $('.loader__').hide();
  }
  });
  
  });

  //Middle Banner Logo
$('body').on('change','#midddleBannerStatus',function(){

  var id=$(this).attr('data-id');
  if (this.checked){
      var status ='active';
  }else {
      status = 'inactive';
  }
  $('.loader__').show();
  $.ajax({
  url:"middleBanner/update-status/" + id + '/' + status,
  method:'get',
  success:function (result) {
      $('.loader__').hide();
  }
  });
  
  });

  //Frontend Logo
$('body').on('change','#frontLogoStatus',function(){

  var id=$(this).attr('data-id');
  if (this.checked){
      var status ='active';
  }else {
      status = 'inactive';
  }
  $('.loader__').show();
  $.ajax({
  url:"frontendlogo/update-status/" + id + '/' + status,
  method:'get',
  success:function (result) {
      $('.loader__').hide();
  }
  });
  
  });
//Banner status
$('body').on('change','#bannerStatus',function(){

var id=$(this).attr('data-id');
if (this.checked){
    var status ='active';
}else {
    status = 'inactive';
}
$('.loader__').show();
$.ajax({
url:"banner/update-status/" + id + '/' + status,
method:'get',
success:function (result) {
    $('.loader__').hide();
}
});

});
//Section status
$('body').on('change','#sectionStatus',function(){

var id=$(this).attr('data-id');
if (this.checked){
    var status ='active';
}else {
    status = 'inactive';
}
$('.loader__').show();
$.ajax({
url:"section/update-status/" + id + '/' + status,
method:'get',
success:function (result) {
    $('.loader__').hide();
}
});

});
//category status
$('body').on('change','#categoryStatus',function(){

var id=$(this).attr('data-id');
if (this.checked){
    var status ='active';
}else {
    status = 'inactive';
}
$('.loader__').show();
$.ajax({
url:"category/update-status/" + id + '/' + status,
method:'get',
success:function (result) {
    $('.loader__').hide();
}
});

});

//product status
$('body').on('change','#productStatus',function(){

  var id=$(this).attr('data-id');
  if (this.checked){
      var status ='active';
  }else {
      status = 'inactive';
  }
  $('.loader__').show();
  $.ajax({
  url:"product/update-status/" + id + '/' + status,
  method:'get',
  success:function (result) {
      $('.loader__').hide();
  }
  });
  
  });
//productAttributestatus
$('body').on('change','#productAttributeStatus',function(){

  var id=$(this).attr('data-id');
  if (this.checked){
      var status ='active';
  }else {
      status = 'inactive';
  }
  $('.loader__').show();
  $.ajax({
  url:"update-attribute-status/" + id + '/' + status,
  method:'get',
  success:function (result) {
      $('.loader__').hide();
  }
  });
  
  });

$(document).ready(function(){
  

//get categories lavel with section wise
$('#section_id').change(function(){

var section_id = $(this).val();
$.ajax({
  type:'get',
  url:'append_categories_lavel',
  data:{section_id:section_id},
  success:function(resp){
 $("#appendCategoriesLavel").html(resp);
  },error:function(){
alert("error");
  }
});

});



//get editcategories lavel with section wise
$('#section_id').change(function(){

var section_id = $(this).val();
$.ajax({
  type:'get',
  url:'edit_append_categories_lavel',
  data:{section_id:section_id},
  success:function(resp){
 $("#editAppendCategoriesLavel").html(resp);
  },error:function(){
alert("error");
  }
});

});
///confirmDelete of record
// $(".confirmDelete").click(function(){
// var name = $(this).attr("name");
// if(confirm("Are you sure to delete this "+name+"?")) {
//   return true;
//
// }
// return false;
// });

const site_url = "http://localhost/multivendsor_ecom/public/";
//COnfirm Delete with Sweet Alert




  $(document).on("click",".confirmDelete",function(){
  var record = $(this).attr("record");
   var recordid = $(this).attr("recordid");
   Swal.fire({
     title: 'Are you sure?',
     text: "You won't be able to revert this!",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
     if (result.isConfirmed) {
       Swal.fire(
         'Deleted!',
         'Your file has been deleted.',
         'success'
       )
       window.location.href=site_url +"admin/delete-"+record+"/"+recordid;
 
     }
   });
 
  });


});





 //product Attribute

 $(document).ready(function(){
  var maxField = 10; //Input fields increment limitation
  var addButton = $('.add_button'); //Add button selector
  var wrapper = $('.field_wrapper'); //Input field wrapper
  var fieldHTML = '<div><input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px;margin-top:5px; "/> <input type="text" name="size[]" id="size" placeholder="Size" style="width: 120px ;margin-top:5px; "/> <input type="number" name="price[]" id="price" placeholder="Price" style="width: 120px;margin-top:5px; "/> <input type="number" name="stock[]" id="stock" placeholder="Stock" style="width: 120px;margin-top:5px; "/><a href="javascript:void(0);" class="remove_button" title="Remove field">Remove</a></div>'; //New input field html
  var x = 1; //Initial field counter is 1

  //Once add button is clicked
  $(addButton).click(function(){
      //Check maximum number of input fields
      if(x < maxField){
          x++; //Increment field counter
          $(wrapper).append(fieldHTML); //Add field html
      }
  });

  //Once remove button is clicked
  $(wrapper).on('click', '.remove_button', function(e){
      e.preventDefault();
      $(this).parent('div').remove(); //Remove field html
      x--; //Decrement field counter
  });
});


//check Password
$(document).ready(function(){
  const check_url = "http://localhost/multivendsor_ecom/public/";
 
  $("#current_pwd").click(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'get',
			url:check_url + 'admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp) {
			if (resp=='false') {
				$("#chkPwd").html("<font color='red'>Current password is incorrect</font>");
			}else if(resp =="true") {
					$("#chkPwd").html("<font color='green'>Current password is correct</font>");
			}
			},error:function(){
				alert("Error");
			}

		});
		});
  });

