 // JavaScript Document
$(function(){
	
})

function showpage(page){
		for(var i=1;i<=3;i++) {
			if (page==i){
				document.getElementById("page"+page).style.display="block";
			} else {
				document.getElementById("page"+i).style.display="none";
			}
		}
	}