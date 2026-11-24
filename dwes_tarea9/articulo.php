<?php

class Articulo {
    private string $nombre;
    private float $precio;

    public function __construct(string $nombre, float $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function precioConIva(): float {
        return $this->precio * 1.21;
    }

    public function esCaro(): bool {
        return $this->precio > 50;
    }
}