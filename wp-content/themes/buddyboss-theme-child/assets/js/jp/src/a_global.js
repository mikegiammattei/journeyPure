jQuery(document).ready(function () {

    autoTextarea();

});



function autoTextarea() {

    if(jQuery('textarea').length > 0){

        document.addEventListener('input', function (event) {

            if (event.target.tagName.toLowerCase() !== 'textarea') return;

        }, false);



        document.addEventListener('input', function (event) {

            if (event.target.tagName.toLowerCase() !== 'textarea') return;

            autoExpand(event.target);

        }, false);



        var autoExpand = function (field) {



            // Reset field height

            field.style.height = 'inherit';



            // Get the computed styles for the element

            var computed = window.getComputedStyle(field);



            // Calculate the height

            var height = parseInt(computed.getPropertyValue('border-top-width'), 10)

                + parseInt(computed.getPropertyValue('padding-top'), 10)

                + field.scrollHeight

                + parseInt(computed.getPropertyValue('padding-bottom'), 10)

                + parseInt(computed.getPropertyValue('border-bottom-width'), 10);



            field.style.height = height + 'px';



        };

    }

}



jQuery(document).ready(function () {

    if(jQuery('#signup-form .field_nickname').length > 0){

        jQuery('#signup-form .field_nickname').remove();

    }



});
