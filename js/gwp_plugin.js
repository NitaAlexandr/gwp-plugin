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

        jQuery.ajax({
            url : ajaxurl,
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
                            form.find('.wait-message').fadeOut();
                            form.find('.confirm-message').fadeIn();

                            setTimeout(
                                function()
                                {
                                    form.find('.confirm-message').fadeOut().find('#set-default-language').slideDown();
                                    //form.find('#set-default-language').slideDown();
                                }, 2000);
                        }, 2000);
                }
                else
                {
                    alert();
                }

            },
            beforeSend: function(){
                form.find('.wait-message').fadeIn();
            },
            complete: function(){
            }
        });
    })
 });
