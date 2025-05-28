<?php

	# Incluyendo librerias necesarias #
    require "./code128.php";

    $idPedido = $_GET['id'];

    try {
        require('db.php');
    } catch (Throwable $t) {
        echo "<p> ---------------</p>";
        echo "<p>Mensaje:" . $t->getMessage()."</p>";
        echo "<p> ---------------</p>";
        exit();
    }
    //Realizo las consultas a mi base de datos
    

    $pdf = new PDF_Code128('P','mm',array(80,258));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos adicionales #
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
    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',13);
    
    
    
    
    
    
    

    #Direccion del pedido

try {
        //Realizo la conexion
        $conexion=mysqli_connect($hostname,$username,$password,$dbname);
        mysqli_query($conexion,"SET NAMES 'UTF8'");
        $diaActual=date("Y-m-d");
        if (mysqli_select_db($conexion,$dbname)) {
            $consulta="SELECT * FROM `pedidos` WHERE id = '$idPedido'";
            $resultado=mysqli_query($conexion,$consulta);

            while ($datosPedido=mysqli_fetch_array($resultado)) {
                //abro fila de un producto para la tabla
                $codigoPedido=$datosPedido['codigo_pedido'];
                $codigoDiario=$datosPedido['codigoDiario'];
                $pdf->SetFont('Arial','B',13);
                $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",strtoupper("Ticket Nro: " . $codigoDiario)),0,'C',false);
                $pdf->SetFont('Arial','B',11);

                $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Entrega: ".substr($datosPedido['hora_entrega'], 0, 5)),0,'C',false);
                $pdf->SetFont('Arial','',10);

                $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","TPC ".$datosPedido['tipoPedido']),0,'C',false);
                $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Telefono:".$datosPedido['telefono']),0,'C',false);
                $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Fecha: ".$datosPedido['fecha']),0,'C',false);
                $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Cliente:".$datosPedido['cliente']),0,'C',false);
                $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",$datosPedido['direccion']),0,'C',false);

                if (strlen($datosPedido['comentarios'])> 0) {
                   $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1",$datosPedido['comentarios']),0,'C',false);
                }

                if ($datosPedido['metodo_pago'] == "datafono") {
                
                    
                    $pdf->Ln(1);
                    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","************Llevar datafono************"   ),0,0,'C');

                                        
                    $pdf->Ln(3);
                    $precio_total=$datosPedido['precio_total'];
                }else{

                    $precio_total=$datosPedido['precio_total'];
                    $importe_efectivo=$datosPedido['importe_efectivo'];
                    $cambio=$datosPedido['cambio'];

                }
                



            }
            
        }
    } catch (mysqli_sql_exception $mse) {
        echo  "<p>Nº del error: ".$mse->getCode()."</p>";
        echo "<p>mesaje del error: ".$mse->getMessage()."</p>";
    }



    
    
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

    try {
        //Realizo la conexion
        $conexion=mysqli_connect($hostname,$username,$password,$dbname);
        mysqli_query($conexion,"SET NAMES 'UTF8'");
        if (mysqli_select_db($conexion,$dbname)) {
            $consulta="SELECT * FROM `pedido_detalle` WHERE codigo_pedido = '$codigoPedido'";
            $resultado=mysqli_query($conexion,$consulta);

            while ($productos=mysqli_fetch_array($resultado)) {
                //abro fila de un producto para la tabla
                $pdf->Ln(3);
                $pdf->Cell(10,4,iconv("UTF-8", "ISO-8859-1",$productos['cantidad']),0,0,'R');
                $pdf->Cell(19,4,iconv("UTF-8", "ISO-8859-1",$productos['producto']),0,0,'I');
                
                $pdf->Ln(3);
                



            }
            
        }
    } catch (mysqli_sql_exception $mse) {
        echo  "<p>Nº del error: ".$mse->getCode()."</p>";
        echo "<p>mesaje del error: ".$mse->getMessage()."</p>";
    }

    $pdf->Ln(3);
    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","_____________________________"),0,0,'C');
    $pdf->Ln(1);

    $pdf->Ln(1);
    $pdf->Cell(72,5,iconv("UTF-8", "ISO-8859-1","_____________________________"),0,0,'C');
    $pdf->Ln(3);

    if (isset($cambio)) {
        $pdf->Ln(2);
        $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
        $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","Total Euros"),0,0,'C');
        $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1",$precio_total),0,0,'C');

        $pdf->Ln(5);

        $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
        $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","A cobrar Efectivo Euros:"),0,0,'C');
        $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1",$importe_efectivo),0,0,'C');

        $pdf->Ln(5);

        $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
        $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1","Cambio Efectivo Euros"),0,0,'C');
        $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1",$cambio),0,0,'C');
        
    }
    

    $pdf->Ln(7);

    $pdf->Cell(18,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->Cell(22,5,iconv("UTF-8", "ISO-8859-1",""),0,0,'C');
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(32,5,iconv("UTF-8", "ISO-8859-1",$codigoDiario),0,0,'C');
    $pdf->SetFont('Arial','',10);
                
                

    $pdf->Ln(8);

    $pdf->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Antes de repartir mira el mapa de Prevencion y abrochate el casco"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,iconv("UTF-8", "ISO-8859-1","Gracias por su compra"),'',0,'C');

    $pdf->Ln(9);

    
    
    # Nombre del archivo PDF #
    $pdf->Output("I","Ticket_Nro_1.pdf",true);