<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at', 'status'];

    // Estados de una orden
    const PENDIENTE = 1;    // Cliente genera la orden, pero no se ha recibido el pago
    const RECIBIDO = 2;     // Cliente genera la orden y se ha recibido el pago
    const ENVIADO = 3;      // Producto enviado, pero no le ha llegado al cliente
    const ENTREGADO = 4;    // Orden se ha entregado al cliente
    const ANULADO = 5;      // Orden se anula automáticamente luego que hayan pasado 15 minutos de estar en estado PENDIENTE

    // Tipos de envío
    const ENV_TIENDA = 1;
    const ENV_DOMICILIO = 2;

    // Relación uno a muchos (inversa)

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
