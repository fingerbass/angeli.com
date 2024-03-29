<div class="container py-8 grid grid-cols-5 gap-6">
    <div class="col-span-3">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-label value="Nombre de contacto"/>
                <x-input type="text" wire:model.defer="contact"
                         placeholder="Ingresa el nombre de la persona que recibirá el producto"
                         class="w-full"/>
                <x-input-error for="contact"/>
            </div>

            <div>
                <x-label value="Teléfono de contacto"/>
                <x-input type="text" wire:model.defer="phone"
                         placeholder="Ingresa el teléfono de la persona que recibirá el producto"
                         class="w-full"/>
                <x-input-error for="phone"/>
            </div>
        </div>
        <div x-data="{ envio_type: @entangle('envio_type') }">
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envíos</p>

            <div class="bg-white rounded-lg shadow">


                <label class="px-6 py-4 flex items-center">
                    <input x-model="envio_type" type="radio" value="1" name="envio_type" class="text-gray-600">
                    <span class="ml-2 text-gray-700">Recojo en tienda (Av. Laravel 235)</span>
                    <span class="font-semibold text-gray-700 ml-auto">Gratis</span>
                </label>

                <div>
                    <label class="px-6 py-4 flex items-center">
                        <input x-model="envio_type" type="radio" value="2" name="envio_type" class="text-gray-600">
                        <span class="ml-2 text-gray-700">Envío a domicilio</span>
                    </label>

                    <div class="px-6 pb-6 grid grid-cols-2 gap-6" :class="{ 'hidden': envio_type != 2 }">
                        {{--Departamentos--}}
                        <div>
                            <x-label value="Departamento"/>

                            <select class="form-control w-full" wire:model="department_id">
                                <option value="" disabled selected>Seleccione un departamento</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error for="department_id"/>
                        </div>

                        {{--Ciudades--}}
                        <div>
                            <x-label value="Ciudad"/>

                            <select class="form-control w-full" wire:model="city_id">
                                <option value="" disabled selected>Seleccione una ciudad</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error for="city_id"/>
                        </div>

                        {{--Distritos--}}
                        <div>
                            <x-label value="Distrito"/>

                            <select class="form-control w-full" wire:model="district_id">
                                <option value="" disabled selected>Seleccione un distrito</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error for="district_id"/>
                        </div>

                        {{--Dirección--}}
                        <div>
                            <x-label value="Dirección"/>
                            <x-input class="w-full" wire:model="address" type="text"/>
                            <x-input-error for="address"/>
                        </div>

                        {{--Referencia--}}
                        <div class="col-span-2">
                            <x-label value="Referencia"/>
                            <x-input class="w-full" wire:model="references" type="text"/>
                            <x-input-error for="references"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <x-button
                wire:loading.attr="disabled"
                wire:target="create_order"
                class="mt-6 mb-4" wire:click="create_order">
                Continuar con la compra
            </x-button>
            <hr>
            <p class="text-gray-700 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut,
                commodi, ipsa! Cumque deleniti dignissimos
                dolor et ex ipsa quae ratione recusandae saepe sapiente, sed similique sunt suscipit, veniam
                voluptas?
                Cumque! <a href="#" class="font-semibold text-orange-500">Políticas y privacidad.</a></p>
        </div>
    </div>

    <div class="col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse(Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200 bordergra">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}">

                        <article class="flex-1">
                            <h1>{{ $item->name }}</h1>

                            <div class="flex">
                                <p>Cant.: {{ $item->qty }}</p>

                                @isset($item->options['color'])
                                    <p class="mx-2">- Color: <span
                                            class="capitalize">{{ __($item->options['color']) }}</span></p>
                                @endisset

                                @isset($item->options['size'])
                                    <p>Talla {{ $item->options['size'] }}</p>
                                @endisset
                            </div>

                            <p>S/ {{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-500">
                            No tiene agregado ningún item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul>

            <hr class="mt-4 mb-3">

            <div class="text-gray-700">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">S/ {{ Cart::subtotal() }}</span>
                </p>
                <p class="flex justify-between items-center">
                    Envío
                    <span class="font-semibold">
                        @if($envio_type == 1 || $shipping_cost == 0)
                            Gratis
                        @else
                            S/ {{ $shipping_cost }}
                        @endif
                    </span>
                </p>

                <hr class="mt-4 mb-3">

                <p class="flex justify-between items-center font-semibold">
                    <span class="text-lg">Total</span>
                    @if($envio_type == 1 || $shipping_cost == 0)
                        S/ {{ Cart::subtotal() }}
                    @else
                        S/ {{ Cart::subtotal() + $shipping_cost }}
                    @endif

                </p>
            </div>
        </div>
    </div>
</div>
