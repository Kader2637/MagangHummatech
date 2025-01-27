@extends('Hummatask.team.layouts.app')
@section('content')

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Presentation</h4>
                <nav aria-label="breadcrumb mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="/siswa-offline">Board</a></li>
                        <li class="breadcrumb-item" aria-current="page">Presentation</li>
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

<div class="text-end mb-3">
    <button class="btn btn-primary text-light btn-xs px-4 fs-3 font-medium" data-bs-toggle="modal" data-bs-target="#bs-example-modal-md">Presentasi</button>
</div>


<div class="table-responsive rounded-2 mb-4">
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead class="text-dark fs-4">
            <tr>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">No</h6>
                </th>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Judul</h6>
                </th>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Tanggal</h6>
                </th>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Status Presentasi</h6>
                </th>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Judul</h6>
                </th>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Jadwal </h6>
                </th>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Detail</h6>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p class="mb-0 fw-normal fs-4">1</p>
                </td>
                <td>
                    <p class="mb-0 fw-normal fs-4">Progres migguan</p>
                </td>
                <td>
                    <p class="mb-0 fw-normal fs-4">29 mei 2024</p>
                </td>
                <td>
                    <p class="mb-0 fw-normal fs-4">Progres migguan</p>
                </td>
                <td>
                    <p class="mb-0 fw-normal fs-4">Selesai</p>
                </td>
                <td>
                    <p class="mb-0 fw-normal fs-4">Jadwal ke - 4</p>
                </td>
                <td>
                    <button class="btn mb-1 waves-effect waves-light btn-warning" data-bs-toggle="modal" data-bs-target="#historyModal">
                        <i class="ti ti-eye fs-7"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<!--Detail Modal -->
<div class="modal fade" id="historyModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="historyModalLabel">Feedback</h5>
                <button type="button" class="close border-0 bg-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Riwayat Presentasi -->
                <div class="mb-3">
                    <p>Judul Presentasi:  Interview</p>
                    <hr>
                    <p>Tanggal: 12 Mei 2024</p>
                    <hr>
                    <p>Jadwal : Jadwal ke- 2  11:00 11:25</p>
                    <hr>
                    <p>Deskripsi : Anda tidak mengisi deskripsi presentasi</p>
                    <hr>
                    <p>Feedback dari mentor : Mentor tidak atau belum memberi feedback
                    </p>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<!-- Add presentation -->
<div class="modal fade" id="bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Jadwal Presentasi</h5>
                <button type="button" class="close border-0 bg-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('presentation.update')}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="judul" class="mb-2">Judul Presentasi</label>
                        <input type="text" class="form-control mb-2" id="title" name="title" placeholder="Masukkan judul">
                        <input type="hidden" name="hummatask_team_id" value="{{ $slugs->id }}">
                        @error('title')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                        @error('hummatask_team_id')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                        @error('schedule_to')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                        @error('start_date')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                        @error('end_date')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="mb-3">Pilih Jadwal</label>
                        <div class="row">
                            @forelse ($presentations as $key=> $presentation)
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <input class="form-check-input date_range" type="radio" name="date_range" id="date_range_{{$presentation->id}}" value="{{ $presentation->start_date }}" data-team-id="{{ $presentation->hummatask_team_id }}">
                                        <label class="form-check-label" for="date_range_{{$presentation->id}}">{{ $presentation->start_date }} - {{ $presentation->end_date }}</label>
                                        <input type="hidden" name="hummatask_team_id" id="team_id_{{$presentation->id}}" value="{{ $presentation->hummatask_team_id }}">
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="mb-3 mt-5 text-center" style="margin: 0 auto;">
                                <img src="{{ asset('empty-asset.png') }}" alt="" width="100px" srcset="">
                                <p class="fs-3 text-dark">
                                    Belum ada jadwal
                                </p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="mb-2">Deskripsi (opsional)</label>
                        <textarea class="form-control" id="deskripsi" rows="3" placeholder="Masukkan deskripsi" name="description"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- <script>
    $(document).ready(function(){
        var selectedId = $('input[name="presentation_id"]:checked').val();
        console.log(selectedId);

        $('form').submit(function() {
            var presentationId = $('input[name="presentation_id"]:checked').val();
            if (presentationId) {
                var formAction = "{{ route('presentation.update', ':presentation_id') }}";
                formAction = formAction.replace(':presentation_id', presentationId);
                this.action = formAction;
            }
        });
    });
</script> --}}

<script>
    document.querySelectorAll('.date_range').forEach(function(radio) {
        radio.addEventListener('change', function() {
            document.querySelectorAll('.date_range').forEach(function(r) {
                r.checked = false;
            });
            this.checked = true;
        });
    });
</script>
@endsection
    `
