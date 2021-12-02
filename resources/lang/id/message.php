<?php

return [

	// ERROR
	'error' 			=> 'Terjadi kesalahan',
	'error_try_again' 	=> 'Terjadi kesalahan, silahkan coba lagi.',
	'error_idor'		=> 'IDOR Exception',
	'error_too_many'	=> 'Terlalu banyak request, coba lagi dalam beberapa saat',
	'error_maintenance'	=> '*Fitur ini bertujuan untuk maintenance malam',
	'error_validate'	=> 'Data tidak valid',

	// ERROR REGISTER
	'phone_validation_exists' => 'nomor telepon sudah terdaftar',
	'wilayah_notexists' => 'Wilayah tidak ditemukan',
	'city_notexists' => 'Kota/Kabupaten tidak ditemukan',
	'wilayah_not_found' => 'Tidak ada data wilayah',
	'account_not_exists' => 'Akun tidak ditemukan',

	// REGISTER
	'success' => 'registrasi berhasil',

	//ERRO LOGIN
	'pin_salah'					=> 'Pin Salah',
	'min_Transfer_salah'		=> 'Tidak memenuhi minimal transfer',
	'max_Transfer_salah'		=> 'Saldo tidak cukup',
	'max_limit_transfer'		=> 'Transfer Saldo melebihi batas maksimal',
	'nomor_salah'				=> 'Nomor tujuan tidak ditemukan',
	'nomor_sama'				=> 'Nomor tujuan tidak bisa sama dengan nomor pengirim',
	'transaksi_kirim'			=> 'Insert transaksi kirim saldo gagal',
	'transaksi_terima'			=> 'Insert transaksi terima saldo gagal',
	'pin_5x_salah' 				=> 'Pin sudah 5x salah, mohon coba lagi 1jam kemudian atau hubungi Kami',
	'pin_salah_berulang'		=> 'Gagal berulang kali, mohon coba lagi besok atau hubungi Kami',
	'akun_banned'				=> 'Akun anda di banned, silahkan hubungi CS',
	'gagal_update_token'		=> 'Silahkan coba lagi',
	'perangkat_baru' 			=> 'Konfirmasikan perangkat baru di device lama anda',
	'verifikasi_perangkat'		=> 'Silahkan verifikasikan perangkat anda',
	'akses_tidak_ada'			=> 'akses perangkat tidak diizinkan',
	'token_validation_expired' 	=> 'Token expired validasi',
	'token_validation_decrypt'	=> 'Token gagal decrypt',
	'token_valid'				=> 'Token tidak sesuai',

	// BLOKIR
	'block_validation_limit' 		=> 'Anda tidak dapat login karena sudah 3x salah, mohon coba lagi 1jam kemudian atau hubungi Kami',
	'block_validation_limits' 		=> 'Anda tidak dapat login, mohon coba lagi besok atau hubungi Kami',
	'block_validation_banned' 		=> 'Akun tidak dapat di akses',
	'block_validation_otp_first'	=> 'Melebihi batas, silahkan coba 1 jam kemudian',
	'block_validation_otp_second'	=> 'Melebihi batas, silahkan coba besok',
	'no_device'						=> 'akses perangkat tidak diizinkan',

	// PHONE
	'phone_validation' 			=> 'Nomor telepon tidak ditemukan',

	// OTP
	'otp_sent' 				=> 'Kode OTP telah dikirim',
	'otp_validation_wrong' 	=> 'Kode OTP salah',
	'block_validation_otp_first'	=> 'Melebihi batas, silahkan coba 1 jam kemudian',
	'block_validation_otp_second'	=> 'Melebihi batas, silahkan coba besok',
	// 'otp_message'			=> 'Jangan berikan kode ini kepada siapapun termasuk KIOSER tidak pernah meminta kode apapun. KIOSER: Silahkan Input ',
	'otp_message'			=> 'KIOSER : Kode OTP Kamu Adalah = ',
	'otp_message_reguler'	=> 'KIOSER : Untuk konfirmasi kontakmu, masukkan = ',
	'otp_message_after'		=> '

	Silahkan masukkan di aplikasi kioser, Jangan berikan kesiapapun.',
	'otp_wa'		=> "KIOSER : Kode OTP Kamu Adalah = *{{NOMOR}}*%0A%0ASilahkan masukkan di aplikasi kioser, Jangan berikan kesiapapun.%0A___%0AJangan lupa save nomor kami ini ya kak, biar kalau ada promo terbaru kioser kakak akan dapat lebih dulu 😊",

	// error code otp
	'1017'	=>	'OTP Melebihi Batas',
	'1018'	=>	'OTP Sudah Terkirim',
	'1019'	=>	'Verifikasi Berhasil',
	'1020'	=>	'OTP Tidak Sesuai',
	'1021'	=>	'Format Salah',
	'1022'	=>	'Masa Berlaku OTP telah berakhir',
	'1023'	=>	'Error proses',
	'1024'	=>	'OTP Terblokir 24 jam',
	'1025'	=>	'Kouta otp untuk metode tertentu sudah habis',
];
