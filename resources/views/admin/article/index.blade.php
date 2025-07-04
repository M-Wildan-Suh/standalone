<x-app-layout head="Artikel" title="Admin - Artikel">
    <div class="sm:pl-12 sm:pr-12 lg:pr-32 duration-300 pt-8 pb-20 sm:pb-8 px-4 space-y-4">
        <div class="w-full p-4 sm:p-8 bg-white rounded-md shadow-md shadow-black/20 flex flex-col gap-6">
            <div class="w-full flex flex-col md:flex-row gap-4 justify-between items-center">
                <div class=" w-full md:w-auto grid grid-cols-2 sm:grid-cols-3 gap-2 sm:gap-4">
                    <a href="{{ route('article.create') }}"
                        class=" text-nowrap w-full text-center text-sm sm:text-base md:w-auto px-4 py-2 bg-byolink-1 text-white rounded-md font-semibold border border-byolink-1 hover:border-byolink-3 hover:bg-byolink-3 duration-300">
                        +Artikel Spintax
                    </a>
                    <a href="{{ route('article-show.create') }}"
                        class=" text-nowrap w-full text-center text-sm sm:text-base md:w-auto px-4 py-2 bg-byolink-1 text-white rounded-md font-semibold border border-byolink-1 hover:border-byolink-3 hover:bg-byolink-3 duration-300">
                        +Artikel Unik
                    </a>
                    <a href="{{ route('source-code.index') }}"
                        class=" col-span-2 sm:col-span-1 text-nowrap w-full text-center text-sm sm:text-base md:w-auto px-4 py-2 bg-byolink-1 text-white rounded-md font-semibold border border-byolink-1 hover:border-byolink-3 hover:bg-byolink-3 duration-300">
                        Short Code
                    </a>

                </div>

                <!-- Search -->
                <div class=" w-full md:w-auto flex flex-row font-semibold duration-300">
                    <form action="{{ url()->current() }}" class=" w-full">
                        <input type="text" placeholder="Cari Judul..." name="search" value="{{urlencode(request('search')) ?? ''}}"
                            class=" w-full text-sm sm:text-base md:w-auto py-2 px-3 border border-byolink-1 rounded-md overflow-hidden focus-within:border-byolink-3 font-normal">
                    </form>
                </div>
            </div>
            <div class=" w-full grid grid-cols-3 gap-2 sm:gap-4">
                <a href="{{ route('article.index') }}"
                    class="{{ request()->routeIs(['article.index', 'article.filter']) ? 'bg-byolink-1 text-white' : ' text-black rounded-md hover:text-white hover:bg-byolink-1'}} text-nowrap w-full text-center text-sm sm:text-base md:w-auto px-4 py-2 font-semibold rounded-md duration-300">
                    Semua
                </a>
                <a href="{{ route('article.spintax') }}"
                    class="{{ request()->routeIs(['article.spintax', 'article.spintax.filter']) ? 'bg-byolink-1 text-white' : ' text-black rounded-md hover:text-white hover:bg-byolink-1'}} text-nowrap w-full text-center text-sm sm:text-base md:w-auto px-4 py-2 font-semibold rounded-md duration-300">
                    Spintax
                </a>
                <a href="{{ route('article.unique') }}"
                    class="{{ request()->routeIs(['article.unique', 'article.unique.filter']) ? 'bg-byolink-1 text-white' : ' text-black rounded-md hover:text-white hover:bg-byolink-1'}} text-nowrap w-full text-center text-sm sm:text-base md:w-auto px-4 py-2 font-semibold rounded-md duration-300">
                    Unique
                </a>
            </div>
            <div class=" w-full flex flex-col lg:flex-row justify-between gap-4 text-sm sm:text-base">
                <div class=" w-full sm:w-auto flex justify-between gap-4 lg:justify-start">
                    <div class=" flex flex-row items-center gap-1">
                        <div class=" relative group w-4 sm:w-5 aspect-square text-red-500">
                            <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><g data-name="16-Time"><path d="M24 0a24 24 0 1 0 24 24A24 24 0 0 0 24 0Zm0 46a22 22 0 1 1 22-22 22 22 0 0 1-22 22Z" fill="#ff0000" class="fill-000000"></path><path d="M24 6a18 18 0 1 0 18 18A18 18 0 0 0 24 6Zm1 33.95V35h-2v4.95A16 16 0 0 1 8.05 25H14v-2H8.05A16 16 0 0 1 23 8.05V13h2V8.05A16 16 0 0 1 39.95 23H34v2h5.95A16 16 0 0 1 25 39.95Z" fill="#ff0000" class="fill-000000"></path><path d="M25 17h-2v7a1 1 0 0 0 .29.71l6 6 1.41-1.41-5.7-5.71Z" fill="currentColor" class="fill-000000"></path></g></svg>
                            <div class="absolute bottom-full mb-1 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition duration-200 whitespace-nowrap pointer-events-none z-10">
                                Schedule
                            </div>
                        </div>
                        <p class=" text-nowrap font-semibold">: <span class=" text-red-500">{{$count->schedule}}</span>/{{$count->all}}</p>
                        
                    </div>
                    <div class=" flex flex-row items-center gap-1">
                        <div class=" relative group w-4 sm:w-5 aspect-square text-green-500">
                            <svg viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M62.869 16.842h-.057c-1.096.007-1.266-.945-1.285-1.387V8.542c0-.738-.598-1.336-1.334-1.336H40.428c-4.959 0-6.809 1.838-7.268 2.415l-.126.175-.001.003-.391.536h-.001c-.525.721-.982.414-1.202.178l-.748-.933-.37-.446c-.622-.653-2.243-1.928-5.456-1.928H3.808c-.738 0-1.336.598-1.336 1.336v6.825c0 1.195-.649 1.435-1.047 1.475h-.296c-.324.02-1.078.208-1.078 1.595v32.529c0 .798.647 1.444 1.445 1.444h19.218c6.131 0 8.803 2.312 9.604 3.199l.457.566h.001s1.226 1.387 2.518 0l.268-.314v.001l.004-.003.342-.4c.01-.012.092-.104.211-.226 1.023-.995 3.58-2.823 8.58-2.823h19.805c.799 0 1.445-.646 1.445-1.444V18.122c0-1.176-.851-1.274-1.08-1.28zm-4.318 29.02c0 .641-.535 1.158-1.201 1.158H41.055c-5.799 0-7.904 2.62-7.904 2.62l-.267.358-.125.173h-.001c-.553.751-1.366.006-1.37.002l-.375-.469c-.278-.334-2.408-2.685-7.563-2.685H6.65c-.663 0-1.199-.518-1.199-1.158V11.199c0-.64.536-1.158 1.199-1.158h13.043c9.702 0 10.621 5.511 10.684 7.112v24.106c0 1.752.835 2.081 1.306 2.129h.701c.48-.048 1.243-.333 1.243-1.7V16.842h-.008c.072-2.005.854-6.802 6.689-6.802H57.35c.666 0 1.201.518 1.201 1.158v34.664z" fill="currentColor" class="fill-241f20"></path></svg>
                            <div class="absolute bottom-full mb-1 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition duration-200 whitespace-nowrap pointer-events-none z-10">
                                Publish
                            </div>
                        </div>
                        <p class=" text-nowrap font-semibold">: <span class=" text-green-500">{{$count->publish}}</span>/{{$count->all}}</p>
                    </div>
                    <div class=" flex flex-row items-center gap-1">
                        <div class=" relative group w-4 sm:w-5 aspect-square text-purple-500">
                            <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor" class="fill-333333"><path d="M25 13V9a9 9 0 0 0-9-9 9 9 0 0 0-9 9v4a3 3 0 0 0-3 3v7a9 9 0 0 0 9 9h6a9 9 0 0 0 9-9v-7a3 3 0 0 0-3-3zM9 9a7 7 0 1 1 14 0v4h-2V9.002a5 5 0 0 0-5-5 5 5 0 0 0-5 5V13H9V9zm11 0v4h-8V9a4 4 0 0 1 8 0zm6 10v4c0 3.859-3.141 7-7 7h-6c-3.859 0-7-3.141-7-7v-7a1 1 0 0 1 1-1h18c.551 0 1 .448 1 1v3z"></path><path d="M16 19a2 2 0 0 0-2 2c0 .607.333 1.76.667 2.672.272.742.614 1.326 1.333 1.326.782 0 1.061-.578 1.334-1.316.338-.914.666-2.073.666-2.682a2 2 0 0 0-2-2z"></path></g></svg>
                            <div class="absolute bottom-full mb-1 left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition duration-200 whitespace-nowrap pointer-events-none z-10">
                                Private
                            </div>
                        </div>
                        <p class=" text-nowrap font-semibold">: <span class=" text-purple-500">{{$count->private}}</span>/{{$count->all}}</p>
                    </div>
                </div>
                <div x-data="{ status: '{{$status ?? 'all'}}', category: '{{$filtercat ?? 'all'}}'}" class=" flex flex-row justify-between lg:justify-start gap-4">
                    <div class=" w-full grid grid-cols-2 gap-2">
                        <div class="flex items-center gap-2">
                            <p class=" flex text-nowrap flex-nowrap">S<span class=" hidden sm:block">tatus</span> : </p>
                            <select class=" text-neutral-600 border-neutral-600 w-full text-sm border pl-2 px-8 py-0.5 rounded-full" x-model="status" name="status" id="">
                                <option value="all">All</option>
                                <option value="schedule">Schedule</option>
                                <option value="publish">Publish</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-2">
                            <p class=" flex text-nowrap flex-nowrap">K<span class=" hidden sm:block">ategori</span> : </p>
                            <select class=" text-neutral-600 border-neutral-600 w-full text-sm border pl-2 px-8 py-0.5 rounded-full" x-model="category" name="status" id="">
                                <option value="all">All</option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->category}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <a :href="`{{ preg_replace('#/status/[^/]+/category/[^/]+#', '',url()->current()) }}/status/${status}/category/${category}`">
                        <button class=" w-full bg-byolink-1 hover:bg-byolink-3 duration-300 rounded-full text-white px-2 py-0.5 text-sm">Cari</button>
                    </a>
                </div>
            </div>
            <table class="w-full max-w-full text-sm sm:text-base rounded-md">
                <thead>
                    <tr class="h-10 bg-byolink-1 text-white divide-x-2 divide-white">
                        <th class=" w-10 px-2 py-1 rounded-tl-md">No</th>
                        <th x-data="{ filter: false }" class=" px-1 sm:px-2 py-1 relative">
                            Judul
                        </th>
                        <th class=" px-1 sm:px-2 py-1 w-[90px] sm:w-[100px] rounded-tr-md">Opsi</th>
                    </tr>
                </thead>
                @forelse ($data as $item)
                    @php
                        $rowBg = $loop->even ? 'bg-neutral-100' : 'bg-neutral-200';
                    @endphp
                    <tbody x-data="{ spin: false, search: '' }">
                        <tr class="{{ $rowBg }} h-10 text-neutral-600 divide-x-2 divide-white">
                            <td class="px-3 py-1 text-center font-semibold">{{ $loop->iteration }}</td>
                            <td class="px-2 sm:px-4 py-1 min-h-10 font-semibold max-w-44 sm:max-w-full">
                                @if ($item->article_type === 'unique')
                                    <a href="{{ route('business', ['slug' => $item->articleshow->first()->slug]) }}">
                                        <p class="line-clamp-2">{{$item->judul}}</p>
                                    </a>
                                @else
                                    <p class=" w-full max-w-full line-clamp-2">{{$item->judul}}</p>
                                @endif
                            </td>
                            <td class="px-1 sm:px-2">
                                <div class="flex gap-1 sm:gap-2 justify-center">
                                    @if ($item->article_type === 'spintax')
                                        {{-- Article Generated --}}
                                        <a href="{{ route('article.spin', ['id' => $item->id])}}" target="__blank">
                                            <button class="w-5 h-5 hover:text-blue-500 duration-300 relative">
                                                <svg viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"><path d="M20 10H4c-1.1 0-2 .9-2 2s.9 2 2 2h16c1.1 0 2-.9 2-2s-.9-2-2-2zM4 8h12c1.1 0 2-.9 2-2s-.9-2-2-2H4c-1.1 0-2 .9-2 2s.9 2 2 2zM16 16H4c-1.1 0-2 .9-2 2s.9 2 2 2h12c1.1 0 2-.9 2-2s-.9-2-2-2z" fill="currentColor" class="fill-000000"></path></svg>
                                            </button>
                                        </a>

                                        {{-- Edit --}}
                                        <div class="relative" x-data="{ open: false, generatemodal:false }">
                                            <button @click="open = !open" class="w-5 h-5 hover:text-green-500 duration-300">
                                                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 17.75A3.25 3.25 0 0 0 6.25 21h4.915l.356-1.423c.162-.648.497-1.24.97-1.712l5.902-5.903a3.279 3.279 0 0 1 2.607-.95V6.25A3.25 3.25 0 0 0 17.75 3H11v4.75A3.25 3.25 0 0 1 7.75 11H3v6.75ZM9.5 3.44 3.44 9.5h4.31A1.75 1.75 0 0 0 9.5 7.75V3.44Zm9.6 9.23-5.903 5.902a2.686 2.686 0 0 0-.706 1.247l-.458 1.831a1.087 1.087 0 0 0 1.319 1.318l1.83-.457a2.685 2.685 0 0 0 1.248-.707l5.902-5.902A2.286 2.286 0 0 0 19.1 12.67Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </button>
                                            
                                            <div x-show="open" @click.outside="open = false" class="absolute z-10 mt-1 right-0 bottom-0 bg-white border rounded shadow-lg w-32">
                                                <a href="{{ route('article.show', ['article' => $item->id]) }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Edit</a>
                                                <a href="{{ route('shuffle.image', ['id' => $item->id]) }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Shuffle Image</a>
                                                <button @click="generatemodal = !generatemodal" class=" w-full text-left block px-4 py-2 text-sm hover:bg-gray-100">Generate</button>
                                            </div>

                                            <x-admin.component.generatemodal :id="$item->id" :title="$item->judul" :route="route('article.generate', ['id' => $item->id])"/>
                                        </div>

                                        {{-- Delete --}}
                                        <div class=" relative" x-data="{ open: false, deletemodal: false, deletegeneratemodal: false }">
                                            <button @click="open = !open"
                                                class="w-5 h-5 hover:text-red-500 duration-300 relative">
                                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M19.5 8.99h-15a.5.5 0 0 0-.5.5v12.5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.49a.5.5 0 0 0-.5-.5Zm-9.25 11.5a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0Zm5 0a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0ZM20.922 4.851a11.806 11.806 0 0 0-4.12-1.07 4.945 4.945 0 0 0-9.607 0A12.157 12.157 0 0 0 3.18 4.805 1.943 1.943 0 0 0 2 6.476 1 1 0 0 0 3 7.49h18a1 1 0 0 0 1-.985 1.874 1.874 0 0 0-1.078-1.654ZM11.976 2.01A2.886 2.886 0 0 1 14.6 3.579a44.676 44.676 0 0 0-5.2 0 2.834 2.834 0 0 1 2.576-1.569Z"
                                                    fill="currentColor"></path>
                                                </svg>
                                            </button>
                                            <div x-show="open" @click.outside="open = false" class="absolute z-30 mt-1 right-0 bottom-0 bg-white border rounded shadow-lg w-52">
                                                <button  @click="deletegeneratemodal = !deletegeneratemodal" class=" w-full text-left block px-4 py-2 text-sm hover:bg-gray-100">Delete Generate Artikel</button>
                                                <button @click="deletemodal = !deletemodal" class="w-full text-left block px-4 py-2 text-sm hover:bg-gray-100">Delete Artikel</button>
                                                
                                                <div x-show="deletegeneratemodal"
                                                    class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-40">
                                                    <div class="w-full max-w-[720px] bg-white pb-6 rounded-md flex flex-col gap-4 relative overflow-hidden border-2 border-byolink-1">
                                                        <button @click="deletegeneratemodal = false"
                                                            class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
                                                            <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                                                enable-background="new 0 0 512 512">
                                                                <path
                                                                    d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                                                                    fill="currentColor" class="fill-000000"></path>
                                                            </svg>
                                                        </button>
                                                        <div class=" pt-6 pb-3 bg-byolink-1 text-white">
                                                            <h2 class=" px-6 text-2xl font-bold">Tentunkan jumlah artikel yang akan di hapus</h2>
                                                        </div>
                                                        <form action="{{ route('article.generate.destroy', ['id' => $item->id]) }}`" method="POST"
                                                            class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class=" px-6 pb-4">
                                                                <x-admin.component.numberinput title="Artikel yang di hapus akan di ambil dari artikel terlama yang disimpan" placeholder="Masukkan jumlah artikel yang akan di hapus" :value="''" name="total" />
                                                            </div>
                                                            <div class="flex justify-end space-x-4 px-6">
                                                                <button @click="deletegeneratemodal = false" type="button"
                                                                    class="px-4 py-2 text-sm sm:text-base bg-neutral-600 duration-300 hover:bg-byolink-1 text-white rounded-md">Cancel</button>
                                                                <button type="submit"
                                                                    class="px-4 py-2 bg-red-500 duration-300 hover:bg-red-900 text-white rounded">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <x-admin.component.deletemodal :title="$item->judul" :route="route('article.destroy', ['article' => $item->id])"/>
                                            </div>
                                        </div>
                                    @elseif ($item->article_type === 'unique')
                                        {{-- Edit --}}
                                        <a href="{{ route('article-show.show', [ 'article_show' => $item->articleshow->first()->id ]) }}"
                                            class="w-5 h-5 hover:text-green-500 duration-300">
                                            <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 17.75A3.25 3.25 0 0 0 6.25 21h4.915l.356-1.423c.162-.648.497-1.24.97-1.712l5.902-5.903a3.279 3.279 0 0 1 2.607-.95V6.25A3.25 3.25 0 0 0 17.75 3H11v4.75A3.25 3.25 0 0 1 7.75 11H3v6.75ZM9.5 3.44 3.44 9.5h4.31A1.75 1.75 0 0 0 9.5 7.75V3.44Zm9.6 9.23-5.903 5.902a2.686 2.686 0 0 0-.706 1.247l-.458 1.831a1.087 1.087 0 0 0 1.319 1.318l1.83-.457a2.685 2.685 0 0 0 1.248-.707l5.902-5.902A2.286 2.286 0 0 0 19.1 12.67Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </a>

                                        {{-- Delete --}}
                                        <div x-data="{ deletemodal:false }">
                                            <button @click="deletemodal = !deletemodal"
                                                class=" w-4 sm:w-5 aspect-square hover:text-red-500 duration-300">
                                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.5 8.99h-15a.5.5 0 0 0-.5.5v12.5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9.49a.5.5 0 0 0-.5-.5Zm-9.25 11.5a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0Zm5 0a.75.75 0 0 1-1.5 0v-8.625a.75.75 0 0 1 1.5 0ZM20.922 4.851a11.806 11.806 0 0 0-4.12-1.07 4.945 4.945 0 0 0-9.607 0A12.157 12.157 0 0 0 3.18 4.805 1.943 1.943 0 0 0 2 6.476 1 1 0 0 0 3 7.49h18a1 1 0 0 0 1-.985 1.874 1.874 0 0 0-1.078-1.654ZM11.976 2.01A2.886 2.886 0 0 1 14.6 3.579a44.676 44.676 0 0 0-5.2 0 2.834 2.834 0 0 1 2.576-1.569Z"
                                                        fill="currentColor" class="fill-000000"></path>
                                                </svg>
                                            </button>
                                            <x-admin.component.deletemodal :title="$item->judul" :route="route('article.destroy', ['article' => $item->id])"/>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @empty
                    <tr>
                        <td colspan="3" class=" bg-neutral-100 px-1 sm:px-2 py-1 text-center rounded-b-md text-neutral-600">Data tidak ditemukan</td>
                    </tr>
                @endforelse
            </table>
            {{ $data->links('vendor.pagination.admin') }}
        </div>
    </div>

    @include('components.admin.component.success')
</x-app-layout>
