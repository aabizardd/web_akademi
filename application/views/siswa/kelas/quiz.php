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
    <div class="header bg-white pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h3 class="h1 text-black-50 d-inline-block mb-0">Quiz <?= ucfirst($kelas['nama_kelas']); ?></h3>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid  mt--6">


        <div class="row">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                        <h1 class="text-white mb-0"><?= $kelas['nama_kelas']; ?> Quiz</h1>
                    </div>

                    <form action="<?= base_url('kelas/jawab_quiz') ?>" method="post">

                        <input type="hidden" name="id_kelas" value="<?= $this->uri->segment(4) ?>">
                        <?php $no = 0 ?>
                        <?php foreach ($soal as $s) : ?>
                        <div class="p-4 text-white">
                            <?php $no += 1 ?>
                            <p style="font-weight: bold;"><?= $no ?>. <font><?= $s['pertanyaan'] ?></font>
                            </p>

                            <p>A. <?= $s['pilihan_a'] ?></p>
                            <p>B. <?= $s['pilihan_b'] ?></p>
                            <p>C. <?= $s['pilihan_c'] ?></p>
                            <p>D. <?= $s['pilihan_d'] ?></p>

                            <hr style="border: 4px solid green;border-radius: 5px;">

                            <div class="form-group">
                                <label class="" for="inlineFormCustomSelect">Jawaban</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect"
                                    name="jawaban_<?= $no ?>">
                                    <option selected>Pilih...</option>
                                    <?php foreach ($pilgan as $pg) : ?>
                                    <option value="<?= $pg ?>"><?= $pg ?></option>
                                    <?php endforeach ?>

                                </select>
                            </div>

                            <input type="hidden" name="soal_<?= $no ?>" value="<?= $s['id_soal'] ?>">
                        </div>
                        <?php endforeach ?>
                        <input type="hidden" name="jumlah_soal" value="<?= $no ?>">

                        <div class="p-4 text-white">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">Submit jawaban</button>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Apakah yakin untuk submit
                                            jawaban?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-primary">Yakin</button>
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