/**
 * Created by anita on 5/14/15.
 */


$ = jQuery;
$(document).ready(function(){
    /*
    * saving anything with a form
    * */

    $("form").on('submit',function(event){

        event.preventDefault();
        console.log(this);

        var form = $(this);
        var action = form.attr('action')

        console.log(form.attr('action'));
        console.log(form.serialize());

    })

 });
