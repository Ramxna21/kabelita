<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kelola FAQ</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFaqModal">
                            <i class="fas fa-plus"></i> Tambah FAQ
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('update')): ?>
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-info"></i> Info!</h5>
                            <?= $this->session->flashdata('update'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('delete')): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Perhatian!</h5>
                            <?= $this->session->flashdata('delete'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($dt_faq as $faq): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $faq->question; ?></td>
                                    <td><?= $faq->answer; ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editFaqModal<?= $faq->tbl_faq_id; ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <a href="<?= site_url('admin_faq/delete_faq/' . $faq->tbl_faq_id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?');">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                
                                <!-- Edit FAQ Modal -->
                                <div class="modal fade" id="editFaqModal<?= $faq->tbl_faq_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editFaqModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editFaqModalLabel">Edit FAQ</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= site_url('admin_faq/update_faq'); ?>" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="tbl_faq_id" value="<?= $faq->tbl_faq_id; ?>">
                                                    <div class="form-group">
                                                        <label for="question">Pertanyaan</label>
                                                        <input type="text" class="form-control" id="question" name="question" value="<?= $faq->question; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="answer">Jawaban</label>
                                                        <textarea class="form-control" id="answer" name="answer" rows="5" required><?= $faq->answer; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add FAQ Modal -->
<div class="modal fade" id="addFaqModal" tabindex="-1" role="dialog" aria-labelledby="addFaqModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFaqModalLabel">Tambah FAQ Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('admin_faq/simpan_faq'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="question">Pertanyaan</label>
                        <input type="text" class="form-control" id="question" name="question" required>
                    </div>
                    <div class="form-group">
                        <label for="answer">Jawaban</label>
                        <textarea class="form-control" id="answer" name="answer" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>