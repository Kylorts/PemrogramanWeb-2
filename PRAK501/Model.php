<?php require 'Koneksi.php';
//bagian fungsi untuk member
    function addMember($data){
        $conn = getConnection();
        $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar)
                VALUES (:nama, :nomor, :alamat, :tglDaftar, :tglAkhir)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':nama' => $data['nama'],
            ':nomor' => $data['nomor'],
            ':alamat' => $data['alamat'],
            ':tglDaftar' => $data['tglDaftar'], 
            ':tglAkhir' => $data['tglAkhir']
        ]);
    }

    function updateMember($data) {
        $conn = getConnection();
        $sql = "UPDATE member SET 
                    nama_member = :nama, 
                    nomor_member = :nomor, 
                    alamat = :alamat, 
                    tgl_terakhir_bayar = :tglAkhir 
                WHERE id_member = :id_member";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':nama' => $data['nama'],
            ':nomor' => $data['nomor'],
            ':alamat' => $data['alamat'],
            ':tglAkhir' => $data['tglAkhir'],
            ':id_member' => $data['id_member']
        ]);
    }

    function deleteMember($id){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM peminjaman WHERE id_member = :id");
        $stmt->execute([':id' => $id]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            $conn->prepare("DELETE FROM peminjaman WHERE id_member = :id")->execute([':id' => $id]);
        }

        $conn->prepare("DELETE FROM member WHERE id_member = :id")->execute([':id' => $id]);
    }

    function getAllMember(){
        $conn = getConnection();
        $sql = "SELECT * FROM member";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getMemberById($id) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM member WHERE id_member = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getNextAutoIncrementId() {
        $conn = getConnection();
        $sql = "SELECT MAX(id_member) AS max_id FROM member";
        $stmt = $conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nextId = ($row['max_id'] !== null) ? $row['max_id'] + 1 : 1;
        $conn->exec("ALTER TABLE member AUTO_INCREMENT = $nextId");
        return $nextId;
    }

    //bagian fungsi untuk buku
    function addBuku($data){
        $conn = getConnection();
        $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit)
                VALUES (:judul, :penulis, :penerbit, :thnTerbit)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':judul' => $data['judul'],
            ':penulis' => $data['penulis'],
            ':penerbit' => $data['penerbit'],
            ':thnTerbit' => $data['thnTerbit'] 
        ]);
    }

    function updateBuku($data) {
        $conn = getConnection();
        $sql = "UPDATE buku SET 
                    judul_buku = :judul, 
                    penulis = :penulis, 
                    penerbit = :penerbit, 
                    tahun_terbit = :thnTerbit 
                WHERE id_buku = :id_buku";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':judul' => $data['judul'],
            ':penulis' => $data['penulis'],
            ':penerbit' => $data['penerbit'],
            ':thnTerbit' => $data['thnTerbit'],
            ':id_buku' => $data['id_buku']
        ]);
    }

    function deleteBuku($id){
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM peminjaman WHERE id_buku = :id");
        $stmt->execute([':id' => $id]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            $conn->prepare("DELETE FROM peminjaman WHERE id_buku = :id")->execute([':id' => $id]);
        }

        $conn->prepare("DELETE FROM buku WHERE id_buku = :id")->execute([':id' => $id]);
    }

    function getAllBuku(){
        $conn = getConnection();
        $sql = "SELECT * FROM buku";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getBukuById($id) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM buku WHERE id_buku = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getNextAutoIncrementIdBuku() {
        $conn = getConnection();
        $sql = "SELECT MAX(id_buku) AS max_id FROM buku";
        $stmt = $conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nextId = ($row['max_id'] !== null) ? $row['max_id'] + 1 : 1;
        $conn->exec("ALTER TABLE buku AUTO_INCREMENT = $nextId");
        return $nextId;
    }

    //bagian fungsi untuk peminjaman
    function addPeminjaman($data){
        $conn = getConnection();
        $sql = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali)
                VALUES (:id_member, :id_buku, :tglPinjam, :tglKembali)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id_member' => $data['id_member'],
            ':id_buku' => $data['id_buku'],
            ':tglPinjam' => $data['tglPinjam'],
            ':tglKembali' => $data['tglKembali'] 
        ]);
    }

    function updatePeminjaman($data) {
        $conn = getConnection();
        $sql = "UPDATE peminjaman SET 
                    id_member = :id_member, 
                    id_buku = :id_buku, 
                    tgl_pinjam = :tglPinjam, 
                    tgl_kembali = :tglKembali
                WHERE id_peminjaman = :id_peminjaman";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id_member' => $data['id_member'],
            ':id_buku' => $data['id_buku'],
            ':tglPinjam' => $data['tglPinjam'],
            ':tglKembali' => $data['tglKembali'],
            ':id_peminjaman' => $data['id_peminjaman']
        ]);
    }
    
    function getAllPeminjaman() {
        $conn = getConnection();
        $sql = "SELECT 
                    p.id_peminjaman, 
                    m.nama_member, 
                    b.judul_buku, 
                    p.tgl_pinjam, 
                    p.tgl_kembali
                FROM peminjaman p
                JOIN member m ON p.id_member = m.id_member
                JOIN buku b ON p.id_buku = b.id_buku
                ORDER BY p.id_peminjaman ASC";
    
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function deletePeminjaman($id){
        $conn = getConnection();
        $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id_peminjaman = :id");
        $stmt->execute([':id' => $id]);
    }

    function getPeminjamanById($id) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getNextAutoIncrementIdPeminjaman() {
        $conn = getConnection();
        $sql = "SELECT MAX(id_peminjaman) AS max_id FROM peminjaman";
        $stmt = $conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nextId = ($row['max_id'] !== null) ? $row['max_id'] + 1 : 1;
        $conn->exec("ALTER TABLE peminjaman AUTO_INCREMENT = $nextId");
        return $nextId;
    }
?>