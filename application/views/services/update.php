<?php if ($this->session->flashdata('flash')) : ?>
    <div class="alert alert-<?= $this->session->flashdata('flash')['status']; ?> alert-dismissible fade show mt-4" role="alert">
        <?= $this->session->flashdata('flash')['message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<a href="<?= base_url(); ?>dashboard/services" class="btn btn-secondary">Back</a>

<div style="height: 180px; width: 180px;" class="mt-4">
    <img src="<?= $service->service_pic; ?>" alt="">
</div>
<div class="row mt-4">
    <div class="col-md-4 col-md-offset-4">
        <form action="<?= base_url(); ?>dashboard/services_store" method="POST" autocomplete="off">
            <input type="hidden" name="id" value="<?= $this->uri->segment(3); ?>">
            <div class="form-group">
                <label>Services Name</label>
                <input type="text" class="form-control" name="service_name_update" value="<?= $service->service_name; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="service_pic_update">
                    <input type="hidden" name="service_pic_update">
                    <label class="custom-file-label" id="file-label">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<div class="modal fade" id="modal-preview-update-services" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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