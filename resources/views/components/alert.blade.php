@if (session('status'))
<div id="error-alert" class="rounded-lg drop-shadow-xl md:w-96 w-72 text-center top-36 left-0 right-0 h-20 ml-auto mr-auto bg-red-50 md:px-5 md:py-4 py-3 px-4 fixed z-50">
    <button class="hover:bg-red-200 rounded-lg transition-all text-red-800 md:text-2xl text-xl font-semibold w-4 h-4 p-4 mt-1 absolute top-0 right-0 mr-1" onclick="this.parentElement.style.display='none';">
        <span class="absolute left-0 right-0 top-0 bottom-0">x</span>
    </button>
    <span class="md:text-lg text-base text-red-700 font-semibold">{{ session('status') }}</span>
</div>
@endif