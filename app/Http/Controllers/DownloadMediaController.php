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

      if((\Auth::id() === $invoice->owner) || \Auth::user()->hasAnyRole(['inquisitor','superadmin'])) {
        return response()->download($invoice->getFirstMedia('invoice')->getPath());
      }
   }

    public function getInvoiceImage($id) {

      $media = Media::whereId($id)->firstOrFail();
      $invoice = Invoice::whereId($media->model_id)->firstOrFail();

      if((\Auth::id() === $invoice->owner) || \Auth::user()->hasAnyRole(['inquisitor','superadmin'])) {
        $path = $media->getPath();
        $type = "image/jpeg";
        header('Content-Type:'.$type);
        header('Content-Length: ' . filesize($path));
        readfile($path);
      }

    }


}
