@extends('layouts.admin')
@section('content')
@can('field_ops_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.field-ops-requests.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.fieldOpsRequest.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'FieldOpsRequest', 'route' => 'admin.field-ops-requests.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.fieldOpsRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.fieldOpsRequest.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.fieldOpsRequest.fields.outlet') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.id_external') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.sitecode') }}
                    </th>
                    <th>
                        {{ trans('cruds.fieldOpsRequest.fields.device') }}
                    </th>
                    <th>
                        {{ trans('cruds.fieldOpsRequest.fields.fault_reason') }}
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
@can('field_ops_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.field-ops-requests.massDestroy') }}",
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
    ajax: "{{ route('admin.field-ops-requests.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'id', name: 'id' },
{ data: 'outlet.outlet', name: 'outlet.site_name' },
{ data: 'outlet.id_external', name: 'outlet.id_external' },
{ data: 'outlet.sitecode', name: 'outlet.sitecode' },
{ data: 'device', name: 'device' },
{ data: 'fault_reason', name: 'fault_reason' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable').DataTable(dtOverrideGlobals);
});

</script>
@endsection