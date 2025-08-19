@extends('layout')
@section('title', 'Experiences')

@section('content')
<h2 class="text-3xl font-bold mb-6">Experiences & Certificates</h2>

<div class="space-y-6">
    @foreach ($experiences as $exp)
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-xl font-semibold">{{ $exp->position }} at {{ $exp->company }}</h3>
            <p class="text-sm text-gray-500">{{ $exp->start_date }} - {{ $exp->end_date }}</p>
            <p>{{ $exp->description }}</p>
        </div>
    @endforeach

    <h3 class="text-2xl font-bold mt-10">Certificates</h3>
    <ul class="list-disc list-inside">
        @foreach ($certificates as $cert)
            <li>
                <strong>{{ $cert->title }}</strong> - {{ $cert->issuer }} ({{ $cert->year }})
                @if($cert->file)
                    <a href="{{ asset('storage/' . $cert->file) }}" class="text-blue-500 text-sm ml-2" target="_blank">View</a>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
