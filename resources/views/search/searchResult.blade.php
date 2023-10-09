@extends('layouts.app')
@section('content')
    <div class="card card-primary card-outline">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Результати пошуку</h3>
            </div>
            <div class="row">
{{--                @if($results)--}}
{{--                    <h2>Результаты для дел:</h2>--}}
{{--                    @foreach ($results as $result)--}}
{{--                        {{ $result->name }}--}}
{{--                    @endforeach--}}
{{--                @endif--}}
                @if($visitors)
                    <div class="col-md-4 text-center">
                        <h5>Відвідувачі</h5>
                        @foreach ($visitors as $visitor)
                            <a href="{{ route('visitor', $visitor->id) }}"> {{ $visitor->name }}</a><br>
                        @endforeach
                    </div>
                @endif

                @if($consultations)
                    <div class="col-md-4 text-center">
                        <h5>Консультації</h5>
                        @foreach ($consultations as $consultation)
                            {{ $consultation->comment }}
                            {{ $consultation->consultation_date }}<br>
                            //
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
