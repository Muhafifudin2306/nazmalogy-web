<?php
if ($this->session->flashdata('success_add') != '') {
    echo "
      <script>
      Swal.fire({
          toast: true,
          position: 'top-right',
          iconColor: 'white',
          customClass: {
              popup: 'colored-toast',
          },
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          icon: 'success',
          title: 'Tambah Data Sukses',
      })    
      </script>
      ";
} else if ($this->session->flashdata('success_update') != '') {
    echo "
      <script>
      Swal.fire({
          toast: true,
          position: 'top-right',
          iconColor: 'white',
          customClass: {
              popup: 'colored-toast',
          },
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          icon: 'success',
          title: 'Update Data Sukses',
      })    
      </script>
      ";
} else if ($this->session->flashdata('success_delete') != '') {
    echo "
      <script>
      Swal.fire({
          toast: true,
          position: 'top-right',
          iconColor: 'white',
          customClass: {
              popup: 'colored-toast',
          },
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          icon: 'success',
          title: 'Hapus Data Sukses',
      })    
      </script>
      ";
}
?>

<div class="space-top">

    <div class="py-3" data-aos="fade-up" data-aos-duration="700">
        <h5 class="text-2">Progress Siswa</h5>
    </div>
    <div class="bg-white p-5 border" data-aos="fade-up" data-aos-duration="700">

        <table id="example3" class="table display">
            <thead>
                <tr">
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Judul Kursus</th>
                    <th class="text-center" scope="col">Pengajar</th>
                    <th class="text-center" scope="col">Nama Siswa</th>
                    <th class="text-center" scope="col">Progress</th>
                    <th class="text-center" scope="col">Rating User</th>
                    <th class="text-center" scope="col">Feedback User</th>
                    </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($user_has_course as $data) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $data->course_name ?></td>
                        <td><?= $data->instructor_name ?></td>
                        <td><?= $data->user_name ?></td>
                        <?php if ($data->progress == NULL) : ?>
                            <td class="text-center fw-bold text-blue-1 fs-7"> 0% </td>
                        <?php else : ?>
                            <td class="text-center fw-bold text-blue-1 fs-7"><?= round($data->progress) . '%' ?></td>
                        <?php endif ?>
                        <?php if ($data->rating == NULL) : ?>
                            <td class="text-center text-orange-2 fs-7 fw-bold"><i class="bi bi-star-fill"></i> 0 </td>
                        <?php else : ?>
                            <td class="text-center text-orange-2 fs-7 fw-bold"><i class="bi bi-star-fill"></i> <?= round($data->rating) ?></td>
                        <?php endif ?>
                        <?php if ($data->feedback == NULL) : ?>
                            <td class="text-center fs-7" width="25%">Belum ada feedback</td>
                        <?php else : ?>
                            <td width="25%"><?= $data->feedback ?></td>
                        <?php endif ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="pb-3 py-5" data-aos="fade-up" data-aos-duration="700">
        <h5 class="text-2">Data Siswa</h5>
    </div>
    <div class="bg-white p-5 border" data-aos="fade-up" data-aos-duration="700">

        <table id="example4" class="table display">
            <thead>
                <tr">
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Nama User</th>
                    <th class="text-center" scope="col">Pekerjaan</th>
                    <th class="text-center" scope="col">Ringkasan</th>
                    <th class="text-center" scope="col">Alamat</th>
                    </tr>
            </thead>

            <tbody>

                <?php
                $no = 1;
                foreach ($member as $data) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $data->user_name ?></td>
                        <td class="text-center"><?= $data->job ?></td>
                        <td width="25%"><?= $data->summary ?></td>
                        <td width="25%"><?= $data->address ?></td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>
    </div>

    <div class="mt-5 mb-1 p-2 d-flex justify-content-between" data-aos="fade-up" data-aos-duration="700">
        <h5 class="text-2">Data Kursus</h5>
        <a href="<?= site_url('adminRoot/course/add_course') ?>"><button class="btn btn-success fs-7 fw-bold">+ Tambah </button></a>
    </div>

    <div class="bg-white p-5 border" data-aos="fade-up" data-aos-duration="700">
        <table id="example" class="table display">
            <thead>
                <tr">
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Judul Kursus</th>
                    <th class="text-center" scope="col">Cover</th>
                    <th class="text-center" scope="col">Kategori</th>
                    <th class="text-center" scope="col">Aksi</th>
                    </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($course as $data) { ?>
                    <tr>
                        <td width="5%" class="text-center"><?= $no++ ?></td>
                        <td width="30%"><?= $data->title ?></td>
                        <td width="25%"><img class="w-100" src="<?= base_url('assets/images/admin/course/' . $data->cover) ?>"></td>
                        <td width="20%">
                            <div class="d-flex gap-2 flex-wrap">
                                <?php
                                $category = explode(',', $data->category);
                                foreach ($category as $kat) {
                                    echo "
                                    <button class='btn btn-warning fs-8 fw-bold'>" . $kat . "</button>" . '<br>';
                                }
                                ?>
                            </div>
                        </td>
                        <td width="20%">
                            <div class="d-flex gap-2 justify-content-center">
                                <?php echo anchor('adminRoot/course/edit_course/' . $data->id, "<button class='btn btn-primary btn-blue-1 fs-7'><i class='bi bi-pen fs-7'></i></button>"); ?>
                                <?php echo anchor('adminRoot/course/detail_course/' . $data->id, "<button class='btn btn-primary btn-orange-2 fs-7'><i class='bi bi-eye-fill fs-7'></i></button>"); ?>
                                <button onclick="courseDeleteConfirmation(<?php echo $data->id; ?>)" class="btn btn-danger btn-orange-1 text-white fs-7">
                                    <span class='text-white'><i class='bi bi-trash3-fill fs-7'></i></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- =============== Tabel Kategori ================= -->
    <div class="mt-5 mb-1 p-2 d-flex justify-content-between" data-aos="fade-up" data-aos-duration="700">
        <h5 class="text-2">Data Kategori</h5>
        <a href="<?= site_url('adminRoot/course/add_category') ?>"><button class="btn btn-success fs-7 fw-bold">+ Tambah </button></a>

    </div>

    <div class="bg-white mb-4 p-5 border" data-aos="fade-up" data-aos-duration="700">
        <table id="example2" class="table display">
            <thead>
                <tr">
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Nama Kategori</th>
                    <th class="text-center" scope="col">Aksi</th>
                    </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($categories as $row) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <?php echo anchor('adminRoot/course/edit_category/' . $row->id, "<button class='btn btn-primary btn-blue-1 fs-7'><i class='bi bi-pen fs-7'></i></button>"); ?>
                                <button onclick="categoryDeleteConfirmation(<?php echo $row->id; ?>)" class="btn btn-danger btn-orange-1 text-white fs-7">
                                    <span class='text-white'><i class='bi bi-trash3-fill fs-7'></i></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>