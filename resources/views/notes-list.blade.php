<?php

use Spatie\LaravelData\DataCollection;
use App\Data\DefaultNoteData;

/** @var DataCollection<DefaultNoteData> $notes */
?>

@extends('layouts.app')

@section('content')
    <main>
        <section>
            <div>
                @foreach($notes as $note)
                    <li>
                        {{ $note->text }}
                        @if(!is_null($note->updatedAt))
                            (updated: {{ $note->updatedAt->format('d.m.Y') }})
                        @endif
                    </li>
                @endforeach
            </div>
        </section>
    </main>
@endsection
