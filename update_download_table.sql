-- Script untuk mengubah struktur tabel download
-- Dari id_kategori_download menjadi id_sub_kategori_download

-- 1. Backup data yang ada (opsional)
CREATE TABLE download_backup AS SELECT * FROM download;

-- 2. Tambahkan kolom baru id_sub_kategori_download
ALTER TABLE download ADD COLUMN id_sub_kategori_download INT NULL AFTER id_kategori_download;

-- 3. Update data yang ada (contoh mapping)
-- Asumsikan sub kategori pertama dari setiap kategori sebagai default
UPDATE download d 
JOIN sub_kategori_download sk ON sk.id_kategori_download = d.id_kategori_download 
SET d.id_sub_kategori_download = sk.id_sub_kategori_download 
WHERE sk.id_sub_kategori_download = (
    SELECT MIN(sk2.id_sub_kategori_download) 
    FROM sub_kategori_download sk2 
    WHERE sk2.id_kategori_download = d.id_kategori_download
);

-- 4. Buat kolom id_sub_kategori_download menjadi NOT NULL
ALTER TABLE download MODIFY COLUMN id_sub_kategori_download INT NOT NULL;

-- 5. Tambahkan foreign key constraint
ALTER TABLE download 
ADD CONSTRAINT fk_download_sub_kategori 
FOREIGN KEY (id_sub_kategori_download) 
REFERENCES sub_kategori_download(id_sub_kategori_download) 
ON DELETE CASCADE;

-- 6. Hapus kolom lama id_kategori_download
ALTER TABLE download DROP COLUMN id_kategori_download;

-- 7. Hapus foreign key lama jika ada
-- ALTER TABLE download DROP FOREIGN KEY fk_download_kategori;

-- Catatan: 
-- - Jalankan script ini dengan hati-hati dan backup database terlebih dahulu
-- - Pastikan tabel sub_kategori_download sudah ada dan berisi data
-- - Sesuaikan mapping data sesuai kebutuhan bisnis 