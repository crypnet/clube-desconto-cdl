@extends('panel.common.panel')

@section('content-title')

@endsection

@section('content')
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="tile-title">@lang('panel.text.index', ['value' => trans('panel.text.users')])</h3>
                @permission('users.create')
                <p>
                    <a class="btn btn-primary icon-btn"
                       href="{{ route('users.create') }}"
                       data-toggle="tooltip"
                       title="@lang('panel.text.create_m', ['value' => trans('panel.text.user')])">
                        <i class="fa fa-plus mr-0"
                           aria-hidden="true"></i>
                    </a>
                </p>
                @endpermission
            </div>
            @if ($users)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">@lang('panel.column.name')</th>
                            <th class="text-left">@lang('panel.column.email')</th>
                            <th class="text-center">@lang('panel.column.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $u)
                            <tr>
                                <td class="text-center">{{ $u->id }}</td>
                                <td class="text-left">{{ $u->name }}</td>
                                <td class="text-left">{{ $u->email }}</td>
                                <td class="text-center">
                                    @permission('users.edit')
                                    <a href="{{ route('users.edit', $u->id) }}"
                                       class="btn btn-secondary"
                                       data-toggle="tooltip"
                                       title="@lang('panel.text.edit', ['value' => trans('panel.text.user')])">
                                        <i class="fa fa-pencil mr-0"
                                           aria-hidden="true"></i>
                                    </a>
                                    @endpermission
                                    @permission('users.destroy')
                                    <a class="btn btn-danger text-white"
                                       data-toggle="tooltip"
                                       title="@lang('panel.text.destroy', ['value' => trans('panel.text.user')])"
                                       onclick="swalDestroy('{{ $u->id }}', '@lang('panel.text.destroy_cancel_m', ['value' => trans('panel.text.user')])')">
                                        <i class="fa fa-trash-o mr-0"
                                           aria-hidden="true"></i>
                                        <form style="display:none;"
                                              action="{{ route('users.destroy', $u->id) }}"
                                              method="post"
                                              id="form-destroy-{{ $u->id }}">
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
                        {{ $users->links() }}
                    </div>
                </div>
            @else
                <div class="bs-component">
                    <div class="alert alert-dismissible alert-danger text-center">
                        <button class="close"
                                type="button"
                                data-dismiss="alert">&times;
                        </button>
                        <strong>@lang('panel.text.no_results_m', ['value' => trans('panel.text.user')])</strong>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('extra-script')

@endsection

