(function($){
  $(function(){

    $('.button-collapse').sideNav();

    $('#dept').change(function () {
    	if($(this).val() == 'me' || $(this).val() == 'extc' ) 
	    	$('#division').css('display','block');
	    else
	    	$('#division').css('display','none');
    });

    $('#year').change(function() {
    	switch($(this).val())
    	{
    		case 'fe':
    			$('#seminput > option').not(':first').prop('value',function (index) {
    				return index+1;
    			}).html("Semester " + $(this).val());
    			break;
    		case 'se':
    			$('#seminput > option').not(':first').prop('value',function (index) {
    				return index+3;
    			}).html(function (index) {
    				return "Semester "+(index+3);
    			});
    			break;
    		case 'te':
    			$('#seminput > option').not(':first').prop('value',function (index) {
    				return index+5;
    			}).html(function (index) {
    				return "Semester "+(index+5);
    			});
    			break;
    		case 'be':
    			$('#seminput > option').not(':first').prop('value',function (index) {
    				return index+7;
    			}).html(function (index) {
    				return "Semester "+(index+7);
    			});
    			break;
    	}
    });

    $('#seminput').change(function() {
    	console.log($(this).val());
    })

    //plugin initialize
	$('select').not('.disabled').material_select();
  });
   // end of document ready
})(jQuery); // end of jQuery name space