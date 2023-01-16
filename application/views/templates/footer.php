</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url(); ?>auth/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>public/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>public/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url(); ?>public/js/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>public/js/sb-admin-2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.js" integrity="sha512-ZK6m9vADamSl5fxBPtXw6ho6A4TuX89HUbcfvxa2v2NYNT/7l8yFGJ3JlXyMN4hlNbz0il4k6DvqbIW5CCwqkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<?php if ($url == 'clients') : ?>
    <script src="<?= base_url(); ?>public/js/clients.js"></script>
<?php endif; ?>
<?php if ($url == 'galleries') : ?>
    <script src="<?= base_url(); ?>public/js/galleries.js"></script>
<?php endif; ?>
<?php if ($url == 'services') : ?>
    <script src="<?= base_url(); ?>public/js/services.js"></script>
<?php endif; ?>
</body>

</html>