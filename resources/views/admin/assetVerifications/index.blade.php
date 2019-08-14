@extends('layouts.admin')
@section('content')
@can('asset_verification_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.asset-verifications.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.assetVerification.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'AssetVerification', 'route' => 'admin.asset-verifications.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.assetVerification.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.assetVerification.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetVerification.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetVerification.fields.start_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetVerification.fields.end_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetVerification.fields.t_1_mini_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetVerification.fields.t_1_mini_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetVerification.fields.till_drawer') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetVerification.fields.scanner') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetVerification.fields.ups') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetVerification.fields.outlet') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.id_external') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.sitecode') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('asset_verification_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.asset-verifications.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.asset-verifications.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'id', name: 'id' },
{ data: 'date', name: 'date' },
{ data: 'start_time', name: 'start_time' },
{ data: 'end_time', name: 'end_time' },
{ data: 't_1_mini_1', name: 't_1_mini_1' },
{ data: 't_1_mini_2', name: 't_1_mini_2' },
{ data: 'till_drawer', name: 'till_drawer' },
{ data: 'scanner', name: 'scanner' },
{ data: 'ups', name: 'ups' },
{ data: 'outlet.outlet', name: 'outlet.site_name' },
{ data: 'outlet.id_external', name: 'outlet.id_external' },
{ data: 'outlet.sitecode', name: 'outlet.sitecode' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable').DataTable(dtOverrideGlobals);
});

</script>
@endsection