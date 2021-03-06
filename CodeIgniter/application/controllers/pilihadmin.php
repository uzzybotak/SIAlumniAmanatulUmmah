<?php

	class pilihadmin extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function tentang()
		{
			$this->load->library('session');
			$username = $this->session->userdata('username');
			if ($username==false)
			{
				$this->load->helper('url');
				redirect('home','location');
			}
			else if ($username[0]=='A')
			{
				$this->load->view('view_tentangadmin',array('NamaLengkap' => $this->session->userdata('namalengkap')));
			}
			else 
			{
				//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
				$this->load->helper('url');
				redirect('home','location');
			}
		}
		public function tambahakunadmin()
		{
			$this->load->library('session');
			$username = $this->session->userdata('username');
			if ($username==false)
			{
				$this->load->helper('url');
				redirect('home','location');
			}
			else if ($username[0]=='A')
			{
				$notifikasi;
				//bukan pesan error
				$notifikasi['NamaLengkap'] = $this->session->userdata('namalengkap');
				//pesan error
				$notifikasi['nama_kosong'] = $this->session->flashdata('nama_kosong');
				$notifikasi['username_kosong'] = $this->session->flashdata('username_kosong');
				$notifikasi['password_kosong'] = $this->session->flashdata('password_kosong');
				$notifikasi['konfirmasi_password_kosong'] = $this->session->flashdata('konfirmasi_password_kosong');
				$notifikasi['username_sudah_ada'] = $this->session->flashdata('username_sudah_ada');
				$notifikasi['password_dan_konfirmasi_password_tidak_sesuai'] = $this->session->flashdata('password_dan_konfirmasi_password_tidak_sesuai');
				
				$this->load->view('view_tambahakunadmin',$notifikasi);
			}
			else 
			{
				//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
				$this->load->helper('url');
				redirect('home','location');
			}
		}
		public function ubahdataadmin()
		{
			$this->load->library('session');
			$username = $this->session->userdata('username');
			if ($username==false)
			{
				$this->load->helper('url');
				redirect('home','location');
			}
			else if ($username[0]=='A')
			{
				$this->load->view('view_ubahdataadmin',array(
																'NamaLengkap' => $this->session->userdata('namalengkap'),
																'Username' => $username
															));
			}
			else 
			{
				//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
				$this->load->helper('url');
				redirect('home','location');
			}
		}
		public function tambahakun()
		{
			$this->load->library('session');
			$username = $this->session->userdata('username');
			if ($username==false)
			{
				$this->load->helper('url');
				redirect('home','location');
			}
			else if ($username[0]=='A')
			{
				$notifikasi;
				//bukan pesan
				$notifikasi['NamaLengkap'] = $this->session->userdata('namalengkap');
				//pesan error
				$notifikasi['nama_lengkap_kosong'] = $this->session->flashdata('nama_lengkap_kosong');
				$notifikasi['jenis_kelamin_kosong'] = $this->session->flashdata('jenis_kelamin_kosong');
				$notifikasi['nama_lembaga_kosong'] = $this->session->flashdata('nama_lembaga_kosong');
				$notifikasi['tahun_lulus_kosong'] = $this->session->flashdata('tahun_lulus_kosong');
				$notifikasi['username_kosong'] = $this->session->flashdata('username_kosong');
				$notifikasi['password_kosong'] = $this->session->flashdata('password_kosong');
				$notifikasi['ulangi_password_kosong'] = $this->session->flashdata('ulangi_password_kosong');
				$notifikasi['nama_lembaga_tidak_terdaftar'] = $this->session->flashdata('nama_lembaga_tidak_terdaftar');
				$notifikasi['format_email_salah'] = $this->session->flashdata('format_email_salah');
				$notifikasi['username_sudah_ada'] = $this->session->flashdata('username_sudah_ada');
				$notifikasi['password_dan_ulangi_password_tidak_sama'] = $this->session->flashdata('password_dan_ulangi_password_tidak_sama');
				
				$this->load->view('view_tambahakun',$notifikasi);
			}
			else 
			{
				//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
				$this->load->helper('url');
				redirect('home','location');
			}
		}
		public function ubahdataalumni()
		{
			$this->load->library('session');
			$username = $this->session->userdata('username');
			if ($username==false)
			{
				$this->load->helper('url');
				redirect('home','location');
			}
			else if ($username[0]=='A')
			{
				$this->load->model('Alumni');
				$nama = $this->input->post('inputNama');
				$lembaga = $this->input->post('inputLembaga');
				$cabang = $this->input->post('inputCabang');
				$this->Alumni->setNamaLengkap($nama);
				$this->Alumni->setLembaga($lembaga);
				$this->Alumni->setCabang($cabang);
				$data['debug'] = '';
				$this->load->library('session');
				$username = $this->session->userdata('username');
				
				if($nama == '' && $lembaga == '' && $cabang == '')
				{
					$data['query'] = $this->Alumni->searchMhs(7);
				}
				else if($nama != '' && $lembaga[0] == '-' && $cabang[0] == '-')
				{
					$data['query'] = $this->Alumni->searchMhs(1);
				}
				else if($nama == '' && $lembaga[0] == '-' && $cabang[0] != '-')
				{
					$data['query'] = $this->Alumni->searchMhs(2);
				}
				else if($nama == '' && $lembaga[0] != '-' && $cabang[0] == '-')
				{
					$data['query'] = $this->Alumni->searchMhs(3);
				}
				else if($nama == '' && $lembaga[0] != '-' && $cabang[0] != '-')
				{
					$data['query'] = $this->Alumni->searchMhs(4);
				}
				else if($nama != '' && $lembaga[0] == '-' && $cabang[0] != '-')
				{
					$data['query'] = $this->Alumni->searchMhs(5);
				}
				else if($nama != '' && $lembaga[0] != '-' && $cabang[0] == '-')
				{
					$data['query'] = $this->Alumni->searchMhs(6);
				}
				else if($nama == '' && $lembaga[0] == '-' && $cabang[0] == '-')
				{
					$data['query'] = $this->Alumni->searchMhs(8);
				}
				else
				{
					$data['query'] = $this->Alumni->searchMhs(7);
				}
				
				$data['NamaLengkap'] = $this->session->userdata('namalengkap');
				$data['NamaCari'] = $nama;
				$data['LembagaCari'] = $lembaga;
				$data['CabangCari'] = $cabang;
				$data['status'] = 0;
				if ($username==false)
				{
					$this->load->helper('url');
					redirect('home','location');
				}
				else if($username[0]=='A' && $nama == '' && ($lembaga == '' || $lembaga == '-')  && ($cabang == '' || $cabang == '-'))
				{
					$data['status'] = 0;
					$this->load->view('view_caridataalumni', $data);
				}
				else if($username[0]=='A' && $data['query']->num_rows()>0)
				{
					$data['status'] = 1;
					$this->load->view('view_caridataalumni', $data);
				}
				else 
				{
					//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
					$data['status'] = 2;
					$this->load->view('view_caridataalumni', $data);
					//$this->load->helper('url');
					//redirect('home','location');
				}
			}
			else 
			{
				//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
				$this->load->helper('url');
				redirect('home','location');
			}
		}
		public function gantidataalumni($user)
		{
			$this->load->library('session');
			$username = $this->session->userdata('username');
			if ($username==false)
			{
				$this->load->helper('url');
				redirect('home','location');
			}
			else if ($username[0]=='A')
			{
				$notifikasi;
			
				$this->load->model('Alumni');
				$this->Alumni->setUsername($user);
				$query = $this->Alumni->getAllFromDatabase();
				if ($query->num_rows()>0)
				{
					foreach ($query->result() as $row)
					{
						//bukan pesan
						$notifikasi['Username'] = $row->Username;
						$notifikasi['Password'] = $row->Password;
						$notifikasi['NamaLengkap'] = $row->NamaLengkap;
						$notifikasi['NamaLengkapAtas'] = $this->session->userdata('namalengkap');
						$notifikasi['NamaPanggilan'] = $row->NamaPanggilan;
						$notifikasi['JenisKelamin'] = $row->JenisKelamin;
						$notifikasi['TempatLahir'] = $row->TempatLahir;
						$notifikasi['TanggalLahir'] = $row->TanggalLahir;
						$notifikasi['Lembaga'] = $row->Lembaga;
						$notifikasi['TahunLulus'] = $row->TahunLulus;
						$notifikasi['Cabang'] = $row->Cabang;
						$notifikasi['AlamatAsal'] = $row->AlamatAsal;
						$notifikasi['AlamatSekarang'] = $row->AlamatSekarang;
						$notifikasi['Facebook'] = $row->Facebook;
						$notifikasi['Twitter'] = $row->Twitter;
						$notifikasi['Blog'] = $row->Blog;
						$notifikasi['Email'] = $row->Email;
						$notifikasi['NoHP'] = $row->NoHP;
						$notifikasi['Hobi'] = $row->Hobi;
						$notifikasi['Cita_Cita'] = $row->Cita_Cita; 
						$notifikasi['Motto'] = $row->Motto;
						$notifikasi['Prestasi'] = $row->Prestasi;
						$notifikasi['TempatKuliah'] = $row->TempatKuliah;
						$notifikasi['TempatKerja'] = $row->TempatKerja;
						$notifikasi['Kesibukan'] = $row->Kesibukan;
						$notifikasi['NamaOrtu'] = $row->NamaOrtu;
						$notifikasi['PendidikanOrtu'] = $row->PendidikanOrtu;
						$notifikasi['PekerjaanOrtu'] = $row->PekerjaanOrtu;
						$notifikasi['KontakOrtu'] = $row->KontakOrtu;
						//pesan error
						$notifikasi['nama_lengkap_kosong'] = $this->session->flashdata('nama_lengkap_kosong');
						$notifikasi['jenis_kelamin_kosong'] = $this->session->flashdata('jenis_kelamin_kosong');
						$notifikasi['nama_lembaga_kosong'] = $this->session->flashdata('nama_lembaga_kosong');
						$notifikasi['tahun_lulus_kosong'] = $this->session->flashdata('tahun_lulus_kosong');
						$notifikasi['username_kosong'] = $this->session->flashdata('username_kosong');
						$notifikasi['password_kosong'] = $this->session->flashdata('password_kosong');
						$notifikasi['ulangi_password_kosong'] = $this->session->flashdata('ulangi_password_kosong');
						$notifikasi['nama_lembaga_tidak_terdaftar'] = $this->session->flashdata('nama_lembaga_tidak_terdaftar');
						$notifikasi['format_email_salah'] = $this->session->flashdata('format_email_salah');
						$notifikasi['username_sudah_ada'] = $this->session->flashdata('username_sudah_ada');
						$notifikasi['password_dan_ulangi_password_tidak_sama'] = $this->session->flashdata('password_dan_ulangi_password_tidak_sama');
					}
				}
				$this->load->view('view_ubahdataalumni', $notifikasi);
			}
			else
			{
				$this->load->helper('url');
				redirect('home','location');
			}
		}
		public function hapusdataalumni($user)
		{
			$this->load->library('session');
			$username = $this->session->userdata('username');
			if ($username==false)
			{
				$this->load->helper('url');
				redirect('home','location');
			}
			else if ($username[0]=='A')
			{
				$this->load->model('Alumni');
				$this->Alumni->deleteThatUsernameFromDatabase($user);
				
				$this->session->set_flashdata('hapus_data_alumni_berhasil',"Anda berhasil menghapus akun alumni dengan username $user");
				
				$this->load->helper('url');
				redirect('home','location');
			}
			else 
			{
				//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
				$this->load->helper('url');
				redirect('home','location');
			}
		}
		public function do_tambahakunadmin()
		{
			$this->load->library('session');
			$username = $this->session->userdata('username');
			if ($username==false)
			{
				$this->load->helper('url');
				redirect('home','location');
			}
			else if ($username[0]=='A')
			{
				if ($this->input->post('inputNama')==''
					|| $this->input->post('inputUsername')=='' 
					|| $this->input->post('inputPassword')=='' 
					|| $this->input->post('inputKonfirmasiPassword')=='')
				{
					if ($this->input->post('inputNama')=='') $this->session->set_flashdata('nama_kosong','Nama Lengkap harus diisi');
					if ($this->input->post('inputUsername')=='') $this->session->set_flashdata('username_kosong','Username harus diisi');
					if ($this->input->post('inputPassword')=='') $this->session->set_flashdata('password_kosong','Password harus diisi');
					if ($this->input->post('inputKonfirmasiPassword')=='') $this->session->set_flashdata('konfirmasi_password_kosong','Konfirmasi Password harus diisi');
					$this->load->helper('url');
					redirect('pilihadmin/tambahakunadmin','location');
				}
				else if ($this->input->post('inputPassword')!=$this->input->post('inputKonfirmasiPassword'))
				{
					$this->session->set_flashdata('password_dan_konfirmasi_password_tidak_sesuai','Konfirmasi Password tidak sesuai');
					$this->load->helper('url');
					redirect('pilihadmin/tambahakunadmin','location');
				}
				
				$this->load->model('Admin');
				$this->Admin->setUsername($this->input->post('inputUsername'));
				$this->Admin->setPassword($this->input->post('inputPassword'));
				$this->Admin->setNamaLengkap($this->input->post('inputNama'));
				
				$query = $this->Admin->getAllFromDatabase();
				if ($query->num_rows()>0)
				{
					$this->session->set_flashdata('username_sudah_ada','Username sudah ada! Silahkan masukkan username lain');
					$this->load->helper('url');
					redirect('pilihadmin/tambahakunadmin','location');
				}
				
				$query = $this->Admin->addToDatabase();
				$this->session->set_flashdata('tambah_akun_admin_berhasil','Anda berhasil menambah satu akun admin');
				
				$this->load->helper('url');
				redirect('home','location');
			}
			else 
			{
				//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
				$this->load->helper('url');
				redirect('home','location');
			}
		}
		public function do_ubahdataadmin()
		{
			$this->load->library('session');
			$username = $this->session->userdata('username');
			if ($username==false)
			{
				$this->load->helper('url');
				redirect('home','location');
			}
			else if ($username[0]=='A')
			{
				$this->load->model('Admin');
				$this->Admin->setUsername($username);
				$this->Admin->setPassword($this->input->post('inputPasswordBaru'));
				$this->Admin->setNamaLengkap($this->input->post('inputNama'));
				
				$query = $this->Admin->updateDatabase();
				
				//echo $this->input->post('inputUsername') . "<br>";
				//echo $this->input->post('inputPasswordBaru') . "<br>";
				//echo $this->input->post('inputNama') . "<br>";
				$this->load->helper('url');
				redirect('home','location');
			}
			else 
			{
				//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
				$this->load->helper('url');
				redirect('home','location');
			}
		}
		public function do_tambahakun()
		{
			$this->load->library('session');
			$username = $this->session->userdata('username');
			if ($username==false)
			{
				$this->load->helper('url');
				redirect('home','location');
			}
			else if ($username[0]=='A')
			{
				if ($this->input->post('namaLengkap')==''
				    || $this->input->post('inputJenisKelamin')==''
					|| $this->input->post('inputCabangLembaga')==''
					|| $this->input->post('tahunLulus')==''
					|| $this->input->post('inputUsername')==''
					|| $this->input->post('inputPassword')==''
					|| $this->input->post('inputUlangiPassword')=='')
				{
					if ($this->input->post('namaLengkap')=='') $this->session->set_flashdata('nama_lengkap_kosong','Nama Lengkap harus diisi');
					if ($this->input->post('inputJenisKelamin')=='') $this->session->set_flashdata('jenis_kelamin_kosong','Jenis Kelamin harus diisi');
					if ($this->input->post('inputCabangLembaga')=='') $this->session->set_flashdata('nama_lembaga_kosong','Nama Lembaga harus diisi');
					if ($this->input->post('tahunLulus')=='') $this->session->set_flashdata('tahun_lulus_kosong','Tahun Lulus harus diisi');
					if ($this->input->post('inputUsername')=='') $this->session->set_flashdata('username_kosong','Username harus diisi');
					if ($this->input->post('inputPassword')=='') $this->session->set_flashdata('password_kosong','Password harus diisi');
					if ($this->input->post('inputUlangiPassword')=='') $this->session->set_flashdata('ulangi_password_kosong','Ulangi/Konfirmasi Password harus diisi');
				
					$this->load->helper('url');
					redirect('pilihadmin/tambahakun','location');
				}
				
				if ($this->input->post('inputCabangLembaga')!='MA Unggulan Amanatul Ummah Surabaya'
				    && $this->input->post('inputCabangLembaga')!='MA Akselerasi Amanatul Ummah Surabaya'
					&& $this->input->post('inputCabangLembaga')!='SMA Unggulan Amanatul Ummah Surabaya'
					&& $this->input->post('inputCabangLembaga')!='MBI Amanatul Ummah Surabaya'
					&& $this->input->post('inputCabangLembaga')!='MA Akselerasi Amanatul Ummah Pacet'
					&& $this->input->post('inputCabangLembaga')!='MBI Amanatul Ummah Pacet'
					&& $this->input->post('inputCabangLembaga')!='SMA Berbasis Pesantren Amanatul Ummah Pacet'
					&& $this->input->post('inputCabangLembaga')!='SMA Bendungan Jati Hikmatul Amanah Pacet')
				{
					$this->session->set_flashdata('nama_lembaga_tidak_terdaftar','Nama Lembaga tidak terdaftar');
					
					$this->load->helper('url');
					redirect('pilihadmin/tambahakun','location');
				}
				
				$apakah_email_sah = false;
				$posisi_at;
				$banyak_at = 0;
				$panjang = strlen($this->input->post('inputEmail'));
				for ($i=0;$i<$panjang;$i++)
				{
					if ($this->input->post('inputEmail')[$i]=='@')
					{
						$posisi_at = $i;
						$banyak_at++;
						if ($banyak_at>1) break;
					}
				}
				if ($posisi_at==0)
				{
					$this->session->set_flashdata('format_email_salah','Format penulisan email salah');
					$this->load->helper('url');
					redirect('pilihadmin/tambahakun','location');
				}
				else if ($posisi_at==($panjang-1))
				{
					$this->session->set_flashdata('format_email_salah','Format penulisan email salah');
					$this->load->helper('url');
					redirect('pilihadmin/tambahakun','location');
				}
				else if ($banyak_at>1)
				{
					$this->session->set_flashdata('format_email_salah','Format penulisan email salah');
					$this->load->helper('url');
					redirect('pilihadmin/tambahakun','location');
				}
				
				if ($this->input->post('inputPassword')!=$this->input->post('inputUlangiPassword'))
				{
					$this->session->set_flashdata('password_dan_ulangi_password_tidak_sama','Konfirmasi Password tidak sesuai');
					$this->load->helper('url');
					redirect('pilihadmin/tambahakun','location');
				}
				
				$this->load->model('Alumni');
				$this->Alumni->setUsername($this->input->post('inputUsername'));
				$query = $this->Alumni->getUsernameFromDatabase();
				if ($query->num_rows()>0)
				{
					$this->session->set_flashdata('username_sudah_ada','Username sudah ada! Silahkan masukkan username lain');
					$this->load->helper('url');
					redirect('pilihadmin/tambahakun','location');
				}
				
				$this->Alumni->setPassword($this->input->post('inputPassword'));
				$this->Alumni->setNamaLengkap($this->input->post('namaLengkap'));
				$this->Alumni->setNamaPanggilan($this->input->post('namaPanggilan'));
				$this->Alumni->setJenisKelamin($this->input->post('inputJenisKelamin'));
				$this->Alumni->setTempatLahir($this->input->post('inputTempatLahir'));
				$this->Alumni->setTanggalLahir($this->input->post('inputTanggalLahir'));
				$this->Alumni->setLembaga($this->input->post('inputCabangLembaga'));
				$this->Alumni->setTahunLulus($this->input->post('tahunLulus'));
				$this->Alumni->setCabang($this->input->post('inputCabang'));
				$this->Alumni->setAlamatAsal($this->input->post('inputAlamatAsal'));
				$this->Alumni->setAlamatSekarang($this->input->post('inputAlamatSekarang'));
				$this->Alumni->setFacebook($this->input->post('inputLinkFB'));
				$this->Alumni->setTwitter($this->input->post('inputIDTwitter'));
				$this->Alumni->setBlog($this->input->post('inputAlamatBlog'));
				$this->Alumni->setEmail($this->input->post('inputEmail'));
				$this->Alumni->setNoHP($this->input->post('inputNoHP'));
				$this->Alumni->setHobi($this->input->post('inputHobi'));
				$this->Alumni->setCita_Cita($this->input->post('inputCita'));
				$this->Alumni->setMotto($this->input->post('inputMotto'));
				$this->Alumni->setPrestasi($this->input->post('inputPrestasi'));
				$this->Alumni->setTempatKuliah($this->input->post('inputKuliah'));
				$this->Alumni->setTempatKerja($this->input->post('inputBekerja'));
				$this->Alumni->setKesibukan($this->input->post('inputAktifOrganisasi'));
				$this->Alumni->setNamaOrtu($this->input->post('inputNamaOrangTua'));
				$this->Alumni->setPendidikanOrtu($this->input->post('inputPendidikanTerakhir'));
				$this->Alumni->setPekerjaanOrtu($this->input->post('inputPekerjaan'));
				$this->Alumni->setKontakOrtu($this->input->post('inputKontakOrtu'));
				$this->Alumni->setLinkFoto('');
				
				$query = $this->Alumni->addToDatabase();
				$this->session->set_flashdata('tambah_akun_berhasil','Anda berhasil menambah satu akun alumni');
				
				$this->load->helper('url');
				redirect('home','location');
				//echo $this->input->post('inputTanggalLahir');
			}
			else 
			{
				//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
				$this->load->helper('url');
				redirect('home','location');
			}
		}
		public function do_gantidataalumni()
		{
			$this->load->library('session');
			$username = $this->session->userdata('username');
			if ($username==false)
			{
				$this->load->helper('url');
				redirect('home','location');
			}
			else if ($username[0]=='A')
			{
				if ($this->input->post('namaLengkap')==''
				    || $this->input->post('inputJenisKelamin')==''
					|| $this->input->post('inputCabangLembaga')==''
					|| $this->input->post('tahunLulus')==''
					|| $this->input->post('inputUsername')==''
					|| $this->input->post('inputPassword')==''
					|| $this->input->post('inputUlangiPassword')=='')
				{
					if ($this->input->post('namaLengkap')=='') $this->session->set_flashdata('nama_lengkap_kosong','Nama Lengkap harus diisi');
					if ($this->input->post('inputJenisKelamin')=='') $this->session->set_flashdata('jenis_kelamin_kosong','Jenis Kelamin harus diisi');
					if ($this->input->post('inputCabangLembaga')=='') $this->session->set_flashdata('nama_lembaga_kosong','Nama Lembaga harus diisi');
					if ($this->input->post('tahunLulus')=='') $this->session->set_flashdata('tahun_lulus_kosong','Tahun Lulus harus diisi');
					if ($this->input->post('inputUsername')=='') $this->session->set_flashdata('username_kosong','Username harus diisi');
					if ($this->input->post('inputPassword')=='') $this->session->set_flashdata('password_kosong','Password harus diisi');
					if ($this->input->post('inputUlangiPassword')=='') $this->session->set_flashdata('ulangi_password_kosong','Ulangi/Konfirmasi Password harus diisi');
				
					$this->load->helper('url');
					$alamat = $this->input->post('alamatUsernameTujuan');
					redirect("pilihadmin/gantidataalumni/$alamat",'location');
				}
				
				if ($this->input->post('inputCabangLembaga')!='MA Unggulan Amanatul Ummah Surabaya'
				    && $this->input->post('inputCabangLembaga')!='MA Akselerasi Amanatul Ummah Surabaya'
					&& $this->input->post('inputCabangLembaga')!='SMA Unggulan Amanatul Ummah Surabaya'
					&& $this->input->post('inputCabangLembaga')!='MBI Amanatul Ummah Surabaya'
					&& $this->input->post('inputCabangLembaga')!='MA Akselerasi Amanatul Ummah Pacet'
					&& $this->input->post('inputCabangLembaga')!='MBI Amanatul Ummah Pacet'
					&& $this->input->post('inputCabangLembaga')!='SMA Berbasis Pesantren Amanatul Ummah Pacet'
					&& $this->input->post('inputCabangLembaga')!='SMA Bendungan Jati Hikmatul Amanah Pacet')
				{
					$this->session->set_flashdata('nama_lembaga_tidak_terdaftar','Nama Lembaga tidak terdaftar');
					
					$this->load->helper('url');
					$alamat = $this->input->post('alamatUsernameTujuan');
					redirect("pilihadmin/gantidataalumni/$alamat",'location');
				}
				
				$apakah_email_sah = false;
				$posisi_at;
				$banyak_at = 0;
				$panjang = strlen($this->input->post('inputEmail'));
				for ($i=0;$i<$panjang;$i++)
				{
					if ($this->input->post('inputEmail')[$i]=='@')
					{
						$posisi_at = $i;
						$banyak_at++;
						if ($banyak_at>1) break;
					}
				}
				if ($posisi_at==0)
				{
					$this->session->set_flashdata('format_email_salah','Format penulisan email salah');
					$this->load->helper('url');
					$alamat = $this->input->post('alamatUsernameTujuan');
					redirect("pilihadmin/gantidataalumni/$alamat",'location');
				}
				else if ($posisi_at==($panjang-1))
				{
					$this->session->set_flashdata('format_email_salah','Format penulisan email salah');
					$this->load->helper('url');
					$alamat = $this->input->post('alamatUsernameTujuan');
					redirect("pilihadmin/gantidataalumni/$alamat",'location');
				}
				else if ($banyak_at>1)
				{
					$this->session->set_flashdata('format_email_salah','Format penulisan email salah');
					$this->load->helper('url');
					$alamat = $this->input->post('alamatUsernameTujuan');
					redirect("pilihadmin/gantidataalumni/$alamat",'location');
				}
				
				if ($this->input->post('inputPassword')!=$this->input->post('inputUlangiPassword'))
				{
					$this->session->set_flashdata('password_dan_ulangi_password_tidak_sama','Konfirmasi Password tidak sesuai');
					$this->load->helper('url');
					$alamat = $this->input->post('alamatUsernameTujuan');
					redirect("pilihadmin/gantidataalumni/$alamat",'location');
				}
				
				$this->load->model('Alumni');
				$this->Alumni->setUsername($this->input->post('inputUsername'));
				$this->Alumni->setPassword($this->input->post('inputPassword'));
				$this->Alumni->setNamaLengkap($this->input->post('namaLengkap'));
				$this->Alumni->setNamaPanggilan($this->input->post('namaPanggilan'));
				$this->Alumni->setJenisKelamin($this->input->post('inputJenisKelamin'));
				$this->Alumni->setTempatLahir($this->input->post('inputTempatLahir'));
				$this->Alumni->setTanggalLahir($this->input->post('inputTanggalLahir'));
				$this->Alumni->setLembaga($this->input->post('inputCabangLembaga'));
				$this->Alumni->setTahunLulus($this->input->post('tahunLulus'));
				$this->Alumni->setCabang($this->input->post('inputCabang'));
				$this->Alumni->setAlamatAsal($this->input->post('inputAlamatAsal'));
				$this->Alumni->setAlamatSekarang($this->input->post('inputAlamatSekarang'));
				$this->Alumni->setFacebook($this->input->post('inputLinkFB'));
				$this->Alumni->setTwitter($this->input->post('inputIDTwitter'));
				$this->Alumni->setBlog($this->input->post('inputAlamatBlog'));
				$this->Alumni->setEmail($this->input->post('inputEmail'));
				$this->Alumni->setNoHP($this->input->post('inputNoHP'));
				$this->Alumni->setHobi($this->input->post('inputHobi'));
				$this->Alumni->setCita_Cita($this->input->post('inputCita'));
				$this->Alumni->setMotto($this->input->post('inputMotto'));
				$this->Alumni->setPrestasi($this->input->post('inputPrestasi'));
				$this->Alumni->setTempatKuliah($this->input->post('inputKuliah'));
				$this->Alumni->setTempatKerja($this->input->post('inputBekerja'));
				$this->Alumni->setKesibukan($this->input->post('inputAktifOrganisasi'));
				$this->Alumni->setNamaOrtu($this->input->post('inputNamaOrangTua'));
				$this->Alumni->setPendidikanOrtu($this->input->post('inputPendidikanTerakhir'));
				$this->Alumni->setPekerjaanOrtu($this->input->post('inputPekerjaan'));
				$this->Alumni->setKontakOrtu($this->input->post('inputKontakOrtu'));
				
				$query = $this->Alumni->updateDatabase();
				$this->session->set_flashdata('ganti_data_alumni_berhasil',"Anda berhasil mengubah satu akun alumni");
				
				$this->load->helper('url');
				redirect('home','location');
			}
			else
			{
				//header('location : ../home'); nggak bisa gini kalo di CodeIgniter
				$this->load->helper('url');
				redirect('home','location');
			}
		}
	}
	
?>