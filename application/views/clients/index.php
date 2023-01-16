<?php if ($this->session->flashdata('flash')) : ?>
    <div class="alert alert-<?= $this->session->flashdata('flash')['status']; ?> alert-dismissible fade show mt-4" role="alert">
        <?= $this->session->flashdata('flash')['message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<a href="<?= base_url(); ?>dashboard/clients_create" class="btn btn-primary mb-4">Create</a>

<table class="table" id="table-clients">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Client Pic</th>
            <th class="text-center">Client Name</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $index => $client) : ?>
            <tr class="text-center">
                <td class="align-middle"><?= $index + 1; ?></td>
                <td class="align-middle d-flex justify-content-center">
                    <img src="<?= $client->client_pic; ?>" style="width: 100px; height: 100px;">
                </td>
                <td class="align-middle"><?= $client->client_name; ?></td>
                <td class="align-middle">
                    <a href="<?= base_url(); ?>dashboard/clients_update/<?= $client->id; ?>" class="btn btn-info">Update</a>
                    <a href="<?= base_url(); ?>dashboard/clients_delete/<?= $client->id; ?>" class="btn btn-danger" onclick="return confirm('are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>