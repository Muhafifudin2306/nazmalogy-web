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
<!--=============== Course Content ===============-->
<div class="space-top">
    <!-- =============== Tabel Tag ================= -->
    <div class="mt-5 mb-1 p-2 d-flex justify-content-between" data-aos="fade-up" data-aos-duration="700">
        <h5 class="text-2">Data Video</h5>
        <a href="<?= site_url('adminRoot/playlist/add_video') ?>"><button class="btn btn-success fs-7 fw-bold">+ Tambah </button></a>

    </div>

    <div class="bg-white p-5 border" data-aos="fade-up" data-aos-duration="700">
        <table id="example" class="table display">
            <thead>
                <tr">
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Judul Video</th>
                    <th class="text-center" scope="col">Durasi</th>
                    <th class="text-center" scope="col">Playlist</th>
                    <th class="text-center" scope="col">Aksi</th>
                    </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($videos as $row) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td><?php echo $row->title; ?></td>
                        <td class="text-center"><?php echo $row->duration; ?></td>
                        <td class="text-center"><?php echo $row->playlist_name; ?></td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <?php echo anchor('adminRoot/playlist/edit_video/' . $row->id, "<button class='btn btn-primary btn-blue-1 fs-7'><i class='bi bi-pen fs-7'></i></button>"); ?>
                                <button onclick="videoDeleteConfirmation(<?php echo $row->id; ?>)" class="btn btn-danger btn-orange-1 text-white fs-7">
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
        <h5 class="text-2">Data Playlist</h5>
        <a href="<?= site_url('adminRoot/playlist/add_playlist') ?>"><button class="btn btn-success fs-7 fw-bold">+ Tambah </button></a>

    </div>

    <div class="bg-white p-5 mb-4 border" data-aos="fade-up" data-aos-duration="700">
        <table id="example2" class="table display">
            <thead>
                <tr">
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Nama Playlist</th>
                    <th class="text-center" scope="col">Aksi</th>
                    </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($playlists as $row) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <?php echo anchor('adminRoot/playlist/edit_playlist/' . $row->id, "<button class='btn btn-primary btn-blue-1 fs-7'><i class='bi bi-pen fs-7'></i></button>"); ?>
                                <button onclick="playlistDeleteConfirmation(<?php echo $row->id; ?>)" class="btn btn-danger btn-orange-1 text-white fs-7">
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