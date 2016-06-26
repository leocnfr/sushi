<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facture</title>
    <style>
        ul{
            position: absolute;
            top:0;
        }
        li{
            list-style: none;
        }
        .font_color{
            color: grey;
        }
    </style>
</head>

<body>
<img src="images/logo002.jpg" alt="" style="width: 200px;height: 150px">
<div>
    <strong>Votre Nom</strong> <BR>
    <strong>Address</strong><BR>
    <strong>Cp Ville</strong><BR>
    <strong>SIREN / APE</strong><BR>
    <span>RCS Vill XXXXXX</span> <br>
    <span>TVA</span> <br>
    <span>Tel/Mail</span>
</div>
<div style="position: absolute;right: 40px;top: 190px">
    <strong>NOM/SOCIETE Client</strong> <br>
    <strong>Address</strong> <br>
    <strong>CP Ville</strong><BR>
    <span>Siren et N° TVA</span>
</div>
<table border="1" cellspacing="0" width="100%" style="text-align: center;margin-top: 10px">
    <tr bgcolor="#808080" >
        <td>Date</td>
        <td>Facture°</td>
        <td>Mode de reglement</td>
    </tr>
    <tr>
        <td>{{date('Y-m-d')}}</td>
        <td>{{rand(000000,999999)}}</td>
        <td>test</td>
    </tr>
</table>
<table style="width: 100%;margin-top: 10px;border: 1px solid black" cellspacing="0" border="1">
    <tr bgcolor="#808080" style="text-align: center">
        <td style="width: 370px;border-right: 1px solid black;border-bottom: 1px solid black">Designation</td>
        <td style="border-right: 1px solid black;border-bottom: 1px solid black">Quantite</td>
        <td style="border-right: 1px solid black;border-bottom: 1px solid black">PU HT</td>
        <td style="border-right: 1px solid black;border-bottom: 1px solid black">TVA</td>
        <td style="border-right: 1px solid black;border-bottom: 1px solid black">TOTAL HT</td>
    </tr>
    <tr >
        <td style="height: 400px">
            <ul style="position: absolute;top: 0;">
                <li>test,test,test,test,test,test, <br>
                    test,test,test
                </li>
                <li>test</li>

            </ul>
        </td>
        <td>
            <ul>
                <li>1</li>
                <li>2</li>

            </ul>
        </td>
        <td>
            <ul>
                <li>test</li>
                <li>test</li>

            </ul>
        </td>
        <td>
            <ul>
                <li>test</li>
                <li>test</li>

            </ul>
        </td>
        <td>
            <ul>
                <li>0.00</li>
                <li>0.00</li>

            </ul>
        </td>
    </tr>
    {{--<tr style="text-align: center">--}}
        {{--<td style="border-right: 1px solid black">test</td>--}}
        {{--<td style="border-right: 1px solid black">test</td>--}}
        {{--<td style="border-right: 1px solid black">test</td>--}}
        {{--<td style="border-right: 1px solid black">test</td>--}}
        {{--<td style="text-align: right;border-right: 1px solid black">test</td>--}}

    {{--</tr>--}}
    {{--<tr style="text-align: center">--}}
        {{--<td style="border-right: 1px solid black">test</td>--}}
        {{--<td style="border-right: 1px solid black">test</td>--}}
        {{--<td style="border-right: 1px solid black">test</td>--}}
        {{--<td style="border-right: 1px solid black">test</td>--}}
        {{--<td style="text-align: right;border-right: 1px solid black">test</td>--}}

    {{--</tr>--}}
    {{--<tr style="text-align: center">--}}
        {{--<td style="border-right: 1px solid black">test</td>--}}
        {{--<td style="border-right: 1px solid black">test</td>--}}
        {{--<td style="border-right: 1px solid black">test</td>--}}
        {{--<td style="border-right: 1px solid black">test</td>--}}
        {{--<td style="text-align: right;border-right: 1px solid black">test</td>--}}

    {{--</tr>--}}
</table>
<div style="position:relative;">
    <table border="1" cellspacing="0" style="width: 370px;margin-top: 20px;text-align: center;position: absolute;left: 0;"  >
        <tr>
            <td> <span class="font_color">Base HT</span></td>
            <td><span class="font_color">%TVA</span></td>
            <td> <span class="font_color">Montant TVA</span></td>
        </tr>
        <tr>
            <td></td>
            <td><span class="font_color">5.5%</span></td>
            <td style="text-align: right"><span class="font_color">0.00</span></td>
        </tr>
        <tr>
            <td></td>
            <td><span class="font_color">10%</span></td>
            <td style="text-align: right"><span class="font_color">0.00</span></td>
        </tr>
        <tr>
            <td></td>
            <td><span class="font_color">20%</span></td>
            <td style="text-align: right"><span class="font_color">0.00</span></td>
        </tr>
    </table>
    <table border="1" cellspacing="0" style="text-align: center;width: 252px;position: absolute;right: 0;margin-top:20px;">
        <tr bgcolor="#808080" >
            <td>SOUS TOTAL HT</td>
            <td style="width: 80px">0.00</td>
        </tr>
        <tr>
            <td style="font-style: italic">TVA</td>
            <td>0.00</td>
        </tr>
        <tr>
            <td>TOTAL TTC</td>
            <td>0.00</td>
        </tr>
        <tr bgcolor="#808080" >
            <td>A PAYER</td>
            <td>0.00</td>
        </tr>
    </table>
</div>

<div style="position:absolute;bottom: 20px;font-size: 12px">
    <p>Taux des pénalites de retard :</p>
    <p>Taux d'escom de retard :</p>
    <p>En cas de retard</p>
</div>
</body>
</html>