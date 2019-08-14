@extends('layouts.admin')
@section('content')
@can('outlet_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.outlets.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.outlet.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Outlet', 'route' => 'admin.outlets.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.outlet.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.id_external') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.sitecode') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.site_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.installation_date') }}
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
                        {{ trans('cruds.outlet.fields.province') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.owner_user') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.mobile') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.heineken_rep_user') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.mobile') }}
                    </th>
                    <th>
                        {{ trans('cruds.outlet.fields.css_user') }}
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
                        {{ trans('cruds.outlet.fields.csr_user') }}
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
                        {{ trans('cruds.outlet.fields.field_ops_user') }}
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
@can('outlet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.outlets.massDestroy') }}",
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
    ajax: "{{ route('admin.outlets.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'id', name: 'id' },
{ data: 'id_external', name: 'id_external' },
{ data: 'sitecode', name: 'sitecode' },
{ data: 'site_name', name: 'site_name' },
{ data: 'installation_date', name: 'installation_date' },
{ data: 'status', name: 'status' },
{ data: 'w_3_w', name: 'w_3_w' },
{ data: 'area', name: 'area' },
{ data: 'province', name: 'province' },
{ data: 'user.owner_user', name: 'owner_user.name' },
{ data: 'owner_user.email', name: 'owner_user.email' },
{ data: 'owner_user.mobile', name: 'owner_user.mobile' },
{ data: 'user.heineken_rep_user', name: 'heineken_rep_user.name' },
{ data: 'heineken_rep_user.mobile', name: 'heineken_rep_user.mobile' },
{ data: 'user.css_user', name: 'css_user.name' },
{ data: 'css_user.email', name: 'css_user.email' },
{ data: 'css_user.code', name: 'css_user.code' },
{ data: 'css_user.mobile', name: 'css_user.mobile' },
{ data: 'user.csr_user', name: 'csr_user.name' },
{ data: 'csr_user.email', name: 'csr_user.email' },
{ data: 'csr_user.code', name: 'csr_user.code' },
{ data: 'csr_user.mobile', name: 'csr_user.mobile' },
{ data: 'user.field_ops_user', name: 'field_ops_user.name' },
{ data: 'field_ops_user.email', name: 'field_ops_user.email' },
{ data: 'field_ops_user.code', name: 'field_ops_user.code' },
{ data: 'field_ops_user.mobile', name: 'field_ops_user.mobile' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable').DataTable(dtOverrideGlobals);
});

</script>
@endsection