/**
 * Created by anita on 5/14/15.
 */


$ = jQuery;
$(document).ready(function(){
    /*
    * saving anything with a form
    * */

    $(".gwp-page-area form").on('submit',function(event){

        event.preventDefault();
        //console.log(this);

        var form = $(this);
        var action = form.attr('action');

        //console.log(form.attr('action'));
        //console.log(ajaxurl);
        //console.log(form.serialize());


        jQuery.ajax({
            url : ajaxurl,
            //contentType : "application/json",
            //dataType: "json",
            type : "post",
            data :
            {
                action: action,
                languages: form.serializeArray()
            },
            success: function(response) {
                console.log(response);

                if(response.success == true)
                {
                    setTimeout(
                        function()
                        {
                            $('.wait-message').fadeOut();
                            $('.confirm-message').fadeIn();

                            setTimeout(
                                function()
                                {
                                    $('.confirm-message').fadeOut();
                                }, 2000);
                        }, 2000);
                }
                else
                {
                    alert();
                }

            },
            beforeSend: function(){
                $('.wait-message').fadeIn();
            },
            complete: function(){
                //$('.confirm-message').fadeOut();
                //alert();
            }
        });


    })

 });
