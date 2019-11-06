@extends('panel.common.panel')

@section('content-title')
    <h1><i class="fa fa-unlock-alt"></i> Permisoes</h1>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="tile-title">Permissões</h3>
                <p>
                    <a class="btn btn-primary icon-btn"
                       href="{{ route('permision.create') }}"
                       data-toggle="tooltip"
                       title="Nova Permisão">
                        <i class="fa fa-plus mr-0"
                           aria-hidden="true"></i>
                    </a>
                </p>
            </div>
            @if ($permissions)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">Nome</th>
                            <th class="text-left">Slug</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $p)
                            <tr>
                                <td class="text-center">{{ $p->id }}</td>
                                <td class="text-left">{{ $p->name }}</td>
                                <td class="text-left">{{ $p->slug }}</td>
                                <td class="text-center">

                                    @permission('permision.edit')
                                    <a href="{{ route('permision.edit', $p->id) }}"
                                       class="btn btn-secondary"
                                       data-toggle="tooltip"
                                       title="Atualizar Permisão">
                                        <i class="fa fa-pencil mr-0"
                                           aria-hidden="true"></i>
                                    </a>
                                    @endpermission
                                    @permission('permision.destroy')
                                    <a class="btn btn-danger text-white"
                                       data-toggle="tooltip"
                                       title="Deletar Permisão"
                                       onclick="swalDestroy('{{ $p->id }}', 'OK')">
                                        <i class="fa fa-trash-o mr-0"
                                           aria-hidden="true"></i>
                                        <form style="display:none;"
                                              action="{{ route('permision.destroy', $p->id) }}"
                                              method="post"
                                              id="form-destroy-{{ $p->id }}">
                                            @csrf
                                            <input name="_method"
                                                   type="hidden"
                                                   value="DELETE">
                                        </form>
                                    </a>
                                    @endpermission
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bs-component">
                    <div>
                        {{ $permissions->links() }}
                    </div>
                </div>
            @else
                <div class="bs-component">
                    <div class="alert alert-dismissible alert-danger text-center">
                        <button class="close"
                                type="button"
                                data-dismiss="alert">&times;
                        </button>
                        <strong>Nada encontrado</strong>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('extra-script')
    <script src="{{ asset('panel/js/plugins/sweetalert.min.js') }}"></script>
@endsection

