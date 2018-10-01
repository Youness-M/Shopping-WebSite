<script>

$("#menubar > ul >li").hover(function(){
    var number=$(this).find('ul').length;

    if (number>0) {
        $("#slidemenu").slideDown(600);
        $(this).find('ul').css('display', 'block');
    }else {
        $("#slidemenu").slideUp(200);

    }

	},

	function(){

		$(this).find('ul').css('display','none');


		});

$("#menubar").mouseleave(function(){
    $("#slidemenu").slideUp(200);
})

		

</script>