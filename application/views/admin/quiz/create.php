<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-md-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-9 d-flex align-items-center"
        style="min-height: 370px; background-image: url(<?= base_url(); ?>asset/assets/img/dd.jpg); background-size: cover; background-position: center;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-5"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Hello Admin</h1>
                    <p class="text-white mt-0 mb-5">Anda Bisa Menambahkan Quiz di sIni.
                        Jangan Lupa Untuk Menyimpan</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--9">
        <div class="row ml-6">
            <div class="col-xl-11 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h2 class="mb--5">Tambah Quiz</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($this->session->sukses) { ?>
                        <div class="alert alert-success">
                            <?= $this->session->sukses; ?>
                        </div>
                        <?php }

                        if ($this->session->error) { ?>
                        <div class="alert alert-danger">
                            <?= $this->session->error; ?>
                        </div>
                        <?php }
                        ?>
                        <form method="post" action="<?= base_url(); ?>admin/quiz" enctype="multipart/form-data">
                            <h6 class="heading-small text-muted mb-4">Detail</h6>
                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Kelas</label>
                                            <select class="form-control" name="kelas" required>
                                                <?php
                                                foreach ($kelas as $key) { ?>
                                                <option value="<?= $key['id']; ?>"><?= $key['nama_kelas']; ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Pertanyaan</label>
                                            <textarea rows="4" class="form-control"
                                                placeholder="Tulis isi materi di sini" name="pertanyaan"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-1">Jawaban</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Pilihan A</label>
                                            <input type="text" class="form-control" placeholder="" name="pilihan_a"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Pilihan B</label>
                                            <input type="text" class="form-control" placeholder="" name="pilihan_b"
                                                required>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Pilihan C</label>
                                            <input type="text" class="form-control" placeholder="" name="pilihan_c"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Pilihan D</label>
                                            <input type="text" class="form-control" placeholder="" name="pilihan_d"
                                                required>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <?php $pilgan = ['A', 'B', 'C', 'D'] ?>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Jawaban Benar</label>
                                            <select class="form-control" name="jawaban" required>
                                                <?php
                                                foreach ($pilgan as $key) { ?>
                                                <option value="<?= $key; ?>"><?= $key; ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="mt-3 col-11 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#tambahMateri">Simpan</button>
                            </div>
                            <div class="modal fade" id="tambahMateri" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Tambah</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin akan menambah data?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>