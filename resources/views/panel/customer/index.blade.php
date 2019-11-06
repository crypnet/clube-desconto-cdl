@extends('panel.common.panel')

@section('content-title')

@endsection

@section('content')
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="tile-title">@lang('panel.text.index', ['value' => trans('panel.text.clients')])</h3>
                <p>
                    <a class="btn btn-primary icon-btn"
                       href="{{ route('customer.create') }}"
                       data-toggle="tooltip"
                       title="@lang('panel.text.create_m', ['value' => trans('panel.text.client')])">
                        <i class="fa fa-plus mr-0"
                           aria-hidden="true"></i>
                    </a>
                </p>
            </div>
            @if (count($customers))
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">@lang('panel.customers.code')</th>
                            <th class="text-center">@lang('panel.column.fantasy_name')</th>
                            <th class="text-center">@lang('panel.column.cnpj_cpf')</th>
                            <th class="text-center">Ações</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $c)
                            <tr>
                                <td class="text-center">{{ $c->id }}</td>
                                <td class="text-center">{{ $c->fantasy_name }}</td>
                                <td class="text-center">{{ formatMask($c->cnpj, strlen($c->cnpj) == 14 ? '##.###.###/####-##' : '###.###.###-##') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('customer.edit', $c->id) }}"
                                       class="btn btn-secondary"
                                       data-toggle="tooltip"
                                       title="Atualizar Permisão">
                                        <i class="fa fa-pencil mr-0"
                                           aria-hidden="true"></i>
                                    </a>
                                    <a class="btn btn-danger text-white"
                                       data-toggle="tooltip"
                                       title="Deletar Permisão"
                                       onclick="swalDestroy('{{ $c->id }}', 'OK')">
                                        <i class="fa fa-trash-o mr-0"
                                           aria-hidden="true"></i>
                                        <form style="display:none;"
                                              action="{{ route('customer.destroy', $c->id) }}"
                                              method="post"
                                              id="form-destroy-{{ $c->id }}">
                                            @csrf
                                            <input name="_method"
                                                   type="hidden"
                                                   value="DELETE">
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bs-component">
                    <div>
                        {{ $customers->links() }}
                    </div>
                </div>
            @else
                <div class="bs-component">
                    <div class="alert alert-dismissible alert-danger text-center">
                        <button class="close"
                                type="button"
                                data-dismiss="alert">&times;
                        </button>
                        <strong>@lang('panel.text.no_results_m', ['value' => trans('panel.text.client')])</strong>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('extra-script')

@endsection

