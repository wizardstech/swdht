<?php

namespace App\Http\Controllers;

use Spatie\MediaLibrary\Models\Media;
use Illuminate\Http\Request;
use App\Invoice;

class DownloadMediaController
{
   public function downloadInvoice($id)
   {
      $invoice = Invoice::whereId($id)->firstOrFail();

      if((\Auth::id() === $invoice->owner) || \Auth::id()->hasRole('superadmin')) {
        return response()->download($invoice->getFirstMedia('invoice')->getPath());
      }


   }
}
