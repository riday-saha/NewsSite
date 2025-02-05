<div class="modal fade" id="postupModal" tabindex="-1" aria-labelledby="postupModalLabel" aria-hidden="true">
    <form action="" method="post" enctype="multipart/form-data" class="post-upform">
        @csrf
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="postupModalLabel">Update Post</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="error_postshow">
                    
                </div>
                <input type="text" name="update_postnam" id="update_postnam" class="update_postnam form-control mb-3">
                <textarea name="update_postdesc" id="update_postdesc" class="form-control mb-3" cols="30" rows="10"></textarea>
                <select class="form-select mb-3" aria-label="Default select example" name="updatepost_catId" id="selected_cat">
                    @foreach ($get_category as $get_categories)
                    <option value="{{$get_categories->id}}">{{$get_categories->category_name}}</option>
                    @endforeach
                </select>
                <label for="">Current Image</label>
                <img src="" alt="" class="mb-3" id="show_postingImg" style="height: 150px; width:250px">
                <input type="file" class="form-control" name="updatepost_image" id="updatepost_image">
                <input type="hidden" id="update_id" name="update_id">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary updt_post">Update Post</button>
            </div>
        </div>
        </div>
    </form>
</div>