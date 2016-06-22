<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    //
    public function create()
    {
        $date=date('Y-m-d');
        $html = <<<EOF
<img src="/Users/YANTAO/laravel_project/sushi/public/images/logo002.jpg" style="width:200px;height:150px"> <br>
<div style="float:left;position:relative;width:30%;left:0">
<strong>Votre Nom</strong><br>
<strong>Votre Address</strong><br>
<strong>CP Ville</strong><br>
<strong>SIREN/APE</strong><br>
<span>RCS</span> <br>
<span>TVA</span><br>
<span>Tel/Mail</span><br>
</div>
<div style="width:40%;right:0;position:absolute;top:140">
<strong>Nom/Societe Client</strong><br>
<strong>Address</strong><br>
<strong>CP Ville</strong><br>
<span>Siren et N TVA</span>
</div>

<table cellspacing="0" style="width:100%;border:1px solid black;" border='1'>
    <tr bgcolor="#808080" style="text-align: center">
        <td>Date</td>
        <td>Facture N.</td>
        <td>Ref.Commande</td>
        <td>Rechence</td>
        <td>Soit le</td>
        <td>Mode de reglement</td>
    </tr>
    <tr>
        <td>$date</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
    </tr>
</table>
<table cellspacing="0" style="width:100%;margin-top:10px;border:1px solid black" border='1'>
    <tr bgcolor="#808080" style="text-align: center;">
        <td>Designation</td>
        <td>Unite</td>
        <td>Quantite</td>
        <td>PU HT</td>
        <td>TVA</td>
        <td>TOTAL HT</td>
    </tr>
     <tr border="0px">
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td>test</td>
        <td style='text-align: right'>0.00€</td>
    </tr>

</table>

<table cellspacing="0" style="width:40%;margin-top:10px;border:1px solid black;color:grey;float:left" border='1'>
    <tr  style="text-align: center;">
        <td>BASE HT</td>
        <td>% TVA</td>
        <td>Montant TVA</td>
    </tr>
     <tr border="0px">
        <td></td>
        <td>5.5%</td>
        <td style='text-align: right'>0.00€</td>
    </tr>
    <tr border="0px">
        <td></td>
        <td>10%</td>
        <td style='text-align: right'>0.00€</td>
    </tr>
    <tr border="0px">
        <td></td>
        <td>20%</td>
        <td style='text-align: right'>0.00€</td>
    </tr>
</table>

<table cellspacing="0" style="width:50%;margin-top:10px;border:1px solid black;float:left;right:0;position:absolute" border='1'>
    <tr  style="text-align: right;">
        <td>SOUS TOTAL HT</td>
        <td>0.00€</td>
    </tr>
    <tr  style="text-align: right;color:grey">
        <td>TVA</td>
        <td>0.00€</td>
    </tr>
    <tr  style="text-align: right;">
        <td ">TOTAL TTC</td>
        <td style='text-align: right'>0.00€</td>
    </tr>
    <tr  style="text-align: right;color:grey">
        <td>ACOMPTE</td>
        <td style='text-align: right'>0.00€</td>
    </tr>
    <tr  style="text-align: right;"bgcolor="#808080">
        <td>A PAYER</td>
        <td style='text-align: right'>0.00€</td>
    </tr>

</table>


EOF;
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
}
