$(function () {

	//修改资料选项卡
	$('#sel-edit li').click( function () {
		var index = $(this).index();
		$(this).addClass('edit-cur').siblings().removeClass('edit-cur');
		$('.form').hide().eq(index).show();
	} );

	//城市联动
	var province = '';
	$.each(city, function (i, k) {
		province += '<option value="' + k.name + '" index="' + i + '">' + k.name + '</option>';
	});
	$('select[name=province]').append(province).change(function () {
		var option = '';
		if ($(this).val() == '') {
			option += '<option value="">请选择</option>';
		} else {
			var index = $(':selected', this).attr('index');
			var data = city[index].child;
			for (var i = 0; i < data.length; i++) {
				option += '<option value="' + data[i] + '">' + data[i] + '</option>';
			}
		}
		
		$('select[name=city]').html(option);
	});

	//所在地默认选项

	address = address.split('　');
    $('select[name=province]').val(address[0]);
    $.each(city, function (i, k) {
		if(k.name == address[0]){
			var str = '';
			for (var j in k.child){
				str += '<option value="' + k.child[j] + '"';
				if((k.child[j]) == address[1]){
					str += 'selected=selected';
				}
				str += '>' + k.child[j] + '</option>';
			}
			$('select[name=city]').html(str);
		}
    })

	//星座默认选项
	$('select[name=night]').val(constellation);

	//头像上传 Uploadify 插件

	$(document.body).on('change',"#face",function(){
		ajaxFileUpload();

	});

    function ajaxFileUpload() {
        var PUBLIC = ROOT+"/Uploads/Uploads/";
        var url = uploadUrl;
        $.ajaxFileUpload
        (
            {
                url: url , //用于文件上传的服务器端请求地址
                type: 'post',
                data: { }, //此参数非常严谨，写错一个引号都不行
                secureuri: false, //一般设置为false
                fileElementId: 'face', //文件上传空间的id属性  <input type="file" id="file1" name="file" />
                dataType: 'json', //返回值类型 一般设置为json
                success: function (data)  //服务器成功响应处理函数
                {
                	// eval('var data = ' + data);
                	alert(data.status);
                	if(data.status){
						$('#face-img').attr('src',ROOT + '/Uploads/Face/' + data.path.max);
						$('input[name=face180]').val(data.path.max);
                        $('input[name=face80]').val(data.path.medium);
                        $('input[name=face50]').val(data.path.mini);
					}else {
                		alert(data.msg);
					}
                }
            }
        )
    }


	//jQuery Validate 表单验证
	
	/**
	 * 添加验证方法
	 * 以字母开头，5-17 字母、数字、下划线"_"
	 */
	jQuery.validator.addMethod("user", function(value, element) {   
	    var tel = /^[a-zA-Z][\w]{4,16}$/;
	    return this.optional(element) || (tel.test(value));
	}, "以字母开头，5-17 字母、数字、下划线'_'");

	$('form[name=editPwd]').validate({
		errorElement : 'span',
		success : function (label) {
			label.addClass('success');
		},
		rules : {
			old : {
				required : true,
				user : true
			},
			new : {
				required : true,
				user : true
			},
			newed : {
				required : true,
				equalTo : "#new"
			}
		},
		messages : {
			old : {
				required : '请填写旧密码',
			},
			new : {
				required : '请设置新密码'
			},
			newed : {
				required : '请确认密码',
				equalTo : '两次密码不一致'
			}
		}
	});
});