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
        console.log(ajaxurl);
        //console.log(form.serialize());


        jQuery.ajax({
            type : "post",
            //contentType : "application/json",
            url : ajaxurl,
            data : {action: action, post_id : 50, nonce: form.serialize()},
            success: function(response) {
                console.log(response);
                if(response.type == "success") {
                    alert("Your vote could be added")
                }
                else {
                    alert("Your vote could not be added")
                }
            }
        });


    })

 });
