<?php
session_start();
require_once '../config/config.php';
require_once '../config/checklogin.php';
require_once '../config/codeGen.php';
check_login();
require_once('../vendor/autoload.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();


$html =
    '
                <!DOCTYPE html>
                    <html>
                        <head>
                            <meta name="" content="XYZ,0,0,1" />
                            <style type="text/css">
                                table {
                                    font-size: 12px;
                                    padding: 4px;
                                }

                                tr {
                                    page-break-after: always;
                                }

                                th {
                                    text-align: left;
                                    padding: 4pt;
                                }

                                td {
                                    padding: 5pt;
                                }

                                #b_border {
                                    border-bottom: dashed thin;
                                }

                                legend {
                                    color: #0b77b7;
                                    font-size: 1.2em;
                                }

                                #error_msg {
                                    text-align: left;
                                    font-size: 11px;
                                    color: red;
                                }

                                .header {
                                    margin-bottom: 20px;
                                    width: 100%;
                                    text-align: left;
                                    position: absolute;
                                    top: 0px;
                                }

                                .footer {
                                    width: 100%;
                                    text-align: center;
                                    position: fixed;
                                    bottom: 5px;
                                }

                                #no_border_table {
                                    border: none;
                                }

                                #bold_row {
                                    font-weight: bold;
                                }

                                #amount {
                                    text-align: right;
                                    font-weight: bold;
                                }

                                .pagenum:before {
                                    content: counter(page);
                                }

                                /* Thick red border */
                                hr.red {
                                    border: 1px solid red;
                                }
                                .list_header{
                                    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                                }
                            </style>
                        </head>

                        <body style="margin:1px;">
                            <div class="footer">
                                <hr>
                                <i>Visitors reports generated on ' . date('d M Y g:ia') . '</i>
                            </div>
                            
                            <div class="list_header" align="center">
                                <h3>
                                   Apartment Visitors Management System
                                </h3>
                                <hr style="width:100%" , color=black>
                                <h5>Visitor Reports</h5>
                            </div>
                            <table border="1" cellspacing="0" width="98%" style="font-size:9pt">
                                <thead>
                                    <tr>
                                        <th style="width:100%">Item Details</th>
                                        <th style="width:30%">Qty</th>
                                        <th style="width:100%">Sold By</th>
                                        <th style="width:100%">Sold To</th>
                                        <th style="width:100%">Date Sold</th>
                                        <th style="width:100%">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ';
                                    $ret = "SELECT * FROM visitor";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    while ($visitors = $res->fetch_object()) {

                                        $html .=
                                            '
                                            <tr>
                                                <td>' . $visitors->visitor_names . '</td>
                                                <td>' . $visitors->visitor_id_number . '</td>
                                                <td>
                                                    Phone: ' . $visitors->visitor_phone_number . '<br>
                                                    Email: ' . $visitors->visitor_email . '
                                                </td>
                                                <td>
                                                    Check In: ' . $visitors->visitor_check_in_date_time . '<br>
                                                    Check Out: ' . $visitors->visitor_check_out_date_time . '
                                                </td>
                                                <td>' . $visitors->visitor_where_visiting . '</td>
                                            </tr>
                                        ';
                                    }
                                    $html .= '
                                </tbody>
                            </table>
                        </body>
                    </html>
            ';
$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->set_paper('A4');
$dompdf->set_option('isHtml5ParserEnabled', true);
$dompdf->render();
$dompdf->stream('Visitors Reports', array("Attachment" => 1));
$options = $dompdf->getOptions();
$options->setDefaultFont('');
$dompdf->setOptions($options);