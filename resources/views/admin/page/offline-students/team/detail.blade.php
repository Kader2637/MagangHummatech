@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-body d-flex justify-content-between">
        <ul class="nav nav-pills nav-custom nav-custom-light" style="width: fit-content" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#project" role="tab">
                    Project
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#note" role="tab">
                    Catatan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#board" role="tab">
                    Board
                </a>
            </li>
        </ul>
        <a href="{{ url('/offline-students/team') }}" class="btn bg-primary-subtle waves-effect waves-light shadow-none">Kembali</a>
    </div>
</div>

<div class="tab-content text-muted">
    <div class="tab-pane active" id="project" role="tabpanel">
        <div class="card col-11">
            <div class="card-body row">
                <div class="info d-flex align-items-center col-xl-7">
                    <img class="rounded-circle avatar-xl shadow ms-3" alt="200x200" src="{{ asset('assets/images/users/avatar-4.jpg') }}">
                    <div class="description px-4">
                        <h4>IndeKost Mini Project</h4>
                        <p class="text-muted mb-3">
                            Lorem ipsum dolor sit amet consectetur. Dignissim feugiat pretium arcu velit eu amet porttitor. Aliquam nibh quis blandit dolor pellentesque.
                        </p>
                        <p class="text-muted mb-1">
                            Link Repository: 
                            <a href="https://github.com/Irsyadandhikaariadi/indekostv2" target="_blank" class="text-secondary">https://github.com/Irsyadandhikaariadi/indekostv2</a>
                        </p>
                        <p class="text-muted mb-1">
                            Tanggal Mulai: Jumat, 18 Februari 2020
                        </p>
                        <p class="text-muted mb-1">
                            Tenggat: Jumat, 18 Maret 2020
                        </p>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="row gap-3">
                        <div class="col-5 m-0 card card-animate">
                            <div class="py-3 d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Di Revisi</p>
                                    <h4 class="mt-1 ff-secondary fw-semibold"><span class="counter-value" data-target="24">0</span> Tugas</h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-2">
                                        <i class="ri-attachment-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 m-0 card card-animate">
                            <div class="py-3 d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Tugas Baru</p>
                                    <h4 class="mt-1 ff-info fw-semibold"><span class="counter-value" data-target="24">0</span> Tugas</h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle text-info rounded-circle fs-2">
                                        <i class="ri-task-line"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 m-0 card card-animate">
                            <div class="py-3 d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Tugas Baru</p>
                                    <h4 class="mt-1 ff-success fw-semibold"><span class="counter-value" data-target="24">0</span> Tugas</h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-success-subtle text-success rounded-circle fs-2">
                                        <i class="ri-list-check-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 m-0 card card-animate">
                            <div class="py-3 d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">Tugas Baru</p>
                                    <h4 class="mt-1 ff-warning fw-semibold"><span class="counter-value" data-target="24">0</span> Tugas</h4>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-warning-subtle text-warning rounded-circle fs-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 39 39" fill="none">
                                            <path d="M3.25 19.5C3.25 28.4746 10.5254 35.75 19.5 35.75C28.4746 35.75 35.75 28.4746 35.75 19.5C35.75 10.5254 28.4746 3.25 19.5 3.25C10.5254 3.25 3.25 10.5254 3.25 19.5ZM32.5 19.5C32.5 26.6797 26.6797 32.5 19.5 32.5C12.3203 32.5 6.5 26.6797 6.5 19.5C6.5 12.3203 12.3203 6.5 19.5 6.5C26.6797 6.5 32.5 12.3203 32.5 19.5ZM29.25 19.5C29.25 22.1925 28.1586 24.63 26.3942 26.3942L19.5 19.5V9.75C24.8848 9.75 29.25 14.1152 29.25 19.5Z" fill="#FFAA05"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h5>Anggota Tim</h5>
                <div class="d-flex flex-wrap gap-2 col-15">
                    <div class="col-xl-3 card">
                        <div class="p-2 mb-0 d-flex">
                            <img class="rounded-circle avatar-sm shadow me-3" alt="200x200" src="{{ asset('assets/images/users/avatar-4.jpg') }}">
                            <div class="d-block">
                                <p class="m-0">Oliver Phillips</p>
                                <p class="badge bg-secondary-subtle text-secondary p-2 m-0">Ketua Kelompok</p>
                            </div>
                        </div>
                    </div>
                    @foreach (range(1, 2) as $item)
                    <div class="col-xl-3 card">
                        <div class="p-2 mb-0 d-flex">
                            <img class="rounded-circle avatar-sm shadow me-3" alt="200x200" src="{{ asset('assets/images/users/avatar-4.jpg') }}">
                            <div class="d-block">
                                <p class="m-0">Oliver Phillips</p>
                                <p class="badge bg-warning-subtle text-warning p-2 m-0">Anggota</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="note" role="tabpanel">
        <div class="row gap-5 ms-3">
            <div class="col-xl-4 card">
                <div class="card-body my-2">
                    <div class="project">
                        <h4>IndeKost Mini Project</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolorem nam esse vitae!</p>
                    </div>
                    <div class="note">
                        <h4>List Catatan:</h4>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Revisi Major Dan Minor In Project</a>
                            <a class="nav-link mb-2" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Revisi Major Dan Minor In Project</a>
                            <a class="nav-link mb-2" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Revisi Major Dan Minor In Project</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 card">
                <div class="card-body my-2">
                    <h4 class="mb-3">Revisi ajor dan minor in project</h4>
                    @foreach (range(1,3) as $key => $item)
                        <div class="my-1">
                            <h5 class="m-0">Catatan {{ ++$key }}</h5>
                            <p class="text-muted">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur eaque tenetur voluptatum. Reiciendis asperiores maiores similique repellat.
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="board" role="tabpanel">
        <div class="d-flex gap-2">
            <div class="col-3">
                <div class="d-flex align-items-center">
                    <h5 class="text-uppercase m-0">Tugas Baru</h5>
                    <div class="badge bg-success mx-2">2</div>
                </div>
                <div class="mt-3 mx-0 px-0">
                    @foreach (range(1, 2) as $item)
                    <div class="card col-11">
                        <div class="card-body">
                            <h5 class="text-secondary">
                                Lorem ipsum dolor sit amet consectetur. Et in et quis metus nunc tempus dignissim dui amet vulputate.
                            </h5>
                            <div class="d-flex gap-2">
                                <div class="badge bg-warning-subtle text-warning">Front-end</div>
                                <div class="badge bg-danger-subtle text-danger">Mendesak</div>
                                <div class="badge bg-secondary">Direvisi mentor</div>
                            </div>
                        </div>
                        <div class="card-footer d-flex gap-2 align-items-center" style="border-top-style: dotted;">
                            <h6 class="text-secondary" style="font-size: 12px">3 Hari Lagi</h6>
                            <div class="avatar-group">
                                <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Christi">
                                    <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-xxs">
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Frank Hook">
                                    <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="" class="rounded-circle avatar-xxs">
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="more">
                                    <div class="avatar-xxs">
                                        <div class="avatar-title rounded-circle">
                                            3+
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-3">
                <div class="d-flex align-items-center col-3">
                    <h5 class="text-uppercase m-0">Dikerjakan</h5>
                    <div class="badge bg-secondary mx-2">5</div>
                </div>
                <div class="mt-3 ">
                    @foreach (range(1, 4) as $item)
                    <div class="card col-11">
                        <div class="card-body">
                            <h5 class="text-secondary">
                                Lorem ipsum dolor sit amet consectetur. Et in et quis metus nunc tempus dignissim dui amet vulputate.
                            </h5>
                            <div class="d-flex gap-2">
                                <div class="badge bg-warning-subtle text-warning">Front-end</div>
                                <div class="badge bg-danger-subtle text-danger">Mendesak</div>
                                <div class="badge bg-secondary">Direvisi mentor</div>
                            </div>
                        </div>
                        <div class="card-footer d-flex gap-2 align-items-center" style="border-top-style: dotted;">
                            <h6 class="text-danger" style="font-size: 11px">Sudah melewati batas deadline</h6>
                            <div class="avatar-group">
                                <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Christi">
                                    <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-xxs">
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Frank Hook">
                                    <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="" class="rounded-circle avatar-xxs">
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="more">
                                    <div class="avatar-xxs">
                                        <div class="avatar-title rounded-circle">
                                            3+
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-3">
                <div class="d-flex align-items-center col-3">
                    <h5 class="text-uppercase m-0">Direvisi</h5>
                    <div class="badge bg-warning mx-2">1</div>
                </div>
                <div class="mt-3 ">
                    @foreach (range(1, 1) as $item)
                    <div class="card col-11">
                        <div class="card-body">
                            <h5 class="text-secondary">
                                Lorem ipsum dolor sit amet consectetur. Et in et quis metus nunc tempus dignissim dui amet vulputate.
                            </h5>
                            <div class="d-flex gap-2">
                                <div class="badge bg-warning-subtle text-warning">Front-end</div>
                                <div class="badge bg-danger-subtle text-danger">Mendesak</div>
                                <div class="badge bg-secondary">Direvisi mentor</div>
                            </div>
                        </div>
                        <div class="card-footer d-flex gap-2 align-items-center" style="border-top-style: dotted;">
                            <h6 class="text-danger" style="font-size: 11px">Sudah melewati batas deadline</h6>
                            <div class="avatar-group">
                                <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Christi">
                                    <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-xxs">
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Frank Hook">
                                    <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="" class="rounded-circle avatar-xxs">
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="more">
                                    <div class="avatar-xxs">
                                        <div class="avatar-title rounded-circle">
                                            3+
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-3">
                <div class="d-flex align-items-center col-3">
                    <h5 class="text-uppercase m-0">Selesai</h5>
                    <div class="badge bg-info mx-2">2</div>
                </div>
                <div class="mt-3 ">
                    @foreach (range(1, 2) as $item)
                    <div class="card col-11">
                        <div class="card-body">
                            <h5 class="text-secondary">
                                Lorem ipsum dolor sit amet consectetur. Et in et quis metus nunc tempus dignissim dui amet vulputate.
                            </h5>
                            <div class="d-flex gap-2">
                                <div class="badge bg-warning-subtle text-warning">Front-end</div>
                                <div class="badge bg-danger-subtle text-danger">Mendesak</div>
                                <div class="badge bg-secondary">Direvisi mentor</div>
                            </div>
                        </div>
                        <div class="card-footer d-flex gap-2 align-items-center" style="border-top-style: dotted;">
                            <h6 class="text-danger" style="font-size: 11px">Sudah melewati batas deadline</h6>
                            <div class="avatar-group">
                                <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Christi">
                                    <img src="{{ asset('assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-xxs">
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Frank Hook">
                                    <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="" class="rounded-circle avatar-xxs">
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="more">
                                    <div class="avatar-xxs">
                                        <div class="avatar-title rounded-circle">
                                            3+
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            function toggleTableResponsive() {
                var screenWidth = $(window).width();
                var $table = $('#responsive-team');
                if (screenWidth <= 880) {
                $table.addClass('py-4');
                } else {
                $table.removeClass('py-4');
                }
            }

            toggleTableResponsive();

            $(window).resize(function() {
                toggleTableResponsive();
            });
        });
    </script>
@endsection
