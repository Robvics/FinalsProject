<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Make sure this line is present
use App\Models\Products; // Assuming 'Products' is your student model

class PdfController extends Controller
{
    public function exportStudentPdf(Request $request)
    {
        // 1. Retrieve the "Search Student" data
        // Adjust this query to fetch the students you want to export.
        // If you have search filters, retrieve them from the $request
        // and apply them to your query.S

        // Example: Fetch all students (you'll likely want to filter this)
        $students = Products::all(); // Assuming 'Products' is your student model

        // Example: If you have a 'search_term' passed in the request
        // $searchTerm = $request->input('search_term');
        // $students = Products::where('name', 'like', '%' . $searchTerm . '%')->get(); // Assuming 'Products' is your student model

        // 2. Generate the PDF content using a Blade view
        $pdf = Pdf::loadView('pdf.student_report', compact('students'));

        // 3. Return the PDF as a downloadable response
        return $pdf->download('student_report.pdf');
    }
}