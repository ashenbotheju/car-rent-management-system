@extends('layouts.admin')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Admin Dashboard
    </h2>
@endsection

@section('admin-content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Admin Dashboard Content -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-medium mb-4">Users</h3>
            <p>Manage application users</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-medium mb-4">Settings</h3>
            <p>Configure application settings</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-medium mb-4">Reports</h3>
            <p>View system reports</p>
        </div>
    </div>
@endsection
