$(function(){
	/*
	$('form#connect').submit(function(event){
		$.post('/rpc/connect.php', {server: $('#server').val(), password:$('#password').val()}, responseToConsole, 'json');
		return false;
	});
	*/

	$('form.command').submit(function(event){
		//disable all other forms
		$('form.command input.submit').attr("disabled","disabled");
		//find this field's cmmand
		thisCommandField=$(this).find('input[@name=command],select[@name=command]');
		//check for command prefix
		prefix=$(thisCommandField).attr("title");
		//apply working symbol
		$(thisCommandField).addClass("working");
		
		$.post('/rpc/runcommand.php', {command: prefix+thisCommandField.val()}, responseToConsole, 'json');
		return false;
	});
	
	//getserver info once
	updateServerStatus();
	//repeat update at 60s intervals
	serverStatusInterval = setInterval(updateServerStatus, 60000);
});

function updateServerStatus(){
	$('#serverstatus h2').addClass("working-grey");
	$.getJSON("/rpc/serverstatus.php", function(data){
		$('#serverstatus h2').removeClass("working-grey");
		$('#serverstatus dl').empty();
		$('#serverstatus dl').append('<dt>IP</dt><dd>'+data.ip+'</dd>');
		$('#serverstatus dl').append('<dt>Hostname</dt><dd>'+data.hostname+'</dd>');
		$('#serverstatus dl').append('<dt>Map</dt><dd>'+data.map+'</dd>');
		$('#serverstatus dl').append('<dt>Difficulty</dt><dd>'+data.difficulty+'</dd>');
		$('#serverstatus dl').append('<dt>Players</dt><dd>'+data.players+'</dd>');
	});
}

function responseToConsole(data){
	//enable all other forms
	$('form.command input.submit').removeAttr("disabled");
	
	$('input[@name=command],select[@name=command]').removeClass("working");
	if(data.responseSuccess=="success"){
		$('#maincontrols').fadeIn("slow");		
	}
	if(data.responseText.length){
		$('#consolelog').append('<div class="' +data.responseSuccess+ '">' + data.responseText.replace(/\n/g,"<br />") + '</div>');
	}else{
		$('#consolelog').append('<div class="' +data.responseSuccess+ '">Done</div>');
	}
	
	$('#consolelog').scrollTop(10000); //faking scrollHeight as it inexplicably doesn't want to work
	
	return false;
}