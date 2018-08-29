	$('#myModal').on('shown.bs.modal', function () {
		$('#myInput').trigger('focus');
	});
	 function showtrailer(id,title){
		$('.modal-title').html(title);
		
		 var video = '<video style="width:100%;" controls="" autoplay="">'+
		'<source src="/videos/trailers/'+id+'" id="videolink" type="video/mp4">'+
		'<source src="" type="video/ogg">'+
		'Your browser does not support the video tag.'+
		'</video>';
		$('.modal-body').html(video);
	}
	function watchthis(id,title){
		$('.modal-title').html(title);
		
		 var video = '<video style="width:100%;" controls="" autoplay="">'+
		'<source src="/videos/movies/'+id+'" id="videolink" type="video/mp4">'+
		'<source src="" type="video/ogg">'+
		'Your browser does not support the video tag.'+
		'</video>';
		$('.modal-body').html(video);
	}
	
	function closemodal(){
		$('.modal-body').html("");		
	}