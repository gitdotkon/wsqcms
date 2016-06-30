(function($){
    $(document).ready(function(){
       

        $('.menu-wanda-icon').change(function(){
            console.log('ll');
            var val = $(this).val();
            $(this).closest('.menu-icon-wrapper').find('span').attr('class', '').addClass(val);
        })
    })
})(jQuery);