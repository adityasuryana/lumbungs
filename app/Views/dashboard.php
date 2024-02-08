<!-- 
    Aditya Suryana
    IF8 - 10121297
    2024
 -->
<?php 
$session = \Config\Services::session();

if (!$session->has('user')) {
    return redirect()->to(base_url('login'));
}

echo view('_partials/header'); ?>

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
                <h3 class="head-title mb-3">Dashboard</h3>
                <div class="col-3">
                    <div class="card p-3 h-100">
                        <div class="text-center">
                            <h3 class="fs-35 fw-bold"><?php echo $totalPanen['totalPanen'] ?></h3>
                            <p class="fw-light fs-15 mb-0">Ton Panen</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-3 h-100">
                        <div class="text-center">
                            <h3 class="fs-35 fw-bold"><?php echo $totalKategori['totalKategori'] ?></h3>
                            <p class="fw-light fs-15 mb-0">Kategori</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-3 h-100">
                        <div class="text-center">
                            <h3 class="fs-35 fw-bold"><?php echo $totalTerjual['totalTerjual'] ?></h3>
                            <p class="fw-light fs-15 mb-0">Ton Terjual</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-3 h-100">
                        <div class="text-center">
                            <h3 class="fs-auto fw-bold">Rp<?php echo number_format($revenue['revenue'], 0, ',', '.'); ?></h3>
                            <p class="fw-light fs-15 mb-0">Revenue</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-2">
                <div class="col">
                    <div class="card p-3 h-100">
                        <h4 class="sub-title mb-3">Panen</h4>
                        <table id="table" class="w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Hasil Panen</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Hasil Panen</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($panen as $key => $row) {  ?>
                                    <tr class="mt-1 mb-1">
                                        <td><?php echo $key + 1 ?></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['kategori']; ?></td>
                                        <td><?php echo $row['jumlah']; ?> Ton</td>
                                        <td><?php echo $row['deskripsi']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg fixed-bottom">
            <div class="container-fluid justify-content-center mb-3">
                <ul class="navbar-nav navbar-bottom d-contents">
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0 active" href="<?php echo base_url('/'); ?>"><i class="fa-solid fa-house mb-2"></i>Dashboard</a>
                    </li>
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0" href="<?php echo base_url('panen'); ?>"><i class="fa-solid fa-boxes-stacked mb-2"></i>Panen</a>
                    </li>
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0" href="<?php echo base_url('kategori'); ?>"><i class="fa-solid fa-book mb-2"></i>Kategori</a>
                    </li>
                    <li class="nav-item text-center mx-4">
                        <a class="nav-link d-grid py-0" href="<?php echo base_url('penjualan'); ?>"><i class="fa-solid fa-rectangle-list mb-2"></i>Penjualan</a>
                    </li>
                  </ul>
            </div>
        </nav>

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



