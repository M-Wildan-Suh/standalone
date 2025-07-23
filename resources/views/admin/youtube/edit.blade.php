<div x-show="edit" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div
        class="w-full max-w-[720px] bg-white pb-6 rounded-md flex flex-col gap-4 relative overflow-hidden border-2 border-byolink-1">
        <button @click="edit = false" class=" absolute top-6 right-6 w-6 h-6 text-white hover:text-red-500 duration-300">
            <svg viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                enable-background="new 0 0 512 512">
                <path
                    d="M437.5 386.6 306.9 256l130.6-130.6c14.1-14.1 14.1-36.8 0-50.9-14.1-14.1-36.8-14.1-50.9 0L256 205.1 125.4 74.5c-14.1-14.1-36.8-14.1-50.9 0-14.1 14.1-14.1 36.8 0 50.9L205.1 256 74.5 386.6c-14.1 14.1-14.1 36.8 0 50.9 14.1 14.1 36.8 14.1 50.9 0L256 306.9l130.6 130.6c14.1 14.1 36.8 14.1 50.9 0 14-14.1 14-36.9 0-50.9z"
                    fill="currentColor" class="fill-000000"></path>
            </svg>
        </button>
        <div class=" pt-6 pb-3 bg-byolink-1 text-white">
            <h2 class=" px-6 text-2xl font-bold">Edit Youtube</h2>
        </div>
        <form action="{{route('youtube.update', ['youtube' => $item->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class=" w-full space-y-4 px-6">
                <x-admin.component.linkinput title="Link Youtube" placeholder="Masukkan link..."
                    :value="old('link', $item->youtube)" name="link" link="Url" />
                <div class="flex justify-end space-x-4 ">
                    <x-admin.component.submitbutton title="Tambah" />
                </div>
            </div>
        </form>
    </div>
</div>
