@extends('panel.common.panel')

@section('content-title')

@endsection

@section('content')
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="tile-title">@lang('panel.text.index', ['value' => trans('panel.text.roles')])</h3>
                @permission('roles.create')
                <p>
                    <a class="btn btn-primary icon-btn"
                       href="{{ route('roles.create') }}"
                       data-toggle="tooltip"
                       title="@lang('panel.text.create_m', ['value' => trans('panel.text.role')])">
                        <i class="fa fa-plus mr-0"
                           aria-hidden="true"></i>
                    </a>
                </p>
                @endpermission
            </div>
            @if ($roles)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">@lang('panel.column.name')</th>
                            <th class="text-left">@lang('panel.column.display_name')</th>
                            <th class="text-center">@lang('panel.column.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $r)
                            <tr>
                                <td class="text-center">{{ $r->id }}</td>
                                <td class="text-left">{{ $r->name }}</td>
                                <td class="text-left">{{ $r->slug }}</td>
                                <td class="text-center">
                                    @permission('roles.edit')
                                    <a href="{{ route('roles.edit', $r->id) }}"
                                       class="btn btn-secondary"
                                       data-toggle="tooltip"
                                       title="@lang('panel.text.edit', ['value' => trans('panel.text.role')])">
                                        <i class="fa fa-pencil mr-0"
                                           aria-hidden="true"></i>
                                    </a>
                                    @endpermission
                                    @permission('roles.destroy')
                                    <a class="btn btn-danger text-white"
                                       data-toggle="tooltip"
                                       title="@lang('panel.text.destroy', ['value' => trans('panel.text.role')])"
                                       onclick="swalDestroy('{{ $r->id }}', '@lang('panel.text.destroy_cancel_m', ['value' => trans('panel.text.role')])')">
                                        <i class="fa fa-trash-o mr-0"
                                           aria-hidden="true"></i>
                                        <form style="display:none;"
                                              action="{{ route('roles.destroy', $r->id) }}"
                                              method="post"
                                              id="form-destroy-{{ $r->id }}">
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
                        {{ $roles->links() }}
                    </div>
                </div>
            @else
                <div class="bs-component">
                    <div class="alert alert-dismissible alert-danger text-center">
                        <button class="close"
                                type="button"
                                data-dismiss="alert">&times;
                        </button>
                        <strong>@lang('panel.text.no_results_m', ['value' => trans('panel.text.role')])</strong>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('extra-script')

@endsection

