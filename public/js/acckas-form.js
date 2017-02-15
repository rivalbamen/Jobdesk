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
	var deb=$(e).parent().next().get(0);
	var kre=$(e).parent().next().next().get(0);

	deb.innerHTML='<input type="hidden" name="accdebet_id[]" value="'+opt.dataset.debId+'" />'
		+opt.dataset.debCode+' || '+opt.dataset.debName;

	kre.innerHTML='<input type="hidden" name="acckredit_id[]" value="'+opt.dataset.kreId+'" />'
		+opt.dataset.kreCode+' || '+opt.dataset.kreName;


};
function totaling(){
	var total=0;
	$("[name='nominal[]']").each(function(index, el) {
		total+=parseInt(el.value*1);
	});
	
	$("[name='subtotal']").val(total);

}