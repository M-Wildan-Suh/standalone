@props(['data' => null, 'template' => null])
<div class=" pt-10 w-full max-w-[600px] mx-auto">
    <div style="background-color: {{ $template->desc_main_color ?? 'white' }}; color: {{ $template->desc_text_color }}"
        class=" relative w-full rounded-md shadow-md p-4 pt-0 space-y-2 sm:space-y-4">
        <div class=" relative flex items-center justify-center -translate-y-1/2">
            <!-- Border hologram berputar -->
            <div style="background-color: {{ $template->desc_second_color ?? 'white' }};" class="absolute w-28 h-28 rounded-full blur-xl animate-pulse-glow z-0"></div>
            <div class="shadow-hologram absolute w-24 h-24 rounded-full border-4 border-white border-dashed animate-spin-slow pointer-events-none"></div>

            <!-- Konten utama -->
            <div
                class=" w-20 h-20 flex items-center justify-center aspect-square rounded-full overflow-hidden z-10">
                <img src="{{ $data->articles->profile ? asset('storage/images/article/profile/' . $data->articles->profile) : asset('assets/images/profile/'.rand(1, 3).'.jpg') }}"
                    class="w-full h-full object-cover" alt="">
            </div>
        </div>
        @if ($data->articles->greet)    
            <div 
                x-data="typingText" 
                x-init="observe($el)" 
                class="w-full text-base sm:text-lg font-semibold overflow-hidden">
                <span x-text="displayText"></span>
            </div>

            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('typingText', () => ({
                        fullText: "{{$data->articles->greet}}",
                        displayText: '',
                        observer: null,
                        index: 0,
                        typingSpeed: 50, // kecepatan animasi

                        observe(el) {
                            this.observer = new IntersectionObserver((entries) => {
                                if (entries[0].isIntersecting) {
                                    this.startTyping();
                                    this.observer.disconnect();
                                }
                            }, { threshold: 0.7 });

                            this.observer.observe(el);
                        },

                        startTyping() {
                            const type = () => {
                                if (this.index < this.fullText.length) {
                                    this.displayText += this.fullText[this.index];
                                    this.index++;
                                    setTimeout(type, this.typingSpeed);
                                }
                            };
                            type();
                        },
                    }));
                });
            </script>
        @endif

        <style>
            @keyframes spin-slow {
                0% {
                    transform: rotate(0deg) scale(1.1);
                }

                100% {
                    transform: rotate(360deg) scale(1.1);
                }
            }
            @keyframes pulse-glow {
                0%, 100% {
                    opacity: 0.6;
                }
                50% {
                    opacity: 1;
                }
            }

            .animate-spin-slow {
                animation: spin-slow 20s linear infinite;
            }

            .animate-pulse-glow {
                animation: pulse-glow 4s ease-in-out infinite;
            }
        </style>
        <div class=" w-full flex flex-wrap gap-2">
            @foreach ($data->articles->articlecategory as $item)
                <a href="{{ route('category', ['category' => $item->slug]) }}">
                    <button style="background-color: {{ $template->desc_second_color ?? '#1d588d' }}"
                        class=" px-2 sm:px-3 py-1 text-xs sm:text-sm text-white rounded-md">{{ $item->category }}</button>
                </a>
            @endforeach
        </div>
        <p class="text-lg sm:text-3xl font-bold">{{ $data->judul }}</p>
        <div class=" flex gap-4 sm:gap-6 items-center text-opacity-60 text-sm sm:text-base">
            <a href="{{ route('author', ['username' => $data->articles->user->slug]) }}"
                class=" flex gap-1.5 sm:gap-2 items-center">
                <div style="color: {{ $template->desc_second_color ?? '#1d588d' }}" class=" w-4 aspect-square">
                    <svg class="feather feather-user" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <p>{{ $data->articles->user->name }}</p>
            </a>
            <div class=" flex gap-1.5 sm:gap-2 items-center">
                <div style="color: {{ $template->desc_second_color ?? '#1d588d' }}" class=" w-4 aspect-square">
                    <svg class="feather feather-calendar" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect height="18" rx="2" ry="2" width="18" x="3" y="4"></rect>
                        <path d="M16 2v4M8 2v4M3 10h18"></path>
                    </svg>
                </div>
                <p>{{ $data->date }}</p>
            </div>
        </div>
        @php
            function hexToRgba($hex, $opacity = 0.6)
            {
                $hex = str_replace('#', '', $hex);
                $r = hexdec(substr($hex, 0, 2));
                $g = hexdec(substr($hex, 2, 2));
                $b = hexdec(substr($hex, 4, 2));
                return "rgba($r, $g, $b, $opacity)";
            }
        @endphp
        <div class=" article ">
            {!! nl2br($data->article == '' ? '' : $data->article) !!}
            <div class=" pt-4 flex flex-wrap gap-2">
                @foreach ($data->articles->articletag as $item)
                    <a href="{{ route('tag', ['tag' => $item->slug]) }}">
                        <button style="background-color: {{ hexToRgba($template->desc_second_color) ?? '#1d588d' }}"
                            class=" px-2 sm:px-3 py-1 text-xs sm:text-sm text-white rounded-md lowercase">#{{ $item->tag }}</button>
                    </a>
                @endforeach
            </div>
        </div>
        <style>
            .article strong,
            p,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                color: inherit !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            .article a {
                font-weight: 700;
                color: {{ $template->desc_second_color ?? '#1d588d' }};
            }

            .article font {
                color: inherit;
            }

            .article ol {
                padding-left: 16px;
                list-style-type: decimal;
            }

            .article ul {
                padding-left: 16px;
                list-style-type: disc;
            }

            .article span {
                font-size: inherit !important;
                color: inherit !important;
            }

            .article p {
                font-size: 0.875rem !important;
                line-height: 1.25rem !important;
            }

            .article li {
                font-size: 0.875rem !important;
                line-height: 1.25rem !important;
            }

            .article h1 {
                font-size: 1.875rem !important;
                line-height: 2.25rem !important;
            }

            .article h2 {
                font-size: 1.5rem !important;
                line-height: 2rem !important;
            }

            .article h3 {
                font-size: 1rem !important;
                line-height: 1.5rem !important;
            }

            .article h4 {
                font-size: 1rem !important;
                line-height: 1.5rem !important;
            }

            .article h5 {
                font-size: 0.75rem !important;
                line-height: 1.25rem !important;
            }

            .article h6 {
                font-size: 0.5rem !important;
                line-height: 0.75rem !important;
            }

            @media screen and (min-width: 640px) {
                .article p {
                    font-size: 1rem !important;
                    line-height: 1.5rem !important;
                }

                .article li {
                    font-size: 1rem !important;
                    line-height: 1.5rem !important;
                }

                .article h3 {
                    font-size: 1.25rem !important;
                    line-height: 1.75rem !important;
                }
            }
        </style>
    </div>
</div>
