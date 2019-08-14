@extends('layouts.admin')
@section('content')
@can('call_cycle_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.call-cycles.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.callCycle.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'CallCycle', 'route' => 'admin.call-cycles.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.callCycle.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.callCycle.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.callCycle.fields.outlet') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.id_external') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.sitecode') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.w_3_w') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.area') }}
                    </th>
                    <th>
                        {{ trans('cruds.callCycle.fields.csr_role') }}
                    </th>
                    <th>
                        {{ trans('cruds.callCycle.fields.csr_user') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.code') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.mobile') }}
                    </th>
                    <th>
                        {{ trans('cruds.callCycle.fields.scheduled_visit_date_time') }}
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
@can('call_cycle_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.call-cycles.massDestroy') }}",
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
    ajax: "{{ route('admin.call-cycles.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'id', name: 'id' },
{ data: 'outlet.outlet', name: 'outlet.site_name' },
{ data: 'outlet.id_external', name: 'outlet.id_external' },
{ data: 'outlet.sitecode', name: 'outlet.sitecode' },
{ data: 'outlet.status', name: 'outlet.status' },
{ data: 'outlet.w_3_w', name: 'outlet.w_3_w' },
{ data: 'outlet.area', name: 'outlet.area' },
{ data: 'role.csr_role', name: 'csr_role.title' },
{ data: 'user.csr_user', name: 'csr_user.name' },
{ data: 'csr_user.email', name: 'csr_user.email' },
{ data: 'csr_user.code', name: 'csr_user.code' },
{ data: 'csr_user.mobile', name: 'csr_user.mobile' },
{ data: 'scheduled_visit_date_time', name: 'scheduled_visit_date_time' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable').DataTable(dtOverrideGlobals);
});

</script>
@endsection