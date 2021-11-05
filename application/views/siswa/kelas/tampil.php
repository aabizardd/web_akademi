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
                        <h3 class="h1 text-black-50 d-inline-block mb-0">Learning Materials</h3>
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
                        <h1 class="text-white mb-0"><?= $kelas['nama_kelas']; ?> Class</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Material</th>
                                    <th scope="col" class="sort" data-sort="budget">description</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php
                                foreach ($materi as $key) { ?>
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle mr-3">
                                                <img alt="Image placeholder"
                                                    src="<?= base_url(); ?>asset/assets/img/1.png">
                                            </a>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm"><?= $key['judul_materi']; ?></span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="budget">
                                        <?= $key['keterangan']; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('siswa/kelas/' . $this->uri->segment(3) . '/' . $key['id_materi']); ?>"
                                            class="btn btn-sm btn-twitter">Start</a>
                                    </td>
                                </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                        <h1 class="text-white mb-0"><?= $kelas['nama_kelas']; ?> Quiz</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name"></th>
                                    <th scope="col" class="sort" data-sort="budget"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">

                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle mr-3">
                                                <img alt="Image placeholder"
                                                    src="<?= base_url(); ?>asset/assets/img/1.png">
                                            </a>
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">Quiz <?= $kelas['nama_kelas']; ?></span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="budget">
                                        Quiz
                                    </td>

                                    <td>
                                        <?php if (is_null($quizz)) : ?>
                                        <?php if ($soal['jml'] < 10) : ?>

                                        <button href="" class="btn btn-primary btn-sm " disabled>Quiz belum
                                            siap</button>

                                        <?php else : ?>
                                        <a href="<?= base_url('siswa/kelas/quiz/' . $this->uri->segment(3)); ?>"
                                            class="btn btn-primary btn-sm ">Attempt now</a>

                                        <?php endif ?>
                                        <?php else : ?>
                                        Nilai = <button class="btn btn-success btn-sm"
                                            disabled><?= $quizz['nilai'] ?></button>

                                        <?php if ($quizz['nilai'] < 80) : ?>
                                        <button class="btn btn-danger btn-sm" disabled>Belum lulus</button>
                                        <a href="<?= base_url('siswa/kelas/quiz/' . $this->uri->segment(3)); ?>"
                                            class="btn btn-primary btn-sm ">Attempt now</a>
                                        <?php else : ?>
                                        <a href="<?= base_url('siswa/sertifikat/cetak/' . $this->uri->segment(3)) ?>"
                                            class="btn btn-primary btn-sm">Cetak sertifikat</a>
                                        <?php endif; ?>


                                        <?php endif ?>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>