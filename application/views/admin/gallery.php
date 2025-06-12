<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
        <a data-toggle="modal" data-target="#add" href="#" class="btn btn-sm btn-info shadow-sm">
            <i class="fas fa-plus-circle fa-sm"></i> Data Baru
        </a>
    </div>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Berita</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Nama Berita</th>
                            <th width="25%">Keterangan</th>
                            <th width="15%">Kategori</th>
                            <th width="15%">File Foto</th>
                            <th width="20%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dt_gallery as $d): ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $d->nama_gallery; ?></td>
                                <td><?= substr($d->ket, 0, 50) . (strlen($d->ket) > 50 ? '...' : ''); ?></td>
                                <td>
                                    <span class="badge badge-primary"><?= $d->nama_kategori; ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url(); ?>upload/<?= $d->file; ?>" target="_blank">
                                        <img width="60px" height="40px" src="<?= base_url(); ?>upload/<?= $d->file; ?>" 
                                             style="object-fit: cover; border-radius: 5px;" alt="<?= $d->nama_gallery; ?>">
                                    </a>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-sm btn-info" data-toggle="modal" 
                                           data-target="#modaledit<?= $d->id_gallery ?>" 
                                           data-tooltip="tooltip" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                           href="<?php echo base_url('admin/delete_gallery/'.$d->id_gallery); ?>"
                                           data-tooltip="tooltip" title="Delete">
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

    <!-- Kategori Section -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-info">Data Kategori</h6>
                <a data-toggle="modal" data-target="#addKategori" href="#" class="btn btn-sm btn-info shadow-sm">
                    <i class="fas fa-plus-circle fa-sm"></i> Tambah Kategori
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="70%">Nama Kategori</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1; 
                        foreach($dt_kategori as $k): ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $k->nama_kategori; ?></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-sm btn-info" data-toggle="modal" 
                                           data-target="#editKat<?= $k->id_kategori; ?>" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Anda yakin ingin menghapus data ini?')" 
                                           href="<?= base_url('admin/delete_kategori/'.$k->id_kategori); ?>" title="Hapus">
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
</div>

<!-- Modal Tambah Berita -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('admin/simpan_gallery'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_gallery">Nama Berita <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama_gallery" name="nama_gallery" required>
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="ket" name="ket" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="id_kategori">Kategori <span class="text-danger">*</span></label>
                    <select class="form-control" id="id_kategori" name="id_kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach($dt_kategori as $k): ?>
                            <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="file">File Foto <span class="text-danger">*</span></label>
                    <input type="file" class="form-control-file" id="file" name="file" accept="image/*,application/pdf" required>
                    <small class="form-text text-muted">Format: JPG, PNG, JPEG, PDF. Maksimal 3MB.</small>
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

<!-- Modal Edit Berita -->
<?php foreach ($dt_gallery as $f): ?>
<div class="modal fade" id="modaledit<?= $f->id_gallery; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('admin/update_gallery'); ?>
            <div class="modal-body">
                <input type="hidden" name="id_gallery" value="<?= $f->id_gallery; ?>">
                <input type="hidden" name="old_file" value="<?= $f->file; ?>">
                
                <div class="form-group">
                    <label for="nama_gallery_edit">Nama Berita <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_gallery" value="<?= $f->nama_gallery; ?>" required>
                </div>
                <div class="form-group">
                    <label for="ket_edit">Keterangan <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="ket" rows="3" required><?= $f->ket; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="id_kategori_edit">Kategori <span class="text-danger">*</span></label>
                    <select class="form-control" name="id_kategori" required>
                        <?php foreach($dt_kategori as $k): ?>
                            <option value="<?= $k->id_kategori; ?>" <?= $k->id_kategori == $f->id_kategori ? 'selected' : ''; ?>>
                                <?= $k->nama_kategori; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="file_edit">File Foto</label>
                    <input type="file" class="form-control-file" name="file" accept="image/*,application/pdf">
                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah file. Format: JPG, PNG, JPEG, PDF. Maksimal 3MB.</small>
                    <?php if($f->file): ?>
                        <div class="mt-2">
                            <small class="text-muted">File saat ini: </small>
                            <a href="<?= base_url(); ?>upload/<?= $f->file; ?>" target="_blank">
                                <img src="<?= base_url(); ?>upload/<?= $f->file; ?>" width="50" height="35" style="object-fit: cover; border-radius: 3px;">
                            </a>
                        </div>
                    <?php endif; ?>
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

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('admin/simpan_kategori'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('admin/update_kategori'); ?>
            <div class="modal-body">
                <input type="hidden" name="id_kategori" value="<?= $kat->id_kategori; ?>">
                <div class="form-group">
                    <label for="nama_kategori_edit">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_kategori" value="<?= $kat->nama_kategori; ?>" required>
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