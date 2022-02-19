<footer class="footer py-4  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <?php echo date("Y"); ?>
                    PawsBook
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
<!--                    <li class="nav-item">-->
<!--                        <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>-->
<!--                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Header Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Confirm Log Out?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirm Log Out and end the session.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Cancel</button>
                <a href="logout.php" type="button" class="btn bg-gradient-success">Log Out</a>
            </div>
        </div>
    </div>
</div>
<!-- End Header Modal -->