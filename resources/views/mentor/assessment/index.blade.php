@extends('mentor.layouts.app')
@section('content')

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Penilaian</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Penilaian</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="{{ asset('assets-user/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                        class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid note-has-grid">
    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
      <li class="nav-item">
        <a data-bs-toggle="tab" href="#task" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 text-body-color" id="all-category">
            <i class="ti ti-book mx-2"></i>
            <span class="d-none d-md-block font-weight-medium">Tugas</span>
        </a>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="tab" href="#done" role="tab" class="nav-link note-link d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 text-body-color " id="note-business">
            <i class="ti ti-chart-area-line mx-2"></i>
            <span class="d-none d-md-block font-weight-medium">Tantangan</span>
        </a>
      </li>
      <li class="nav-item ms-auto pt-3">
        <form action="">
            <div class="d-flex">
                <div class="search-box mx-2">
                    <input type="text" class="form-control search-chat py-2" id="text-srh" placeholder="Cari Materi">
                </div>
                <button class="btn btn-primary">
                    Cari
                </button>
            </div>
        </form>
      </li>
    </ul>
    <div class="tab-content">

        <div class="tab-pane active" id="task" role="tabpanel">
            <div class="d-flex flex-wrap all-category note-important">
                @if ($tasks != null)
                    @forelse ($tasks as $task)
                    <div class="p-1 col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="card border-start border-info py-3 px-4">
                            <div class="d-flex align-items-center flex-wrap all-category note-important">
                                <div class="d-flex flex-wrap">
                                    <div class="col-lg-8 col-sm-12">
                                        <div class="d-flex align-items-start gap-3 col-sm-12">
                                            <h5 class="text-dark">Nama Materi -> {{$task->subCourse->title}}</h5>
                                            <p class="badge bg-light-{{$task->level->color()}} text-{{$task->level->color()}}" style="font-size: 12px">
                                                {{$task->level->label()}}
                                            </p>

                                        </div>
                                        <p class="col-sm-12 col-lg-12 text-muted">{{ Str::limit($task->description, 120) }}</->
                                    </div>
                                    <div class=" col-sm-4 col-lg-4 pt-4">
                                        <a href="{{ route('task.detail', $task->id) }}" type="button" class="btn btn-light-primary text-primary dropdown ms-5 btn-edit">
                                            Lihat Detail
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    @empty
                    <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                        <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
                        <p class="fs-5 text-dark">
                            Belum Ada Tugas
                        </p>
                    </div>
                    @endforelse
                @else
                <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                    <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
                    <p class="fs-5 text-dark">
                        Belum Ada Tugas
                    </p>
                </div>
                @endif
            </div>
        </div>

        <div class="tab-pane" id="done" role="tabpanel">
            <div class="d-flex flex-wrap all-category note-important">
                @forelse ($challenges as $challenge)

                <div class="p-1 col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card border-start border-info py-3 px-4">
                        <div class="d-flex align-items-center flex-wrap all-category note-important">
                            <div class="d-flex flex-wrap">
                                <div class="col-lg-8 col-sm-12">
                                    <div class="d-flex align-items-start gap-3 col-sm-12">
                                        <h5 class="text-dark">Nama Materi -> {{$challenge->title}}</h5>
                                        <p class="badge bg-light-{{$challenge->level->color()}} text-{{$challenge->level->color()}}" style="font-size: 12px">
                                            {{$challenge->level->label()}}
                                        </p>
                                    </div>
                                    <p class="col-sm-12 col-lg-12 text-muted">{{ Str::limit($challenge->description, 120) }}</p>
                                </div>
                                <div class=" col-sm-4 col-lg-4 pt-4">
                                    <a href="{{ route('challenge.detail', $challenge->id) }}" type="button" class="btn btn-light-primary text-primary dropdown ms-5 btn-edit">
                                        Lihat Detail
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                @empty
                <div class="mb-2 mt-5 text-center" style="margin: 0 auto;">
                    <img src="{{ asset('no data.png') }}" alt="" width="300px" srcset="">
                    <p class="fs-5 text-dark">
                        Belum Ada Tantangan
                    </p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
  </div>

</div>

@endsection
