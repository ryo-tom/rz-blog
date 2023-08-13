@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<h1 class="admin-page-title">Dashboard</h1>

<div class="operation-bar">
    <a href="" class="btn btn-create">Create</a>
</div>

<div class="content-block">
    <div class="content-inner">
        <table class="table">
            <thead class="table-header">
                <tr class="thead-row">
                    <th class="th-cell">操作</th>
                    <th class="th-cell">操作</th>
                    <th class="th-cell">id</th>
                    <th class="th-cell">name</th>
                    <th class="th-cell">slug</th>
                    <th class="th-cell">sort_order</th>
                    <th class="th-cell">created_at</th>
                    <th class="th-cell">updated_at</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @for ($i = 0; $i < 30; $i++)
                <tr class="tbody-row">
                    <td class="td-cell">
                        <a href="" class="btn btn-edit">Edit</a>
                    </td>
                    <td class="td-cell">
                        <button class="btn btn-delete">Delete</button>
                    </td>
                    <td class="td-cell"></td>
                    <td class="td-cell"></td>
                    <td class="td-cell"></td>
                    <td class="td-cell"></td>
                    <td class="td-cell"></td>
                    <td class="td-cell"></td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>

@endsection
