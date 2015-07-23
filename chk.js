$(document).ready(function(){
	$('#ch').on('change',function(event){
		if(this.checked){
			$('.chbx').each(function(){
				this.checked=true;
			});
			$('#delete').attr('disabled',false);
			}
		else{
			$('.chbx').each(function(){ 
				this.checked=false;
			});
			$('#delete').attr('disabled',true);
		}
	});
});
$('.chbx').on('change',function(){
	var a=$('.chbx:checked').length;
	if(a==1 || a > 1){
		if(a == 1){
			$('#edit').attr('disabled',false);
			$('#delete').attr('disabled',false);
		}
		else if(a>1)
		{
		 $('#edit').attr('disabled',true); 
		}
	}
	else{
		$('#delete').attr('disabled',true);
		$('#edit').attr('disabled',true);   
	}
}); 