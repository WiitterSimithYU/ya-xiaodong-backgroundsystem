var window_width = $(window).width();
var window_height = $(window).height();
var right_width = 0;

function isString(str) 
{
	return ((typeof str == 'string') && (str.constructor == String));
}

function in_array(val, arr) {
	for (key in arr) {
		if (arr[key] == val) 
			return key;
	}
	return '';
}

function zuiAlert(title, text, callback) 
{
	$('#zuiAlert').remove();
	var alert_html = 
	'<div id="zuiAlert" class="modal fade">' + 
		'<div class="modal-dialog">' + 
			'<div class="modal-content">' + 
				'<div class="modal-header">' + 
					'<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>' + 
					'<h4 class="modal-title">' + title + '</h4>' + 
				'</div>' + 
				'<div class="modal-body">' + 
					'<p>' + text + '</p>' + 
				'</div>' + 
				'<div class="modal-footer">' + 
					// '<button type="button" class="btn btn-primary" data-dismiss="modal">取消</button>' + 
					'<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>' + 
				'</div>' + 
			'</div>' + 
		'</div>' + 
	'</div>';
	$('body').append(alert_html);
	$('#zuiAlert').modal();
	if (callback) 
		$('#zuiAlert .btn.btn-primary').on('click', callback);
}

function zuiConfirm(title, text, callback) 
{
	$('#zuiConfirm').remove();
	var confirm_html = 
	'<div id="zuiConfirm" class="modal fade">' + 
		'<div class="modal-dialog">' + 
			'<div class="modal-content">' + 
				'<div class="modal-header">' + 
					'<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>' + 
					'<h4 class="modal-title">' + title + '</h4>' + 
				'</div>' + 
				'<div class="modal-body">' + 
					'<p>' + text + '</p>' + 
				'</div>' + 
				'<div class="modal-footer">' + 
					'<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>' + 
					'<button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>' + 
				'</div>' + 
			'</div>' + 
		'</div>' + 
	'</div>';
	$('body').append(confirm_html);
	$('#zuiConfirm').modal();
	$('#zuiConfirm .btn.btn-primary').on('click', callback);
}


function dataTableSort(order_by) 
{
	var order_arr = $('#' + order_by).val().split(' ');

	$('.datatable-head th').each(function(){
		if ($.trim($(this).text()) == order_title_array[order_arr[0]]) {
			if (order_arr[order_arr.length - 1] == 'desc') {
				$(this).html($(this).text() + '<i class="icon icon-caret-down"></i>');
			} else {
				$(this).html($(this).text() + '<i class="icon icon-caret-up"></i>');
			}
			$(this).css('cursor', "pointer");
		} else if (in_array($.trim($(this).text()), order_title_array) != '') {
			$(this).css('cursor', "pointer");
			$(this).html($(this).text() + '<i class="icon icon-sort"></i>');
		}
	});

	$('.datatable-head th').click(function(){
		for (var i in order_title_array) {
			if (order_title_array[i] == $.trim($(this).text())) {
				if ($(this).find('i').hasClass('icon-caret-up')) {
					$('#' + order_by).val(i + ' desc');
				} else {
					$('#' + order_by).val(i);
				}
				$('#search_form').submit();
			}
		}
	});
}





$(function(){
	// 选择时间和日期
	$(".form-datetime").datetimepicker(
	{
	    weekStart: 1,
	    todayBtn:  1,
	    autoclose: 1,
	    todayHighlight: 1,
	    startView: 2,
	    forceParse: 0,
	    showMeridian: 1,
	    format: "yyyy-mm-dd hh:ii"
	});

	// 仅选择日期
	$(".form-date").datetimepicker(
	{
	    language:  "zh-CN",
	    weekStart: 1,
	    todayBtn:  1,
	    autoclose: 1,
	    todayHighlight: 1,
	    startView: 2,
	    minView: 2,
	    forceParse: 0,
	    format: "yyyy-mm-dd"
	});

	// 选择时间
	$(".form-time").datetimepicker({
	    language:  "zh-CN",
	    weekStart: 1,
	    todayBtn:  1,
	    autoclose: 1,
	    todayHighlight: 1,
	    startView: 1,
	    minView: 0,
	    maxView: 1,
	    forceParse: 0,
	    format: 'hh:ii'
	});

	//下拉框
	$('select.chosen-select').chosen({
	    no_results_text: '没有找到', // 当检索时没有找到匹配项时显示的提示文本
	    disable_search_threshold: 6, // 6 个以下的选择项则不显示检索框
	    search_contains: true, // 从任意位置开始检索
	    drop_direction: 'down' //选项列表弹出方向
	});

	$('.btn_reset').click(function(){
		$("#search_form input[type='text'], #search_form select").val('');
		$('select.chosen-select').trigger('chosen:updated');
	});

	$('.search_more').hide();
	$('.btn_more').click(function(){
		var search_more = $(this).parent().parent('.search_body').find('.search_more');
		if (search_more.css('display') != 'none') {
			$(this).removeClass('show');
			search_more.hide();
		} else {
			$(this).addClass('show');
			search_more.show();
		}
	});

	$('.edit_checkbox label, .edit_checkbox i').click(function(event) {
		var checkbox = $(this).parent();
		if(checkbox.hasClass("edit_checkbox1") || checkbox.hasClass("edit_checkbox2")){
			return false;
		}
		if (checkbox.find(':checkbox').attr('checked') == 'checked') {
			checkbox.find('i').removeClass('icon-checked');
			checkbox.find('i').addClass('icon-check-empty');
			checkbox.find(':checkbox').removeAttr('checked');
		} else {
			checkbox.find('i').removeClass('icon-check-empty');
			checkbox.find('i').addClass('icon-checked');
			checkbox.find(':checkbox').attr('checked', 'checked');
		}
		
	});

	$('.edit_checkbox1 label, .edit_checkbox1 i').click(function(event) {
		var checkbox = $(this).parent();
		var status = checkbox.find(':checkbox').attr('checked') == 'checked';
		$(".edit_checkbox1").find('i').removeClass('icon-checked');
		$(".edit_checkbox1").find('i').addClass('icon-check-empty');
		$(".edit_checkbox1").find(':checkbox').removeAttr('checked');
		if (status) {
			checkbox.find('i').removeClass('icon-checked');
			checkbox.find('i').addClass('icon-check-empty');
			checkbox.find(':checkbox').removeAttr('checked');
		} else {
			checkbox.find('i').removeClass('icon-check-empty');
			checkbox.find('i').addClass('icon-checked');
			checkbox.find(':checkbox').attr('checked', 'checked');
		}

	});

	right_width = window_width - $('.left_bar').width(); //左侧宽度

	$('.right_container').css('width', right_width + 'px');
	$('.left_bar, .right_container').css('min-height', window_height + 'px');

	$('#container').css('min-height', (window_height - 78) + 'px');
	var right_container_height = $('.right_container').height();
	$('.left_bar').css('height', '100%');

	setTimeout(function() {
		if (right_container_height > $('.left_bar').height()) {
			$('.left_bar').css('height', right_container_height + 'px');
		}
	}, 1000);
});




