var percent = 47;
var interval;

interval=setInterval(function(){
	percent++;
	$("span#K1Z_L318_wl.valblock.wateranimate > div.circle > div#water.water").css("transform", 'translate(0, '+(100-75)+'%)');
	if(percent==50){
		clearInterval(interval);
		//percent = 0;
	}
}, 60); //default interval = 60
