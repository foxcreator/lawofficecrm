@extends('layouts.app')
@section('title', '403')
@section('content')
        <div class="error-page d-flex align-items-center mt-5">
            <h2 class="headline text-warning"> 403</h2>

            <h3><i class="fas fa-exclamation-triangle text-warning ml-5"></i> {{ __($exception->getMessage() ?: 'Доступ заблоковано') }}</h3>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    <!-- /.content -->
</div>
@endsection
