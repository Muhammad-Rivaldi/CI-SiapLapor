<!-- Modal untuk exit-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>apakah anda ingin keluar dari situs ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">tidak</button>
                <a href="<?php echo site_url('test/logout') ?>"><button type="button" class="btn btn-primary">Ya</button></a>
            </div>
        </div>
    </div>
</div>
<!--  -->

<!-- Add Data Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="inputpetugas" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Petugas</label>
                        <input type="text" name="nmptgs" id="nmptgs" class="form-control" placeholder="Masukkan Nama petugas">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="usrnm" id="usrnm" class="form-control" placeholder="masukan username petugas">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pwptgs" id="pwptgs" class="form-control" placeholder="masukan password petugas">
                    </div>
                    <div class="form-group">
                        <label>No. Telpon</label>
                        <input type="text" name="nhpptgs" id="nhpptgs" class="form-control" placeholder="masukan nomor handphone petugas">
                    </div>
                    <div class="form-group">
                        <label>role</label>
                        <select class="custom-select drpdw" name="rlptgs" id="rlptgs">
                            <option selected>Select Category</option>
                            <option value="admin">administrator</option>
                            <option value="petugas">petugas</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="action" class="btn btn-success" value="Add" />
                    <input type="submit" value="Add" name="action" class="btn btn-success" />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end add data modal -->

<!-- edit data modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editpetugas" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Petugas</label>
                        <input type="text" name="nmptgs" id="namapetugas" class="form-control" placeholder="Masukkan Nama petugas">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="usrnm" id="usernamepetugas" class="form-control" placeholder="masukan username petugas">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pwptgs" id="passwordpetugas" class="form-control" placeholder="masukan password petugas">
                    </div>
                    <div class="form-group">
                        <label>No. Telpon</label>
                        <input type="text" name="nhpptgs" id="telppetugas" class="form-control" placeholder="masukan nomor handphone petugas">
                    </div>
                    <div class="form-group">
                        <label>role</label>
                        <select class="custom-select drpdw" name="rlptgs" id="rolepetugas">
                            <option selected>Select Category</option>
                            <option value="admin">administrator</option>
                            <option value="petugas">petugas</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="idptgs" id="idpetugas" class="btn btn-success" value="" />
                    <input type="hidden" name="action" class="btn btn-success" value="edit" />
                    <input type="submit" value="edit" name="action" class="btn btn-success" />
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end edit data modal -->