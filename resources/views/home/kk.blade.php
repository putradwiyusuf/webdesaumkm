@extends('layouts.home.layouts.app')

@section('title', 'Pembuata Kartu Keluarga')

@section('content')

    <br>
    <div class="section-title" mt-4>
        <h2>SYARAT PEMBUATAN KARTU KELUARGA</h2>
    </div>
    <div class="container">
        <h6>1. PERMOHONAN KK BARU</h6>
        <ul>
            <li>Surat pengantar RT / RW dan Kelurahan</li>
            <li>Mengisi Formulir Permohon Kartu Keluarga</li>
            <li>Melampirkan KK dan KTP Lama</li>
            <li>Melampirkan Fotocopy Kutipan Akta Perkawinan / Akta Nikah bagi yang sudah menikah, dengan menggunakan dokumen aslinya</li>
            <li>Melampirkan fotocopy Kutipan Akta Kelahiran bagi kepala keluarga dan seluruh anggota keluarga, dengan memperlihatkan dokumen aslinya</li>
            <li>Mengisi Data Keluarga dan Biodata setiap Anggota Keluarga</li>
            <li>Melampirkan fotocopy Bukti / Ketetapan Ganti Nama (apabila sudah ganti nama), dengan memperlihatkan dokumen aslinya</li>
            <li>Asli Surat Keterangan Pindah Datang, bagi penduduk yang pindah tempat tinggal</li>
        </ul>
        <br>
        <h6>2. PERMOHONAN KK BARU BAGI PENDUDUK YANG SUDAH MEMPUNYAI NIK</h6>
        <p>Permohonan ini khusus bagi penduduk yang sudah terekam datanya dalam Bank Data Kependudukan, namun mengajukan permohonan KK baru karena :</p>
        <ul>
            <li>Penduduk yang membentuk rumah tangga baru</li>
            <p>Persyaratan yang harus dipenuhi :</p>
            <ol>
                <li>Surat Pengantar RT/RW dan Kelurahan</li>
                <li>Mengisi Formulir Permohonan Kartu Keluarga</li>
                <li>Melampirkan fotocopy KK lama yang sudah ada NIK</li>
                <li>Melampirkan fotocopy Kutipan Akta Perkawinan / Akta Nikah, bagi penduduk yang sudah menikah, dengan memperlihatkan dokumen aslinya</li>
            </ol>
            <br>
            <li>Penduduk yang pindah datang</li>
            <p>Persyaratan yang harus dipenuhi :</p>
            <ol>
                <li>Surat Pengantar RT/RW dan Kelurahan</li>
                <li>Mengisi Formulir Permohonan Kartu Keluarga</li>
                <li>Melampirkan fotocopy KK lama yang sudah ada NIK</li>
                <li>Melampirkan fotocopy Kutipan Akta Perkawinan / Akta Nikah, bagi penduduk yang sudah menikah, dengan memperlihatkan dokumen aslinya</li>
                <li>Melampirkan fotocopy Kutipan Akta Kelahiran bagi kepala keluarga dan seluruh anggota keluarga, dengan memperlihatkan dokumen aslinya</li>
                <li>Mengisi Data Keluarga dan Biodata setiap Anggota Keluarga (bila ada perubahan)</li>
                <li>Melampirkan fotocopy Bukti / Ketetapan Ganti Nama (apabila sudah ganti nama), dengan memperlihatkan dokumen aslinya</li>
                <li>Asli Surat Keterangan Pindah</li>
            </ol>
            <br>
            <li>Penduduk yang KK hilang atau rusak</li>
            <p>Persyaratan yang harus dipenuhi :</p>
            <ol>
                <li>Surat Pengantar RT/RW dan Kelurahan</li>
                <li>Mengisi Formulir Permohonan Kartu Keluarga</li>
                <li>Melampirkan dokumen kependudukan dari salah satu anggota keluarga yang sudah ada NIK</li>
                <li>Melampirkan fotocopy KTP dan KK yang sudah ada NIK</li>
                <li>Melampirkan Kartu Keluarga yang rusak bagi yang rusak</li>
            </ol>
            <br>
            <li>Penduduk yang mengalami peristiwa kependudukan / peristiwa lainnya</li>
            <p>Persyaratan yang harus dipenuhi :</p>
            <ol>
                <li>Surat Pengantar RT/RW dan Kelurahan</li>
                <li>Mengisi Formulir Permohonan Kartu Keluarga di ketahui Lurah</li>
                <li>Melampirkan dokumen peristiwa kependudukan / peristiwa penting lainnya</li>
                <li>Melampirkan fotocopy KTP dan KK yang sudah ada NIK</li>
                <li>Melampirkan fotocopy Kutipan Akta Perkawinan / Akta Nikah, bagi penduduk yang sudah menikah, dengan memperlihatkan dokumen aslinya</li>
                <li>Mengisi Data Keluarga dan Biodata bagi yang ada perubahan</li>
                <li>Melampirkan fotocopy Bukti / Ketetapan Ganti Nama (apabila sudah ganti nama), dengan memperlihatkan dokumen aslinya</li>
            </ol>
            <br>
        </ul>
        <br>
        <h6>3. PERMOHONAN MENUMPANG KK</h6>
        <p>Permohonan ini khusus bagi penduduk yang sudah terekam datanya dalam Bank Data Kependudukan, namun mengajukan permohonan KK baru karena :</p>
        <ul>
            <li>Penduduk yang KK lama dibawa pindah oleh kepala keluarga</li>
            <p>Persyaratan yang harus dipenuhi :</p>
            <ol>
                <li>Surat Pengantar RT/RW dan Kelurahan</li>
                <li>Mengisi Formulir Permohonan Kartu Keluarga di ketahui Lurah</li>
                <li>Melampirkan fotocopy KTP dan KK yang sudah ada NIK</li>
                <li>Mengisi data keluarga dan biodata setiap Anggota Keluarga</li>
            </ol>
            <br>
            <li>Anggota keluarga pindah tempat tinggal</li>
            <p>Persyaratan yang harus dipenuhi :</p>
            <ol>
                <li>Surat Pengantar RT/RW dan Kelurahan</li>
                <li>Mengisi Formulir Permohonan Kartu Keluarga</li>
                <li>Asli Surat Keterangan Pindah dari daerah asal</li>
                <li>Melampirkan fotocopy KK lama yang sudah ada NIK</li>
                <li>Melampirkan fotocopy Kutipan Akta Perkawinan / Akta Nikah, bagi penduduk yang sudah menikah, dengan memperlihatkan dokumen aslinya</li>
                <li>Mengisi data keluarga dan biodata setiap Anggota Keluarga</li>
                <li>Melampirkan Surat Pernyataan bermeterai dari Kepala Keluarga yang ditumpangi</li>

            </ol>
            <br>
        </ul>
    </div>
    <br>

@endsection