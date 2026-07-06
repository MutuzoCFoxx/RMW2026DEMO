<?php

namespace App\Actions\Registrations;

use App\Models\Registration;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportRegistrationsCsv
{
    public function __invoke(): StreamedResponse
    {
        $filename = 'registrations-'.now()->format('Y-m-d-His').'.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'Reference', 'Name', 'Email', 'Phone', 'Organization', 'Job Title', 'Country',
                'Delegate Type', 'Ticket Type', 'Amount (RWF)', 'Payment Method', 'Payment Status', 'Paid At',
            ]);

            Registration::orderBy('id')->chunk(200, function ($chunk) use ($handle) {
                foreach ($chunk as $r) {
                    fputcsv($handle, [
                        $r->reference, $r->full_name, $r->email, $r->phone, $r->organization,
                        $r->job_title, $r->country, $r->delegate_type, $r->ticket_type, $r->amount,
                        $r->payment_method, $r->payment_status, optional($r->paid_at)->toDateTimeString(),
                    ]);
                }
            });

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
