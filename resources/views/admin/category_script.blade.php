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
        $(document).on('click','.add_cat',function(e){
            e.preventDefault();

            let catgo_name = $('.cat_name').val();
            //console.log(catgo_name);

            $.ajax({
                url:"{{route('add.category')}}",
                method:"post",
                data:{
                    catgo_name:catgo_name,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    
                },
                success:function(res){
                    if(res.status === 'success'){
                        $('.modal').modal('hide');
                        $('.cat-form')[0].reset();
                        $('.table').load(location.href+' .table');
                    }
                },
                error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors,function(index,value){
                        $('.error-show').append('<span class = "text-danger">'+ value +'</span>');
                    });   
                }
            }); 
        });

        //show category in update form
        $(document).on('click','.update_catego',function(e){
            e.preventDefault();

            let new_catname = $(this).data('cat_name');
            let new_catid = $(this).data('cat_id');
            $('#up_catname').val(new_catname);
            $('#up_catid').val(new_catid);
        });

        //update category data
        $(document).on('click','.up_cat',function(e){
            e.preventDefault();

            let updated_ctname = $('#up_catname').val();
            let updated_ctid = $('#up_catid').val();
            console.log(updated_ctname + updated_ctid);

            $.ajax({
                url:"{{route('updated.category')}}",
                method:"POST",
                data:{
                    updated_ctname:updated_ctname,
                    updated_ctid:updated_ctid,
                    _token:$('meta[name="csrf-token"]').attr('content')
                },
                success:function(res){
                    if(res.status === 'success'){
                        $('#catupModal').modal('hide');
                        $('.catup-form')[0].reset();
                        $('.table').load(location.href+' .table');
                        
                    }
                },
                error:function(err){
                    let errorcatgo = err.responseJSON;
                    $.each(errorcatgo.errorcatgoes, function(index,value){
                        $('.uperror-show').append('<span class"text-danger">'+ value + '</span>');
                    });
                }
            }); 
        });

        //delete category
        $(document).on('click','.dlt_category',function(e){
            e.preventDefault();
            let dlt_ctid =  $(this).data('dltcat_id');
            //alert(dlt_ctid);

            if(confirm("are you sure to delete?")){
                $.ajax({
                    url:"{{route('deleted.category')}}",
                    method:"post",
                    data:{
                        dlt_ctid:dlt_ctid,
                        _token:$('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(res){
                        if(res.status === 'success'){
                            $('.table').load(location.href+' .table');
                        }
                    },
                    error:function(err){
                        let errors = err.responseJSON;
                        console.log(errors);
                    }
                });
            };
        });
    });
</script>