<?php if ($this->session->flashdata('flash')) : ?>
    <div class="alert alert-<?= $this->session->flashdata('flash')['status']; ?> alert-dismissible fade show mt-4" role="alert">
        <?= $this->session->flashdata('flash')['message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<a href="<?= base_url(); ?>dashboard/galleries" class="btn btn-secondary">Back</a>

<div class="row mt-4">
    <div class="col-md-4 col-md-offset-4">
        <form action="<?= base_url(); ?>dashboard/galleries_save" method="POST" autocomplete="off">
            <div class="form-group">
                <label>Galleries Name</label>
                <input type="text" class="form-control" name="gallery_name">
            </div>
            <div class="form-group">
                <label>Galleries Year</label>
                <select class="form-control" name="gallery_year">
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gallery_pic" accept=".jpg, .jpeg, .png">
                    <input type="hidden" name="gallery_pic">
                    <label class="custom-file-label" id="file-label">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<div class="modal fade" id="modal-preview-galleries" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <img id="preview">
                    </div>
                    <div class="col-md-4">
                        <div id="small-preview"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="button" id="btn-done">Done</button>
            </div>
        </div>
    </div>
</div>