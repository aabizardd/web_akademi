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
    <div class="header pb-4 d-flex align-items-center"
        style="min-height: 200px; background-image: url(<?= base_url(); ?>asset/assets/img/as.jpg); background-size: cover; background-position: center;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-6"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-12 col-md-8">
                    <h1 class="display-2 text-white"><?= $kelas['nama_kelas']; ?></h1>
                    <p class="text-white mt-0 mb--1"><?= $kelas['tingkat_kelas']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--5">
        <div class="row">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="text-white mb-0">Data Kelas</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Material</th>
                                    <th scope="col" class="sort" data-sort="budget">Description</th>
                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                    <th scope="col" class="sort" data-sort="completion">Completion</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php
                                foreach ($kelas['materi'] as $key) { ?>
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm"><?= $key['judul_materi']; ?></span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="budget">
                                        <?= $key['keterangan']; ?>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <i class="bg-success"></i>
                                            <span class="status">buka</span>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="completion mr-2"><?= $key['completion']; ?>%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        aria-valuenow="<?= $key['completion']; ?>" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: <?= $key['completion']; ?>%;">
                                                    </div>
                                                </div>
                                            </div>
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

                <div class="card shadow" style="background-color: white;padding-bottom: 20px;">

                    <div class="card-header bg-transparent border-0">
                        <?php if ($this->session->flashdata('sukses_hapus')) : ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('sukses_hapus'); ?>
                        </div>
                        <?php endif ?>

                        <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                        <?php endif ?>
                        <h3 class="text-black mb-0">Data Soal</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="display" id="myTable" style="color: black;padding: 10px;">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">No</th>
                                    <th scope="col" class="sort" data-sort="budget">Soal</th>
                                    <th scope="col" class="sort" data-sort="status">Pilihan</th>
                                    <th scope="col" class="sort" data-sort="completion">Jawaban</th>
                                    <th scope="col" class="sort" data-sort="completion">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list">

                                <?php $no = 1; ?>
                                <?php foreach ($soal as $soal) : ?>

                                <tr>
                                    <td style="width: 10px;"><?= $no++ ?></td>
                                    <td><?= $soal['pertanyaan'] ?></td>
                                    <td style="width: 600px;">
                                        Pilihan A = <?= $soal['pilihan_a'] ?> <br>
                                        Pilihan B = <?= $soal['pilihan_b'] ?> <br>
                                        Pilihan C = <?= $soal['pilihan_c'] ?> <br>
                                        Pilihan D = <?= $soal['pilihan_d'] ?> <br>
                                    </td>
                                    <td style="width: 10px;"><?= $soal['jawaban'] ?></td>
                                    <td style="width: 200px;">
                                        <button class="btn btn-primary btn-sm edit" type="button" data-toggle="modal"
                                            data-target="#modalQuiz" data-idsoal="<?= $soal['id_soal'] ?>"
                                            data-pertanyaan="<?= $soal['pertanyaan'] ?>"
                                            data-pilihana="<?= $soal['pilihan_a'] ?>"
                                            data-pilihanb="<?= $soal['pilihan_b'] ?>"
                                            data-pilihanc="<?= $soal['pilihan_c'] ?>"
                                            data-pilihand="<?= $soal['pilihan_d'] ?>"
                                            data-jawaban="<?= $soal['jawaban'] ?>"><span class="fas fa-edit"></span>
                                            Edit</button>
                                        <a class="btn btn-danger btn-sm"
                                            href="<?= base_url('admin/quiz/hapus/' . $soal['id_soal']) ?>"><span
                                                class="fas fa-trash"></span>
                                            Hapus</a>


                                    </td>
                                </tr>

                                <?php endforeach ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalQuiz" tabindex="-1" aria-labelledby="modalQuizLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalQuizLabel">Edit Soal Quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('quiz/update_soal') ?>" method="post">

                    <input type="hidden" value="<?= $this->input->get('id') ?>" name="id_kelas" class="id_kelas">
                    <input type="hidden" value="" name="id_soal" id="id_soal">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kelas</label>
                        <select class="custom-select" id="kelas" name="kelas">
                            <?php foreach ($classes as $kelas) : ?>

                            <option value="<?= $kelas['id'] ?>"
                                <?= $this->input->get('id') == $kelas['id'] ? "selected" : "" ?>>
                                <?= $kelas['nama_kelas'] ?></option>

                            <?php endforeach ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Pertanyaan</label>
                        <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jawaban A</label>
                                <input type="text" class="form-control" id="pilihan_a" name="pilihan_a">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jawaban B</label>
                                <input type="text" class="form-control" id="pilihan_b" name="pilihan_b">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jawaban C</label>
                                <input type="text" class="form-control" id="pilihan_c" name="pilihan_c">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jawaban D</label>
                                <input type="text" class="form-control" id="pilihan_d" name="pilihan_d">
                            </div>
                        </div>

                    </div>

                    <?php $answer = ['A', 'B', 'C', 'D'] ?>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kunci Jawaban</label>
                        <select class="custom-select" id="jawaban" name="jawaban">

                            <?php foreach ($answer as $a) : ?>
                            <option value="<?= $a ?>"> <?= $a ?></option>
                            <?php endforeach ?>


                        </select>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>asset/assets/vendor/jquery/dist/jquery.min.js"></script>

<script>
$(document).on("click", ".edit", function() {
    // alert('clicked')
    var id_soal = $(this).data('idsoal');
    $(".modal-body #id_soal").val(id_soal);

    var pertanyaan = $(this).data('pertanyaan');
    $(".modal-body #pertanyaan").val(pertanyaan);

    var pilihana = $(this).data('pilihana');
    $(".modal-body #pilihan_a").val(pilihana);

    var pilihanb = $(this).data('pilihanb');
    $(".modal-body #pilihan_b").val(pilihanb);

    var pilihanc = $(this).data('pilihanc');
    $(".modal-body #pilihan_c").val(pilihanc);

    var pilihand = $(this).data('pilihand');
    $(".modal-body #pilihan_d").val(pilihand);

    var jawaban = $(this).data('jawaban');
    $(".modal-body #jawaban").val(jawaban).change();
    // alert(jawaban)
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});
</script>