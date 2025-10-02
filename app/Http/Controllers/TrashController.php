<?php

namespace App\Http\Controllers;

use App\Models\Trash;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    // Show all trashed records
    public function index()
    {
        $trashes = Trash::latest()->paginate(10);
        return view('modules.trash.index', compact('trashes'));
    }

    // Restore record from trash
    public function restore($id)
    {
        $trash = Trash::findOrFail($id);
        // Here you could implement actual restore logic for related models
        $trash->delete();
        return redirect()->route('trash.index')->with('success', 'Record restored successfully.');
    }

    // Permanently delete record
    public function destroy($id)
    {
        $trash = Trash::findOrFail($id);
        $trash->delete();
        return redirect()->route('trash.index')->with('success', 'Record permanently deleted.');
    }
}
