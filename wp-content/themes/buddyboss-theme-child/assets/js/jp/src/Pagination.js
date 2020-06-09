jQuery(document).ready(function () {





    paginationLikedPosts();

});



function paginationLikedPosts() {

    const obj = {

        postPaged : jQuery('[data-pagination-paged]'),

    };

    let paged = 1;

    let get = 0;

    let offset = jQuery('[data-pagination-paged]').data('pagination-show-per-page');

    obj.postPaged.on('click',function () {



        let inMotion  = true;

        let $thisOffsetBtn = jQuery(this);





        if(inMotion){

            $thisOffsetBtn.parent().find('.in-motion').fadeIn();

            $thisOffsetBtn.parent().find('.on').css({'opacity' : '0'});

        }



        get++;



        if(get === 1){

            jQuery.ajax({

                url: ajaxurl,

                data: {

                    'action': 'liked_post_pagination_ajax_call',

                    'postPaged' : paged,

                    'show_per_page' : $thisOffsetBtn.data('pagination-show-per-page'),

                    'offset' : offset

                },

                success:function(data) {



                    jQuery('.top-posts .fill-posts-pagination').append(data);

                    paged++;

                    $thisOffsetBtn.attr('data-pagination-paged',paged);



                    if(paged >= $thisOffsetBtn.data('pagination-total')){

                        $thisOffsetBtn.remove();

                    }else{

                        $thisOffsetBtn.parent().find('.in-motion').fadeOut();

                        $thisOffsetBtn.parent().find('.on').css({'opacity' : '1'});

                    }

                    get = 0;

                    inMotion = false;

                    offset  = offset + $thisOffsetBtn.data('pagination-show-per-page');



                },

                error: function(errorThrown){

                    get = 0;

                    console.log(errorThrown);

                }

            });

        }



    });

}
