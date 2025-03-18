@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
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
    <div class="card-box pb-10">
        <div class="h5 pd-20 mb-0">Tous les établissements</div>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="data-table table nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0"
                        role="grid">
                        <thead>
                            <tr role="row">
                                <th class="table-plus" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending">Nom</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Gender: activate to sort column ascending" style="">
                                    Catégorie</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Weight: activate to sort column ascending" style="">
                                    E-mail</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Assigned Doctor: activate to sort column ascending"
                                    style="">Adresse</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" aria-label="Disease: activate to sort column ascending" style="">
                                    Status</th>
                                <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Actions" style="">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($etablishments as $etablishment)
                                <tr role="row" class="odd">
                                    <td class="table-plus sorting_1" tabindex="0">
                                        <div class="name-avatar d-flex align-items-center">
                                            <div class="avatar mr-2 flex-shrink-0">
                                                <img src="{{ asset('storage/' . $etablishment->cover_image) }}"
                                                    class="square-border shadow" width="100" height="100"
                                                    alt="">
                                            </div>
                                            <div class="txt">
                                                <div class="weight-600">{{ $etablishment->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="">{{ $etablishment->category->name ?? 'Non spécifié' }}</td>
                                    <td style="">{{ $etablishment->email }}</td>
                                    <td style="">{{ $etablishment->address }}</td>
                                    <td style="">
                                        <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7"
                                            style="color: rgb(38, 94, 215); background-color: rgb(231, 235, 245);">{{ $etablishment->status }}</span>
                                    </td>
                                    <td style="">
                                        <div class="table-actions d-flex align-items-center">
                                            <!-- Bouton Voir -->
                                            <a href="{{ route('admin.etablishment.show', $etablishment->id) }}" data-color="#265ed7"
                                                style="color: rgb(38, 94, 215);"><i class="icon-copy dw dw-view mx-1"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5"></div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a
                                    href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                    class="page-link"><i class="ion-chevron-left"></i></a></li>
                            <li class="paginate_button page-item active"><a href="#"
                                    aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"
                                    class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0"
                                    data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#"
                                    aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0"
                                    class="page-link"><i class="ion-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
