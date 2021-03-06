<div class="modal fade" id="modal-create" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data {{$data}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" id="form-upload-preview" method="POST" action="{{ route($route) }}">
                @csrf
                <div class="modal-body">
                    @if($data === 'Tahun Ajaran')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tahun Ajaran</label>
                            <input type="text" class="form-control col-sm-8" name="tahun_ajaran" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Semester</label>
                            <select class="form-control col-sm-8" name="semester">
                                <option selected disabled>--Semester--</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Status</label>
                            <select class="form-control col-sm-8" name="status">
                                <option selected disabled>--Status--</option>
                                <option value="1">Aktif</option>
                                <option value="0">Selesai</option>
                            </select>
                        </div>
                    @elseif ($data === 'Jurusan')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Nama Jurusan</label>
                            <input type="text" class="form-control col-sm-8" name="jurusan" placeholder="Contoh: Teknik Komputer Jaringan" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Kode Jurusan</label>
                            <input type="text" class="form-control col-sm-8" name="kode_jurusan" placeholder="TKJ" required>
                        </div>
                    @elseif ($data === 'Kelas')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                            <select class="form-control col-sm-8" name="m_jurusans_id">
                                <option selected disabled>--Jurusan--</option>
                                @foreach ($jurusan as $item)
                                <option value="{{$item->id}}">{{$item->jurusan}} ({{$item->kode_jurusan}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tingkat</label>
                            <select class="form-control col-sm-8" name="tingkat">
                                <option selected disabled>--Tingkat--</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Ruangan</label>
                            <select class="form-control col-sm-8" name="ruangan">
                                <option selected disabled>--Ruangan--</option>
                                <option value="Satu">Satu</option>
                                <option value="Dua">Dua</option>
                                <option value="Tiga">Tiga</option>
                            </select>
                        </div>
                    @elseif($data === 'Mata Pelajaran Umum')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Golongan</label>
                            <select class="form-control col-sm-8" name="golongan">
                                <option selected disabled>--Golongan--</option>
                                <option value="A. Muatan Nasional">A. Muatan Nasional</option>
                                <option value="B. Muatan Kewilayahan">B. Muatan Kewilayahan</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tingkat</label>
                            <select class="form-control col-sm-8" name="tingkat">
                                <option selected disabled>--Tingkat--</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control col-sm-8" name="mapel" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">KKM</label>
                            <input type="number" class="form-control col-sm-8" name="kkm" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Guru</label>
                            <select class="form-control col-sm-8" name="guru_id">
                                <option selected disabled>--Guru--</option>
                                @foreach ($guru as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @elseif($data === 'Mata Pelajaran Kejuruan')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                            <select class="form-control col-sm-8" name="m_jurusan_id">
                                <option selected disabled>--Jurusan--</option>
                                @foreach ($jurusan as $jur)
                                <option value="{{$jur->id}}">{{$jur->jurusan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Golongan</label>
                            <select class="form-control col-sm-8" name="golongan">
                                <option selected disabled>--Golongan--</option>
                                <option value="C1. Dasar Bidang Keahlian">C1. Dasar Bidang Keahlian</option>
                                <option value="C2. Dasar Program Keahlian">C2. Dasar Program Keahlian</option>
                                <option value="C3. Kompetensi Keahlian">C3. Kompetensi Keahlian</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control col-sm-8" name="mapel" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tingkat</label>
                            <select class="form-control col-sm-8" name="tingkat">
                                <option selected disabled>--Tingkat--</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">KKM</label>
                            <input type="number" class="form-control col-sm-8" name="kkm" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Guru</label>
                            <select class="form-control col-sm-8" name="guru_id">
                                <option selected disabled>--Guru--</option>
                                @foreach ($guru as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @elseif($data === 'Ekstrakulikuler')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Ekstrakulikuler</label>
                            <input type="text" class="form-control col-sm-8" name="nama_eskul" required>
                        </div>
                    @elseif($data === 'Guru')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Nama Guru</label>
                            <input type="text" class="form-control col-sm-8" name="name" placeholder="Contoh: Abdul S.Pd" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">NIP</label>
                            <input type="text" class="form-control col-sm-8" name="username" placeholder="Contoh: 74362351982" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Email</label>
                            <input type="email" class="form-control col-sm-8" name="email" placeholder="Contoh: abdul@gmail.com" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">No. HP</label>
                            <input type="text" class="form-control col-sm-8" name="nohp" placeholder="Contoh: 0812345678" required>
                        </div>
                    @elseif($data === 'Kelas Siswa')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="ta_id" id="ta_id">
                                    <option selected disabled>--Tahun Ajaran--</option>
                                    @foreach ($ta as $t)
                                    <option value="{{$t->id}}">{{$t->tahun_ajaran}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="m_jurusan_id" id="m_jurusan_id">
                                    <option selected disabled>--Jurusan--</option>
                                    @foreach ($jurusan as $item)
                                    <option value="{{$item->id}}">{{$item->jurusan}} ({{$item->kode_jurusan}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tingkat</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="tingkat" id="tingkat">
                                    <option selected disabled>--Tingkat--</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Ruangan</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="ruangan" id="ruangan">
                                    <option selected disabled>--Ruangan--</option>
                                    <option value="Satu">Satu</option>
                                    <option value="Dua">Dua</option>
                                    <option value="Tiga">Tiga</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Wali Kelas</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="wali_kelas_id" id="wali_kelas_id">
                                    <option selected disabled>--Wali Kelas--</option>
                                    @foreach ($guru as $g)
                                    <option value="{{$g->id}}">{{$g->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @elseif($data === 'Siswa')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Nama Siswa</label>
                            <input type="text" class="form-control col-sm-8" name="name" placeholder="Contoh: Abdul" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">NISN</label>
                            <input type="number" class="form-control col-sm-8" name="username" placeholder="Contoh: Abdul" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tahun Angkatan</label>
                            <select class="form-control col-sm-8" name="angkatan" id="angkatan">
                                <option selected disabled>--Tahun Angkatan--</option>
                                @foreach ($t as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <div class="form-group mb-0 float-right">
                        <button type="button" class="btn btn-dark waves-effect waves-light" data-dismiss="modal" aria-label="Close">Batal</button>
                        <button type="submit" id="btn-upload-preview" class="btn btn-info bg-kaneza waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>