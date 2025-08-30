-- SQL untuk import langsung (jika tidak ingin pakai seeder)
CREATE DATABASE IF NOT EXISTS pendaftaran_db;
USE pendaftaran_db;

-- Tabel pendaftars
CREATE TABLE pendaftars (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telepon VARCHAR(255) NOT NULL,
    alamat TEXT NOT NULL,
    tanggal_datang DATE NOT NULL,
    jam_datang TIME NOT NULL,
    hari_datang VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- Tabel daftar_ulangs
CREATE TABLE daftar_ulangs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pendaftar_id BIGINT UNSIGNED NOT NULL,
    ktp ENUM('ada','tidak') NOT NULL DEFAULT 'tidak',
    kk ENUM('ada','tidak') NOT NULL DEFAULT 'tidak',
    ijazah_akta ENUM('ada','tidak') NOT NULL DEFAULT 'tidak',
    tanggal_daftar_ulang DATE NOT NULL,
    hari_daftar_ulang VARCHAR(255) NOT NULL,
    keterangan ENUM('OK','tidak') NOT NULL DEFAULT 'tidak',
    no_antrian VARCHAR(255) NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (pendaftar_id) REFERENCES pendaftars(id) ON DELETE CASCADE
);

-- Tabel pengurusans
CREATE TABLE pengurusans (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pendaftar_id BIGINT UNSIGNED NOT NULL,
    berkas ENUM('lengkap','tidak lengkap') NOT NULL DEFAULT 'tidak lengkap',
    status ENUM('diterima','ditolak','pending') NOT NULL DEFAULT 'pending',
    keterangan ENUM('OK','tidak') NOT NULL DEFAULT 'tidak',
    pembayaran DECIMAL(10,2) NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (pendaftar_id) REFERENCES pendaftars(id) ON DELETE CASCADE
);

-- Insert sample data
INSERT INTO pendaftars (nama, email, telepon, alamat, tanggal_datang, jam_datang, hari_datang, created_at, updated_at) VALUES
('Sahrul Ramadhani', 'sahrul.r.dhani@gmail.com', '082294002934', 'Komp Marinir Blok A4 No. 20, Kota Depok', CURDATE(), '09:00:00', 'Sabtu', NOW(), NOW()),
('Siti Nurhaliza', 'siti.nurhaliza@gmail.com', '081234567891', 'Jl. Sudirman No. 456, Bandung', CURDATE(), '10:00:00', 'Sabtu', NOW(), NOW()),
('Oilien Ramadhanya', 'oilien.ramadhanya@yahoo.com', '081234567892', 'Jl. Diponegoro No. 789, Surabaya', CURDATE(), '11:00:00', 'Sabtu', NOW(), NOW()),
('Dewi Sartika', 'dewi.sartika@gmail.com', '081234567893', 'Jl. Kartini No. 321, Yogyakarta', DATE_ADD(CURDATE(), INTERVAL 1 DAY), '09:00:00', 'Minggu', NOW(), NOW()),
('Rudi Hermawan', 'rudi.hermawan@gmail.com', '081234567894', 'Jl. Pahlawan No. 654, Medan', DATE_ADD(CURDATE(), INTERVAL 1 DAY), '10:00:00', 'Minggu', NOW(), NOW());


-- Insert daftar ulang untuk 3 pendaftar pertama
INSERT INTO daftar_ulangs (pendaftar_id, ktp, kk, ijazah_akta, tanggal_daftar_ulang, hari_daftar_ulang, keterangan, no_antrian, created_at, updated_at) VALUES
(1, 'ada', 'ada', 'ada', CURDATE(), 'Sabtu', 'OK', 'A001', NOW(), NOW()),
(2, 'ada', 'ada', 'ada', CURDATE(), 'Sabtu', 'OK', 'A002', NOW(), NOW()),
(3, 'tidak', 'ada', 'ada', CURDATE(), 'Sabtu', 'tidak', NULL, NOW(), NOW());

-- Insert pengurusan untuk 2 pendaftar pertama
INSERT INTO pengurusans (pendaftar_id, berkas, status, keterangan, pembayaran, created_at, updated_at) VALUES
(1, 'lengkap', 'diterima', 'OK', 355000.00, NOW(), NOW()),
(2, 'lengkap', 'diterima', 'OK', 355000.00, NOW(), NOW());
