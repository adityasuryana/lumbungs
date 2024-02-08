<?php echo view('_partials/header'); ?>
        
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid mx-3 my-4">
                <div class="row d-contents ">
                    <div class="col-4">
                        <p class="fw-medium mb-0"><span class="fw-light">Selamat Datang</p>
                        <p class="mb-0"></p>
                    </div>
                    
                    <div class="col-4 text-center">
                        <a class="navbar-brand head-title mx-auto my-4">Lumbungs</a>
                    </div>
                    
                    <div class="col-4 text-end">
                        <a class="text-dark" href="<?= base_url('logout') ?>">Keluar</a>
                    </div>
                </div>
            </div>
        </nav>  

        <div class="container-fluid">
            <div class="row mx-2 mb-3">
                <div class="mb-3">
                    <h3 class="head-title mb-2">Penjualan</h3>
                    <button type="button" class="tb-button py-2 px-4 my-2" data-bs-toggle="modal" data-bs-target="#addPenjualan">
                        <span><i class="fa-solid fa-plus me-2"></i></span>Penjualan Baru
                    </button>
                </div>
                
                <div class="col">
                    <div class="card bg-gray p-3 h-100">
                        <table id="table" class="w-100">
                            <thead>
                                <tr>
                                    <th>Nama Hasil Panen</th>
                                    <th>Jumlah</th>
                                    <th>Harga Jual</th>
                                    <th>Total Jual</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($penjualan as $key => $row) {  ?>
                                        <tr class="mt-1 mb-1">
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo $row['jumlah']; ?> Ton</td>
                                            <td>Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?>/Ton</td>
                                            <td>Rp<?php echo number_format($row['total'], 0, ',', '.'); ?></td>
                                            <td class="d-flex text-center">
                                                <a class="btn btn-edit me-2" data-bs-toggle="modal" data-bs-target="#editPenjualan<?php echo $row['id']; ?>"><i class="fa-solid fa-edit"></i></a>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPenjualan<?php echo $row['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                            
                                <div class="modal fade" id="editPenjualan<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="border: none; border-radius: 20px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Penjualan</h5>
                                            </div>
                                                                        
                                            <div class="modal-body">
                                                <form id="menuForm" method="POST" action="<?php echo base_url('penjualan/edit/' . $row['id']); ?>">
                                                    <div class="">
                                                        <input type="text" name="id" hidden>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama Hasil Panen</label>
                                                        <select class="form-control" name="nama">
                                                            <option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
                                                            <?php foreach ($panen as $p) { ?>
                                                                <option value="<?php echo $p['nama']; ?>"><?php echo $p['nama']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="jumlah" class="form-label">Jumlah</label>
                                                        <div class="d-flex">
                                                            <input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>" id="jumlah" required>
                                                            <span class="ms-2 align-self-center">Ton</span>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="harga" class="form-label">Harga</label>
                                                        <div class="d-flex">
                                                            <span class="me-2 align-self-center">Rp</span>
                                                            <input type="number" name="harga" class="form-control" value="<?php echo $row['harga']; ?>" id="harga" required>
                                                            <span class="ms-2 align-self-center">Ton</span>
                                                        </div>
                                                    </div>
                                                                                
                                                    <button type="submit" id="submit" class="tb-button w-25 float-end">Save</button>  
                                                    <button type="button" class="btn cancel-button w-25 me-3 float-end" data-bs-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="hapusPenjualan<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" enctype="multipart/form-data">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="border: none; border-radius: 20px;">
                                            <div class="modal-header justify-content-center">
                                                <h5 class="d-block modal-title">Hapus Penjualan</h5>
                                            </div>
                                                                        
                                            <div class="modal-body">
                                                <form id="menuForm" method="POST" action="<?php echo base_url('penjualan/delete/' . $row['id']); ?>">
                                                    <div class="">
                                                        <input type="text" name="id" hidden>
                                                    </div>
                                                                                
                                                    <div class="text-center mb-3">
                                                        <h4>Hapus <span class="fw-bold"></span> ?</h4>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="button" class="btn cancel-button w-25 me-3" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" id="submit" class="delete-button w-25">Hapus</button>
                                                    </div>                      
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        

        
        <div class="modal fade" id="addPenjualan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border: none; border-radius: 20px;">
                    <div class="modal-header">
                        <h5 class="modal-title">Penjualan Baru</h5>
                    </div>
                                                
                    <div class="modal-body">
                        <form id="menuForm" method="POST" action="<?php echo base_url('penjualan/simpan'); ?>">
                            <div class="">
                                <input type="text" name="id" hidden>
                            </div>
                                                        
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Hasil Panen</label>
                                <select class="form-control" name="nama">
                                    <option value="">Pilih Hasil Panen</option>
                                    <?php foreach ($panen as $p) { ?>
                                        <option value="<?php echo $p['nama']; ?>"><?php echo $p['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                                                        
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <div class="d-flex">
                                    <input type="text" name="jumlah" class="form-control" value="" id="jumlah" required>
                                    <span class="ms-2 align-self-center">Ton</span>
                                </div>
                                
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <div class="d-flex">
                                    <span class="me-2 align-self-center">Rp</span>
                                    <input type="number" name="harga" class="form-control" value="" id="harga" required>
                                    <span class="ms-2 align-self-center">Ton</span>
                                </div>
                                
                            </div>
                                                        
                            <button type="submit" id="submit" class="tb-button w-25 float-end">Simpan</button>  
                            <button type="button" class="btn cancel-button w-25 me-3 float-end" data-bs-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        

        <nav class="navbar bg-white navbar-expand-lg fixed-bottom">
            <div class="container-fluid justify-content-center my-2">
                <ul class="navbar-nav navbar-bottom d-contents">
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0 " href="<?php echo base_url('/'); ?>"><i class="fa-solid fa-house mb-2"></i>Dashboard</a>
                    </li>
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0 " href="<?php echo base_url('panen'); ?>"><i class="fa-solid fa-boxes-stacked mb-2"></i>Panen</a>
                    </li>
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0" href="<?php echo base_url('kategori'); ?>"><i class="fa-solid fa-book mb-2"></i>Kategori</a>
                    </li>
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0 active" href="<?php echo base_url('penjualan'); ?>"><i class="fa-solid fa-rectangle-list mb-2"></i>Penjualan</a>
                    </li>
                  </ul>
            </div>
        </nav>
        
        <script>
            document.getElementById('jumlah').addEventListener('input', calculateTotal);
            document.getElementById('harga').addEventListener('input', calculateTotal);

            function hitungTotal() {
                var jumlah = parseInt(document.getElementById('jumlah').value);
                var harga = parseInt(document.getElementById('harga').value);
                document.getElementById('total').value = jumlah * harga;
            }
        </script>
        <script type="text/javascript" src="<?php echo base_url('js/jquery.js'); ?>"></script>
        <script type="text/javascript">
			$(document).ready( function () {
			$('#table').DataTable({
				pageLength: 5,
				lengthMenu: [[5, 10, 20, -1], [5, 10, 15, 'All']],
				paging: true,
                scrollX: true,
				searching: true,
				ordering: true,
				stateSave: true,
				language: {
					search: '',
					searchPlaceholder: "Search",
					"lengthMenu": "Show _MENU_" },
			});
		} );
	    </script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap.js'); ?>"></script>
        <script src="https://kit.fontawesome.com/dc9826e1b1.js" crossorigin="anonymous"></script>

