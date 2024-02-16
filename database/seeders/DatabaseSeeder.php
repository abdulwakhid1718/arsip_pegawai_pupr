<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Bidang;
use App\Models\Berkas;
use App\Models\Jabatan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            ['nip' => '197803202001121003', 'role' => 'admin', 'email' => 'rizal@example.com', 'password' => bcrypt('password')],
            ['nip' => '198511142010012016', 'role' => 'kasubag', 'email' => 'uswatun@example.com', 'password' => bcrypt('password')],
            ['nip' => '199512302022032004', 'email' => 'nanda@example.com', 'password' => bcrypt('password')],
            ['nip' => '198011252007012005', 'email' => 'suhariyanti@example.com', 'password' => bcrypt('password')],
            ['nip' => '196906132010011002', 'email' => 'surya@example.com', 'password' => bcrypt('password')],
            ['nip' => '199902062022031002', 'email' => 'iqbal@example.com', 'password' => bcrypt('password')],
            ['nip' => '198312252010012002', 'email' => 'ummi@example.com', 'password' => bcrypt('password')],
            ['nip' => '199708082022031005', 'email' => 'triago@example.com', 'password' => bcrypt('password')],
            ['nip' => '198211192009031002', 'email' => 'rudiantoro@example.com', 'password' => bcrypt('password')],
            ['nip' => '198702222009032005', 'email' => 'maharani@example.com', 'password' => bcrypt('password')],
            ['nip' => '198010162002122003', 'email' => 'aminatus@example.com', 'password' => bcrypt('password')],
            ['nip' => '197101122007011011', 'email' => 'syaiful@example.com', 'password' => bcrypt('password')],
            ['nip' => '198011032007012006', 'email' => 'yeni@example.com', 'password' => bcrypt('password')],
            ['nip' => '197208052007011017', 'email' => 'sayadi@example.com', 'password' => bcrypt('password')],
            ['nip' => '198003052010012003', 'email' => 'dewi@example.com', 'password' => bcrypt('password')],
            ['nip' => '198212142010011004', 'email' => 'suwandhi@example.com', 'password' => bcrypt('password')],
            ['nip' => '197912232010011020', 'email' => 'guntur@example.com', 'password' => bcrypt('password')],
            ['nip' => '197604272011011003', 'email' => 'suhartono@example.com', 'password' => bcrypt('password')],
            ['nip' => '198005282010012022', 'email' => 'hosnawati@example.com', 'password' => bcrypt('password')],
            ['nip' => '198110242010011013', 'email' => 'ferry@example.com', 'password' => bcrypt('password')],
            ['nip' => '199108162019031010', 'email' => 'jundulloh@example.com', 'password' => bcrypt('password')],
            ['nip' => '197406202008012015', 'email' => 'inang@example.com', 'password' => bcrypt('password')],
            ['nip' => '197205312007011008', 'email' => 'mufti@example.com', 'password' => bcrypt('password')],
            ['nip' => '197209062007011010', 'email' => 'hari@example.com', 'password' => bcrypt('password')],
            ['nip' => '198505252006042008', 'email' => 'ning@example.com', 'password' => bcrypt('password')],
            ['nip' => '196608172007011024', 'email' => 'agus@example.com', 'password' => bcrypt('password')],
            ['nip' => '198403062008011003', 'email' => 'setiyadi@example.com', 'password' => bcrypt('password')],
            ['nip' => '197812092014071001', 'email' => 'muhammad@example.com', 'password' => bcrypt('password')],
            ['nip' => '197602112009031001', 'email' => 'imam@example.com', 'password' => bcrypt('password')],
            ['nip' => '198107052010011003', 'email' => 'abd@example.com', 'password' => bcrypt('password')],
            ['nip' => '199005302020122011', 'email' => 'ayu@example.com', 'password' => bcrypt('password')],
            ['nip' => '198502082020122003', 'email' => 'prihatna@example.com', 'password' => bcrypt('password')],
            ['nip' => '19940731202012029', 'email' => 'riska@example.com', 'password' => bcrypt('password')],
            ['nip' => '197802242010012014', 'email' => 'antin@example.com', 'password' => bcrypt('password')],
            ['nip' => '198006012014071005', 'email' => 'khoiril@example.com', 'password' => bcrypt('password')],
            ['nip' => '198303212014071002', 'email' => 'abdullah@example.com', 'password' => bcrypt('password')],
            ['nip' => '197212272009031001', 'email' => 'ahmad@example.com', 'password' => bcrypt('password')],
            ['nip' => '198105092014071002', 'email' => 'agung@example.com', 'password' => bcrypt('password')],
            ['nip' => '196807231990031005', 'email' => 'imam1@example.com', 'password' => bcrypt('password')],
            ['nip' => '198206252009031002', 'email' => 'deddy@example.com', 'password' => bcrypt('password')],
            ['nip' => '196704262007011012', 'email' => 'slamet@example.com', 'password' => bcrypt('password')],
            ['nip' => '196912232006041003', 'email' => 'solihin@example.com', 'password' => bcrypt('password')],
            ['nip' => '197901092006041008', 'email' => 'mashur@example.com', 'password' => bcrypt('password')],
            ['nip' => '198505072014071002', 'email' => 'taufik@example.com', 'password' => bcrypt('password')],
            ['nip' => '197708102001121004', 'email' => 'agung1@example.com', 'password' => bcrypt('password')],
            ['nip' => '197306252007011013', 'email' => 'syaiful1@example.com', 'password' => bcrypt('password')],
            ['nip' => '198410112009031001', 'email' => 'fathur@example.com', 'password' => bcrypt('password')],
            ['nip' => '198611202014071002', 'email' => 'novan1@example.com', 'password' => bcrypt('password')],
            ['nip' => '197810192014072003', 'email' => 'husnul@example.com', 'password' => bcrypt('password')],
            ['nip' => '198610262014071001', 'email' => 'okky@example.com', 'password' => bcrypt('password')],
            ['nip' => '196605221988031010', 'email' => 'mohammad@example.com', 'password' => bcrypt('password')],
            ['nip' => '196912111992031009', 'email' => 'ruspandi@example.com', 'password' => bcrypt('password')],
            ['nip' => '198207282006042027', 'email' => 'diah@example.com', 'password' => bcrypt('password')],
            ['nip' => '198011082007011006', 'email' => 'novan@example.com', 'password' => bcrypt('password')],
            ['nip' => '197912062010012003', 'email' => 'ida@example.com', 'password' => bcrypt('password')],
            ['nip' => '197210112007011009', 'email' => 'mosleh@example.com', 'password' => bcrypt('password')],
            ['nip' => '196811192007011014', 'email' => 'slamet1@example.com', 'password' => bcrypt('password')],
            ['nip' => '197807062007011012', 'email' => 'mohammad1@example.com', 'password' => bcrypt('password')],
            ['nip' => '197408202007012012', 'email' => 'muslihah@example.com', 'password' => bcrypt('password')],
            ['nip' => '196704252006041009', 'email' => 'aroes@example.com', 'password' => bcrypt('password')],
            ['nip' => '199109112020121008', 'email' => 'arief@example.com', 'password' => bcrypt('password')],
            ['nip' => '199002282020121008', 'email' => 'mirtha@example.com', 'password' => bcrypt('password')],
            ['nip' => '199701132020122016', 'email' => 'adinda@example.com', 'password' => bcrypt('password')],
            ['nip' => '198811232020121010', 'email' => 'ahmas@example.com', 'password' => bcrypt('password')],
            ['nip' => '199611242020122018', 'email' => 'azizah@example.com', 'password' => bcrypt('password')],
            ['nip' => '199412062022031005', 'email' => 'suseno@example.com', 'password' => bcrypt('password')],
            ['nip' => '197909232014072002', 'email' => 'eka@example.com', 'password' => bcrypt('password')],
            ['nip' => '197603272005011007', 'email' => 'ikhtiarini@example.com', 'password' => bcrypt('password')],
            ['nip' => '198001042006041019', 'email' => 'tosi@example.com', 'password' => bcrypt('password')],
            ['nip' => '198702272011012006', 'email' => 'emalia@example.com', 'password' => bcrypt('password')],
            ['nip' => '198305032015031002', 'email' => 'fariz@example.com', 'password' => bcrypt('password')],
            ['nip' => '197101212007012013', 'email' => 'liliek@example.com', 'password' => bcrypt('password')],
            ['nip' => '198003282007012006', 'email' => 'dina@example.com', 'password' => bcrypt('password')],
            ['nip' => '197104012007012015', 'email' => 'nurhayati@example.com', 'password' => bcrypt('password')],
            ['nip' => '197306162014071003', 'email' => 'kurnia@example.com', 'password' => bcrypt('password')],
            ['nip' => '198208232010012003', 'email' => 'leny@example.com', 'password' => bcrypt('password')],
            ['nip' => '199706182020121003', 'email' => 'thoriqul@example.com', 'password' => bcrypt('password')],
            ['nip' => '197804082007011005', 'email' => 'haryanto@example.com', 'password' => bcrypt('password')]
        ];
        
        User::factory()->createMany($users);

        Bidang::factory()->createMany([
            ['nama_bidang' => 'DPUPR'], 
            ['nama_bidang' => 'Sekretariat'], 
            ['nama_bidang' => 'Bina Marga'], 
            ['nama_bidang' => 'SDA'], 
            ['nama_bidang' => 'Tata Ruang'], 
            ['nama_bidang' => 'Jasa Konstruksi'], 
        ]);

        $jabatan = [
            ["nama" => "Kepala Dinas", "kelompok_jabatan" => "Struktural", "bidang_id" => "1"],
            ["nama" => "Kasubbag. Umum dan Kepegawaian", "kelompok_jabatan" => "Struktural", "bidang_id" => "2"],
            ["nama" => "Penyusunan Kebutuhan Barang Inventaris", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "2"],
            ["nama" => "Analis Pengembangan SDM Aparatur", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "2"],
            ["nama" => "Analis Tata Usaha", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "2"],
            ["nama" => "Pengelola Sistem Informasi Manajemen Kepegawaian", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "2"],
            ["nama" => "Pengelola Pemanfaatan Barang Milik Daerah", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "2"],
            ["nama" => "Pengadministrasi Umum", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "2"],
            ["nama" => "Kasubbag. Perencanaan dan Keuangan", "kelompok_jabatan" => "Struktural", "bidang_id" => "2"],
            ["nama" => "Analis Pelaporan dan Transaksi Keuangan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "2"],
            ["nama" => "Penyusun Program Anggaran dan Pelaporan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "2"],
            ["nama" => "Analis Perencanaan, Evaluasi dan Pelaporan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "2"],
            ["nama" => "Bendahara", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "2"],
            ["nama" => "Pengadministrasi Penerimaan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "2"],
            ["nama" => "Kabid Bina Marga", "kelompok_jabatan" => "Struktural", "bidang_id" => "3"],
            ["nama" => "Perencana Ahli Muda", "kelompok_jabatan" => "Fungsional PJ", "bidang_id" => "3"],
            ["nama" => "Teknik Jalan dan Jembatan Ahli Muda", "kelompok_jabatan" => "Fungsional PJ", "bidang_id" => "3"],
            ["nama" => "Teknik Jalan dan Jembatan Ahli Pertama", "kelompok_jabatan" => "Fungsional", "bidang_id" => "3"],
            ["nama" => "Penelaah Pengelolaan Leger Jalan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Analis Sistem Jaringan Jalan Jembatan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Pengawas Jalan dan Jembatan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Penyusun Rencana kegiatan dan Anggaran", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Pemeriksa Jalan dan Jembatan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Analis Pengembangan Infrastruktur", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Pengelola Sistem Manajemen Jalan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Operator Alat berat", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Pemelihara Sarana dan Prasarana", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Pemelihara Jalan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Pengadministrasi Sistem Informasi Pengendalian Pembangunan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Pengadministrasi Umum", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Petugas Ukur", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "3"],
            ["nama" => "Teknik Pengairan Ahli Muda", "kelompok_jabatan" => "Fungsional PJ", "bidang_id" => "4"],
            ["nama" => "Perencana Ahli Muda", "kelompok_jabatan" => "Fungsional PJ", "bidang_id" => "4"],
            ["nama" => "Kasi Operasional dan Pemeliharaan SDA", "kelompok_jabatan" => "Struktural", "bidang_id" => "4"],
            ["nama" => "Penelaah Data Statistik Pengelolaan Daerah Aliran Sungai", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "4"],
            ["nama" => "Pengawas Irigasi", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "4"],
            ["nama" => "Pengamat Operasional dan Pemeliharaan Sumber Daya Air", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "4"],
            ["nama" => "Pengawas Jaringan Utilitas", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "4"],
            ["nama" => "Pemeriksa Irigasi", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "4"],
            ["nama" => "Analis Sumber Daya Air", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "4"],
            ["nama" => "Analis Pengembangan Infrastruktur", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "4"],
            ["nama" => "Analis Infrastruktur", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "4"],
            ["nama" => "Pengelola Sumber Daya Air", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "4"],
            ["nama" => "Petugas Operasi dan Pemeliharaan Sumber Daya Air", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "4"],
            ["nama" => "Teknisi Pengelolaan Sumber Daya Air", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "4"],
            ["nama" => "Petugas Ukur", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "4"],
            ["nama" => "Kabid Penataan Ruang", "kelompok_jabatan" => "Struktural", "bidang_id" => "5"],
            ["nama" => "Penata Ruang Ahli Muda", "kelompok_jabatan" => "Fungsional PJ", "bidang_id" => "5"],
            ["nama" => "Analis Tata Ruang", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "5"],
            ["nama" => "Analis Dokumen Perijinan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "5"],
            ["nama" => "Analis Pengendalian Lahan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "5"],
            ["nama" => "Pengawas Tata Ruang", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "5"],
            ["nama" => "Penyusun Rencana Tata Ruang dan Zonasi", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "5"],
            ["nama" => "Penyusun Rencana Tata Ruang", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "5"],
            ["nama" => "Kabid Jasa Konstruksi", "kelompok_jabatan" => "Struktural", "bidang_id" => "6"],
            ["nama" => "Pembina Jasa Konstruksi Ahli Muda", "kelompok_jabatan" => "Fungsional PJ", "bidang_id" => "6"],
            ["nama" => "Analis Infrastruktur", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "6"],
            ["nama" => "Penelaah Mutu Konstruksi", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "6"],
            ["nama" => "Pengawas Bangunan dan Gedung", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "6"],
            ["nama" => "Penguji Bahan dan Bangunan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "6"],
            ["nama" => "Pengadministrasi Sistem Informasi Pengendalian Pembangunan", "kelompok_jabatan" => "Pelaksana", "bidang_id" => "6"]
        ];
        
        
        Jabatan::factory()->createMany($jabatan);
        
        Pegawai::factory()->create([
            'user_id' => '1',
            'bidang_id' => '1',
            'jabatan_id' => '1',
            'name' => 'Putri Nur Ali Sahlum',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Bangkalan',
            'tanggal_lahir' => '2002-03-28',
            'pendidikan' => 's1',
            'no_hp' => '083112299283',
            'alamat' => 'Bangkalan'
        ]);
        Pegawai::factory()->create([
            'user_id' => '2',
            'bidang_id' => '2',
            'jabatan_id' => '2',
            'name' => 'Abdul Wakhid',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Bangkalan',
            'tanggal_lahir' => '2002-03-28',
            'pendidikan' => 's1',
            'no_hp' => '083112299283',
            'alamat' => 'Bangkalan'
        ]);
        Pegawai::factory()->create([
            'user_id' => '3',
            'bidang_id' => '2',
            'jabatan_id' => '3',
            'name' => 'Kurniawan Dwi',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Bangkalan',
            'tanggal_lahir' => '2002-03-28',
            'pendidikan' => 's1',
            'no_hp' => '083112299283',
            'alamat' => 'Bangkalan'
        ]);
    }
}
