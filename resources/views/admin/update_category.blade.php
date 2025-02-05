<div class="modal fade" id="catupModal" tabindex="-1" aria-labelledby="catupModalLabel" aria-hidden="true">
    <form action="" method="post" class="catup-form">
        @csrf
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="catupModalLabel">Update Category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="uperror-show">
                    
                </div>
                <input type="text" name="up_catname" class="up_catname form-control" id="up_catname">
                <input type="hidden" name="up_id" id="up_catid">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary up_cat">Update</button>
            </div>
        </div>
        </div>
    </form>
</div>