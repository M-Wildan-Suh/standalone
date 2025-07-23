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
                    <div x-show="sosmed"
                        x-transition:enter="transition-all duration-700"
                        x-transition:enter-start="max-h-0"
                        x-transition:enter-end="max-h-96"
                        x-transition:leave="transition-all duration-300"
                        x-transition:leave-start="max-h-96"
                        x-transition:leave-end="max-h-0"
                        style="border-color: {{$template->desc_second_color}}; color: {{$template->desc_text_color}}" 
                        class=" absolute pb-4 w-full bg-transparent backdrop-blur-sm bottom-1/2 left-0 text-sm sm:text-base rounded-t-md">
                        <div class="pb-3 space-y-2">
                            @foreach ($data->articles->social as $item)
                                @php
                                    $url = $item->url;
                                    $fullUrl = Str::startsWith($url, ['http://', 'https://']) ? $url : 'https://' . $url;
                                @endphp
                    
                                <a href="{{ $fullUrl }}" class="flex" target="_blank">
                                    <button {{$item->status === "off" ? "disabled" : ''}} class=" {{$item->status === "off" ? " cursor-not-allowed" : "hover:scale-95"}} group relative w-full flex items-center justify-center gap-2 font-semibold text-white duration-300 py-1.5 rounded-full capitalize social-{{ strtolower($item->type) }}">
                                        <div class=" w-4 h-4">
                                            @if ($item->type === 'facebook')
                                                <svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="currentColor" d="M512,257.555c0,-141.385 -114.615,-256 -256,-256c-141.385,0 -256,114.615 -256,256c0,127.777 93.616,233.685 216,252.89l0,-178.89l-65,0l0,-74l65,0l0,-56.4c0,-64.16 38.219,-99.6 96.695,-99.6c28.009,0 57.305,5 57.305,5l0,63l-32.281,0c-31.801,0 -41.719,19.733 -41.719,39.978l0,48.022l71,0l-11.35,74l-59.65,0l0,178.89c122.385,-19.205 216,-125.113 216,-252.89Z" style="fill-rule:nonzero;"/></svg>
                                            @elseif ($item->type === 'instagram')
                                                <svg data-name="Layer 1" id="Layer_1" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><title/><path fill="currentColor" d="M314.757,147.525H197.243a49.717,49.717,0,0,0-49.718,49.718V314.757a49.718,49.718,0,0,0,49.718,49.718H314.757a49.718,49.718,0,0,0,49.717-49.718V197.243A49.717,49.717,0,0,0,314.757,147.525ZM256,324.391A68.391,68.391,0,1,1,324.391,256,68.391,68.391,0,0,1,256,324.391ZM327.242,201.58a16.271,16.271,0,1,1,16.27-16.271A16.271,16.271,0,0,1,327.242,201.58Z"/><path fill="currentColor" d="M256,211.545A44.455,44.455,0,1,0,300.455,256,44.455,44.455,0,0,0,256,211.545Z"/><path fill="currentColor" d="M256,0C114.615,0,0,114.615,0,256S114.615,512,256,512,512,397.385,512,256,397.385,0,256,0ZM389.333,312.5A76.836,76.836,0,0,1,312.5,389.333H199.5A76.837,76.837,0,0,1,122.666,312.5V199.5A76.836,76.836,0,0,1,199.5,122.667H312.5A76.836,76.836,0,0,1,389.333,199.5Z"/></svg>
                                            @elseif ($item->type === 'youtube')
                                                <svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="currentColor" d="M256,0c141.29,0 256,114.71 256,256c0,141.29 -114.71,256 -256,256c-141.29,0 -256,-114.71 -256,-256c0,-141.29 114.71,-256 256,-256Zm153.315,178.978c-3.68,-13.769 -14.522,-24.61 -28.29,-28.29c-24.958,-6.688 -125.025,-6.688 -125.025,-6.688c0,0 -100.067,0 -125.025,6.688c-13.765,3.68 -24.61,14.521 -28.29,28.29c-6.685,24.955 -6.685,77.024 -6.685,77.024c0,0 0,52.067 6.685,77.02c3.68,13.769 14.525,24.614 28.29,28.293c24.958,6.685 125.025,6.685 125.025,6.685c0,0 100.067,0 125.025,-6.685c13.768,-3.679 24.61,-14.524 28.29,-28.293c6.685,-24.953 6.685,-77.02 6.685,-77.02c0,0 0,-52.069 -6.685,-77.024Zm-185.316,125.025l0,-96.002l83.137,48.001l-83.137,48.001Z"/></svg>
                                            @elseif ($item->type === 'tiktok')
                                                <svg data-name="Layer 1" id="Layer_1" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><title/><path fill="currentColor" d="M256,0C114.615,0,0,114.615,0,256S114.615,512,256,512,512,397.385,512,256,397.385,0,256,0ZM385.62,232.382c-27.184,0-53.634-8.822-74-23.75l-.162,101.5a92.457,92.457,0,1,1-80.178-91.721v49.845a43.657,43.657,0,1,0,31.288,41.876V109.333h51.275a71.773,71.773,0,0,0,71.774,71.773Z"/></svg>
                                            @endif
                                        </div>
                                        <p>{{ $item->type }}</p>
                                        @if ($item->status === "off")
                                            <div class="absolute left-full bottom-full translate-y-1/2 -translate-x-1/2 bg-white text-sm px-2 py-1 text-black text-nowrap hidden group-hover:block z-10 rounded-md">
                                                Link tidak tersedia
                                            </div>
                                        @endif
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