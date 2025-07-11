<x-layout.guest title="Bizlink" :category="$category">
    <div class=" w-full min-h-[calc(100vh-370px)]">
        <div class=" w-full py-6 sm:py-10 px-4 sm:px-6 space-y-8 sm:space-y-12">
            <div class=" w-full max-w-[1080px] mx-auto">
                <div class=" w-full space-y-4 sm:space-y-6">
                    <div class=" w-full flex items-center gap-4 mb-10">
                        <div class=" w-1.5 h-10 bg-byolink-2 rounded-full"></div>
                        <p class=" text-3xl font-bold text-center">Penulis : {{$user->name}}</p>
                    </div>
                    <div class=" w-full grid grid-cols-2 md:grid-cols-4 gap-4">
                        @include('components.guest.product')
                    </div>
                    <div class=" w-full">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.guest.footer')
</x-layout.guest>