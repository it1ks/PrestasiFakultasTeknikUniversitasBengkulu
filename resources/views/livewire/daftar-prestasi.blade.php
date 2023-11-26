<div class="content-wrapper">
    @include('partials.loading')
    <div class="container-xxl flex-grow-1 container-p-y ">
        <!-- Layout -->
        <div class="card">
            <h3 class="text-primary container mt-3">
                Daftar Prestasi Mahasiswa</a>
            </h3>
            <div class=" mb-3 d-flex justify-content-between container">
                @include('partials.dataTable')
                
                <div class="d-flex gap-2 align-items-center nav-item p-1 rounded" style="background-color: #e1e1e1">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none text-black" placeholder="Search..."
                        wire:model.live='search' class="bg-white" />
                </div>
            </div>
            @php
                $isEmpty = false;
            @endphp
            <div class="container my-2">
                <div class="table-responsive text-nowrap rounded mb-3">
                    <table class="table table-striped">
                        <thead class="table-secondary">
                            <tr style="color: rgb(23, 23, 23)">
                                <th class="fw-bold fs-6">No</th>
                                <th class="fw-bold fs-6">Nama</th>
                                <th class="fw-bold fs-6">Npm</th>
                                <th class="fw-bold fs-6">Jurusan</th>
                                <th class="fw-bold fs-6">nama prestasi</th>
                                <th class="fw-bold fs-6">Jenis Prestasi</th>
                                <th class="fw-bold fs-6">tingkat prestasi</th>
                                <th class="fw-bold fs-6">juara</th>
                                <th class="fw-bold fs-6">aksi</th>
                            </tr>
                        </thead>
                        @foreach ($datas as $data)
                            @php
                                $isEmpty = true;
                            @endphp
                            <tbody class="table-border-bottom-0" wire:loading.remove>
                                <td class="">{{ $loop->iteration }}</td>
                                <td class=" text-uppercase fw-bold">{{ $data->user->nama }}</td>
                                <td class="">{{ $data->user->npm_nip }}</td>
                                <td class="">{{ $data->user->jurusan }}</td>
                                <td class="">{{ $data->nama_prestasi }}</td>
                                <td class="">{{ $data->jenis_prestasi }}</td>
                                <td class="">{{ $data->pengajuan->tingkat_prestasi }}</td>
                                <td class="">{{ $data->pengajuan->juara }}</td>
                                <td>

                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('dataMahasiswa', encrypt($data->id)) }}"><i
                                                class='bx bxs-book-alt'></i> Data
                                            Mahasiswa</a>

                                        <a class="dropdown-item" onclick="return confirm('Hapus Data Pengguna ?')"
                                            href="{{ route('hapusPrestasi', encrypt($data->id)) }}"><i
                                                class="bx bx-trash me-1"></i> Hapus</a>
                                    </div>
                                </td>
                            </tbody>
                        @endforeach
                    </table>
                    @if (!$isEmpty)
                        <div class="text-secondary w-100 d-flex justify-content-center align-items-center mt-2"
                            style="opacity: 75%">
                            <h4>--Data Prestasi kosong--</h4>
                        </div>
                    @endif
                </div>
                <div class="paginate">
                    @include('partials.paginate')
                </div>

            </div>
        </div>
        {{-- </div> --}}
    </div>
