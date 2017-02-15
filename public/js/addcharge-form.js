function newRow(){
	var copy=$("#copy").clone();
	$(copy).removeClass('hidden');
	$(copy).removeAttr('id');
	$("#tabledetail tbody").append(copy);
	totaling();
}

function deleteRow(ele){
	$(ele).parent().parent().remove();
	totaling();
}

window.seltype=function(e){
	var opt=$(e).find('option[value="'+e.value+'"]').get(0);
	var parent=$(e).parent().parent().get(0);
	var sell=$(parent).find('[name="sell[]"]').get(0);

	sell.value=opt.dataset.sell;

	
	$(sell).attr('readOnly', opt.dataset.editable!="1");

	console.log(opt);
	totaling();

};

function totaling(){
	var total=0;

	$("#tabledetail tbody tr").each(function(index,el){
		var qty = $(el).find('[name="qty[]"]').get(0).value;
		var sell = $(el).find('[name="sell[]"]').get(0).value;
		$(el).find('[name="sub[]"]').get(0).value=qty*sell;
		total+=qty*sell;
	});

	$("[name='total']").val(total);
}