<x-app-layout title="Manajemen Admin">
    <style>
        .btn-create {
            width: 10em;
        }

        .center-btn {
            text-align: center;
        }
    </style>
    <div class="card">
        <h5 class="card-header">Manajemen Admin</h5>
        <!-- Button trigger modal -->
        <!-- Button trigger modal -->
        <button type="button" class="m-3 btn btn-primary btn-create" data-bs-toggle="modal"
            data-bs-target="#createModal">
            Tambah
        </button>
        <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Tambah Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('manajemen-admin.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Nama</label>
                                    <input name="name" required type="text" id="nameBasic"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Email</label>
                                    <input name="email" required type="text" id="nameBasic" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label required">Password</label>
                                    <input name="password" min="1" required type="text" id="nameBasic"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Kembali
                            </button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col">
                <div class="table-responsive p-3">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($admins as $admin)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $no++ }}</strong>
                                    </td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    {{-- <td><span class="badge bg-label-primary me-1">Active</span></td> --}}
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item btn-edit"
                                                    data-id="{{ $admin->id }}"
                                                    data-link="{{ route('manajemen-admin.update', $admin->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" id="btn-delete"
                                                    data-url="{{route('manajemen-admin.destroy', $admin->id)}}"><i
                                                        class="bx bx-trash me-1"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="edit-admin-form" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Nama</label>
                                <input name="name" required type="text" id="nama-edit"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label required">Email</label>
                                <input name="email" required type="text" id="email-edit"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Password</label>
                                <input name="password" min="1" type="text" id="password-edit"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Kembali
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#datatable');

        //script handle edit
        $('table tbody').on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            $(".edit-admin-form").trigger("reset");

            $.ajax({
                method: "GET",
                data: {
                    id: id
                },
                url: "{{ route('manajemen-admin.detail-json') }}",
            }).done(function(response) {
                $("#nama-edit").val(response.admin.name);
                $("#email-edit").val(response.admin.email);
            });

            $(".edit-admin-form").attr("action", $(this).data("link"));
            $("#editModal").modal('show');
        });
    </script>
</x-app-layout>