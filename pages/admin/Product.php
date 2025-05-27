   <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include "./koneksi/db.php";

    $success = $_SESSION['success'] ?? '';
    $error = $_SESSION['error'] ?? '';
    unset($_SESSION['success'], $_SESSION['error']);

    // DELETE handler (biasanya via GET, bisa juga POST, disini pakai GET)
    if (isset($_GET['delete_id'])) {
        $delete_id = intval($_GET['delete_id']);
        // Hapus gambar lama jika ada
        $res = $conn->query("SELECT gambar FROM rooms WHERE id = $delete_id");
        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            if ($row['gambar'] && file_exists("uploads/" . $row['gambar'])) {
                unlink("uploads/" . $row['gambar']); // hapus file gambar
            }
        }
        // Hapus data dari DB menggunakan prepared statement (lebih aman)
        $stmtDel = $conn->prepare("DELETE FROM rooms WHERE id = ?");
        $stmtDel->bind_param("i", $delete_id);
        if ($stmtDel->execute()) {
            $_SESSION['success'] = "Data kosan berhasil dihapus!";
        } else {
            $_SESSION['error'] = "Gagal menghapus data: " . $stmtDel->error;
        }
        $stmtDel->close();

        header("Location: " . strtok($_SERVER["REQUEST_URI"], '?')); // redirect tanpa param
        exit();
    }

    // POST handler (insert/update)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'] ?? null;
        $name = trim($_POST['name'] ?? '');
        $price = $_POST['price'] ?? '';
        $available_room = $_POST['available_room'] ?? '';
        $tenant_room = $_POST['tenant_room'] ?? '';
        $fasilitas = trim($_POST['fasilitas'] ?? '');
        $deskripsi = trim($_POST['deskripsi'] ?? '');

        $gambar = $_FILES['gambar']['name'] ?? '';
        $tmp_name = $_FILES['gambar']['tmp_name'] ?? '';

        // Validasi
        if (empty($name) || empty($price) || empty($available_room) || empty($tenant_room) || empty($fasilitas)) {
            $_SESSION['error'] = "Harap isi semua kolom yang diperlukan.";
        } elseif (!is_numeric($price) || $price <= 0) {
            $_SESSION['error'] = "Harga harus berupa angka lebih dari 0.";
        } elseif (!is_numeric($available_room) || !is_numeric($tenant_room)) {
            $_SESSION['error'] = "Jumlah kamar harus berupa angka.";
        } else {
            $path_gambar = null;

            // Jika ada file gambar diunggah
            if (!empty($gambar)) {
                $path_gambar = basename($gambar);
                $target_path = "uploads/" . $path_gambar;
                if (!move_uploaded_file($tmp_name, $target_path)) {
                    $_SESSION['error'] = "Gagal mengupload gambar.";
                    header("Location: " . $_SERVER['REQUEST_URI']);
                    exit();
                }
            }

            if (!isset($_SESSION['error'])) {
                if ($id) {
                    // UPDATE
                    if ($path_gambar) {
                        $stmt = $conn->prepare("UPDATE rooms SET name=?, price=?, available_room=?, tenant_room=?, fasilitas=?, deskripsi=?, gambar=? WHERE id=?");
                        $stmt->bind_param("siiisssi", $name, $price, $available_room, $tenant_room, $fasilitas, $deskripsi, $path_gambar, $id);
                    } else {
                        $stmt = $conn->prepare("UPDATE rooms SET name=?, price=?, available_room=?, tenant_room=?, fasilitas=?, deskripsi=? WHERE id=?");
                        $stmt->bind_param("siiissi", $name, $price, $available_room, $tenant_room, $fasilitas, $deskripsi, $id);
                    }

                    if ($stmt->execute()) {
                        $_SESSION['success'] = "Data kosan berhasil diperbarui!";
                    } else {
                        $_SESSION['error'] = "Gagal update data: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    // INSERT
                    if ($path_gambar) {
                        $stmt = $conn->prepare("INSERT INTO rooms (name, price, available_room, tenant_room, fasilitas, deskripsi, gambar) VALUES (?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("siiisss", $name, $price, $available_room, $tenant_room, $fasilitas, $deskripsi, $path_gambar);

                        if ($stmt->execute()) {
                            $_SESSION['success'] = "Data kosan berhasil ditambahkan!";
                        } else {
                            $_SESSION['error'] = "Gagal menyimpan data: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        $_SESSION['error'] = "Gambar diperlukan untuk data baru.";
                    }
                }
            }
        }

        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }

    // Ambil data rooms untuk ditampilkan
    $result = $conn->query("SELECT * FROM rooms");

    ?>



   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <title>Admin Dashboard - Kos Pelita Harapan</title>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
       <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet">
       <script src="https://cdn.tailwindcss.com"></script>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   </head>

   <body class="bg-gray-100">

       <?php include "./Components/admin/sidebar.php"; ?>
       <div class="flex-1 p-10 ml-[16rem]">
           <h1 class="text-2xl font-bold text-gray-800 mb-6">Product Information</h1>

           <!-- Notifikasi -->
           <?php if ($error): ?>
               <div class="mb-4 p-4 bg-red-100 text-red-700 rounded"><?= $error ?></div>
           <?php elseif ($success): ?>
               <div class="mb-4 p-4 bg-green-100 text-green-700 rounded"><?= $success ?></div>
           <?php endif; ?>

           <?php
            $result = $conn->query("SELECT * FROM rooms");
            ?>

           <div class="grid grid-cols-1 gap-6">
               <?php while ($row = $result->fetch_assoc()): ?>
                   <div class="flex justify-between bg-white rounded-xl shadow-md p-6 gap-x-12 relative">
                       <!-- Gambar -->
                       <div>
                           <img src="../uploads/<?php echo $row['gambar']; ?>" alt="gambar" class="rounded-xl" width="200">
                       </div>

                       <!-- Data kosan -->
                       <div class="flex-1">
                           <h2 class="text-lg font-bold"><?= htmlspecialchars($row['name']) ?></h2>
                           <br><br>
                           <p class="text-gray-700 mb-1">Harga: Rp<?= number_format($row['price'], 0, ',', '.') ?></p>
                           <p class="text-gray-700 mb-1">Kamar Kosong: <?= $row['available_room'] ?></p>
                           <p class="text-gray-700 mb-1">Kamar Terisi: <?= $row['tenant_room'] ?></p>
                       </div>

                       <!-- Tombol Edit & Hapus -->
                       <div class="flex items-center gap-2 absolute top-4 right-4">
                           <!-- Tombol Edit -->
                           <a href="#"
                               onclick='openEditModal(<?= json_encode($row) ?>)'
                               class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600"
                               title="Edit">
                               ✏️
                           </a>

                           <!-- Tombol Hapus -->
                           <a href="?delete_id=<?= htmlspecialchars($row['id']) ?>"
                               onclick="return confirm('Yakin ingin menghapus?')"
                               class="bg-red-500 text-white p-2 rounded-full hover:bg-red-600"
                               title="Hapus">
                               🗑️
                           </a>


                       </div>
                   </div>
               <?php endwhile; ?>
           </div>


           <!-- Div pemberitahuan, selalu di bawah -->
           <div class="flex items-center justify-center mt-10">


               <div class="flex flex-col gap-4 items-center text-center">
                   <a href="#" onclick="document.getElementById('modalKamar').classList.remove('hidden')" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                       Tambah Kamar
                   </a>
               </div>


           </div>
       </div>


       <!-- Modal input data -->
       <div id="modalKamar" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
           <div class=" w-full max-w-sm p-6 bg-white border rounded-lg shadow-md relative">
               <button onclick="document.getElementById('modalKamar').classList.add('hidden')" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
               <form class="space-y-4" action="product" method="POST" enctype="multipart/form-data">
                   <h5 class="text-xl font-medium text-gray-900">Input Data Kamar</h5>
                   <div class="grid grid-cols-2 gap-3">
                       <div>
                           <label for="name" class="block text-sm font-medium">Nama Kamar</label>
                           <input type="text" name="name" required class="input-field" placeholder="Kamar A1" />
                       </div>

                       <div>
                           <label for="price" class="block text-sm font-medium">Harga</label>
                           <input type="number" name="price" required class="input-field" placeholder="1200000" />
                       </div>

                       <div>
                           <label for="available_room" class="block text-sm font-medium">Kamar Kosong</label>
                           <input type="number" name="available_room" required class="input-field" placeholder="3" />
                       </div>
                   </div>

                   <div>
                       <label for="tenant_room" class="block text-sm font-medium">Kamar Terisi</label>
                       <input type="number" name="tenant_room" required class="input-field" placeholder="2" />
                   </div>

                   <div>
                       <label for="fasilitas" class="block text-sm font-medium">Fasilitas</label>
                       <input type="text" name="fasilitas" required class="input-field" placeholder="WiFi, AC, Lemari" />
                   </div>

                   <div>
                       <label for="deskripsi" class="block text-sm font-medium">Deskripsi</label>
                       <textarea name="deskripsi" required class="input-field" placeholder="Tulis deskripsi kamar..."></textarea>
                   </div>

                   <div>
                       <label for="gambar" class="block text-sm font-medium">Upload Gambar</label>
                       <input type="file" name="gambar" required class="block w-full text-sm text-gray-500" />
                   </div>

                   <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded">
                       Simpan
                   </button>
               </form>
           </div>
       </div>


       <!-- Modal Edit -->
       <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
           <div class="bg-white p-6 rounded-xl w-full max-w-lg relative">
               <button onclick="closeEditModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>
               <h2 class="text-xl font-bold mb-4">Edit Kosan</h2>
               <form method="POST" enctype="multipart/form-data">
                   <input type="hidden" name="id" id="edit-id">
                   <div class="grid grid-cols-2 gap-3">
                       <div class="mb-2">
                           <label class="block">Nama:</label>
                           <input type="text" name="name" id="edit-name" class="w-full border px-3 py-2 rounded">
                       </div>
                       <div class="mb-2">
                           <label class="block">Harga:</label>
                           <input type="number" name="price" id="edit-price" class="w-full border px-3 py-2 rounded">
                       </div>
                       <div class="mb-2">
                           <label class="block">Kamar Kosong:</label>
                           <input type="number" name="available_room" id="edit-available" class="w-full border px-3 py-2 rounded">
                       </div>
                   </div>
                   <div class="mb-2">
                       <label class="block">Kamar Terisi:</label>
                       <input type="number" name="tenant_room" id="edit-tenant" class="w-full border px-3 py-2 rounded">
                   </div>
                   <div class="mb-2">
                       <label class="block">Fasilitas:</label>
                       <input type="text" name="fasilitas" id="edit-fasilitas" class="w-full border px-3 py-2 rounded">
                   </div>
                   <div class="mb-2">
                       <label class="block">Deskripsi:</label>
                       <textarea name="deskripsi" id="edit-deskripsi" class="w-full border px-3 py-2 rounded"></textarea>
                   </div>
                   <div class="mb-4">
                       <label class="block">Gambar Baru (jika ingin ganti):</label>
                       <input type="file" name="gambar" class="w-full">
                   </div>
                   <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                       Simpan Perubahan
                   </button>
               </form>
           </div>
       </div>



       <style>
           .input-field {
               background-color: #f3f4f6;
               border: 1px solid #d1d5db;
               color: #111827;
               padding: 0.5rem;
               border-radius: 0.375rem;
               width: 100%;
           }
       </style>

       <script>
           function openEditModal(data) {
               document.getElementById('edit-id').value = data.id;
               document.getElementById('edit-name').value = data.name;
               document.getElementById('edit-price').value = data.price;
               document.getElementById('edit-available').value = data.available_room;
               document.getElementById('edit-tenant').value = data.tenant_room;
               document.getElementById('edit-fasilitas').value = data.fasilitas;
               document.getElementById('edit-deskripsi').value = data.deskripsi;

               document.getElementById('editModal').classList.remove('hidden');
           }

           function closeEditModal() {
               document.getElementById('editModal').classList.add('hidden');
           }
       </script>


   </body>

   </html>