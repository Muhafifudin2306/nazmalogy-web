<?php
if ($this->session->flashdata('success_update') != '') {
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

<!--=============== Course Content ===============-->
<div class="space-top">
    <div class="row">
        <div class="col-md-7">
            <div class="d-flex justify-content-between" data-aos="fade-up" data-aos-duration="700">
                <h5 class="text-2">Testimoni Pengguna</h5>
                <a href="<?= site_url('adminRoot/setting/add_testimony') ?>"><button class="btn btn-success btn-blue-1 fw-bold fs-8">+ Tambah </button></a>

            </div>

            <div class="py-3">
                <div class="bg-white p-5 border mb-5" data-aos="fade-up" data-aos-duration="700">
                    <table id="example-testimony" class="table display">
                        <thead>
                            <tr>
                                <th class="text-center fs-7" scope="col">No</th>
                                <th class="text-center fs-7" scope="col">Nama Lengkap</th>
                                <th class="text-center fs-7" scope="col">Rating</th>
                                <th class="text-center fs-7" scope="col">Status</th>
                                <th class="text-center fs-7" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($testimonies as $row) {
                            ?>
                                <tr>
                                    <td class="text-center fs-7"><?php echo $no++ ?></td>
                                    <td class="text-center fs-7"><?php echo $row->author; ?></td>
                                    <td class="text-center fs-7"><?php echo round($row->rating); ?></td>
                                    <td>
                                        <div class="text-center">
                                            <?php if ($row->status == 1) : ?>
                                                <span class="text-success fw-bold fs-8"> <i class="bi bi-check-all"></i> active</span>
                                            <?php else : ?>
                                                <span class="text-danger fw-bold fs-8"> <i class="bi bi-x"></i> non-active</span>
                                            <?php endif ?>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <?php echo anchor('adminRoot/setting/edit_testimony/' . $row->id, "<button class='btn btn-primary btn-blue-1 fs-7'><i class='bi bi-pen fs-7'></i></button>"); ?>
                                            <button onclick="testimonyDeleteConfirmation(<?php echo $row->id; ?>)" class="btn btn-danger btn-orange-1 text-white fs-7">
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
        </div>
        <div class="col-md-5">
            <div class="d-flex justify-content-lg-start" data-aos="fade-up" data-aos-duration="700">
                <h5 class="text-2">User Subscribe</h5>
            </div>
            <div class="py-3">
                <div class="bg-white p-5 border mb-5" data-aos="fade-up" data-aos-duration="700">
                    <table id="example-subscribe" class="table display">
                        <thead>
                            <tr">
                                <th class="text-center fs-7" scope="col">No</th>
                                <th class="text-center fs-7" scope="col">Email</th>
                                <th class="text-center fs-7" scope="col">Aksi</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($subscribes as $row) {
                            ?>
                                <tr>
                                    <td class="text-center fs-7"><?php echo $no++ ?></td>
                                    <td class="fs-7"><?php echo $row->email; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-primary btn-blue-1 copy-email fs-7" data-email="<?= $row->email; ?>"><i class="bi bi-clipboard-fill fs-7"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-lg-start">
        <h5 class="text-2">Pengaturan Akun</h5>
    </div>

    <div class="mb-5 py-3">
        <div class="bg-white p-5 border mb-5">
            <table id="example-user" class="table display">
                <thead>
                    <tr">
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Nama Lengkap</th>
                        <th class="text-center" scope="col">Email</th>
                        <th class="text-center" scope="col">Role</th>
                        <th class="text-center" scope="col">Aksi</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($users as $row) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->roles_name; ?></td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <?php echo anchor('adminRoot/user/edit_user/' . $row->id, "<button class='btn btn-primary btn-blue-1'><i class='bi bi-pen fs-7'></i></button>"); ?>
                                    <button onclick="userDeleteConfirmation(<?php echo $row->id; ?>)" class="btn btn-danger btn-orange-1 text-white fs-7">
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
</div>