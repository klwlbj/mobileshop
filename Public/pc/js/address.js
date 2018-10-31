// JavaScript Document
$(document).ready(function(e) {
  /* 查找城市 */
  $(".province").on("change",function(){
    var id = $(this).val();
	if(id!=0){
	  ajax({
		method : 'post',
		url : think+'/user/getplacename',
		data : {
			'id' : id,
			'lev' : 2
		},
		success : function (data) {
			var data = eval("("+data+")");
			if(data!=''){
			  $(".cityshow").html('<select name="city" class="city"><option value="0">请选择市</option>'+data+'</select>').show();
			  $(".regionshow").html('<select name="region" class="region"><option value="0">请选择区域</option></select>');
			}
		},
		async : true
	  }); 
	}
  });
  /* 查找区域 */  
  $(".city").live("change",function(e){
    var id = $(this).val();
	if(id!=0){
	  ajax({
		method : 'post',
		url : think+'/user/getplacename',
		data : {
			'id' : id,
			'lev' : 3
		},
		success : function (data) {
			var data = eval("("+data+")");
			if(data!=''){
			  $(".regionshow").html('<select name="region" class="region"><option value="0">请选择区域</option>'+data+'</select>');
			}
		},
		async : true
	  }); 
	}
  });
  /*显示地址框*/
  $(".usenewadd").click(function(e) {
    cmask();
	$(".addaddress").animate({'top':'50%'},500);
  });

  /* 隐藏地址框 */
  $(".closeadd").click(function(e) {
	var td = document.addform;
	$(".addaddress").animate({'top':'-50%'},400);
	$("#showid").val(0);
	td.saveadd.value = "保存";
	td.name.value = '';
	td.address.value = '';
	td.phone.value = '';
	td.tel.value = '';
	Hide(); 
  });
  /* 结束 */
  
   /* 新增一个地址 */
  $(".saveadd").click(function(e) {
    var td = document.addform;
    if(td.name.value=="" || $.trim(td.name.value.length)<2){systip('请输入收货名称，不得少于2个字符');td.name.focus();return false;}
	if(td.province.value==0 || td.city.value==0){systip('请选择您的收货地址');td.province.focus();return false;}
	if(td.address.value=="" || $.trim(td.address.value.length)<5){systip('请输入详细收货地址，不得少于5个字符');td.address.focus();return false;}
	if(td.phone.value=="" || $.trim(td.phone.value.length)!=11){systip('手机号码有误');td.phone.focus();return false;}
	var pzz=/1[3-8]+\d{9}/;//检测手机号码的合法性
	if(!pzz.test(td.phone.value)){systip('手机号码有误');td.phone.focus();return false;}
	var isdef = ($(".isdefault:checked").val()) ? 1 : 0;
	if(td.tel.value!=''){if($.trim(td.tel.value.length)<5){systip('固定电话不的少于5个字符');td.tel.focus();return false;}}
	//保存地址 或新增 td.showid.value >0 更新
	 ajax({
		method : 'post',
		url : think+'/User/addressmodoradd',
		data : {
			'name' : td.name.value,
			'province' : td.province.value,
			'city' : td.city.value,
			'region' : td.region.value,
			'address' : td.address.value,
			'phone' : td.phone.value,
			'id' : td.showid.value,
			'tel' : td.tel.value,
			'isdef' : isdef,
		},
		success : function (data) {
			var data = eval("("+data+")");
			if(data!=''){
			  if(data==1){
				if(td.showid.value==0){
					systip('地址添加成功');
				}else{
					systip('地址修改成功');
				}
				setTimeout(function(){
					location.reload();
					},1000);
			  }else if(data==0){
			    systip('地址添加失败，请检测您的网络，或者刷新下试试吧');
			  }else{
			    systip(data);
			  }
			}
		},
		async : true
	  }); 
	//结束
  });
  
  /*--------------------------订单的js------------------------*/
  /* 选择一个地址 */
  $(".usernewadd .selectedadd").click(function(e) {
    var did = $(this).data("id");
	$(".selectedadd").removeClass("orderaddselect").addClass("orderadd"); 
	$(this).removeClass("orderadd").addClass("orderaddselect");
	$("#goodsaddid").val(did);
	$('.selectobadd').hide();
	if($("#goodsaddid").val()>0){
		$('.alipaytopay_btn').show();
		$('.weixintopay_btn').show();	
		$('.topayback').hide();
	}else{
		$('.alipaytopay_btn').hide();
		$('.weixintopay_btn').hide();	
		$('.topayback').show();
	}
  });

});

