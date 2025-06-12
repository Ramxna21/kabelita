<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
        <a data-toggle="modal" data-target="#addKategori" href="#" class="btn btn-sm btn-info shadow-sm">
            <i class="fas fa-plus-circle fa-sm"></i> Tambah Kategori
        </a>
    </div>

    <!-- Flash Messages -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> Kategori berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success_update')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> <?= $this->session->flashdata('success_update'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('delete')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> <?= $this->session->flashdata('delete'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Kategori Berita</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">Nama Kategori</th>
                            <th width="40%">Deskripsi</th>
                            <th width="15%">Jumlah Berita</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1; 
                        foreach($dt_kategori as $k): 
                            // Hitung jumlah berita per kategori
                            $this->db->where('id_kategori', $k->id_kategori);
                            $jumlah_berita = $this->db->count_all_results('gallery');
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td>
                                    <strong><?= $k->nama_kategori; ?></strong>
                                </td>
                                <td>
                                    <?= isset($k->deskripsi) && !empty($k->deskripsi) ? $k->deskripsi : '<em class="text-muted">Tidak ada deskripsi</em>'; ?>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-primary badge-pill"><?= $jumlah_berita; ?> berita</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-sm btn-info" data-toggle="modal" 
                                           data-target="#editKat<?= $k->id_kategori; ?>" 
                                           data-tooltip="tooltip" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Anda yakin ingin menghapus kategori ini? <?= $jumlah_berita > 0 ? 'Kategori ini masih memiliki '.$jumlah_berita.' berita.' : '' ?>')" 
                                           href="<?= base_url('admin/delete_kategori_page/'.$k->id_kategori); ?>"
                                           data-tooltip="tooltip" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Statistik Card -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($dt_kategori); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Berita</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $total_berita = $this->db->count_all('gallery');
                                echo $total_berita; 
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('admin/simpan_kategori_page'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi singkat tentang kategori ini (opsional)"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Kategori -->
<?php foreach($dt_kategori as $kat): ?>
<div class="modal fade" id="editKat<?= $kat->id_kategori; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('admin/update_kategori_page'); ?>
            <div class="modal-body">
                <input type="hidden" name="id_kategori" value="<?= $kat->id_kategori; ?>">
                <div class="form-group">
                    <label for="nama_kategori_edit">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_kategori" value="<?= $kat->nama_kategori; ?>" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi_edit">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi singkat tentang kategori ini (opsional)"><?= isset($kat->deskripsi) ? $kat->deskripsi : ''; ?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-info">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
        }
    });
    
    // Initialize tooltips
    $('[data-tooltip="tooltip"]').tooltip();
});
</script>