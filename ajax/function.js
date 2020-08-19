﻿// --- JavaScript Document --- //
var showbar = "";
var money = 0;



function inputcupong(){
	$(".contant").load("input_cupong.php");
}

function admincupong() {
	$("#content").load("input_cupong1.php");
}

function showscreen(){
	var windowWidth = 400;
	var windowHeight = 650;
	window.resizeTo(windowWidth,windowHeight);
	var xPos = screen.width - (windowWidth*4);
	var yPos = screen.height - (windowHeight*2);
	window.moveTo(xPos, yPos);
	window.focus();
}



function checkKey(n){

  if (window.event.keyCode == 13){ //Enter
	  if( (n=="username") && ($('#username').val() != '') ){
		//alert("test enter");
		$('#password').focus();
	  }
	  if( (n=="password") && ($('#password').val() !='' ) ){
		//alert(n);
		checkuser();
	  }
	  //schstock();
  }else{
	  $('#pp').html('');
  }
}

function checkiput(n) {
	if (window.event.keyCode == 13){ //Enter
		if( (n=="idcustomer") && ($('#idcustomer').val() != '') ){
		$('#barcode').focus();
	  }
	  /*if( (n=="idorder") && ($('#idorder').val() !='' ) ){
		$('#barcode').focus();
	}*/
	}else if (window.event.keyCode == 46 || window.event.keyCode == 35) {
		if (n=="idcustomer" || n=="idorder") {
			clearbar();
		}
	}
}

function checkuser(){
	//alert('test');
	var username = $('#username').val();
	var password = $('#password').val();
	var data = "username=" + username + "&password=" + password;
	//alert(data);
	$('#pp').html("<img src='images/loading.gif' height='40' width='40' /> <br> Loading...");

	$.ajax({
		type: "POST",
		url: "chk_login.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				//alert(msg);
				window.location.href = "index.php";
			}else if (msg=='N') {
				window.location.href = "cupong.php";
				//$('#contant').load('input_cupong.php');
			}else{
				$('#username').focus();
				$('#username').select();
				$("#pp").html(msg);
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});
}

function logoutuser(){
	$.ajax({
		type: "POST",
		url: "chk_logout.php",
		cache: false,
		data: "",
		success: function(msg){
			//alert(msg);
			if(msg!='Y'){
				window.location.href = "login.php";
			}else{
				//
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});
}

function scanKey(e){
  if (window.event.keyCode == 13){ //Enter
		if( (e=="barcode") && ($('#barcode').val() !='' ) ){
		scan();
	}
}else if (window.event.keyCode == 46 || window.event.keyCode == 35){
	if(e=="barcode"){
		clearbar();
	}
}	else{
	  $('#pp').html('');
  }
}

function clearbar(){
	document.getElementById("idcustomer").value = "";
	document.getElementById("barcode").value = "";
	$('#pp').html('');
	$("#show").html('');
	$('#idcustomer').focus();
	showbar = "";
	money = 0;
}


function scan(){
	//alert("ok");
	var barcode = $('#barcode').val();
	var idcustomer = $('#idcustomer').val();
	var data = "barcode=" + barcode + "&idcustomer=" + idcustomer;
//alert(data);
	$.ajax({
		type: "POST",
		url: "chk_barcode.php",
		cache: false,
		data: data,
		success: function(msg){
			var numarray = msg.split(",");
			if(numarray[0]=='N1'){
				$("#pp").html("<b style='color:red'>"+" คูปองใบนี้ถูกใช้งานไปแล้ว" +"</b>");	//คูปองถูกใช้ไปแล้ว
				$('#barcode').focus();
				$('#barcode').select();
				$("#show").html("");
			}else if (numarray[0]=='N2') {
				$("#pp").html("<b style='color:orange'>"+" คูปองใบนี้หมดอายุการใช้งาน" +"</b>"); //คูปองหมดอายุ
				$('#barcode').focus();
				$('#barcode').select();
				$("#show").html("");
			}else if (numarray[0]=='N3') {
				$("#barcode").html("");
				$("#pp").html("<b style='color:blue'>"+" ไม่มีรหัสส่วนลดนี้อยู่ในระบบ" +"</b>"); //คูปองไม่มีอยู่ในระบบ
				$('#barcode').focus();
				$('#barcode').select();
				$("#show").html("");
			}else if (numarray[0]=='N5') {
				$("#barcode").html("");
				$("#pp").html("<b style='color:blue'>"+" ไม่สามารถใช้รหัสส่วนลดนี้ได้" +"</b>"); //คูปองไม่มีอยู่ในระบบ
				$('#barcode').focus();
				$('#barcode').select();
				$("#show").html("");
		}else if (numarray[0]=='N4') {
				showbar += barcode + "<br> ";
				var num = parseInt(numarray[1]);
				money += num;
				$('#barcode').focus();
				$('#barcode').select();
				$("#pp").html(" บาร์โค้ดที่ใช้ " + "<br> " + showbar); //คูปองหมดอายุ
				$("#show").html("ส่วนลด "+ "<h1><b>"+ money +"</b></h1>");
			}else{
				//
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});
}


// Start User

function view_user() {
	$("#content").load("view_user.php");
}

function add_user() {
	BootstrapDialog.show({
		title: 'New User',
		message: $('<div></div>').load('add_user.php'),
		buttons: [{
			label: 'Add User',
			// no title as it is optional
			cssClass: 'btn-primary',
			action: function(dialogItself){
				adduser();
				dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function adduser() {
	var code_user = $("#code_user").val();
	var username2 = $("#username2").val();
	var password2 = $("#password2").val();
	var name = $("#name").val();
	var lastname = $("#lastname").val();
	var group = $("#group").val();
	var bran = $("#bran").val();
	var data = "code_user=" + code_user + "&username2=" + username2 + "&password2=" + password2 +"&name=" + name +"&lastname=" + lastname +"&group=" + group +"&bran=" + bran;
	//alert(data);
	if(code_user != '' && username2 != '' && password2 != '' && name != '' && lastname != '' && group != '' && bran != ''){
	$.ajax({
		type: "POST",
		url: "add_user_pro.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				view_user();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'เพิ่มข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกบันทึกแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else{
				BootstrapDialog.show({
					type:BootstrapDialog.TYPE_DANGER,
					title: 'Error',
					message: msg,
					buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					draggable: true,
					closable:false
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type : BootstrapDialog.TYPE_DANGER,
				title: 'บันทึกไม่สำเร็จ',
				message: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
				buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
				}]
			});
	}
}

function edit_use_user(id) {
	inputcupong();
	//alert(id);
	BootstrapDialog.show({
		//alert(id);
		type: BootstrapDialog.TYPE_INFO,
		title: 'กรุณาเปลี่ยนรหัสผ่าน !!',
		message:  $('<div></div>').load('edit_use_user.php',{ id : id}),
		buttons: [{
			label: 'Save',
			// no title as it is optional
			cssClass: 'btn-info',
			action: function(dialogItself){
				editpass(id);
				dialogItself.close();
			}
		}, {
			label: 'Cancel',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function editpass(idedit) {
	//alert(idedit);
	var password_edt = $("#password_edt").val();
	var data = "password_edt=" + password_edt;
	//alert(data);
	if(password_edt != ''){
	$.ajax({
		type: "POST",
		url: "chk_edit_pass.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				//view_user();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'บันทึกข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกบันทึกแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else{
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_DANGER,
						title: 'บันทึกไม่สำเร็จ',
						message: msg,
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type : BootstrapDialog.TYPE_DANGER,
				title: 'บันทึกไม่สำเร็จ',
				message: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
				buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
				}]
			});
	}
}


function edit_user(id) {
	//alert(id);
	BootstrapDialog.show({
		//alert(id);
		type: BootstrapDialog.TYPE_INFO,
		title: 'Edit User',
		message:  $('<div></div>').load('edit_user.php',{ id : id}),
		buttons: [{
			label: 'Save',
			// no title as it is optional
			cssClass: 'btn-info',
			action: function(dialogItself){
				edituser(id);
				dialogItself.close();
			}
		}, {
			label: 'Cancel',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function edituser(idedit) {
	//alert(idedit);
	var code_user_ed = $("#code_user_ed").val();
	var username_ed = $("#username_ed").val();
	var password_ed = $("#password_ed").val();
	var name_ed = $("#name_ed").val();
	var lastname_ed = $("#lastname_ed").val();
	var group_ed = $("#group_ed").val();
	var bran_ed = $("#bran_ed").val();
	var data = "code_user_ed=" + code_user_ed + "&username_ed=" + username_ed + "&password_ed=" + password_ed +"&name_ed=" + name_ed +"&lastname_ed=" + lastname_ed +"&group_ed=" + group_ed +"&bran_ed=" + bran_ed +"&id=" +idedit;
	//alert(data);
	if(code_user_ed != '' && username_ed != '' && password_ed != '' && name_ed != '' && lastname_ed != '' && group_ed != '' && bran_ed != ''){
	$.ajax({
		type: "POST",
		url: "chk_edit_user.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				view_user();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'บันทึกข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกบันทึกแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else{
				BootstrapDialog.show({
					title: 'Error',
					message: msg,
					buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					draggable: true,
					closable:false
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type : BootstrapDialog.TYPE_DANGER,
				title: 'บันทึกไม่สำเร็จ',
				message: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
				buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
				}]
			});
	}
}

function delete_user(iddel,name) {
	//alert(iddel + ',' + name);
	BootstrapDialog.show({
		type: BootstrapDialog.TYPE_WARNING,
		title: 'Delete User',
		message: "คุณต้องการลบ " + name + " ? ",
		buttons: [{
			label: 'Yes',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				deleteuser(iddel);
				dialogItself.close();
			}
		}, {
			label: 'No',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function deleteuser(iddelete) {
	//alert(iddelete);
	var data = "id=" + iddelete;
	//alert("ทดสอบ" + data);
	if(data != '' ){
	$.ajax({
		type: "POST",
		url: "chk_del_pro.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				view_user();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'ลบข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกลบเรียบร้อยแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else{
				BootstrapDialog.show({
					type:BootstrapDialog.TYPE_DANGER,
					title: 'Error',
					message: msg,
					buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					draggable: true,
					closable:false
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type:BootstrapDialog.TYPE_DANGER,
			title: 'Delete Error',
			message: 'Error',
			buttons: [{
				label: 'Close',
				action: function(dialogItself){
					dialogItself.close();
				}
			}],
			draggable: true,
			closable:false
		});
	}

}
// End User

// Start barcode

function view_barcode() {
	$("#content").load("view_barcode.php");
}

function add_barcode() {
	BootstrapDialog.show({
		title: "<div><i class='fa fa-barcode'></i> New Barcode</div>",
		message: $('<div></div>').load('add_barcode.php'),
		buttons: [{
			label: 'Add Barcode',
			// no title as it is optional
			cssClass: 'btn-primary',
			action: function(dialogItself){
				addbarcode();
				dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function addbarcode() {
	var numbar = $("#numbar").val();
	var letter = $("#letter").val();
	var price = $("#price").val();
	var date_start = $("#date_start").val();
	var date_end = $("#date_end").val();
	var condition = $("#condition").val();
	var data = "numbar=" + numbar + "&letter=" + letter + "&price=" + price + "&date_start=" + date_start +"&date_end=" + date_end + "&condition=" + condition;
	//alert(data);
	if(numbar != '' && letter != '' && price != '' && date_start != '' && date_end != '' && condition != ''){
	$.ajax({
		type: "POST",
		url: "add_barcode_pro.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				view_barcode();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'เพิ่มข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกบันทึกแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else if (msg=='N') {
				/*var types = [BootstrapDialog.TYPE_WARNING];
				$.each(types, function(index, type){*/
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_WARNING,
            title: 'บันทึกไม่สำเร็จ',
            message: 'บาร์โค้ดนี้มีอยู่ในระบบแล้ว !',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
        	});
				//});
			}else if (msg=='NN') {
				/*var types = [BootstrapDialog.TYPE_WARNING];
				$.each(types, function(index, type){*/
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_WARNING,
            title: 'บันทึกไม่สำเร็จ',
            message: 'บาร์โค้ดราคานี้ถึงขีดจำกัดแล้ว !',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
        	});
				//});
			}else{
				BootstrapDialog.show({
					type:BootstrapDialog.TYPE_DANGER,
					title: 'Error',
					message: msg,
					buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					draggable: true,
					closable:false
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type : BootstrapDialog.TYPE_DANGER,
				title: 'บันทึกไม่สำเร็จ',
				message: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
				buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
				}]
			});
	}
}


function edit_barcode(id) {
	//alert(id);
	BootstrapDialog.show({
		//alert(id);
		type: BootstrapDialog.TYPE_INFO,
		title: 'Edit Barcode',
		message:  $('<div></div>').load('edit_barcode.php',{ id : id}),
		buttons: [{
			label: 'Save',
			// no title as it is optional
			cssClass: 'btn-info',
			action: function(dialogItself){
				editbarcode(id);
				dialogItself.close();
			}
		}, {
			label: 'Cancel',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function editbarcode(idedit) {
	//alert(idedit);
	var code_bar_ed = $("#code_bar_ed").val();
	var price_ed = $("#price_ed").val();
	var dates_ed = $("#dates_ed").val();
	var datee_ed = $("#datee_ed").val();
	var data = "code_bar_ed=" + code_bar_ed + "&price_ed=" + price_ed + "&dates_ed=" + dates_ed +"&datee_ed=" + datee_ed +"&id=" +idedit;
	//alert(data);
	if(code_bar_ed != '' && price_ed != '' && dates_ed != '' && datee_ed != ''){
	$.ajax({
		type: "POST",
		url: "chk_edit_barcode.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				view_barcode();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'บันทึกข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกบันทึกแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else{
				BootstrapDialog.show({
					title: 'Error',
					message: msg,
					buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					draggable: true,
					closable:false
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type : BootstrapDialog.TYPE_DANGER,
				title: 'บันทึกไม่สำเร็จ',
				message: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
				buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
				}]
			});
	}
}

function delete_barcode(iddel,name) {
	//alert(iddel + ',' + name);
	BootstrapDialog.show({
		type: BootstrapDialog.TYPE_WARNING,
		title: 'Delete Barcode',
		message: "คุณต้องการลบ " + name + " ? ",
		buttons: [{
			label: 'Yes',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				deletebarcode(iddel);
				dialogItself.close();
			}
		}, {
			label: 'No',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function deletebarcode(iddelete) {
	//alert(iddelete);
	var data = "id=" + iddelete;
	//alert("ทดสอบ" + data);
	if(data != '' ){
	$.ajax({
		type: "POST",
		url: "chk_del_barcode.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				view_barcode();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'ลบข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกลบเรียบร้อยแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else{
				BootstrapDialog.show({
					type:BootstrapDialog.TYPE_DANGER,
					title: 'Error',
					message: msg,
					buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					draggable: true,
					closable:false
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type:BootstrapDialog.TYPE_DANGER,
			title: 'Delete Error',
			message: 'Error',
			buttons: [{
				label: 'Close',
				action: function(dialogItself){
					dialogItself.close();
				}
			}],
			draggable: true,
			closable:false
		});
	}

}

// End Barcode


function view_use_barcode() {
	$("#content").load("view_use_barcode.php");
}


// start Group

function view_group() {
	$("#content").load("view_group.php");
}

function add_group() {
	BootstrapDialog.show({
		title: 'New Gr',
		message: $('<div></div>').load('add_gropp.php'),
		buttons: [{
			label: 'Add GroupUser',
			// no title as it is optional
			cssClass: 'btn-primary',
			action: function(dialogItself){
				addgroup();
				dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function addgroup() {
	var group = $("#group").val();
	var data = "group=" + group;
	//alert(data);
	if(group != ''){
	$.ajax({
		type: "POST",
		url: "add_group_pro.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				view_group();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'เพิ่มข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกบันทึกแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else if (msg=='N') {
				/*var types = [BootstrapDialog.TYPE_WARNING];
				$.each(types, function(index, type){*/
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_WARNING,
            title: 'บันทึกไม่สำเร็จ',
            message: 'บาร์โค้ดนี้มีอยู่ในระบบแล้ว !',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
        	});
				//});
			}else{
				BootstrapDialog.show({
					type:BootstrapDialog.TYPE_DANGER,
					title: 'Error',
					message: msg,
					buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					draggable: true,
					closable:false
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type : BootstrapDialog.TYPE_DANGER,
				title: 'บันทึกไม่สำเร็จ',
				message: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
				buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
				}]
			});
	}
}

function edit_group(id) {
	//alert(id);
	BootstrapDialog.show({
		//alert(id);
		type: BootstrapDialog.TYPE_INFO,
		title: 'Edit Group',
		message:  $('<div></div>').load('edit_group.php',{ id : id}),
		buttons: [{
			label: 'Save',
			// no title as it is optional
			cssClass: 'btn-info',
			action: function(dialogItself){
				editgroup(id);
				dialogItself.close();
			}
		}, {
			label: 'Cancel',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function editgroup(idedit) {
	//alert(idedit);
	var groupE = $("#groupE").val();
	var data = "groupE=" + groupE +"&id=" +idedit;
	//alert(data);
	if(groupE != ''){
	$.ajax({
		type: "POST",
		url: "chk_edit_group.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				view_group();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'บันทึกข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกบันทึกแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else{
				BootstrapDialog.show({
					title: 'Error',
					message: msg,
					buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					draggable: true,
					closable:false
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type : BootstrapDialog.TYPE_DANGER,
				title: 'บันทึกไม่สำเร็จ',
				message: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
				buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
				}]
			});
	}
}

function delete_group(iddel,name) {
	//alert(iddel + ',' + name);
	BootstrapDialog.show({
		type: BootstrapDialog.TYPE_WARNING,
		title: 'Delete Group',
		message: "คุณต้องการลบ " + name + " ? ",
		buttons: [{
			label: 'Yes',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				deletegroup(iddel);
				dialogItself.close();
			}
		}, {
			label: 'No',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function deletegroup(iddelete) {
	//alert(iddelete);
	var data = "id=" + iddelete;
	//alert("ทดสอบ" + data);
	if(data != '' ){
	$.ajax({
		type: "POST",
		url: "chk_del_group.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				view_group();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'ลบข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกลบเรียบร้อยแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else{
				BootstrapDialog.show({
					type:BootstrapDialog.TYPE_DANGER,
					title: 'Error',
					message: msg,
					buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					draggable: true,
					closable:false
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type:BootstrapDialog.TYPE_DANGER,
			title: 'Delete Error',
			message: 'Error',
			buttons: [{
				label: 'Close',
				action: function(dialogItself){
					dialogItself.close();
				}
			}],
			draggable: true,
			closable:false
		});
	}

}

// End Group


// start branch

function view_branch() {
	$("#content").load("view_branch.php");
}

function add_branch() {
	BootstrapDialog.show({
		title: 'New Branch',
		message: $('<div></div>').load('add_branch.php'),
		buttons: [{
			label: 'Add Branch',
			// no title as it is optional
			cssClass: 'btn-primary',
			action: function(dialogItself){
				addbranch();
				dialogItself.close();
			}
		}, {
			label: 'Close',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function addbranch() {
	var bran = $("#bran").val();
	var brans = $("#brans").val();
	var data = "bran=" + bran + "&brans=" + brans;
	//alert(data);
	if(bran != '' && brans != ''){
	$.ajax({
		type: "POST",
		url: "add_branch_pro.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				view_branch();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'เพิ่มข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกบันทึกแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else if (msg=='N') {
				/*var types = [BootstrapDialog.TYPE_WARNING];
				$.each(types, function(index, type){*/
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_WARNING,
            title: 'บันทึกไม่สำเร็จ',
            message: 'บาร์โค้ดนี้มีอยู่ในระบบแล้ว !',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
        	});
				//});
			}else{
				BootstrapDialog.show({
					type:BootstrapDialog.TYPE_DANGER,
					title: 'Error',
					message: msg,
					buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					draggable: true,
					closable:false
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type : BootstrapDialog.TYPE_DANGER,
				title: 'บันทึกไม่สำเร็จ',
				message: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
				buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
				}]
			});
	}
}


function edit_branch(id) {
	//alert(id);
	BootstrapDialog.show({
		//alert(id);
		type: BootstrapDialog.TYPE_INFO,
		title: 'Edit Branch',
		message:  $('<div></div>').load('edit_branch.php',{ id : id}),
		buttons: [{
			label: 'Save',
			// no title as it is optional
			cssClass: 'btn-info',
			action: function(dialogItself){
				editbranch(id);
				dialogItself.close();
			}
		}, {
			label: 'Cancel',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function editbranch(idedit) {
	//alert(idedit);
	var branE = $("#branE").val();
	var bransE = $("#bransE").val();
	var data = "branE=" + branE +"&bransE=" +bransE +"&id=" +idedit;
	//alert(data);
	if(branE != '' && bransE != ''){
	$.ajax({
		type: "POST",
		url: "chk_edit_branch.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				view_branch();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'บันทึกข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกบันทึกแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else{
				BootstrapDialog.show({
					title: 'Error',
					message: msg,
					buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					draggable: true,
					closable:false
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type : BootstrapDialog.TYPE_DANGER,
				title: 'บันทึกไม่สำเร็จ',
				message: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
				buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
				}]
			});
	}
}

function delete_branch(iddel,name) {
	//alert(iddel + ',' + name);
	BootstrapDialog.show({
		type: BootstrapDialog.TYPE_WARNING,
		title: 'Delete Branch',
		message: "คุณต้องการลบ " + name + " ? ",
		buttons: [{
			label: 'Yes',
			// no title as it is optional
			cssClass: 'btn-warning',
			action: function(dialogItself){
				deletebranch(iddel);
				dialogItself.close();
			}
		}, {
			label: 'No',
			action: function(dialogItself){
				dialogItself.close();
			}
		}],
		draggable: true,
		closable:false
	});
}

function deletebranch(iddelete) {
	//alert(iddelete);
	var data = "id=" + iddelete;
	//alert("ทดสอบ" + data);
	if(data != '' ){
	$.ajax({
		type: "POST",
		url: "chk_del_branch.php",
		cache: false,
		data: data,
		success: function(msg){
			//alert(msg);
			if(msg=='Y'){
				view_branch();
				BootstrapDialog.show({
					type : BootstrapDialog.TYPE_SUCCESS,
						title: 'ลบข้อมูลสำเร็จ',
						message: 'ข้อมูลถูกลบเรียบร้อยแล้ว',
						buttons: [{
								label: 'Close',
								action: function(dialogItself){
									dialogItself.close();
								}
						}]
					});
			}else{
				BootstrapDialog.show({
					type:BootstrapDialog.TYPE_DANGER,
					title: 'Error',
					message: msg,
					buttons: [{
						label: 'Close',
						action: function(dialogItself){
							dialogItself.close();
						}
					}],
					draggable: true,
					closable:false
				});
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});}else{
		BootstrapDialog.show({
			type:BootstrapDialog.TYPE_DANGER,
			title: 'Delete Error',
			message: 'Error',
			buttons: [{
				label: 'Close',
				action: function(dialogItself){
					dialogItself.close();
				}
			}],
			draggable: true,
			closable:false
		});
	}

}


function print_bar() {
	//alert("tt");
	$("#content").load("print_barcode.php");

}

function go_print() {
	var priceP = $("#priceP").val();
	var numbarP = $("#numbarP").val();
	var data = "&priceP=" + priceP + "&numbarP=" + numbarP;
	if (priceP != 0) {
		window.open.href = "printarraylabel3.php?data="+data;
	}else {
		BootstrapDialog.show({
			type:BootstrapDialog.TYPE_DANGER,
			title: 'Error',
			message: 'กรุณาเลือกจำนวนเงิน',
			buttons: [{
				label: 'Close',
				action: function(dialogItself){
					dialogItself.close();
				}
			}],
			draggable: true,
			closable:false
		});
	}

		}

function change_mon() {
	//alert("tt");
	var priceP = $("#priceP").val();
	var data = "priceP=" + priceP;
	var d1 = document.getElementById("numbarP").value;
	//alert(d1);

	$.ajax({
		type: "POST",
		url: "getnum.php",
		cache: false,
		data: data,
		success: function(msg){
			if(msg== 0){
				document.getElementById("numbarP").value = "0";
			}else{
				document.getElementById("numbarP").value = msg;
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});
}




// --- End javascript --- //
