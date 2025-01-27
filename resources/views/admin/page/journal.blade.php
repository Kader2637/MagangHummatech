@extends('admin.layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .image-container {
            position: relative;
            width: 100%;
        }

        .break-word {
            word-wrap: break-word;
        }

        .image-container img {
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.5s;
        }

        .overlay a {
            color: #fff;
            margin: 0 10px;
            font-size: 20px;
        }

        .overlay a:hover {
            color: #ddd;
        }

        .image-container:hover .overlay {
            opacity: 1;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-2 align-items-center">
                <div class="col-sm-5">
                    <h3 class="mx-3">Data Jurnal</h3>
                    <div class="step-arrow-nav mb-4 pt-3 mx-3">
                        <ul class="nav nav-pills custom-nav nav-justified"role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-gen-info" type="button" role="tab"
                                    aria-controls="steparrow-gen-info" aria-controls="steparrow-gen-info"
                                    aria-selected="true" data-position="0">
                                    Semua
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="steparrow-description-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#steparrow-description-info" type="button" role="tab"
                                    aria-controls="steparrow-description-info" aria-selected="false" data-position="1"
                                    tabindex="-1">
                                    Mengisi
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-experience" type="button" role="tab"
                                    aria-controls="pills-experience" aria-selected="false" data-position="2" tabindex="-1">
                                    Tidak Mengisi
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-auto ms-auto pt-4">
                    <form action="/journal" class="d-flex flex-column flex-sm-row mb-2">
                        <div class="mb-2 me-sm-2">
                            <input type="text" class="form-control" name="name" value="{{ request()->name }}" id="searchMemberList" placeholder="Cari Siswa...">
                        </div>
                        <div class="mb-2 d-sm-none">
                            <button class="btn btn-primary w-100" type="submit">
                                <i class="ri-search-line search-icon"></i> Cari
                            </button>
                        </div>
                        <div class="mx-sm-2 mb-2">
                            <input type="date" name="created_at" value="{{ request()->created_at }}" class="form-control" id="exampleInputdate">
                        </div>
                        <div>
                            <button class="btn btn-primary w-100" type="submit">Cari</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


    <div class="tab-content">
        <div id="steparrow-gen-info" class="tab-pane fade show active">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex justify-content-between mx-3">
                            <div class="d-flex gap-2">
                                <p class="m-0">Show</p>
                                <select name="" id="">
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <p class="m-0">entries</p>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body mx-3">
                            <div class="live-preview ">
                                <div class="table-responsive table-card">
                                    <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col" style="width: 150px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($adminJournalAll as $journal)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="name">{{ $journal->student->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($journal->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                                    </td>
                                                    <td class="status">
                                                        <?php
                                                        if ($journal->status === 'fillin') {
                                                            echo '<span class="badge bg-success-subtle text-success text-uppercase">MENGISI</span>';
                                                        } else {
                                                            echo '<span class="badge bg-danger-subtle text-danger text-uppercase">TIDAK MENGISI</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="description">
                                                        {!! Str::limit($journal->description, 50) !!}
                                                    </td>
                                                    <td>
                                                        <div class="view">
                                                            <button class="btn btn-soft-primary  edit-item-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#showModal_{{ $journal->id }}">
                                                                <i class=" ri-eye-line"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8">
                                                        <div class="d-flex justify-content-center mt-3">
                                                            <img src="{{ asset('no data.png') }}" width="200px"
                                                                alt="">
                                                        </div>
                                                        <h4 class="text-center mt-2 mb-4">
                                                            Data Masih kosong
                                                        </h4>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="pt-2">
                                        {{ $adminJournalAll->appends(request()->except('all_page'))->links('pagination::bootstrap-4', ['paginator' => $adminJournalAll, 'pageName' => 'all_page']) }}
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div>
                </div>
            </div>

        </div>


        <div id="steparrow-description-info" class="tab-pane fade">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex justify-content-between mx-3">
                            <div class="d-flex gap-2">
                                <p class="m-0">Show</p>
                                <select name="" id="">
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <p class="m-0">entries</p>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body mx-3">
                            <div class="live-preview ">
                                <div class="table-responsive table-card">
                                    <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                        <thead class="table-light">
                                            <tr>

                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col" style="width: 150px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($adminJournalFillIn as $journal)
                                                <tr>
                                                    <td class="number">{{ $loop->iteration }}</td>
                                                    <td class="name">{{ $journal->student->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($journal->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                                    </td>
                                                    <td class="status">
                                                        <?php
                                                        if ($journal->status === 'fillin') {
                                                            echo '<span class="badge bg-success-subtle text-success text-uppercase">MENGISI</span>';
                                                        } else {
                                                            echo '<span class="badge bg-danger-subtle text-danger text-uppercase">TIDAK MENGISI</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="description">
                                                        {!! Str::limit($journal->description, 50) !!}
                                                    </td>
                                                    <td>
                                                        <div class="view">
                                                            <button class="btn btn-soft-primary edit-item-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#showModal_{{ $journal->id }}">
                                                                <i class="ri-eye-line"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8">
                                                        <div class="d-flex justify-content-center mt-3">
                                                            <img src="{{ asset('no data.png') }}" width="200px"
                                                                alt="">
                                                        </div>
                                                        <h4 class="text-center mt-2 mb-4">
                                                            Data Masih kosong
                                                        </h4>
                                                    </td>
                                                </tr>
                                                
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="pt-2">
                                        {{ $adminJournalFillIn->appends(request()->except('fillin_page'))->links('pagination::bootstrap-4', ['paginator' => $adminJournalFillIn, 'pageName' => 'fillin_page']) }}
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div>
                </div>
            </div>

        </div>

        <div id="pills-experience" class="tab-pane fade">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex justify-content-between mx-3">
                            <div class="d-flex gap-2">
                                <p class="m-0">Show</p>
                                <select name="" id="">
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <p class="m-0">entries</p>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body mx-3">
                            <div class="live-preview ">
                                <div class="table-responsive table-card">
                                    <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col" style="width: 150px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($adminJournalNotFilling as $index => $journal)
                                                @if ($journal !== 'fillin')
                                                <tr>
                                                    <td class="number">{{ ++$index }}</td>
                                                    <td class="name">{{ $journal->student->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($journal->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
                                                    <td class="status">
                                                        <?php
                                                        if ($journal->status === 'fillin') {
                                                            echo '<span class="badge bg-success-subtle text-success text-uppercase">MENGISI</span>';
                                                        } else {
                                                            echo '<span class="badge bg-danger-subtle text-danger text-uppercase">TIDAK MENGISI</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="description">
                                                        {!! Str::limit($journal->description, 50) !!}
                                                    </td>
                                                    <td>
                                                        <div class="view">
                                                            <button class="btn btn-soft-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal_{{ $journal->id }}">
                                                                <i class="ri-eye-line"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            @empty
                                                <tr>
                                                    <td colspan="8">
                                                        <div class="d-flex justify-content-center mt-3">
                                                            <img src="{{ asset('no data.png') }}" width="200px" alt="">
                                                        </div>
                                                        <h4 class="text-center mt-2 mb-4">
                                                            Data Masih kosong
                                                        </h4>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="pt-2">
                                        {{-- {{ $adminJournalNotFilling->appends(request()->except('notfilling_page'))->links('pagination::bootstrap-4', ['paginator' => $adminJournalNotFilling, 'pageName' => 'notfilling_page']) }} --}}
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($adminJournalAll as $journal)
        <div class="modal fade" id="showModal_{{ $journal->id }}" tabindex="-1"
            aria-labelledby="showModalLabel_{{ $journal->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showModalLabel">Detail Jurnal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h5 class="text-border">Nama :</h5>
                            <p id="modalName">{{ $journal->student->name }}</p>
                        </div>
                        <div>
                            <h5  class="text-border">Tanggal :</h5>
                            <td>{{ \Carbon\Carbon::parse($journal->updated_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                            </td>
                        </div>
                        <div>
                            <h5 class="pt-3 text-border">Jam :</h5>
                            <p>{{ \Carbon\Carbon::parse($journal->created_at)->format('H:i') }}</p>
                        </div>
                        <div>
                            <h5  class="text-border">Kegiatan :</h5>
                            <p class="break-word">
                                {{ $journal->description }}
                            </p>
                        </div>
                        <div>
                            <h5  class="text-border">Bukti :</h5>
                            <p id="modalName">
                            <div class="image-container">
                                <img src="{{ asset('storage/' . $journal->image) }}" alt="My Image"
                                    style="width: 100%; height: auto;">
                                <div class="overlay">
                                    <a href="{{ asset('storage/' . $journal->image) }}" class="image-popup"
                                        data-modal-id="showModal_{{ $journal->id }}" title="My Image">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ asset('storage/' . $journal->image) }}" download>
                                        <i class="ri-download-2-line"></i>
                                    </a>
                                </div>
                            </div>
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection


@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script>
        $('.image-popup').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true
            },
            callbacks: {
                beforeOpen: function() {
                    var modalId = this.st.el.attr('data-modal-id');
                    $('#' + modalId).modal('hide');
                },
                afterClose: function() {
                    var modalId = this.st.el.attr('data-modal-id');
                    $('#' + modalId).modal('show');
                }
            }
        });
    </script>
@endsection
