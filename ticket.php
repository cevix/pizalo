<?php

	# Incluyendo librerias necesarias #
    require "./code128.php";

    $pdf = new PDF_Code128('P','mm',array(80,258));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->SetFont('Arial','B',20);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("Pizalo")),0,'C',false);
    $pdf->SetFont('Arial','',10);
    $pdf->Ln(2);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Vallecas"),0,'C',false);
    $pdf->Ln(5);
    
    # Codigo de barras #
    $pdf->Code128(5,$pdf->GetY(),"COD000001V0001",70,20);
    $pdf->SetXY(0,$pdf->GetY()+21);
    $pdf->SetFont('Arial','',10);

    $pdf->Ln(1);
    $pdf->Cell(0,5,iconv("UTF-8", "ISO-8859-1","_____________________________"),0,0,'C');
    $pdf->Ln(5);



    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","TPC Domicilio"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Código: 0513"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Telefono Client:913317000"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Fecha: ".date("d/m/Y", strtotime("13-09-2022"))." ".date("h:s A")),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Cliente:Maria Rengifo KO"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Area 14 Moto"),0,'C',false);
    $pdf->SetFont('Arial','B',10);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("Ticket Nro: 1")),0,'C',false);
    $pdf->SetFont('Arial','',10);

    #Direccion del pedido

    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Calle Maquinilla"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Madrid"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Nº: 13 Piso: 1 3"),0,'C',false);

    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Bloque:A"),0,'C',false);
    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","28031"),0,'C',false);

    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Comentarios"),0,'C',false);
    
    /*----------  Detalles de la tabla  ----------*/
    /*$pdf->MultiCell(0,4,iconv("UTF-8", "ISO-8859-1","Nombre de producto a vender"),0,'C',false);
    $pdf->Cell(10,4,iconv("UTF-8", "ISO-8859-1","7"),0,0,'C');
    $pdf->Cell(19,4,iconv("UTF-8", "ISO-8859-1","$10 USD"),0,0,'C');
    $pdf->Cell(19,4,iconv("UTF-8", "ISO-8859-1","$0.00 USD"),0,0,'C');
    $pdf->Cell(28,4,iconv("UTF-8", "ISO-8859-1","$70.00 USD"),0,0,'C');
    $pdf->Ln(4);
    $pdf->MultiCell(0,4,iconv("UTF-8", "ISO-8859-1","Garantía de fábrica: 2 Meses"),0,'C',false);
    $pdf->Ln(7);*/
    /*----------  Fin Detalles de la tabla  ----------*/


    # Impuestos & totales #
    $pdf->Ln(0);
    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","_____________________________"),0,0,'C');
    $pdf->Ln(0.1);

    $pdf->Ln(1);
    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","_____________________________"),0,0,'C');
    $pdf->Ln(3);
    
    $pdf->Ln(4);
    $pdf->Cell(10,4,iconv("UTF-8", "ISO-8859-1","1"),0,0,'C');
    $pdf->Cell(19,4,iconv("UTF-8", "ISO-8859-1","Hawaiana"),0,0,'L');
    $pdf->Cell(40,4,iconv("UTF-8", "ISO-8859-1","Mediana"),0,0,'R');
    $pdf->Ln(5);

    $pdf->Cell(1,4,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(3,4,iconv("UTF-8", "ISO-8859-1","1"),0,0,'C');
    $pdf->Cell(22,4,iconv("UTF-8", "ISO-8859-1","Especial De La Casa Champ"),0,0,'L');
    $pdf->Cell(40,4,iconv("UTF-8", "ISO-8859-1","Mediana"),0,0,'R');
    $pdf->Ln(4);

    $pdf->Ln(3);
    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","_____________________________"),0,0,'C');
    $pdf->Ln(1);

    $pdf->Ln(1);
    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","_____________________________"),0,0,'C');
    $pdf->Ln(3);

    $pdf->Ln(2);
    $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","Total Euros"),0,0,'C');
    $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","26,90"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","A cobrar Efectivo Euros:"),0,0,'C');
    $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","30,00"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","Cambio Efectivo Euros"),0,0,'C');
    $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","3,10"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1","0513"),0,0,'C');

    $pdf->Ln(10);

    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Antes de repartir mira el mapa de Prevencion y abrochate el casco"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,iconv("UTF-8", "ISO-8859-1","Gracias por su compra"),'',0,'C');

    $pdf->Ln(9);

    
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_Nro_1.pdf",true);