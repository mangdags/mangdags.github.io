function preview(){
	var totalFiles = $('#fileImg').get(0).files.length;
	for(var i = 0 ; i < totalFiles; i++)
	{
		$('#preview').append("<img src= '" +URL.createObjectURL(event.target.files[i])+"'>");
	}
}