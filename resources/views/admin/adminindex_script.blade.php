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

        //for first carousel
        $(document).on('click','.slt_fstcaro',function(e){
            e.preventDefault();
            let get_admin_sltid =  $("select[name='first_carousel']").val(); 
            //alert(get_admin_sltid);

            $.ajax({
                url:"{{route('select.fstcarousel')}}",
                method:"POST",
                data:{
                    get_admin_sltid:get_admin_sltid,
                    _token:$('meta[name="csrf-token"]').attr('content')
                },
                success:function(res){
                    if(res.status === 'success'){
                        $('#fstcaroModal').modal('hide');
                        $('.frstcaroModels').load(location.herf+' .frstcaroModels');

                    }
                },
                error:function(err){
                    let fst_caro = err.responseJSON;
                    //alert(fst_caro);
                }
            });
        });

        //for first SIDEBAR
        $(document).on('click','.slt_firstsidebar',function(e){
            e.preventDefault();
            let get_admin_chooseid =  $("select[name='first_sidebar']").val(); 
            //alert(get_admin_chooseid);

            $.ajax({
                url:"{{route('select.firstsidebar')}}",
                method:"POST",
                data:{
                    get_admin_chooseid:get_admin_chooseid,
                    _token:$('meta[name="csrf-token"]').attr('content')
                },
                success:function(res){
                    if(res.status === 'success'){
                        $('#sidebarOneModal').modal('hide');

                    }
                },
                error:function(err){
                    let fst_caro = err.responseJSON;
                    alert(fst_caro);
                }
            });
        });

        //for 2nd SIDEBAR
        $(document).on('click','.slt_secondsidebar',function(e){
            e.preventDefault();
            let get_adminsecond_chooseid =  $("select[name='second_sidebar']").val(); 
            //alert(get_adminsecond_chooseid);

            $.ajax({
                url:"{{route('select.secondsidebar')}}",
                method:"POST",
                data:{
                    get_adminsecond_chooseid:get_adminsecond_chooseid,
                    _token:$('meta[name="csrf-token"]').attr('content')
                },
                success:function(res){
                    if(res.status === 'success'){
                        $('#sidebarTwoModal').modal('hide');

                    }
                },
                error:function(err){
                    let second_caro = err.responseJSON;
                    alert(second_caro);
                }
            });
        });
    });
</script>