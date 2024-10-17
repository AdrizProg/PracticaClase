@if (session('status'))
    <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline"> {{ session('status') }} </span>
        <span id="close-alert" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <path
                    d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414 7.066 14.35a1 1 0 01-1.414-1.414L8.586 10 5.652 7.066a1 1 0 011.414-1.414L10 8.586l2.934-2.934a1 1 0 011.414 1.414L11.414 10l2.934 2.934a1 1 0 010 1.415z" />
            </svg>
        </span>
    </div>
@endif

<script>
    document.getElementById('close-alert').addEventListener('click', function () {
        document.getElementById('alert').style.display = 'none';
    });
</script>