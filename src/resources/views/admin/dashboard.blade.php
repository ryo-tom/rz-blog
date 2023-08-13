@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<h1 class="admin-page-title">Dashboard</h1>

<div class="operation-bar">
    <a href="" class="btn btn-create">Create</a>
</div>

<div class="content-block">
    <div class="content-inner">
        <table class="admin-scrollable-table">
            <thead class="admin-thead">
                <tr class="admin-thead-row">
                    <th class="admin-th">操作</th>
                    <th class="admin-th">操作</th>
                    <th class="admin-th">id</th>
                    <th class="admin-th">name</th>
                    <th class="admin-th">slug</th>
                    <th class="admin-th">sort_order</th>
                    <th class="admin-th">created_at</th>
                    <th class="admin-th">updated_at</th>
                </tr>
            </thead>
            <tbody class="admin-tbody">
                @for ($i = 0; $i < 30; $i++)
                <tr class="admin-tbody-row">
                    <td class="admin-td">
                        <a href="" class="btn btn-edit">Edit</a>
                    </td>
                    <td class="admin-td">
                        <button class="btn btn-delete">Delete</button>
                    </td>
                    <td class="admin-td"></td>
                    <td class="admin-td"></td>
                    <td class="admin-td"></td>
                    <td class="admin-td"></td>
                    <td class="admin-td"></td>
                    <td class="admin-td"></td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>

@endsection
