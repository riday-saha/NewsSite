<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function(){
        $(document).on('click','.add_post',function(e){
            e.preventDefault();

            var formData = new FormData();
            formData.append('post_name', $('#post_name').val());
            formData.append('post_descripiton', $('#post_description').val());
            formData.append('post_catego', $('select[name = "post_catego"]').val());
            formData.append('post_image', $('#post_image')[0].files[0]);
            formData.append('_token', '{{ csrf_token() }}');
            // for (let [key, value] of formData.entries()) {
            //     console.log(key, value);
            // }
            $.ajax({
                url:"{{route('add.posts')}}",
                method:"POST",
                data:formData,
                contentType: false,
                processData: false,
                success:function(res){
                    if(res.status === 'success'){
                        //console.log(res);
                        $('#postaddModal').modal('hide');
                        $('.post-form')[0].reset();
                        $('.error-show').html('');
                        $('.table').load(location.href+' .table');
                    }
                },
                error:function(err){
                    let error = err.responseJSON;
                    $('.error-show').html('');
                    $.each(error.errors,function(index,value){
                        $('.error-show').append('<span class="text-danger">'+ value + '</span>');
                    });
                    //alert(error);
                }
            });
        });

        //show data in update form
        $(document).on('click','.edits_btn',function(e){
            e.preventDefault();

            let up_id = $(this).data('post_id');
            let up_ptitle = $(this).data('posting_title');
            let up_pdescrip = $(this).data('posting_descrip');
            let up_pimage = $(this).data('posting_image');
            let up_pcatego = $(this).data('posting_catego');


            // Set values in the form
            $('#update_id').val(up_id);
            $('#update_postnam').val(up_ptitle);
            $('#update_postdesc').val(up_pdescrip);
            // Set the image source
            $('#show_postingImg').attr('src',up_pimage);
            //show selected category
            $('#selected_cat option').each(function(){
                if($(this).val() == up_pcatego){
                    $(this).prop('selected',true);
                }else{
                    $(this).prop('selected',false);
                }
            });
        });

        //update Data
        $(document).on('click','.updt_post',function(e){
            e.preventDefault();

            let updateData = new FormData();
            updateData.append('update_postnam',$('#update_postnam').val());
            updateData.append('update_postdesc',$('#update_postdesc').val());
            updateData.append('updatepost_catId',$('select[name="updatepost_catId"]').val());
            updateData.append('updatepost_image',$('#updatepost_image')[0].files[0]);
            updateData.append('update_id',$('#update_id').val());
            updateData.append('_token','{{ csrf_token() }}');

            $.ajax({
                url:"{{route('update.posts')}}",
                method:"post",
                data:updateData,
                contentType:false,
                processData:false,
                success:function(res){
                    if(res.status === 'success'){
                        $('#postupModal').modal('hide');
                        $('.table').load(location.href+' .table');
                    }
                },
                error:function(err){
                    let puperror = err.responseJSON;
                    $.each(puperror.puperrors, function(index,value){
                        $('.error_postshow').append('<span class = "text-dander">'+ value + '</span>');
                    });
                    //alert(puperror);
                }
            });
        })

        //delete post
        $(document).on('click','.delets_btn',function(e){
            e.preventDefault();

            let delt_id = $(this).data('dlt_pid');
            if(confirm('Are You Sure?')){
                    $.ajax({
                    url:"{{route('delete.posts')}}",
                    method:"Post",
                    data:{
                        delt_id:delt_id,
                        _token:$('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(res){
                        if(res.status == 'success'){
                            $('.table').load(location.href+' .table');
                        }
                    },
                    error:function(err){
                        let dlterr = err.responseJSON;
                        console.log(dlterr);
                        
                    }
                });
            }
        })

        //show single post
       
    });
</script>