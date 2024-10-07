<?php
$imp = 169;

function precioFinal($esInternacional, $precio, $impuesto)
{
  if ($esInternacional) {

    return $precio + $impuesto;
  } else {
    return $precio;
  }
};

function aplicarDescuento($precio, $descuento, $esInternacional)
{
  return $precio -= $precio * $descuento;
}

function  sumarPaqutesVendidos($bd, $bt)
{
  return $bd + $bt;
}

function totalVentas($precio, $impuesto, $vendidos, $esInternacional)
{
  if ($esInternacional) {
    return ($precio + $impuesto) * $vendidos;
  } else {

    return $precio * $vendidos;
  }
}

function colorInfo($esInternacional)
{
  if ($esInternacional) {
    return "danger";
  } else {
    return "info";
  }
}

function precioFinalBt($precio, $impuesto, $esInternacional)
{
  if ($esInternacional) {
    return $precio + $impuesto;
  } else {
    return $precio;
  }
};

function colorPaquetesVendidos($vend, $disp)
{
  if ($vend === 0) {
    return "danger";
  } else if ($vend >= $disp / 2) {
    return "success";
  } else {
    return "warning";
  }
}







?>