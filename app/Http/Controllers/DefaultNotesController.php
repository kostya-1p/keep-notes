<?php

namespace App\Http\Controllers;

use App\Services\Notes\DefaultNoteService;
use Illuminate\Contracts\View\View;

class DefaultNotesController extends Controller
{
    public function __construct(protected DefaultNoteService $noteService)
    {
    }

    public function list(): View
    {
        $notes = $this->noteService->getAll();
        return view('notes-list', ['notes' => $notes]);
    }
}
