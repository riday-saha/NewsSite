
<script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function () {
        // Fetch default content for the first category
        let defaultCategory = $('.nw_catego').first().data('right');
        fetchCategoryContent(defaultCategory);

        // Fetch content on category click
        $(document).on('click', '.nw_catego', function (e) {
            e.preventDefault();
            let getCategory = $(this).data('right');
            fetchCategoryContent(getCategory);
        });

        function fetchCategoryContent(categoryId) {
            $.ajax({
                url: "{{ route('whats.category') }}",
                method: "POST",
                data: {
                    get_category: categoryId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    if (res.status === 'success') {
                        // Clear existing content
                        $('#whats-content').empty();
                        $('#gourav').empty();
                        // $('#pagination').empty();
    
                        // Show main post (first post)
                        if (res.first_post) {
                            let newsDetailsUrl = "{{ route('news.details', ':id') }}".replace(':id', res.first_post.id);
                            $('#whats-content').append(`
                                <img class="cont-img" src="${res.first_post.image}" alt="">
                                <h4><a href="${newsDetailsUrl}" class="cont-head">${res.first_post.post_title}</a></h4>
                                <p class="cont-auth">by ${res.first_post.user.name} - ${new Date(res.first_post.created_at).toLocaleDateString()}</p>
                                <p class="cont-para">${res.first_post.post_description.substr(0,100)}</p>
                            `);
                        }

                        // Show other posts
                        if (res.data) {
                            let otherPosts = res.data.slice(1); // Skip the first post
                            $.each(otherPosts, function (key, value) {
                                let newsOtherDetailsUrl = "{{ route('news.details', ':id') }}".replace(':id', value.id);
                                $('#gourav').append(`
                                    <div class="col-md-6 col-lg-6 col-xl-12">
                                        <div class="extra-news d-flex">
                                            
                                            <img src="${value.image}" alt="">
                                            <div class="extra-sec">
                                                
                                                <h4><a href="${newsOtherDetailsUrl}" class="ex-deta">${value.post_title}</a></h4>
                                                
                                            </div>
                                        </div>     
                                    </div>  
                                    
                                `);
                            });
                        }
                    }
                    // if (res.links) {
                    //     $('#pagination').html(res.links);
                    // }
                },
                error: function (err) {
                    console.error("Error fetching category content:", err);
                }
            });
    }

});

</script>

{{-- <script>
    $(document).ready(function(){
         //trying by hridoy
    $(document).on('click','.pagination a',function(e){
        e.preventDefault();
        let categoryId = $('.nw_catego.active').data('right'); // Get active category
        let basopago = $(this).attr('href').split('page=')[1];
        //console.log(basopago);
        
        product(basopago,categoryId)
    });

    function product(basopago,categoryId){
        $.ajax({
            url:"/pagination/paginate?page="+basopago,
            method:"POST",
            data:{
                get_category: categoryId, // Pass category ID
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success:function(res){
                if (res.status === 'success') {
                    $('#gourav').html(res); // Clear old data

                    // $.each(res.data, function (key, value) {
                    //     $('#gourav').append(`
                    //         <div class="col-md-6 col-lg-6 col-xl-12">
                    //             <div class="extra-news d-flex">
                    //                 <img src="${value.image}" alt="">
                    //                 <div class="extra-sec">
                    //                     <p class="ex-cat">Category: ${value.category ? value.category.category_name : 'N/A'}</p>
                    //                     <h4><a href="/news/${value.id}" class="ex-deta">${value.post_title}</a></h4>
                    //                     <p class="ex-time">${value.created_at}</p>
                    //                 </div>
                    //             </div>     
                    //         </div>  
                    //     `);
                    // });

                    //$('#pagination').html(res.links); // Update pagination links
                }   
            },
            error: function (err) {
                let gt_err = err.responseJSON;
            console.error("Error fetching paginated content:", gt_err);
        }
                
        });
    }
    });
</script> --}}



{{-- front page OWL carousel related --}}
<script>
  
    //filterable category news
    $(document).ready(function(){

         // carosel one for hero section
        $('.bancaro-one').owlCarousel({
            loop:true,
            margin:10,
            dots:false,
            autoplay:true,
            autoplayTimeout:3500,
            autoplayHoverPause:true,
            animateOut:true,
            animateIn:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })


        // $('.nw_catego').on('click', function(e){
        //     e.preventDefault(); // Prevent default link behavior

        //     // Get the target ID from the 'data-right' attribute
        //     let target = $(this).data('right');
        //     //console.log(target)
            
        //     // Hide all sections and show only the target section
        //     $('.filter-content').hide();
        //     $(target).fadeIn(); // Use fadeIn for a smooth transition

        //     // Optionally, add an active class to the clicked category
        //     $('.nw_catego').removeClass('active');
        //     $(this).addClass('active');
        // });

        //carousel for most popular section
        $('.most-pups').owlCarousel({
            loop:true,
            margin:30,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            dots:false,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:2
                },
                1200:{
                    items:3
                }
            }
        });

        //carousel for Tranding News Section
        $('.trendy-news').owlCarousel({
            loop:true,
            margin:30,
            autoplay:true,
            dots:false,
            nav:false,
            autoplay:true,
            autoplayTimeout:3500,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                768:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });


        //code for youtube video section
        $('.youtube-vdo').owlCarousel({
            loop:true,
            margin:30,
            nav:true,
            dots:false,
            touchDrag: true,   // Allow touch dragging
            mouseDrag: true,
            autoplay:false,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

        //last week post carousel
        $('.lastwk-post').owlCarousel({
            loop:true,
            margin:30,
            autoplay:true,
            autoplayHoverPause:true,
            dots:true,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                },
                1200:{
                    items:4
                }
            }
        });

    

    });
</script> 
