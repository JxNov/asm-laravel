@extends('admin.blocks.default')

@section('title')
    @parent
    Danh sách người dùng
@endsection

@push('style')

@endpush

@section('content')
    <div class="d-flex">
        <div
            id="kt_app_content_container"
            class="app-container container-fluid"
        >
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="col-xl-12 mb-5 mb-xl-10">
                <div class="card card-flush h-xl-100">
                    <div class="card-header pt-5 w-100">
                        <div class="d-flex justify-content-between mb-10 w-100">
                            <h3 class="card-title align-items-start flex-column">
                              <span class="card-label fw-bold text-gray-800">
                                Danh sách người dùng
                              </span>
                            </h3>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalAdd">
                                Add User
                            </button>
                        </div>
                    </div>

                    <div class="card-body pt-2">
                        <div class="tab-content">
                            <div
                                class="tab-pane fade show active"
                                id="kt_stats_widget_16_tab_1"
                            >
                                <div class="table-responsive">
                                    <table
                                        class="table table-row-dashed align-middle gs-0 gy-3 my-0"
                                    >
                                        <thead>
                                        <tr
                                            class="fs-7 fw-bold text-gray-500 border-bottom-0"
                                        >
                                            <th class="p-0 pb-3">
                                                ID
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px">
                                                NAME
                                            </th>
                                            <th
                                                class="p-0 pb-3 min-w-100px pe-13"
                                            >
                                                EMAIL
                                            </th>
                                            <th class="p-0 pb-3 w-100px pe-7">
                                                ROLE
                                            </th>
                                            <th class="p-0 pb-3 w-150px">
                                                ACTION
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listUsers as $key => $value)
                                            <tr>
                                                <td>
                                                    {{$key + 1}}
                                                </td>
                                                <td>
                                                    {{$value->name}}
                                                </td>
                                                <td>
                                                    {{$value->email}}
                                                </td>
                                                <td>
                                                    @if ($value->role == '1')
                                                        Admin
                                                    @else
                                                        User
                                                    @endif
                                                </td>
                                                <td>
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px"
                                                    >
                                                        <i
                                                            class="fa-solid fa-arrow-right text-gray-500"
                                                        ></i>
                                                    </button>

                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-icon btn-bg-success btn-active-color-success w-30px h-30px"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalEdit"
                                                        data-bs-whatever="{{$value->id}}"
                                                    >
                                                        <i class="fa-solid fa-pen text-light"></i>
                                                    </button>

                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-icon btn-bg-danger btn-active-color-danger w-30px h-30px"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalDelete"
                                                        data-bs-whatever="{{$value->id}}"
                                                    >
                                                        <i
                                                            class="fa-solid fa-trash text-light"
                                                        ></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalAdd">
                        Add New User
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.users.store') }}" method="post">
                    <div class="modal-body">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            Add User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Edit User
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.users.update') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="id" id="idEdit">

                        <div class="mb-3">
                            <label for="nameEdit" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameEdit" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="emailEdit" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailEdit" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="roleEdit" class="form-label">Role</label>
                            <select class="form-select" id="roleEdit" name="role">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Delete User
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" id="confirmDelete" method="post">
                    @csrf
                    @method('DELETE')

                    <div class="modal-body">
                        <p>Are you sure you want to delete this user?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">
                            Delete User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        const modalDelete = document.getElementById('modalDelete')
        const modalEdit = document.getElementById('modalEdit')

        modalDelete.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            const button = event.relatedTarget

            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-whatever')

            const confirmDelete = document.getElementById('confirmDelete')
            confirmDelete.setAttribute('action', '{{ route('admin.users.destroy') }}?id=' + recipient)
        })

        modalEdit.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            const button = event.relatedTarget

            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-whatever')

            // Call API to get user info
            const url = '{{ route('admin.users.edit') }}?id=' + recipient
            fetch(url, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    document.querySelector('#idEdit').value = data.id;
                    document.querySelector('#nameEdit').value = data.name;
                    document.querySelector('#emailEdit').value = data.email;
                    document.querySelector('#roleEdit').value = data.role;
                })

        })
    </script>
@endpush

{{--<tr>--}}
{{--    <td>--}}
{{--        <div class="d-flex align-items-center">--}}
{{--            <div class="symbol symbol-50px me-3">--}}
{{--                <img--}}
{{--                    src="{{asset('assets/media/avatars/300-3.jpg')}}"--}}
{{--                    class=""--}}
{{--                    alt=""--}}
{{--                />--}}
{{--            </div>--}}
{{--            <div--}}
{{--                class="d-flex justify-content-start flex-column"--}}
{{--            >--}}
{{--                <a--}}
{{--                    href="pages/user-profile/overview.html"--}}
{{--                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6"--}}
{{--                >Guy Hawkins</a--}}
{{--                >--}}
{{--                <span--}}
{{--                    class="text-gray-500 fw-semibold d-block fs-7"--}}
{{--                >Haiti</span--}}
{{--                >--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </td>--}}
{{--    <td class="text-center pe-13">--}}
{{--                                    <span class="text-gray-600 fw-bold fs-6"--}}
{{--                                    >78.34%</span--}}
{{--                                    >--}}
{{--    </td>--}}
{{--    <td class="text-center pe-0">--}}
{{--        Content Chart--}}
{{--    </td>--}}
{{--    <td--}}
{{--        class="text-center d-flex justify-content-center"--}}
{{--    >--}}
{{--        <a--}}
{{--            href="#"--}}
{{--            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px"--}}
{{--        >--}}
{{--            <i--}}
{{--                class="fa-solid fa-arrow-right text-gray-500"--}}
{{--            ></i>--}}
{{--        </a>--}}
{{--        <a--}}
{{--            href="#"--}}
{{--            class="btn btn-sm btn-icon btn-bg-success btn-active-color-success w-30px h-30px"--}}
{{--        >--}}
{{--            <i class="fa-solid fa-pen text-light"></i>--}}
{{--        </a>--}}
{{--        <a--}}
{{--            href="#"--}}
{{--            class="btn btn-sm btn-icon btn-bg-danger btn-active-color-danger w-30px h-30px"--}}
{{--        >--}}
{{--            <i--}}
{{--                class="fa-solid fa-trash text-light"--}}
{{--            ></i>--}}
{{--        </a>--}}
{{--    </td>--}}
{{--</tr>--}}
