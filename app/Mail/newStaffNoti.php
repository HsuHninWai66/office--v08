<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Staff;
use Barryvdh\DomPDF\Facade\PDF;

class newStaffNoti extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $staffData, $respondData;

    public function __construct($staffData)
    {
        $this->staffData = [
            'staffOne' => $staffData
        ];
        $this->respondData = [];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $staff = Staff::get();
        $this->respondData = [
            'staffData' => Staff::latest()->get(),
        ];

        $pdf = PDF::loadView('export.staff-pdf', $this->respondData);
        return $this->subject('Car Stolen Report')
            ->view('mail.staff', $this->staffData)
            ->attachData($pdf->output(), "complete.pdf");
    }
}
