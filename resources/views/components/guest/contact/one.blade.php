<div class=" w-full sticky px-4 bottom-0 z-10 backdrop-blur">
    <div class=" w-full max-w-[600px] mx-auto">
        <div class=" w-full py-2 grid {{ ($data->telephone && $data->whatsapp) ? 'grid-cols-2' : 'grid-cols-1' }} gap-2 sm:gap-4 text-sm sm:text-base">
            @if ($data->telephone)
                <div x-data="{ sosmed : false }" class=" relative w-full">
                    <button @click="sosmed = !sosmed" style="background-color: {{$template->contact_main_color}}" 
                        class=" relative z-10 w-full flex items-center justify-center gap-0.5 sm:gap-1.5 py-2 text-white rounded-full duration-300">
                        <div class=" w-4 sm:w-5 aspect-square">
                            <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect fill="none" height="256" width="256"/><circle cx="64" cy="128" fill="none" r="32" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><circle cx="176" cy="200" fill="none" r="32" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><circle cx="176" cy="56" fill="none" r="32" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" x1="149.1" x2="90.9" y1="73.3" y2="110.7"/><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" x1="90.9" x2="149.1" y1="145.3" y2="182.7"/></svg>
                        </div>
                        <p>Social Media</p>
                    </button>
                    <div x-show="sosmed" style="border-color: {{$template->desc_second_color}}; background-color: {{$template->desc_main_color}}; color: {{$template->desc_text_color}}" 
                        class=" absolute pb-8 w-full h-36 bottom-1/2 left-0 text-sm sm:text-base rounded-t-md shadow-md shadow-black/20">
                        <div class="p-4 h-full overflow-auto space-y-2">
                            @foreach ($data->articles->social as $item)
                                @php
                                    $url = $item->url;
                                    $fullUrl = Str::startsWith($url, ['http://', 'https://']) ? $url : 'https://' . $url;
                                @endphp
                                
                                <a href="{{ $fullUrl }}" class="flex" target="_blank">
                                    <button class="w-full font-semibold text-white duration-300 hover:scale-95 py-1.5 rounded-full capitalize social-{{ strtolower($item->type) }}">
                                        {{ $item->type }}
                                    </button>
                                </a>
                            @endforeach
                        </div>
                        <style>
                            .social-facebook {
                                background: linear-gradient(to right, #1168db, #4e8efc);
                            }

                            .social-instagram {
                                background: linear-gradient(to right, #feda75, #d62976, #962fbf);
                            }

                            .social-tiktok {
                                background: linear-gradient(to right, #000000, #494747);
                            }

                            .social-youtube {
                                background: linear-gradient(to right, #FF0000, #cc0000);
                            }
                        </style>
                    </div>
                </div>
            @endif
            @if ($data->whatsapp)
                <a href="https://wa.me/{{$data->no_tlp}}?text={{ urlencode('Halo saya dapat info dari '.url()->current()) }}" target="__blank">
                    <button style="background-color: {{$template->contact_second_color}}" class=" w-full flex items-center justify-center gap-0.5 sm:gap-1.5 py-2 text-white rounded-full hover:scale-95 duration-300">
                        <div class=" w-4 sm:w-5 aspect-square">
                            <svg viewBox="0 0 56.693 56.693" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 56.693 56.693"><path d="M46.38 10.714C41.73 6.057 35.544 3.492 28.954 3.489c-13.579 0-24.63 11.05-24.636 24.633a24.589 24.589 0 0 0 3.289 12.316L4.112 53.204l13.06-3.426a24.614 24.614 0 0 0 11.772 2.999h.01c13.577 0 24.63-11.052 24.635-24.635.002-6.582-2.558-12.772-7.209-17.428zM28.954 48.616h-.009a20.445 20.445 0 0 1-10.421-2.854l-.748-.444-7.75 2.033 2.07-7.555-.488-.775a20.427 20.427 0 0 1-3.13-10.897c.004-11.29 9.19-20.474 20.484-20.474a20.336 20.336 0 0 1 14.476 6.005 20.352 20.352 0 0 1 5.991 14.485c-.004 11.29-9.19 20.476-20.475 20.476z" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" class="fill-000000"></path><path d="M40.185 33.281c-.615-.308-3.642-1.797-4.206-2.003-.564-.205-.975-.308-1.385.308-.41.617-1.59 2.003-1.949 2.414-.359.41-.718.462-1.334.154-.615-.308-2.599-.958-4.95-3.055-1.83-1.632-3.065-3.648-3.424-4.264-.36-.617-.038-.95.27-1.257.277-.276.615-.719.923-1.078.308-.36.41-.616.616-1.027.205-.41.102-.77-.052-1.078-.153-.308-1.384-3.338-1.897-4.57-.5-1.2-1.008-1.038-1.385-1.057-.359-.018-.77-.022-1.18-.022s-1.077.154-1.642.77c-.564.616-2.154 2.106-2.154 5.135 0 3.03 2.206 5.957 2.513 6.368.308.41 4.341 6.628 10.516 9.294a35.341 35.341 0 0 0 3.509 1.297c1.474.469 2.816.402 3.877.244 1.183-.177 3.642-1.49 4.155-2.927.513-1.438.513-2.67.359-2.927-.154-.257-.564-.41-1.18-.719z" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor" class="fill-000000"></path></svg>
                        </div>
                        <p>WhatsApp</p>
                    </button>
                </a>
            @endif
        </div>
    </div>
</div>