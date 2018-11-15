$(function(){
				jQuery.fn.extend({
//					限制长度
					cbLen:function(minLength,maxLength){
						this.each(function(){
							$(this).keyup(function(){
								var _thisValue = $(this).val();
								var _thisNum = _thisValue.length-1;
								if(_thisNum >= maxLength){
									var value = _thisValue.substring(0,maxLength);
									$(this).val(value);
								}
							});
						});
						return this;
					},
//					不能为空
					cbInput:function(classNameA){
						$(this).attr("disabled","disabled");
						var className = ($(this).attr("class"));
						this.each(function(){
							/*$(this).click(function(){*/
								$(this).parents('form').find('input').each(function(){
									/*添加placeholder提示语句*/
									$(this).parents('form').find('input').each(function(){
										if($(this).attr("value") == '' || $(this).val().length==0){
											$(this).parents('form').find("."+classNameA).attr("index","0");
											$(this).attr("placeholder","该区域不能为空");
										}
									});
									/*添加键盘按下事件*/
									$(this).keyup(function(){
										/*正则验证空格是否存再*/
										var Value = $(this).attr("value").replace(/(^\s+)|(\s+$)/g,"");
										$(this).attr("value",Value);
										/*循环遍历是否为空*/
										$(this).parents('form').find('input').each(function(){
											if($(this).attr("value") == '' || $(this).val().length==0){
												$(this).parents('form').find("."+classNameA).attr("index","0");
												return false;
											}else{
												$(this).parents('form').find("."+classNameA).attr("index","1");
											}
										});
										var Index = $(this).parents('form').find("."+classNameA).attr("index");
										if(Index == "0"){
											$(this).parents('form').find("."+classNameA).attr("disabled","disabled");
										}else{
											$(this).parents('form').find("."+classNameA).attr("disabled","")
										}
									})
									
								});
							/*});*/
						});
					},
//					特定class的input不能为空
					cbNull:function(className,_thisClassName){
						$(this).attr("disabled","disabled");
						this.each(function(){
								$('.'+className).each(function(){
									$(this).keyup(function(){
										var Value = $(this).attr("value").replace(/(^\s+)|(\s+$)/g,"");
										$(this).attr("value",Value);
										$('.'+className).each(function(){
											if($(this).attr("value") == ''){
												$("."+_thisClassName).attr("index","0");
												return false;
											}else{
												$("."+_thisClassName).attr("index","1");
											}
										})
										var Index = $("."+_thisClassName).attr("index");
										if(Index == "0"){
											$("."+_thisClassName).attr("disabled","disabled");
										}else{
											$("."+_thisClassName).attr("disabled","")
										}
									})
									
								});
							});
					},

/*·····································华丽的分界线··················································*/					
//					数字
					cbNum:function(){
						var str = /^[0-9]$/g;/*只能以数字开头和结尾,只能输入数字*/
						var str1 = /[^\d]/g;
						baseTest(str,this,str1);
						return this;
					},
//					所有字母
					cbLet:function(){
						var str = /[A-Za-z]$/g;
						var str1 = /[0-9\!\.@#\$%\^&\*\(\)\[\]\\?\\\/\|\-~`\+\=\,\r\n\:\'\"。，；……！￥\{\}]/g;
						baseTest(str,this,str1);
						return this;
					},
//					大写字母
					cbLetBig:function(){
						var str = /^[A-Z]$/;
						var str1 = /[0-9a-z\!\.@#\$%\^&\*\(\)\[\]\\?\\\/\|\-~`\+\=\,\r\n\:\'\"。，；……！￥\{\}]/g;
						baseTest(str,this,str1);
						return this;
					},
//					小写字母
					cbLetSmall:function(){
						var str = /^[a-z]$/;
						var str1 = /[0-9A-Z\u4e00-\u9fa5\!\.@#\$%\^&\*\(\)\[\]\\?\\\/\|\-~`\+\=\,\r\n\:\'\"。，；……！￥\{\}]/g;
						baseTest(str,this,str1);
						return this;
					},
//					不能有特殊字符只能由数字、大小写字母组成
					cbSpecialCharacter:function(){
						var str = /[A-Za-z0-9]$/;
						var str1 = /[\u4e00-\u9fa5\!\.@#\$%\^&\*\(\)\[\]\\?\\\/\|\-~`\+\=\,\r\n\:\'\"。，；……！￥\{\}]/g;
						baseTest(str,this,str1);
						return this;
					},
/*···································华丽的分界线··················································*/						
//					汉字
					cbChina:function(){
						//return China(this);
						var str = /^[\u4e00-\u9fa5]{0,}$/;
						var msg = "该区域只能输入中文字符！";
						blurTest(str,this,msg);
						return this;
					},
//					身份证号
                    cbCard:function(){
                    	var str = /^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{4}$/;
						var msg = "请正确填写身份号码！";
						blurTest(str,this,msg);
						return this;
                    },
//					电话号码
                    cbPhone:function(){
                    	var str = /^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/;
						var msg = "请正确填写手机号码！";
						blurTest(str,this,msg);
						return this;
                    },
//                  邮箱
					cbEmail:function(){
						var str = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
						var msg = "请正确填写邮箱！";
						blurTest(str,this,msg);
						return this;
					},
//                  日期
					cbTime:function(){
						var str = /^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$/;
						var msg = "yyyy-mm-dd";
						blurTest(str,this,msg);
						return this;
					}, 
/*···································华丽的分界线··················································*/
//					自己写正则表达式和提示语
					/*键盘事件*/
					cbFreeKeyup:function(option){
						var str = option.regExp;
						var str1 = option.regExpNo;
						baseTest(str,this,str1);
						return this;
					},
					/*焦点事件*/
					cbFreeBlur:function(option){
						var str = option.regExp;
						var msg = option.msg;
						blurTest(str,this,msg);
						return this;
					},
				});
				
/*···································华丽的分界线··················································*/					
//				判断所有的键盘按下通用设置
				function baseTest(str,baseThis,str1){
					baseThis.each(function(){
						$(this).keyup(function(){
							var _thisValue = $(this).val();
							if (str.test(_thisValue) == false){
								var va = _thisValue.replace(str1,"");
								$(this).val(va);
							}else{
								$(this).val(_thisValue);
							}
							
						});
					});
				}
				
//				判断所有的失去焦点通用设置
				function blurTest(str,baseThis,msg){
					baseThis.each(function(){
						$(this).blur(function(){
						var _thisValue = $(this).val();
						var _thisNum = _thisValue.length-1;
						if(_thisValue == "" || _thisNum =='-1'){
							$(this).val('');
						}else{
							if (str.test(_thisValue) == false){
								$(this).val("");
								$(this).attr("placeholder",msg);
							}
						}
						});
					});
				}
					
})